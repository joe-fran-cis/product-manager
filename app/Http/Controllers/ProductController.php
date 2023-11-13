<?php

// app/Http/Controllers/ProductController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
		
		
		
       /* $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image upload
            'variants.*.size' => 'required|string|max:50',
            'variants.*.color' => 'required|string|max:50',
        ]);*/
		
        $imagePath = null;
		//return dd($imagePath);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }
		
		

        $product = Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'main_image_path' => $imagePath,
        ]);

        $variants = $request->input('variants');
		//return dd($variants);
        $product->variants()->createMany($variants);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show()
    {
       $products = Product::with('variants')->get();
        return view('products.index', compact('products'));
    }

    /*public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }*/

	public function edit($id)
    {
        $product = Product::with('variants')->findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /*public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image upload
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            Storage::disk('public')->delete($product->main_image_path);

            // Upload the new image
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->update(['main_image_path' => $imagePath]);
        }

        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }*/
	
	public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation for image upload
            'variants.*.size' => 'required|string|max:50',
            'variants.*.color' => 'required|string|max:50',
        ]);

        $product = Product::findOrFail($id);

        // Update product details
        $product->title = $request->input('title');
        $product->description = $request->input('description');

        // Update main image if provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->main_image_path = $imagePath;
        }

        // Save product changes
        $product->save();


        // Redirect back to the product edit page with a success message
        //return redirect()->route('products.index', $id)->with('success', 'Product updated successfully.');
		//return redirect()->route('products.index')->with('success', 'Product updated successfully.');
// Redirect back to the product index page with a success message
// Redirect back to the product index page with a success message
//return redirect()->route('products.index')->with('success', 'Product updated successfully.');
// return Redirect::route('products.edit', ['id' => $id])->with('success', 'Product updated successfully.');
return redirect()->route('products.index')->with('success', 'Product updated successfully.');


    }

    public function destroy(Product $product)
    {
        // Delete associated image
        Storage::disk('public')->delete($product->main_image_path);

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

