<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raw_material_return extends Model
{
    use HasFactory;
    protected $table="raw_material_return";
     protected $fillable=['invoiceID','itemID','quantity'];
}
