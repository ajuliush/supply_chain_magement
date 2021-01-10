<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raw_material;
use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\Raw_wastage;

class RawReportController extends Controller
{
  public function index()
  {  


    $data=Raw_material::orderBy('id','desc')->get();

    return view('raw_report.stock_reports',compact('data'));

  }

  public function single_stockout($id)
  {  
    $stk_in=StockIn::where('raw_material_id',$id)->sum('quantity');
    $stk_out=StockOut::where('raw_material_id',$id)->sum('quantity');
    $wtg=Raw_wastage::where('raw_material_id',$id)->sum('quantity');
    $avl_stk=($stk_in-$stk_out)-$wtg;

    $p_id=$id;
    $s_date = date('Y-m-01');
    $e_date = date('Y-m-d');
    return view('raw_report.single_stockout',compact('p_id','avl_stk','s_date','e_date'));


  }

  public function search(Request $r,$id)
  {  
    $s_date=$r->start;
    $e_date=$r->end;
                  

  $stk_in=StockIn::where('raw_material_id',$id)->sum('quantity');
  $stk_out=StockOut::where('raw_material_id',$id)->sum('quantity');
  $wtg=Raw_wastage::where('raw_material_id',$id)->sum('quantity');
  $avl_stk=($stk_in-$stk_out)-$wtg;
  $p_id=$id;
  return view('raw_report.single_stockout',compact('p_id','avl_stk','s_date','e_date'));

}
}
