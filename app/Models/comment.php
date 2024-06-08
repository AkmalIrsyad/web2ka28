<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public function info()
    {
        return $this->belongsTo(info::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
    protected $fillable = ['id', 'info_id','comment','user_id'];
}
