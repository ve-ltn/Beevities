<?php

namespace App\Http\Controllers\Organization_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Event;
use App\Models\Article;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $organizationId = Auth::user()->organization_id;

        return view('organization_admin.dashboard', [
            'total_products' => Product::where('organization_id', $organizationId)->count(),
            'total_events' => Event::where('organization_id', $organizationId)->count(),
            'total_articles' => Article::where('organization_id', $organizationId)->count(),
            'total_invoices' => Invoice::whereHas('details.product', function ($query) use ($organizationId) {
                $query->where('organization_id', $organizationId);
            })->count(),
        ]);
    }
}
