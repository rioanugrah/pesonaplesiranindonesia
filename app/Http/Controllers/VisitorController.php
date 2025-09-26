<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShetabitVisits;
use DB;

class VisitorController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:visitor-list', ['only' => ['index']]);
    }

    public function index()
    {
        $data['visitors'] = ShetabitVisits::orderBy('created_at','desc')->get();
        // dd($data);
        return view('backend.visitors.index',$data);
    }
}
