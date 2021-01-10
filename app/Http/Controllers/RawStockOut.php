<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use Illuminate\Http\Request;
use App\Models\Raw_material;
use App\Models\Raw_material_return;
use App\Models\Raw_wastage;
use App\Models\StockIn;
use App\Models\SupplierModel;
use PDF;
use Illuminate\Support\Facades\Auth;



class RawStockOut extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $data= DB::table('raw_stock_out')
        //     ->join('raw_material', 'raw_material.id', '=', 'raw_stock_out.raw_material_id')
        //     ->join('raw_stock_in', 'raw_stock_in.batchID', '=', 'raw_stock_out.batchID')
        //     ->join('people', 'people.id', '=', 'raw_stock_out.peopleID')
        //     ->select('raw_stock_out.*', 'raw_material.name as product_name','raw_material.unit', 'raw_stock_in.price','raw_stock_in.batchID','raw_stock_in.invoiceID','people.name as people_name')
        //     ->get();+
      $data=StockIn::all();
        return view('stockout.stockoutlist',compact('data'));
    }
     
    public function get_info($id)
    {
        $data['item']=Raw_material::find($id);
        
        $data['batch']=StockIn::select('batchID')->where('raw_material_id',$id)->groupBy('batchID')->get();

        return response()->json($data);
    }

    public function get_batch($id,$batchID)
    {
        $stock_in_quantity=StockIn::where('raw_material_id',$id)->where('batchID',$batchID)->sum('quantity');
         $stock_out_quantity=StockOut::where('raw_material_id',$id)->where('batchID',$batchID)->sum('quantity');
         $raw_return_quantity=Raw_material_return::where('raw_material_id',$id)->sum('quantity');
       $raw_wastage_quantity= Raw_wastage::where('id',$id)->where('batchID',$batchID)->sum('quantity');
       $st=($stock_in_quantity-$stock_out_quantity)+$raw_return_quantity;
       $total['s']=$st-$raw_return_quantity;
       $total['p']=StockIn::select('price')->where('raw_material_id',$id)->where('batchID',$batchID)->get()[0]->price;
        return response()->json($total);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $data['peopleID']=Auth::user()->id;
          $data['invoiceID']=rand();
        $data['discount']=$request->discount;
         $data['created_at']=$request->created_at;
       foreach ($request->batchID  as $key => $v) {
          
          $data['batchID']=$request->batchID[$key];
          $data['price']=$request->price[$key];
          $data['quantity']=$request->quantity[$key];
          $data['total']=$request->total[$key];
          $data['unit']=$request->unit[$key];
          $data['raw_material_id']=$request->raw_material_id[$key];

       StockOut::create($data);
          //echo"<pre>";print_r($data);
} 
  return redirect('out/print/'.$data['invoiceID']);
    }

    
public function print($id)
    {
        
        $data=StockOut::where('invoiceID',$id)->get(); 
        // $data['product_name']=Raw_material::where('id',$data['raw_material_id'])->get(); 

        // dd($data);
        // echo "<pre>"; print_r($data);
         return view('stockout.print',compact('data'));
         $pdf=PDF::loadView('stockout.print',compact('data'));
         return  $pdf->download('stk_out_invoice.pdf');
    }

    public function stock_out_invoice_list()
    {
        
        $data=StockOut::groupBy('invoiceID')->get();
        
         return view('stockout.stock_out_invoice',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function show(StockOut $stockOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */
    public function edit($invoiceID)
    {
          $stockin=Raw_material::all();
          $stockout=StockOut::where('invoiceID',$invoiceID)->get();
          //echo "<pre>"; print_r($data);
          $batch=StockIn::select('batchID')->where('raw_material_id',$stockout[0]->raw_material_id)->groupBy('batchID')->get();
       return view('stockout.stock_out_invoice_edit',compact('stockin','stockout','batch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StockOut  $stockOut
     * @return \Illuminate\Http\Response
     */



    public function destory(Request $request ,$id)
    {


        StockOut::where('invoiceID', $id)->delete();

           $data['peopleID']=Auth::user()->id;
          $data['invoiceID']=$id;
        $data['discount']=$request->discount;
         $data['created_at']=$request->created_at;
       foreach ($request->batchID  as $key => $v) {
          
          $data['batchID']=$request->batchID[$key];
          $data['price']=$request->price[$key];
          $data['quantity']=$request->quantity[$key];
          $data['total']=$request->total[$key];
          $data['unit']=$request->unit[$key];
          $data['raw_material_id']=$request->raw_material_id[$key];

       StockOut::create($data);
        //echo"<pre>";print_r($data);
      
    }
        return redirect('/out/stock_out_invoice_list')->with('msg','Update successfully');
    }

    
}
