<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = \App\Models\Series::orderByDesc('created_at')->take(10)->get(['id', 'title', 'start_year', 'rating', 'description', 'poster_url']);
        $series = $series->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'year' => $item->start_year,
                'rating' => $item->rating,
                'summary' => $item->description,
                'poster' => $item->poster_url,
            ];
        });
        return response()->json($series);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Series $series)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Series $series)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Series $series)
    {
        //
    }
}
