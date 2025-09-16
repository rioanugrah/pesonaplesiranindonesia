<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use \Carbon\Carbon;

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
        $data['totalDay'] = $this->payment->where('payment_date','LIKE','%'.Carbon::today().'%')->where('status','Success')->sum('amount');

        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d');
        $weekEndtDate = $now->endOfWeek()->format('Y-m-d');

        $data['totalWeek'] = $this->payment->whereBetween('payment_date',[$weekStartDate,$weekEndtDate])->where('status','Success')->sum('amount');

        $monthStartDate = $now->startOfMonth()->format('Y-m-d');
        $monthEndtDate = $now->endOfMonth()->format('Y-m-d');

        $data['totalMonth'] = $this->payment->whereBetween('payment_date',[$monthStartDate,$monthEndtDate])->where('status','Success')->sum('amount');

        return view('backend.transactions.index',$data);
    }
}
