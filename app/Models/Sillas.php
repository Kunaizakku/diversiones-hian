<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sillas extends Model
{
    use HasFactory;
    protected $table = 'sillas';
    protected $primaryKey = 'pk_sillas';
    public $timestamps = false;
}
