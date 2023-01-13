<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required',
            'message' => 'required|max:4000',
        ]);

        // Define the $service variable
        $service = Service::findOrFail($id);

        // Check if the user has already left a review for this service
        $existingReview = Review::where('service_id', $id)
            ->where('user_id', Auth::id())
            ->where('service_id', $service->id)
            ->first();
            
        if ($existingReview) {
            return redirect()
                ->route('profile_user')
                ->with('error', 'You have already reviewed this service');
        }

        try {
            $review = new Review();
            $review->service_id = $id;
            $review->user_seller_id = $service->user_seller_id;
            $review->user_id = Auth::id();
            $review->rating = $validatedData['rating'];
            $review->message = $validatedData['message'];
            $review->save();
            return redirect()
                ->route('profile_user')
                ->with('success', 'Your review has been added');
        } catch (\Exception $e) {
            return redirect()
                ->route('profile_user')
                ->with('error', 'An error occurred while trying to add your review');
        }
    }

    public function scopeUserHasReviewedService($query, $service_id, $user_id)
    {
        return $query
            ->where('service_id', $service_id)
            ->where('user_id', $user_id)
            ->exists();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReviewRequest  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
