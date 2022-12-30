<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalSModel extends Model
{
    use HasFactory;
    protected $table="master_state";
    protected $primarykey=['state_id'];
}
