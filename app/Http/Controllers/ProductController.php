<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $no = 1;
        $product = Product::join('tb_category', 'tb_product.category_id', '=', 'tb_category.id')->select('tb_product.*', 'tb_category.category')->orderBy('id', 'DESC')->get();
        return view('product.index', compact('no', 'product'));
    }

    public function show(Request $request, $id)
    {
        $product = Product::join('tb_category', 'tb_product.category_id', '=', 'tb_category.id')->where('tb_product.id', $id)->select('tb_product.*', 'tb_category.category')->first();
        return view('product.show', compact('product'));
    }

    public function create()
    {
        $category = Category::all();
        return view('product.tambah', compact('category'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'category_id' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $product = product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        if ($product) {
            Session::flash('berhasil', 'Berhasil Menambah Product');
            return redirect()->route('product.index');
        }
        Session::flash('gagal', 'Gagal Menambah Product');
        return redirect()->back();
    }

    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.edit', compact('product', 'category'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'category_id' => 'required',
                'price' => 'required|numeric',
                'description' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $product->update($request->all());

        if ($product) {
            Session::flash('berhasil', 'Berhasil Mengubah Product');
            return redirect()->route('product.index');
        }

        Session::flash('gagal', 'Gagal Mengubah Product');
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        if ($product) {
            Session::flash('berhasil', 'Berhasil Menghapus Product');
            return redirect()->route('product.index');
        }

        Session::flash('gagal', 'Gagal Menghapus Product');
        return redirect()->back();
    }
}
