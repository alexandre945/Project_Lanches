<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItenDemand extends Model
{
   public function demand()
   {
    return $this->belongsTo(Demand::class);
   }
}
