<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "customer";

    protected $fillable =[
        "id",
        "name",
        "email",
        "phone",
        "address"
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
