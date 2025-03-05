<?php

namespace App\Http\Controllers\Admin;

use App\Models\Organization;
use App\Models\Event;
use App\Models\Article;
use App\Http\Controllers\Controller; // ✅ Ensure this line exists
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index() {
        $organizations = Organization::all();
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create() {
        return view('admin.organizations.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'website' => 'nullable|url'
        ]);

        Organization::create($request->all());
        return redirect()->route('admin.organizations.index')->with('success', 'Organisasi berhasil ditambahkan.');
    }

    public function edit($id) {
        $organization = Organization::findOrFail($id);
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, $id) {
        $organization = Organization::findOrFail($id);
        $organization->update($request->all());
        return redirect()->route('admin.organizations.index')->with('success', 'Organisasi berhasil diperbarui.');
    }

    public function destroy($id) {
        Organization::findOrFail($id)->delete();
        return redirect()->route('admin.organizations.index')->with('success', 'Organisasi berhasil dihapus.');
    }
}
