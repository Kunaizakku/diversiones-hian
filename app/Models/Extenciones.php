<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extenciones extends Model
{
    use HasFactory;
    protected $table = 'extenciones';
    protected $primaryKey = 'pk_extenciones';
    public $timestamps = false;
}
