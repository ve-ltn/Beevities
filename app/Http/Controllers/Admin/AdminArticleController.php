<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Organization;

class AdminArticleController extends Controller
{
    public function index() {
        $articles = Article::with('organization')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create() {
        $organizations = Organization::all();
        return view('admin.articles.create', compact('organizations'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('articles', 'public') : null;

        Article::create([
            'title' => $request->title,
            'organization_id' => $request->organization_id,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id) {
        $article = Article::findOrFail($id);
        $organizations = Organization::all();
        return view('admin.articles.edit', compact('article', 'organizations'));
    }

    public function update(Request $request, $id) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id) {
        Article::findOrFail($id)->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus.');
    }
}