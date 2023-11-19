<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Invoice_Items extends Model
{
    use HasFactory, SoftDeletes;
    protected $table ="invoice_items";

    protected $fillable = [
        "id",
        "invoice_id",
        "item_id",
        "description",
        "unit_price",
        "quantity",
        "amount"
    ];
    public function invoice_items(){
        return $this->hasMany(Invoice_Items::class);
    }
}
