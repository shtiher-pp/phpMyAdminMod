<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors']);
        $product = Product::firstOrCreate($data);

        foreach ($tagsIds as $tagId) {
            ProductTag::firstOrCreate(['tag_id' => $tagId, 'product_id' => $product->id]);
        }

        foreach ($colorsIds as $colorId) {
            ColorProduct::firstOrCreate(['color_id' => $colorId, 'product_id' => $product->id]);
        }

        return redirect()->route('product.index');
    }
}
