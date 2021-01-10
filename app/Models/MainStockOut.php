<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainStockOut extends Model
{
    use HasFactory;
     protected $table="main_stock_out";
    protected $fillable=['invoiceID','batchID','productID','price','quantity','promotions','discount','total','peopleID','depoID','customerID','depo_approval','change_request','msg','approval_date','created_at','updated_at'];
}
