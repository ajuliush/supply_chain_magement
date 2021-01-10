<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;

class PaymentController extends Controller
{
    
    public function payment()
    {
    	$supplier=SupplierModel::all();
    	//dd($supplier);
    	return view('payment.payment',compact('supplier'));
    }
}
