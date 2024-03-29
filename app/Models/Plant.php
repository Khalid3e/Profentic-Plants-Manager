<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Plant extends Model{
    use HasFactory;
    protected $fillable = ['code','place','variety','lot','is_certified','quantity','transplanting_date','omv'];
    protected $guarded = [];
}
