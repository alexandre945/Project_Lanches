<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
protected $fillable = ['status', 'datedemand','user_id'];

  public function item_demands()
  {
    return $this->hasMany('ItenDemand');
  }

  public function demanduser()
  {
    return $this->belongsTo(User::class);
  }

  public function products()
  {
    return $this->hasMany(Product::class,);
  }

  public function productId()
  {
    return $this->hasMany(Demand_Product::class);
  }

}

