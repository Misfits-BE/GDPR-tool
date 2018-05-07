<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concern extends Model
{
    protected $fillable = [];

    public function scopeOpenConcerns($query): int
    {
        return $query->where('is_open', true);
    }

    public function scopeClosedConcerns($query): int
    {
        return $query->where('is_open', false);
    }
}
