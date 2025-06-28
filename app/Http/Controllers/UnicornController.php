<?php

namespace App\Http\Controllers;

use App\Models\Unicorn;
use Illuminate\Http\Request;

class UnicornController extends Controller
{
    public function index()
    {
        $unicorns = Unicorn::where('is_active', true)->get();
        return view('unicorns.index', compact('unicorns'));
    }

    public function create()
    {
        return view('unicorns.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'mane_color' => 'required|string|max:100',
            'special_skills' => 'required|string|max:255',
        ]);

        Unicorn::create($validated);

        return redirect()->route('unicorns.index')->with('success', 'The unicorn has been added.');
    }

    public function show(Unicorn $unicorn)
    {
        return view('unicorns.show', compact('unicorn'));
    }

    public function edit(Unicorn $unicorn)
    {
        return view('unicorns.edit', compact('unicorn'));
    }

    public function update(Request $request, Unicorn $unicorn)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:100',
            'mane_color' => 'required|string|max:100',
            'special_skills' => 'required|string|max:255',
        ]);

        $unicorn->update($validated);

        return redirect()->route('unicorns.index')->with('success', 'The unicorn data has been updated.');
    }

    public function destroy(Unicorn $unicorn)
    {
        $unicorn->is_active = false;
        $unicorn->save();

        return redirect()->route('unicorns.index')->with('success', 'The unicorn has been deactivated.');
    }
}
