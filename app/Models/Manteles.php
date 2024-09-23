<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manteles extends Model
{
    use HasFactory;
    protected $table = 'manteles';
    protected $primaryKey = 'pk_manteles';
    public $timestamps = false;
}
