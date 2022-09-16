<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['name','price','image','description','categorie_id','demands_id'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }
  public function demands()
  {
    return $this->belongsTo(Demand::class);
  }
   public function demandId()
  {
    return $this->belongsToMany(Demand_Product::class);
   }
  
}
