<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalGModel extends Model
{
    use HasFactory;
    protected $table="master_gender";
    protected $primarykey=['gender_id'];
}
