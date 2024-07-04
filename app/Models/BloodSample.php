<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodSample extends Model
{
    protected $fillable = [
        'user_id',
        'blood_type',
        'quantity',
        'detail',
    ];

    public function hospital()
    {
        return $this->belongsTo(User::class, 'user_id')->where('user_type', 'hospital');
    }
}
