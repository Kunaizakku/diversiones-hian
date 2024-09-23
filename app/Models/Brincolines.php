<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brincolines extends Model
{
    use HasFactory;
    protected $table = 'brincolines';
    protected $primaryKey = 'pk_brincolines';
    public $timestamps = false;
}
