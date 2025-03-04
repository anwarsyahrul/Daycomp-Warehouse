<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    // Specify the table name explicitly
    protected $table = 'history';
    protected $categories = 'categories';

    // Define fillable fields if necessary
    protected $fillable = [
        'stock_id',
        'user_id',
        'action',
        'performed_at',
    ];

    // Relationships
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


