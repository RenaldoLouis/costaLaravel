<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    /**
     * Menampilkan daftar semua sections.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua sections dengan relasi showcase
        $sections = Section::with('showcase')->orderBy('order')->paginate(10);
        return SectionResource::collection($sections);
    }

    /**
     * Menyimpan section baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'showcase_id' => 'required|exists:showcases,id',
            'layout' => 'required|string|max:255',
            'content' => 'required|array',
            'order' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Membuat section baru
        $section = Section::create($request->only(['showcase_id', 'layout', 'content', 'order']));

        return new SectionResource($section);
    }

    /**
     * Menampilkan section tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section = Section::with('showcase')->find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        return new SectionResource($section);
    }

    /**
     * Memperbarui section tertentu.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'showcase_id' => 'sometimes|required|exists:showcases,id',
            'layout' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|array',
            'order' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Memperbarui section
        $section->update($request->only(['showcase_id', 'layout', 'content', 'order']));

        return new SectionResource($section);
    }

    /**
     * Menghapus section tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Section::find($id);

        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        $section->delete();

        return response()->json(['message' => 'Section deleted successfully'], 200);
    }
}
