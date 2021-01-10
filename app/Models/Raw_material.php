<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raw_material extends Model
{
    use HasFactory;
    protected $table="raw_material";
    protected $fillable=['name','unit','description','stock_alert','deleted'];
    public function raw()
    {
    	return $this->hasMany('App\Models\StockOut');
    }

     public function stockin()
    {
    	return $this->hasMany('App\Models\StockIn');
    }
    
}
