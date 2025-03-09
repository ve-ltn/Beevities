<?php

namespace App\Http\Controllers\Organization_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $organizationId = Auth::user()->organization_id;
        $articles = Article::where('organization_id', $organizationId)->get();

        return view('organization_admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('organization_admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('articles', 'public') : null;

        Article::create([
            'organization_id' => Auth::user()->organization_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('organization_admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $organizationId = Auth::user()->organization_id;
        $article = Article::where('organization_id', $organizationId)->findOrFail($id);

        return view('organization_admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $organizationId = Auth::user()->organization_id;
        $article = Article::where('organization_id', $organizationId)->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        } else {
            $imagePath = $article->image;
        }

        $article->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('organization_admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $organizationId = Auth::user()->organization_id;
        $article = Article::where('organization_id', $organizationId)->findOrFail($id);
        $article->delete();

        return redirect()->route('organization_admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
