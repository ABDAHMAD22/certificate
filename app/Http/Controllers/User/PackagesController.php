<?php

namespace App\Http\Controllers\User;

use App\Bank;
use App\BankTransfer;
use App\Http\Requests\User\SubscriptionRequest;
use App\Package;
use App\Payment;
use App\PaypalPayment;
use Illuminate\Http\Request;
use Omnipay\Omnipay;

class PackagesController extends SuperController
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(env('PAYPAL_TEST_MODE')); //set it to 'false' when go live
    }

    public function index()
    {
        self::$data['activeClass'] = 'package';
        self::$data['packages'] = Package::take(12)->get();
        self::$data['banks'] = Bank::all();
        self::$data['payment_companies'] = Payment::COMPANIES_LIST;
        return view('site.package.index', self::$data);
    }

    public function packages()
    {
        self::$data['activeClass'] = 'packages';
        self::$data['packages'] = Package::take(12)->get();
        self::$data['banks'] = Bank::all();
        self::$data['payment_companies'] = Payment::COMPANIES_LIST;
        return view('site.package.index', self::$data);
    }

    public function subscription(SubscriptionRequest $request, Package $package)
    {
        $fields = $request->except('invoice');
        if (\Auth::guard('web')->check()) {
            $fields['user_id'] = \Auth::guard('web')->id();
        }
        if (\Auth::guard('editor')->check()) {
            $fields['user_id'] = \Auth::guard('editor')->user()->user_id;
            $fields['editor_id'] = \Auth::guard('editor')->id();
        }
        $invoice_path = $request->file('invoice')->store('');
        $fields['invoice'] = $invoice_path;
        $fields['package_id'] = $package->id;
        $bankTransfer = BankTransfer::create($fields);
        $payment = [
            'price' => $package->price,
            'certificates_no' => $package->certificates_no,
            'certificates_free_no' => $package->certificates_free_no,
            'ads_no' => $package->ads_no,
            'cards_no' => $package->cards_no,
            'user_id' => $fields['user_id'],
            'status_id' => 1,
            'payment_type_id' => 1,
        ];
        $bankTransfer->payments()->create($payment);
        return response(["message" => trans("app.saved_successfully")], 200);
    }

    public function payment(Package $package)
    {
        self::$data['package'] = $package;
        self::$data['payment_companies'] = Payment::COMPANIES_LIST;
        return view('site.package.payment', self::$data);
    }

    public function charge(Request $request)
    {
        if ($request->input('submit')) {
            try {
                //$request->input('amount');
                $package = Package::whereId($request->input('package_id'))->first();
                $response = $this->gateway->purchase(array(
                    'amount' => $package->price,
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => route('paypal.success'),
                    'cancelUrl' => route('package', ['type' => 'paypal', 'status' => 'cancelled'])//route('paypal.error'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function payment_success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $isPaymentExist = PaypalPayment::where('payment_id', $arr_body['id'])->first();

                if (!$isPaymentExist) {
                    $paypalPayment = new PaypalPayment;
                    $paypalPayment->payment_id = $arr_body['id'];
                    $paypalPayment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $paypalPayment->payer_email = $arr_body['payer']['payer_info']['email'];
                    $paypalPayment->amount = $arr_body['transactions'][0]['amount']['total'];
                    $paypalPayment->currency = env('PAYPAL_CURRENCY');
                    $paypalPayment->status = $arr_body['state'];
                    $paypalPayment->save();

                    $user_id = \Auth::id();
                    $package = Package::whereId(4)->first();
                    $item = [
                        'price' => $package->price,
                        'certificates_no' => $package->certificates_no,
                        'certificates_free_no' => $package->certificates_free_no,
                        'ads_no' => $package->ads_no,
                        'cards_no' => $package->cards_no,
                        'user_id' => $user_id,
                        'status_id' => 2,
                        'payment_type_id' => 3,
                    ];
                    $paypalPayment->payments()->create($item);
                }

                return redirect(route('payments', [
                    'type' => 'paypal',
                    'status' => 'success',
                ]));
            } else {
                return $response->getMessage();
            }
        } else {
            return redirect(route('payments', [
                'type' => 'paypal',
                'status' => 'declined',
            ]));
        }
    }
}
