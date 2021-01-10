<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class FrontController extends Controller
{
    public function index()
    {
    	$category=Category::all();
    	$news=News::orderBy('id','desc')->get();
    	return view('front.index',compact('category','news'));
    }
    public function details($id)
    {
    	$category=Category::all();
    	$news=News::find($id);
    	return view('front.details',compact('category','news'));
    }
    public function category($id)
    {
    	session(['menu'=>$id]);
    	$category=Category::all();
    	$cat=Category::find($id);
    	return view('front.category',compact('category','cat'));
    }
}
