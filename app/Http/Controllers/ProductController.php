<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->join('categories', 'categories.id_kategori', '=', 'products.id_kategori')
            ->select('products.id', 'products.nama', 'products.harga', 'categories.kategori')
            ->orderBy('products.created_at', 'desc')
            ->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = DB::table('categories')
            ->select('categories.id_kategori', 'categories.kategori')
            ->get();

        // dd($kategori);
        return view('product.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('products')
        //     ->insert([
        //         'nama' => $request->nama,
        //         'harga' => $request->harga,
        //         'id_kategori' => $request->kategori
        //     ]);

        $product = new Product();

        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->id_kategori = $request->kategori;

        $product->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $product = Product::find($id);

        $product = DB::table('products')
            ->join('categories', 'categories.id_kategori', '=', 'products.id_kategori')
            ->select('products.nama', 'products.harga', 'categories.kategori')
            ->where('products.id', '=', $id)
            ->first();

        // dd($product);
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = DB::table('products')
            ->join('categories', 'categories.id_kategori', '=', 'products.id_kategori')
            ->select('products.id', 'products.nama', 'products.harga', 'categories.*')
            ->where('products.id', '=', $id)
            ->first();

        $kategori = DB::table('categories')
            ->select('categories.id_kategori', 'categories.kategori')
            ->get();

        return view('product.edit', compact('product', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->id_kategori = $request->kategori;

        $product->update();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
