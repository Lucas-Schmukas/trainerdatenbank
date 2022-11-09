<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wettkampf extends Model
{
    use HasFactory;

    protected $table = 'wettkampf';

    public $timestamps = false;

}
