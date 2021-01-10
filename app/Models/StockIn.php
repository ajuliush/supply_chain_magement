<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;
    protected $table="raw_stock_in";
    protected $fillable=['invoiceID','batchID','peopleID','raw_material_id','price','quantity','discount','total','supplierID','approval','created_at','updated_at'];
    
     public function raw_mat()
    {
    	return $this->belongsTo('App\Models\Raw_material','raw_material_id');
    }
    public function people()
    {
    	return $this->belongsTo('App\Models\PeopleModel','supplierID');
    }

}
