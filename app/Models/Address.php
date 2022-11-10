<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   protected $fillable = ['street','nunber','city','district','zipcode','user_id'];

   public function useradress()
   {
      return $this->belongsTo(User::class,'user_id');
   }
}
