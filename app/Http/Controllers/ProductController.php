<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        // return $products;
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // dd([
        //     'all'   => $request->all(),
        //     'file'  => $request->file('image'),
        // ]);
        // dd(auth()->user());
        // $user = auth()->user();
// dd($user->getAllPermissions()); // Debug list of all permissions

// dd($user->can('product-create')); // Should return true
// Make Sure Auth is working
// dd(auth()->user(), auth()->check());


        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Handle file upload with custom filename
        // if ($request->hasFile('image')) {
        //     $validatedData['image'] = $request
        //         ->file('image')
        //         ->store('products', 'public');
        // }
        // Handle file upload with original filename
        // Check if the file is present in the request
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalFileName = $file->getClientOriginalName();
            $validatedData['image'] = $file->storeAs('products', $originalFileName, 'public');
        }
        $validatedData['user_id'] = auth()->id();
        // Create product
        Product::create($validatedData);
        // Flash message
        session()->flash('success', 'Product created successfully.');

        return redirect()->route('products.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);
        // return $product;
        return view('backend.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        // Find the product by ID
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // Store new image with original filename
            $file = $request->file('image');
            $originalFileName = $file->getClientOriginalName();
            $validatedData['image'] = $file->storeAs('products', $originalFileName, 'public');
        }

        // Update product with validated data
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        // Delete the image from storage
        // Check if the product has an image and delete it
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        // Delete the product from the database
        $product->delete();
        // Delete the image from storage
        // Flash message
        session()->flash('success', 'Product deleted successfully.');
        return redirect()->route('products.index');
    }
}
