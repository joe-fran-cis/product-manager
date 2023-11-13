<?php

// app/Http/Controllers/ProductVariantController.php

// app/Http/Controllers/ProductVariantController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    public function edit(ProductVariant $variant)
    {
        return view('variants.edit', compact('variant'));
    }

    public function update(Request $request, ProductVariant $variant)
    {
        $request->validate([
            'size' => 'required|string|max:50',
            'color' => 'required|string|max:50',
        ]);

        $variant->update($request->only('size', 'color'));

        return redirect()->route('products.index')->with('success', 'Variant updated successfully.');
    }

    public function destroy(ProductVariant $variant)
    {
        $variant->delete();

        return redirect()->route('products.index')->with('success', 'Variant deleted successfully.');
    }
}
