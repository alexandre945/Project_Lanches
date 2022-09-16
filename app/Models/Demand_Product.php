<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand_Product extends Model
{
    protected $fillable = ['product_id', 'demand_id', 'quanty'];

    public function demadIds()
       {
        return $this->belongsTo(Demand::class);
       }  
       
       public function produtsIds()
       {
        return $this->belongsTo(Product::class,'product_id');
       }    
}
