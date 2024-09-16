<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Ticket extends Model
{
    use HasFactory;

    protected $table = "tickets";

    protected $fillable = [
        'id',
        'product_id',
        'certificate_no',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
