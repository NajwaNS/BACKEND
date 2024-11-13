<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Validator;

class BeritaController extends Controller
{
    

    public function index()
    {
        $beritas = Berita::all();

        if ($beritas->isEmpty()) {
            return response()->json(['message' => 'No data found'], 404);
        }

        return response()->json([
            'message' => 'Success Showing All Berita Data',
            'data' => $beritas
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'content' => 'required',
            'url' => 'required',
            'url_image' => 'required',
            'category' => 'required',
            'published_at' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'messagej' => 'Validation errors',
                'errors' => $validator->errors()
            ], 422);
        }

        $beritas = Berita::create($request->only(['title', 'author', 'description', 'content', 'url', 'url_image', 'category', 'published_at']));

        $data = [
            'message' => 'beritas is created successfully',
            'data' => $request,
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beritas = Berita::find($id);
        if (!$beritas) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        return response()->json(['message' => 'Get Detail Resource', 'data' => $beritas], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $beritas = Berita::find($id);

    if ($beritas) {
        
        $input = [
            'title' => $request->title ?? $beritas->title,
            'author' => $request->author ?? $beritas->author,
            'description' => $request->description ?? $beritas->description,
            'content' => $request->content ?? $beritas->content,
            'url' => $request->url ?? $beritas->url,
            'url_image' => $request->url_image ?? $beritas->url_image,
            'category' => $request->category ?? $beritas->category,
            'published_at' => $request->published_at ?? $beritas->published_at,
        ];

    // Update data Berita
    $beritas->update($input);

    $data = [
        'message' => 'Berita is updated',
        'data' => $beritas
    ];

    // mengembalikan data (json) dan kode 200
    return response()->json($data, 200);
    } else {
        $data = [
            'message' => 'Berita not found'
        ];

        return response()->json($data, 404);
    }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beritas = Berita::find($id);

    if ($beritas) {
        // Hapus beritas tersebut
        $beritas->delete();

        $data = [
            'message' => 'Berita is deleted'
        ];

        // Mengembalikan data (json) dan kode 200
        return response()->json($data, 200);
    } 
    else {
        $data = [
            'message' => 'Berita not found'
        ];

        return response()->json($data, 404);}
    }

    public function search($title)
    {
        $beritas = Berita::where('title', 'like', "%$title%")->get();
        if ($beritas->isEmpty()) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        return response()->json(['message' => 'Get searched resource', 'data' => $beritas], 200);
    }

    public function getByCategory($category)
    {
        $beritas = Berita::where('category', $category)->get();
        if ($beritas->isEmpty()) {
            return response()->json(['message' => 'Resource not found'], 404);
        }
        return response()->json(['message' => 'Get category resource', 'total' => $beritas->count(), 'data' => $beritas], 200);
    }
}
// class BeritaController extends Controller
// {
//     public function index()
//     {
//         // Mengambil semua berita dari database
//         $beritas = Berita::all();

//         // Mengembalikan data ke view atau API response
//         return view('berita.index', compact('beritas')); // Jika menggunakan view
//         // return response()->json($beritas); // Jika menggunakan API JSON
//     }

//     // 2. Store Method - Menyimpan data berita baru
//     public function store(Request $request)
//     {
//         // Validasi input
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'author' => 'required|string|max:255',
//             'description' => 'required|string',
//             'content' => 'required|string',
//             'url' => 'required|url',
//             'url_image' => 'nullable|url',
//             'published_at' => 'nullable|date',
//             'category' => 'required|string|max:255',
//         ]);

//         // Membuat dan menyimpan berita baru
//         $beritas = new Berita();
//         $beritas->title = $request->title;
//         $beritas->author = $request->author;
//         $beritas->description = $request->description;
//         $beritas->content = $request->content;
//         $beritas->url = $request->url;
//         $beritas->url_image = $request->url_image;
//         $beritas->published_at = $request->published_at;
//         $beritas->category = $request->category;
//         $beritas->save();

        
//         return redirect()->route('berita.index'); 
//     }

    
//     public function show($id)
//     {
//         $beritas = Berita::findOrFail($id);

        
//         return view('berita.show', compact('berita')); 
        
//     }

    
//     public function update(Request $request, $id)
//     {
//         // Validasi input
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'author' => 'required|string|max:255',
//             'description' => 'required|string',
//             'content' => 'required|string',
//             'url' => 'required|url',
//             'url_image' => 'nullable|url',
//             'published_at' => 'nullable|date',
//             'category' => 'required|string|max:255',
//         ]);

//         // Mencari berita yang akan di-update
//         $beritas = Berita::findOrFail($id);
//         $beritas->title = $request->title;
//         $beritas->author = $request->author;
//         $beritas->description = $request->description;
//         $beritas->content = $request->content;
//         $beritas->url = $request->url;
//         $beritas->url_image = $request->url_image;
//         $beritas->published_at = $request->published_at;
//         $beritas->category = $request->category;
//         $beritas->save();

        
//         return redirect()->route('berita.index'); 
//     }

    
//     public function destroy($id)
//     {
       
//         $beritas = Berita::findOrFail($id);
//         $beritas->delete();

//         return redirect()->route('berita.index'); 
// }
// }

//     public function search($title)
//     {
//         $beritas = Berita::where('title', 'like', "%$title%")->get();
//         if ($beritas->isEmpty()) {
//             return response()->json(['message' => 'Resource not found'], 404);
//         }
//         return response()->json(['message' => 'Get searched resource', 'data' => $beritas], 200);
//     }

//     public function getByCategory($category)
//     {
//         $beritas = Berita::where('category', $category)->get();
//         if ($beritas->isEmpty()) {
//             return response()->json(['message' => 'Resource not found'], 404);
//         }
//         return response()->json(['message' => 'Get category resource', 'total' => $beritas->count(), 'data' => $beritas], 200);
//     }