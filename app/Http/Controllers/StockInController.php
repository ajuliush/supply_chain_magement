<?php

namespace App\Http\Controllers;

use App\Models\Raw_material;
use App\Models\StockIn;
use App\Models\PeopleModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StockInController extends Controller
{

    public function index()
    {
       $data=StockIn::groupBy('invoiceID')->get();
       return view('stockin.stock_in_list',compact('data'));
    }

    
    public function add_stock()
    {
        $raw=Raw_material::where('deleted','1')->get();
        $stk = DB::table('supplier')
            ->join('people', 'supplier.peopleID', '=', 'people.id')
            ->select('supplier.*', 'people.name')
            ->get();
        return view('stockin.raw_add_stock_in', compact('raw','stk'));
    }
    public function get_info($id)
    {
       $data['item']=Raw_material::find($id);
        return response()->json($data);

    }
    public function save_stock_in(Request $r)
    {
        $data['peopleID']=Auth::user()->id;
        $data['invoiceID']=rand();
        $data['created_at']=$r->created_at;
        $data['discount']=$r->discount;
        $data['supplierID']=$r->supplierID;

        foreach($r->batchID as $key => $v){
            $data['batchID']=$r->batchID[$key];
            $data['itemID']=$r->itemID[$key];
            $data['price']=$r->price[$key];
            $data['quantity']=$r->quantity[$key];
            $data['total']=$r->total[$key];
            $data['raw_material_id']=$r->raw_material_id[$key];

        //echo"<pre>"; print_r($data);
       StockIn::create($data);
        } 

         return redirect('stock_in/print/'.$data['invoiceID']);
    }


public function print($id)
    {
        
        $data=StockIn::where('invoiceID',$id)->get(); 
        // $data['product_name']=Raw_material::where('id',$data['raw_material_id'])->get(); 

        // dd($data);
        //echo "<pre>"; print_r($data);
         return view('stockin.print',compact('data'));
         // $pdf=PDF::loadView('stockout.print',compact('data'));
         // return  $pdf->download('stk_out_invoice.pdf');
    }
     public function edit($invoiceID)
     {
         
         $people=PeopleModel::all();
         $raw_name=Raw_material::all();
          $stockin=StockIn::where('invoiceID',$invoiceID)->get();
          //echo "<pre>"; print_r($raw_name);
         
       return view('stockin.stk_edit',compact('raw_name','stockin','people'));
     }
   public function destory(Request $request,$invoiceID)
   {
        StockIn::where('invoiceID', $invoiceID)->delete();


        
        $data['peopleID']=Auth::user()->id;
        $data['supplierID']=$request->supplierID;
        $data['invoiceID']=$invoiceID;
        $data['discount']=$request->discount;
        $data['created_at']=$request->created_at;

       foreach ($request->batchID  as $key => $v) {
          $data['batchID']=$request->batchID[$key];
          $data['price']=$request->price[$key];
          $data['quantity']=$request->quantity[$key];
          $data['total']=$request->total[$key];
          $data['unit']=$request->unit[$key];
          $data['raw_material_id']=$request->raw_material_id[$key];

       StockIn::create($data);
        //echo"<pre>";print_r($data);
      
    }
        return redirect('/stock_in/stock_in_list')->with('msg','Update successfully');
   }
}
