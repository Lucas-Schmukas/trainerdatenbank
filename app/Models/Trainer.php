<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $primaryKey = 'trainerid';

    public $timestamps = false;

    protected $fillable = ['name', 'geburtsdatum', 'region', 'geld', 'istArenaleiter'];
}
