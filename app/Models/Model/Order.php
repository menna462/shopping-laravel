<?php

namespace App\Models\Model;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_name', 'total_amount', 'status','user_id'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}

