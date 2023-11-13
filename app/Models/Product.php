<?php

// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'main_image_path'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
