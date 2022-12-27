<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Products;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('form');
    }

    public function store(ProductCreateRequest $request){
        Products::create($request->all());

        return Redirect::to('/home');
    }

    public function edit($id): Factory|View|Application
    {
        return view('form',[
            'product' => Products::findOrFail($id)
        ]);
    }

    public function update(ProductCreateRequest $request, $id): Factory|View|Application
    {
        $product = Products::find($id);
        $product->title    = $request->input('title');
        $product->price    = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->status   = $request->input('status');
        $product->save();

        return view('home',[
            'products' => Products::with('user')->get()
        ]);
    }
}
