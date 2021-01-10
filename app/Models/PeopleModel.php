<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeopleModel extends Model
{
    use HasFactory;
    protected $table="people";
    protected $fillable=['name','email','address','phone','zip','photo'];

    public function stockin()
    {
    	return $this->hasMany('App\Models\StockIn');
    }

    public function supplier(){
    	return $this->hasMany('App\Models\SupplierModel');
    }
}
