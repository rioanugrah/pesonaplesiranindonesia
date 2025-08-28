<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class TransactionController extends Controller
{
    function __construct(
        Payment $payment
    )
    {
        $this->payment = $payment;
    }

    public function index()
    {
        $data['payments'] = $this->payment->orderBy('created_at','desc')->paginate(10);
        return view('backend.transactions.index',$data);
    }
}
