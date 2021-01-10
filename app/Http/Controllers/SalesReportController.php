<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainStockOut;

class SalesReportController extends Controller
{
    public function summery_rpt()
    {
    	$data=MainStockOut::all();
        
        $s = date('Y-01-01');
        $e = date('Y-12-t');
        return view('sales_rpt.summery_rpt',compact('data','s','e'));
    }
    public function by_search(Request $r)
    {
        $data=MainStockOut::all();
        
        $s = $r->start;
        $e = $r->end;
       // echo $s.'<br/>'; echo $e; 
        return view('sales_rpt.summery_rpt',compact('data','s','e'));
    }

     public function details_rpt()
    {
    	return view('sales_rpt.details_rpt');
    }

     public function depo_wise()
    {
    	return view('sales_rpt.depo_wise');
    }

     public function customer_wise()
    {
    	return view('sales_rpt.customer_wise');
    }
     public function sales_man_wise()
    {
    	return view('sales_rpt.sales_man_wise');
    }
}
