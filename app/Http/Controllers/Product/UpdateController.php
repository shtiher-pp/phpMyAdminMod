<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);
        $product->update($data);

        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate(['tag_id' => $tagId, 'product_id' => $product->id]);
        }

        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate(['color_id' => $colorId, 'product_id' => $product->id]);
        }

        $tags = Tag::leftJoin('product_tags', 'tags.id', '=', 'product_tags.tag_id')
            ->where('product_id', '=', $product->id)->get();
        $colors = Color::leftJoin('color_products', 'colors.id', '=', 'color_products.color_id')
            ->where('product_id', '=', $product->id)->get();

        return view('product.show', compact('product', 'tags', 'colors'));
    }
}
