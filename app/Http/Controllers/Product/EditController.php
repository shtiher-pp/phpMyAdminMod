<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Arr;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $productTags = Tag::leftJoin('product_tags', 'tags.id', '=', 'product_tags.tag_id')
            ->where('product_id', '=', $product->id)->get()->toArray();
        $productTagIds = Arr::pluck($productTags, 'id');

        $productColors = Color::leftJoin('color_products', 'colors.id', '=', 'color_products.color_id')
            ->where('product_id', '=', $product->id)->get()->toArray();
        $productColorIds = Arr::pluck($productColors, 'id');

        return view('product.edit', compact('product', 'tags', 'colors', 'categories', 'productTagIds', 'productColorIds'));
    }
}
