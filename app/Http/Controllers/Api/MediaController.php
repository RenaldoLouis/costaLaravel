<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class MediaController extends Controller
{
    // index
    public function index(Request $request)
    {
        // get list folder public/storage, nama foldernya aja
        $directories = array_map('basename', File::directories(storage_path('app/public/' . $request->path)));

        // get files in public/storage
        $files = File::files(storage_path('app/public/' . $request->path));

        // di $files, map agar array isinya URL dari file
        $files = array_map(function ($file) use ($request) {
            // return asset('storage/' . $request->path . '/' . basename($file));
            return $request->path . '/' . basename($file);
        }, $files);

        // return json
        return response()->json([
            'directories' => $directories,
            'files' => $files,
            'path' => $request->path ?? ''
        ]);
    }

    // destroy
    public function destroy(Request $request)
    {
        // params: path, file
        // request file adalah url, ambil nama filenya aja
        // merge
        $request->merge([
            'file' => basename($request->file)
        ]);
        File::delete(storage_path('app/public/' . $request->path . '/' . $request->file));

        // return json
        return response()->json([
            'message' => 'File deleted'
        ]);
    }

    // destroyMultiple
    public function destroyMultiple(Request $request)
    {
        // validasi request agar 'items' harus ada dan berupa array
        $request->validate([
            // 'items' => 'required|array',
            // 'items.*.path' => 'string|required', // setiap item harus memiliki path
            // 'items.*.type' => 'string|required|in:file,folder', // setiap item harus memiliki tipe 'file' atau 'folder'
        ]);

        $itemPaths = [];

        // Loop melalui setiap item dalam array 'items'
        foreach ($request->items as $item) {
            $filePath = '';
            if ($item['type'] == 'image')
                $filePath = storage_path('app/public' . $item['path']);
            $currentPath = storage_path('app/public' . $item['currentPath']);

            $itemPaths[] = $filePath;
            Log::info('Deleting item: ' . $filePath);
            Log::info('Item type: ' . $item['type']);

            if ($item['type'] === 'image') {
                // Jika type file, hapus file
                if (File::exists($filePath)) {
                    File::delete($filePath);
                    Log::info('File deleted: ' . $filePath);
                } else {
                    Log::error('File not found: ' . $filePath);
                    // Jika file tidak ada, return error message
                    return response()->json([
                        'message' => "File {$filePath} does not exist."
                    ], 404);
                }
            } elseif ($item['type'] === 'folder') {
                $dirPath = $currentPath . '/' . $item['name'];
                // Jika type folder, hapus folder
                if (File::exists($dirPath)) {
                    Log::info('Folder deleted: ' . $dirPath);
                    File::deleteDirectory($dirPath);
                } else {
                    Log::error('Folder not found: ' . $dirPath);
                    // Jika folder tidak ada, return error message
                    return response()->json([
                        'message' => "Folder {$dirPath} does not exist."
                    ], 404);
                }
            }
        }

        // return response success
        return response()->json([
            'message' => 'Selected items deleted successfully',
            'items' => $itemPaths
        ]);
    }


    // store with path request
    public function store(Request $request)
    {
        // validasi ukuran file maksimal 2 MB
        $request->validate([
            'file' => 'max:2048'
        ], [
            'file.max' => 'File size must be less than 2 MB'
        ]);
        // if request->name, create folder
        if ($request->name) {
            // jika folder exists, maka tidak perlu dibuat
            if (!File::exists(storage_path('app/public/' . $request->path . '/' . $request->name)))
                File::makeDirectory(storage_path('app/public/' . $request->path . '/' . $request->name));
            else
                return response()->json([
                    'message' => 'Folder already exists'
                ]);
        }
        // store file
        if ($request->file) {
            $request->file->store($request->path, 'public');
        }

        // return json
        return response()->json([
            'success' => true,
            'message' => 'File stored'
        ]);
    }
}
