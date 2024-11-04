<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShowcaseResource;
use App\Models\Showcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShowcaseController extends Controller
{
    /**
     * Menampilkan daftar semua showcases.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showcases = Showcase::get();
        return ShowcaseResource::collection($showcases);
    }

    /**
     * Menyimpan showcase baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:showcases,slug|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Membuat showcase baru
        $showcase = Showcase::create($request->only(['name', 'slug']));

        return new ShowcaseResource($showcase);
    }

    /**
     * Menampilkan showcase tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showcase = Showcase::find($id);

        if (!$showcase) {
            return response()->json(['message' => 'Showcase not found'], 404);
        }

        return new ShowcaseResource($showcase);
    }

    /**
     * Memperbarui showcase tertentu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $showcase = Showcase::find($id);

        if (!$showcase) {
            return response()->json(['message' => 'Showcase not found'], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'slug' => 'sometimes|required|string|unique:showcases,slug,' . $showcase->id . '|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Memperbarui showcase
        $showcase->update($request->only(['name', 'slug']));

        return new ShowcaseResource($showcase);
    }

    /**
     * Menghapus showcase tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $showcase = Showcase::find($id);

        if (!$showcase) {
            return response()->json(['message' => 'Showcase not found'], 404);
        }

        $showcase->delete();

        return response()->json(['message' => 'Showcase deleted successfully'], 200);
    }
}
