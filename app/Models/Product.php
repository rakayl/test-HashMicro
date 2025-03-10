<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable   = [
        'user_id',
        'name_product',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
