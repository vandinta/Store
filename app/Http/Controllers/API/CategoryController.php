<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak Ada Data Jadwal'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'category' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = Category::create([
            'category' => $request->category,
        ]);

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kategori Berhasil Ditambahkan'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Kategori Gagal Ditambahkan'
        ], 409);
    }

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'category' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $category = Category::where('id', $request->id)->update([
            'category'      => $request->category,
        ]);

        if ($category) {
            return response()->json([
                'success' => true,
                'message' => 'Data Kategori Berhasil Mengubah'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Data Kategori Gagal Mengubah'
        ], 409);
    }

    public function destroy(Request $request)
    {
        $category = Category::where('id', $request->id)->delete();

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Data Kategori Gagal Dihapus'
            ], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus',
        ]);
    }
}
