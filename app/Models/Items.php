<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Items extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "items";

    protected $fillable = [
        "id",
        "name",
        "quantity",
        "price"
    ];
    public function items(){
        return $this->hasMany(Items::class);
    }
}
