<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model{
    use SoftDeletes;
    protected $table = 'Settings';
    protected $casts = ['created_at' => 'datetime:Y-m-d H:i:s a'];

    public function setLogoAttribute($value){
        if (!$this->logo) {
            return asset('assets/images/avatars/avatar6.png');
        }
        if (stripos($this->logo, 'http') ===  0) {
            return $this->logo;
        }
        return asset('storage/' . $this->logo);
    }

}
