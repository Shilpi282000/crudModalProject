<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalUModel extends Model
{
    use HasFactory;
    protected $table="master_userType";
    protected $primarykey=['user_id'];
}
