<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Characteristic extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'leaf_type',
        'flowering',
        'fruit_type',
        'wood_type'
    ];
    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}