<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raw_wastage extends Model
{
    use HasFactory; 
   protected $table="raw_wastage";
   protected $fillable=['batchID','raw_material_id','price','quantity','total','created_at','updated_at'];
     public function raw_material()
     {
     	return $this->belongsTo('App\Models\Raw_material','raw_material_id');
     }
}
