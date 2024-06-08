<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use HasFactory;
    protected $table = "info";
    //
    protected $fillable = ['id','judul_info','deskripsi','foto'];

    // Biar gk ngetik 1 per satu
    // protected $guarded = [];

    public function comments()
    {
        return $this->hasMany(comment::class);
    }
}
