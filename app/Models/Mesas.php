<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesas extends Model
{
    use HasFactory;
    protected $table = 'mesas';
    protected $primaryKey = 'pk_mesas';
    public $timestamps = false;
}
