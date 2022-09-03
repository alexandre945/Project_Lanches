<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralModel extends Model
{
    protected $primarykey = "id";
    public $timestamps = true;
    public $incremeting = true;
    protected $fillable = [];

    public function beforesave(){
        return true;
    }

    public function save(array $options = []){
        try{

            if(!$this->beforesave()){
                return false;
            }

        }catch(\Exception $erro){
            throw new \Exception($erro->getMessage());
        }
    }
}
