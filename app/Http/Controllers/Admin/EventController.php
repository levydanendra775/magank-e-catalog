<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'             => 'required|string|max:255',
            'poster'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'lokasi'            => 'required|string|max:255',
            'tanggal'           => 'required|date',
            'jam'               => 'nullable|string',
            'deskripsi'         => 'required|string',
            'link_pendaftaran'  => 'nullable|url',
            'status'            => 'boolean',
        ]);

        if ($request->hasFile('poster')) {
            $validated['poster'] = $request->file('poster')->store('event', 'public');
        }

        $validated['status'] = $request->has('status');

        Event::create($validated);

        return redirect()->route('admin.event.index')->with('success', 'Data event berhasil ditambahkan!');
    }

    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'judul'             => 'required|string|max:255',
            'poster'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'lokasi'            => 'required|string|max:255',
            'tanggal'           => 'required|date',
            'jam'               => 'nullable|string',
            'deskripsi'         => 'required|string',
            'link_pendaftaran'  => 'nullable|url',
        ]);

        if ($request->hasFile('poster')) {
            if ($event->poster) {
                Storage::disk('public')->delete($event->poster);
            }
            $validated['poster'] = $request->file('poster')->store('event', 'public');
        }

        $validated['status'] = $request->has('status');

        $event->update($validated);

        return redirect()->route('admin.event.index')->with('success', 'Data event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        if ($event->poster) {
            Storage::disk('public')->delete($event->poster);
        }

        $event->delete();

        return redirect()->route('admin.event.index')->with('success', 'Data event berhasil dihapus!');
    }
}
