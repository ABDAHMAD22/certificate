<?php

use Illuminate\Database\Seeder;

class BankTransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankTransfer = \App\BankTransfer::create([
            'bank_id' => 1,
            'user_id' => 1,
            'account_holder' => 'Ahmad Mahmoud',
            'invoice' => 'invoice-img1.jpeg',
            'package_id' => 1,
        ]);
        $bankTransfer->Payments()->create([
            'price' => $bankTransfer->package->price,
            'certificates_no' => $bankTransfer->package->certificates_no,
            'certificates_free_no' => $bankTransfer->package->certificates_free_no,
            'ads_no' => $bankTransfer->package->ads_no,
            'cards_no' => $bankTransfer->package->cards_no,
            'user_id' => 1,
            'status_id' => 2,
            'payment_type_id' => 1,
        ]);
    }
}
