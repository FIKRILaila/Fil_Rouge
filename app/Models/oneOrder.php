<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oneOrder extends Model
{
    use HasFactory;
    
    protected $table = "oneOrder";

    protected $fillable = [
        'pourCombien',
        'cmd_id',
        'plat_id'
    ];

    public function orders(){
        return $this->belongsTo(Order::class,'cmd_id', 'id');
    }
    public function plats(){
        return $this->belongsTo(Plat::class,'plat_id', 'id');
    }
}
