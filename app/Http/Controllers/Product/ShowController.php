<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::leftJoin('product_tags', 'tags.id', '=', 'product_tags.tag_id')
            ->where('product_id', '=', $product->id)->get();
        $colors = Color::leftJoin('color_products', 'colors.id', '=', 'color_products.color_id')
            ->where('product_id', '=', $product->id)->get();

        return view('product.show', compact('product', 'tags', 'colors'));
    }
}
