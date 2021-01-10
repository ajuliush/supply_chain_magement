<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raw_material;


class Raw_materialController extends Controller
{
    public function index()
    {
    	$data=Raw_material::orderBy('id','desc')->get();
    	return view('raw.raw_material_list',compact('data'));
    }
    public function edit($id)
    {
    	$data=Raw_material::find($id);
    	return view('raw.edit_raw',compact('data'));

    }

    public function store(Request $r)
    {
          $r->validate(['name'=>'required','description'=>'required','unit'=>'required','stock_alert'=>'required']);
         $colour=json_encode($r->stock_alert);
          
          $data=array('name'=>$r->name,'unit'=>$r->unit,'description'=>$r->description,'stock_alert'=>$colour,'deleted'=>1);

          Raw_material::create($data);
         
          return back()->with('msg','Successfully inserted raw data');
    } 
    public function new()
    {
    	return view ('raw.add_material');
    }
    public function update(Request $r,$id)
    {
    	 $data=array('name'=>$r->name,'unit'=>$r->unit,'description'=>$r->description,'stock_alert'=>$r->stock_alert,'deleted'=>1);
          Raw_material::where('id',$id)->update($data);
          return redirect('raw/list')->with('msg','Updated  raw data');
    }
    public function destory($id)
    {
    	Raw_material::where('id',$id)->update(['deleted'=>2]);
    	return redirect('/raw/list')->with('msg1','Deleted  raw data');
    }

}
