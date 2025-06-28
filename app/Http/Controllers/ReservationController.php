<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Unicorn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->with('unicorn')->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $unicorns = Unicorn::where('is_active', true)->get();
        return view('reservations.create', compact('unicorns'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'unicorn_id' => 'required|exists:unicorns,id',
            'rent_date' => 'required|date|after:now',
            'duration_hours' => 'required|integer|min:1|max:8',
        ]);

        $validated['user_id'] = Auth::id();

        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', 'The reservation has been created.');
    }

    public function show(Reservation $reservation)
    {
        $this->authorize('view', $reservation);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $this->authorize('update', $reservation);
        $unicorns = Unicorn::where('is_active', true)->get();
        return view('reservations.edit', compact('reservation', 'unicorns'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $this->authorize('update', $reservation);

        $validated = $request->validate([
            'unicorn_id' => 'required|exists:unicorns,id',
            'rent_date' => 'required|date|after:now',
            'duration_hours' => 'required|integer|min:1|max:8',
        ]);

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'The reservation has been updated.');
    }

    public function destroy(Reservation $reservation)
    {
        $this->authorize('delete', $reservation);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'The reservation has been canceled.');
    }
}
