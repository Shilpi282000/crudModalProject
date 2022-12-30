<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalModel extends Model
{
    use HasFactory;
    protected $table="table";
    protected $primarykey=['id'];

    public function genderG()
    {
        // return $this->hasOne('App\Models\GenderModel','gender_id','gender');

        return $this->hasOne(ModalGModel::class,'gender_id','gender');
    }

    public function stateS()
    {
        return $this->hasOne(ModalSModel::class,'state_id','state');
    }

    public function userU()
    {
        return $this->hasOne(ModalUModel::class,'user_id','userType');
    }
}
