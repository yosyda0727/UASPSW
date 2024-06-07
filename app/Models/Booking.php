<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'play_date',
        'start_at',
        'end_at',
        'user_id',
        'product_id',
        'update_by',
        'status',
        'payment_method',
        'proof_of_payment',

    ];
    protected $casts = [
        'play_date' => 'datetime:Y-m-d',
        'start_at' => 'datetime:H:i',
        'end_at' => 'datetime:H:i',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
