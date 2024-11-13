<?php

namespace App\Http\Controllers;

use App\Models\BeritaBerbahasa;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua berita dari database
        $beritas = Berita::all();

        // Mengembalikan data ke view atau API response
        return view('berita.index', compact('beritas')); // Jika menggunakan view
        // return response()->json($beritas); // Jika menggunakan API JSON
    }

    // 2. Store Method - Menyimpan data berita baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'url' => 'required|url',
            'url_image' => 'nullable|url',
            'published_at' => 'nullable|date',
            'category' => 'required|string|max:255',
        ]);

        // Membuat dan menyimpan berita baru
        $berita = new Berita();
        $berita->title = $request->title;
        $berita->author = $request->author;
        $berita->description = $request->description;
        $berita->content = $request->content;
        $berita->url = $request->url;
        $berita->url_image = $request->url_image;
        $berita->published_at = $request->published_at;
        $berita->category = $request->category;
        $berita->save();

        // Mengembalikan response atau redirect setelah sukses
        return redirect()->route('berita.index'); // Redirect ke halaman index
        // return response()->json($berita, 201); // Jika menggunakan API JSON
    }

    // 3. Show Method - Menampilkan data berita berdasarkan ID
    public function show($id)
    {
        // Mencari berita berdasarkan ID
        $berita = Berita::findOrFail($id);

        // Mengembalikan data ke view atau API response
        return view('berita.show', compact('berita')); // Jika menggunakan view
        // return response()->json($berita); // Jika menggunakan API JSON
    }

    // 4. Update Method - Memperbarui data berita
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'url' => 'required|url',
            'url_image' => 'nullable|url',
            'published_at' => 'nullable|date',
            'category' => 'required|string|max:255',
        ]);

        // Mencari berita yang akan di-update
        $berita = Berita::findOrFail($id);
        $berita->title = $request->title;
        $berita->author = $request->author;
        $berita->description = $request->description;
        $berita->content = $request->content;
        $berita->url = $request->url;
        $berita->url_image = $request->url_image;
        $berita->published_at = $request->published_at;
        $berita->category = $request->category;
        $berita->save();

        // Mengembalikan response atau redirect setelah sukses
        return redirect()->route('berita.index'); // Redirect ke halaman index
        // return response()->json($berita); // Jika menggunakan API JSON
    }

    // 5. Destroy Method - Menghapus data berita berdasarkan ID
    public function destroy($id)
    {
        // Mencari berita berdasarkan ID dan menghapusnya
        $berita = Berita::findOrFail($id);
        $berita->delete();

        // Mengembalikan response atau redirect setelah sukses
        return redirect()->route('berita.index'); // Redirect ke halaman index
        // return response()->json(null, 204); // Jika menggunakan API JSON
    }
}
}
