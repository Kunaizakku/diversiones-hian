<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentas extends Model
{
    use HasFactory;
    protected $table = 'rentas';
    protected $primaryKey = 'pk_rentas';
    public $timestamps = false;
}
