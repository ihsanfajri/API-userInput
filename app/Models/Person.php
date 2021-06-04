<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public $table = "persons";
    protected $hidden = ['created_at','updated_at'];
    use HasFactory;
}
