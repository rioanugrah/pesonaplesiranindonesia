<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Payment\DuitkuController;

class TestingController extends Controller
{
    function __construct(
        DuitkuController $duitkuPayment
    ){
        $this->duitkuPayment = $duitkuPayment;
    }

    public function testing1()
    {
        $data['amount'] = 10000;
        $data['payment_method'] = 'BT';
        $data['email'] = 'rioanugrah999@gmail.com';
        $data['phone_number'] = '082233684670';
        $data['product'] = 'Open Trip Bromo';
        $data['customer_name'] = 'Rio Anugrah';
        $data['url_callback'] = '-';
        $data['url_return'] = route('frontend.index');

        $data['first_name'] = 'Rio';
        $data['last_name'] = 'Anugrah';
        $data['address'] = '-';
        $data['city'] = 'Malang';
        $data['postal_code'] = '65123';

        $payment = $this->duitkuPayment->store($data);

        return $payment;
    }
}
