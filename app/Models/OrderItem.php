<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use SoftDeletes;

    protected $table = 'order_items';
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
