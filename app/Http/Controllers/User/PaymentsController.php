<?php

namespace App\Http\Controllers\User;

use App\Package;
use App\Payment;
use App\PaymentCard;
use Illuminate\Http\Request;
use Moyasar\Providers\PaymentService;

class PaymentsController extends SuperController
{
    public function addPaymentCard($payment, $package, $user_id)
    {
        return PaymentCard::create([
                'process_id' => $payment->id,
                'status' => $payment->status,
                'amount' => $payment->amount,
                'source_name' => $payment->source->name,
                'source_company' => $payment->source->company,
                'package_id' => $package->id,
                'user_id' => $user_id,
            ]);
    }

    public function addPackagePayment($payment, $package, $user_id)
    {
        $paymentCards = PaymentCard::where([
            'process_id' => $payment->id,
        ])->get();
        if(count($paymentCards) == 0) {
            $model = $this->addPaymentCard($payment, $package, $user_id);
            $item = [
                'price' => $package->price,
                'certificates_no' => $package->certificates_no,
                'certificates_free_no' => $package->certificates_free_no,
                'ads_no' => $package->ads_no,
                'cards_no' => $package->cards_no,
                'user_id' => $user_id,
                'status_id' => 2,
                'payment_type_id' => 2,
            ];
            $model->payments()->create($item);
        }
    }

    public function fetchPaymentAndAddPaid($request, $user_id)
    {
        $paymentService = new PaymentService();
        $payment = $paymentService->fetch($request->id);
        $package = Package::find($request->package_id);
        if ($request->status === 'paid') {
            $this->addPackagePayment($payment, $package, $user_id);
        }
        return $payment;
    }

    public function index(Request $request)
    {
        self::$data['activeClass'] = 'payments';
        $user_id = \Auth::id();
        $payment_data = null;
        if($request->id) {
            $payment_data = $this->fetchPaymentAndAddPaid($request, $user_id);
        }
        self::$data['payment_data'] = $payment_data;
        self::$data['payments'] = Payment::whereUserId($user_id)->with('status', 'paymentType', 'paymentable.package')->paginate();

        $payment_paypal_message = '';
        $payment_paypal_status = '';
        if($request->get('type') == 'paypal') {
            if($request->get('status') == 'success') {
                $payment_paypal_message = trans('app.Payment is successful');
                $payment_paypal_status = 'success';
            }
            if($request->get('status') == 'declined') {
                $payment_paypal_message = trans('app.payment is declined');
                $payment_paypal_status = 'error';
            }
        }
        self::$data['payment_paypal_message'] = $payment_paypal_message;
        self::$data['payment_paypal_status'] = $payment_paypal_status;
        return view('site.payments', self::$data);
    }
}
