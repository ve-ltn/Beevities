<?php
namespace App\Http\Controllers\User;

use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrganizationController extends Controller
{
    public function index()
    {
        return view('user.organizations.index', ['organizations' => Organization::all()]);
    }

    public function show($id)
    {
        $organization = Organization::findOrFail($id);
        return view('user.organizations.show', [
            'organization' => $organization,
            'events' => $organization->events,
            'articles' => $organization->articles,
            'products' => $organization->products
        ]);
    }
}
