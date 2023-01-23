<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model{
    use SoftDeletes;
    protected $table = 'news';
    public $appends = ['image_url','user_image_url'];
    protected $casts = ['created_at' => 'datetime:Y-m-d H:i:s a'];
    public function created_by_user(){
        return $this->belongsTo(User::class, 'created_by');
    }
    public function getImageUrlAttribute($value){
        if (!$this->image) {
            return asset('/public/assets/images/avatars/avatar6.png');
        }
        if (stripos($this->image, 'http') ===  0) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }
    public function getUserImageUrlAttribute($value){
        if (!$this->user_image) {
            return asset('/public/assets/images/avatars/avatar6.png');
        }
        if (stripos($this->user_image, 'http') ===  0) {
            return $this->user_image;
        }
        return asset('storage/' . $this->user_image);
    }
}