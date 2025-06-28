<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('user_id', Auth::id())->with('reservation.unicorn')->get();
        return view('reviews.index', compact('reviews'));
    }

    public function create(Request $request)
    {
        $reservationId = $request->get('reservation_id');
        $reservation = Reservation::where('id', $reservationId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        //jeśli istnieje
        if ($reservation->review) {
            return redirect()->route('reviews.index')->with('info', 'The review already exists.');
        }

        return view('reviews.create', compact('reservation'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $reservation = Reservation::where('id', $validated['reservation_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        //jeśli istnieje
        if ($reservation->review) {
            return redirect()->route('reviews.index')->with('info', 'The review already exists.');
        }

        $validated['user_id'] = Auth::id();

        Review::create($validated);

        return redirect()->route('reviews.index')->with('success', 'The review has been added.');
    }

    public function show(Review $review)
    {
        $this->authorize('view', $review);
        return view('reviews.show', compact('review'));
    }

    public function edit(Review $review)
    {
        $this->authorize('update', $review);
        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $this->authorize('update', $review);

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $review->update($validated);

        return redirect()->route('reviews.index')->with('success', 'The review has been updated.');
    }

    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'The review has been removed.');
    }
}
