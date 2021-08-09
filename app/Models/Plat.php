<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;
    protected $table = "plats";
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'chef_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'chef_id', 'id');
    }
}
