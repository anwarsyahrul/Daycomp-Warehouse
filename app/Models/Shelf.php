<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;

    protected $fillable = ['rack_id', 'shelf_name'];

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }
}

