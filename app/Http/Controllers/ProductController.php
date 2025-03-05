<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $products = Product::where('user_id',Auth::user()->id)->paginate(5);
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create(): View
    {
        return view('products.create');
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name_product' => 'required',
            'price' => 'required',
        ]);
         $request['price'] = str_replace(',','', $request['price']??0);
         $request['user_id'] = $request->user()->id;
        Product::create($request->all());
        return redirect()->route('product.index')
                        ->with('success','Product created successfully.');
    }
    public function show(Product $product): View
    {
        return view('products.show',compact('product'));
    }
    public function edit(Product $product): View
    {
        return view('products.edit',compact('product'));
    }
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name_product' => 'required',
            'price' => 'required',
        ]);
        $request['price'] = str_replace(',','', $request['price']??0);
        $product->update($request->all());
        return redirect()->route('product.index')
                ->with('success','Product updated successfully');
    }
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('product.index')
                ->with('success','Product deleted successfully');

    }
}
