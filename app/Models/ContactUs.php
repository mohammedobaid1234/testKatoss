<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model{
    protected $table = 'contact_us';
    protected $casts = ['created_at' => 'datetime:Y-m-d H:i:s a'];
}
