<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Invoices extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "invoices";

    protected $fillable = [
        "id",
        "customer_id",
        "issue_date",
        "due_date"
    ];

    public function invoices(){
        return $this->hasMany(Invoices::class);
    }
}
