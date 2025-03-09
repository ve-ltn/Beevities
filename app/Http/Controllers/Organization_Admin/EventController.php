<?php

namespace App\Http\Controllers\Organization_Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('organization_id', Auth::user()->organization_id)->get();
        return view('organization_admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('organization_admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('events', 'public') : null;

        Event::create([
            'organization_id' => Auth::user()->organization_id,
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'image' => $imagePath
        ]);

        return redirect()->route('organization_admin.events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $event = Event::where('organization_id', Auth::user()->organization_id)->findOrFail($id);
        return view('organization_admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::where('organization_id', Auth::user()->organization_id)->findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required|date',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) Storage::delete('public/' . $event->image);
            $imagePath = $request->file('image')->store('events', 'public');
        } else {
            $imagePath = $event->image;
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'image' => $imagePath
        ]);

        return redirect()->route('organization_admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $event = Event::where('organization_id', Auth::user()->organization_id)->findOrFail($id);
        if ($event->image) Storage::delete('public/' . $event->image);
        $event->delete();

        return redirect()->route('organization_admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
