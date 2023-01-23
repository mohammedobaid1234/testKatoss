<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable{
    use HasFactory,Notifiable;
    protected $table = 'admins';
    public $append = ['image_url'];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:Y-m-d H:i:s a',
    ];
    protected $hidden = ['password'];
    public function getImageUrlAttribute($value){
        if (!$this->image) {
            return asset('assets/images/avatars/avatar6.png');
        }
        if (stripos($this->image, 'http') ===  0) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
}
