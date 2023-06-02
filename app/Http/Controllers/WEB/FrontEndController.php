<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    public function index()
    {
        //memanggil category untuk navbar
        $nameCategory = Category::latest()->get();

        //memanggil data product dengan galeri
        $product = Product::with(['galleries'])->latest()->get();

        return view('pages.frontend.index', compact(
            'nameCategory',
            'product'
        ));
    }

    public function detailProduct($slug)
    {
        $nameCategory = Category::latest()->get();

        //get data detail product
        $product = Product::with(['galleries'])
            ->where('slug', $slug)->firstOrFail();

        //get data category with slug
        $category = Category::
            where('id', $product->category_id)
            ->firstOrFail();

        $recommendation = Product::with(['galleries'])
            ->inRandomOrder()->limit(4)->get();

        return view('pages.frontend.detail_product', compact(
            'nameCategory',
            'product',
            'recommendation',
            'category'
        ));

        // Route::get('/detail-product/{slug}',
        // [FrontEndController::class, 'detailProduct'])->name('detailProduct');
    }

    public function detailCategory($slug)
    {
        $nameCategory = Category::latest()->get();

        //get data category
        $category = Category::where('slug', $slug)->firstOrFail();
        //get data product
        $product = Product::with(['galleries'])
            ->where('category_id', $category->id)->latest()->get();


        return view('pages.frontend.detail_category', compact(
            'nameCategory',
            'category',
            'product'
        ));
    }
    
    public function cart(Request $request)
    {
        $nameCategory = Category::latest()->get();

        $cart = Cart::with(['product.galleries'])
            ->where('users_id', Auth::user()->id)->get();

            // dd($cart);

        return view('pages.frontend.cart', compact(
            'nameCategory',
            'cart'
        ));
    }

    public function cartStore(Request $request, $id)
    {
        Cart::create([
            'users_id' => Auth::user()->id,
            'products_id' => $id
        ]); 

        return redirect('cart');
    }
}
