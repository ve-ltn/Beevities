<?php
namespace App\Http\Controllers\User;

use App\Models\Organization;
use App\Models\Event;
use App\Models\Article;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        return view('user.events.index', ['events' => Event::all()]);
    }

    public function show($id)
    {
        return view('user.events.show', ['event' => Event::findOrFail($id)]);
    }
}