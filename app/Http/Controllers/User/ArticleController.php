<?php
namespace App\Http\Controllers\User;

use App\Models\Organization;
use App\Models\Event;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        return view('user.articles.index', ['articles' => Article::all()]);
    }

    public function show($id)
    {
        return view('user.articles.show', ['article' => Article::findOrFail($id)]);
    }
}