<?php

// app/Models/History.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'action_type', 'quantity', 'price', 'date'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}



