<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    use HasFactory;
    protected $table="supplier";
    protected $primaryKey="supplierID";
    protected $fillable=['peopleID','company','bank_account','deleted'];


     public function people(){
    	return $this->belongsTo('App\Models\PeopleModel','peopleID');
    }
    
}
