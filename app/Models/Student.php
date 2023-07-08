<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Student extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = "students";

    protected $fillable = ["name","email","password","city"];

    public $timestamps = false;

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}
