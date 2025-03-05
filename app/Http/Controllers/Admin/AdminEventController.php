<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organization;

class AdminEventController extends Controller

{
    public function index() {
        $events = Event::with('organization')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create() {
        $organizations = Organization::all();
        return view('admin.events.create', compact('organizations'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'organization_id' => 'required|exists:organizations,id',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('events', 'public') : null;

        Event::create([
            'title' => $request->title,
            'organization_id' => $request->organization_id,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit($id) {
        $event = Event::findOrFail($id);
        $organizations = Organization::all();
        return view('admin.events.edit', compact('event', 'organizations'));
    }

    public function update(Request $request, $id) {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id) {
        Event::findOrFail($id)->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}