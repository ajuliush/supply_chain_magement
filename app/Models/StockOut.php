<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    use HasFactory;
    protected $table="raw_stock_out";
    protected $fillable=['invoiceID','peopleID','raw_material_id','batchID','quantity','price','discount','total','unit'];

     public function raw_material()
    {
    	return $this->belongsTo('App\Models\Raw_material');
    }
    public function suppplier()
    {
    	
    }
}
