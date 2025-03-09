<?php

namespace App\Http\Controllers\Organization_Admin;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Article;
use App\Models\Product;
use App\Models\Invoice;

class OrganizationAdminController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
    
        if (!$user->organization) {
            return redirect()->route('login')->with('error', 'No associated organization found.');
        }
    
        $organization = $user->organization;
    
        $totalEvents = Event::where('organization_id', $organization->id)->count();
        $totalArticles = Article::where('organization_id', $organization->id)->count();
        $totalProducts = Product::where('organization_id', $organization->id)->count();
        $totalInvoices = Invoice::whereHas('details.product', function ($query) use ($organization) {
            $query->where('organization_id', $organization->id);
        })->count();
    
        return view('organization_admin.dashboard', compact('totalEvents', 'totalArticles', 'totalProducts', 'totalInvoices'));
    }

    public function uploadBanner(Request $request)
    {
        $organization = Auth::user()->organization;

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('banners', 'public'); // ✅ Use Storage

            // Update the organization's banner
            $organization->update(['banner_image' => $path]);
        }

        return redirect()->route('organization_admin.dashboard')->with('success', 'Banner updated successfully!');
    }
    
}
