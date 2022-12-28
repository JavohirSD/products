<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Products;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    /**
     * Create a product
     *
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('form');
    }


    /**
     * Store product to DB
     *
     * @param ProductCreateRequest $request
     *
     * @return RedirectResponse
     */
    public function store(ProductCreateRequest $request): RedirectResponse
    {
        Products::create($request->all());

        return Redirect::to('/home');
    }


    /**
     * Edit product by id
     *
     * @param $id
     *
     * @return Factory|View|Application
     */
    public function edit($id): Factory|View|Application
    {
        return view('form',[
            'product' => Products::findOrFail($id)
        ]);
    }



    /**
     * Update product by id
     *
     * @param ProductCreateRequest $request
     * @param $id
     *
     * @return Factory|View|Application
     */
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


    /**
     * Delete a product
     *
     * @param $id
     *
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $product = Products::find($id);
        if($product){
            $product->delete();
        }

        return Redirect::to('/home');
    }
}
