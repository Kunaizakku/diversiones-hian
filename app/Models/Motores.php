<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motores extends Model
{
    use HasFactory;
    protected $table = 'motores';
    protected $primaryKey = 'pk_motores';
    public $timestamps = false;
}
