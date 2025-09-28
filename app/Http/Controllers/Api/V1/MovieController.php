<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Return the latest movies (10 newest by created_at)
     */
    public function latest()
    {
        $movies = Movie::orderByDesc('created_at')->take(10)->get(['id', 'title', 'year', 'rating', 'description', 'poster_url']);
        $movies = $movies->map(function ($movie) {
            return [
                'id' => $movie->id,
                'title' => $movie->title,
                'year' => $movie->year,
                'rating' => $movie->rating,
                'summary' => $movie->description,
                'poster' => $movie->poster_url,
            ];
        });
        return response()->json($movies);
    }

    /**
     * Return the most popular movies (10 highest rating)
     */
    public function popular()
    {
        $movies = Movie::orderByDesc('rating')->take(10)->get(['id', 'title', 'year', 'rating', 'description', 'poster_url']);
        $movies = $movies->map(function ($movie) {
            return [
                'id' => $movie->id,
                'title' => $movie->title,
                'year' => $movie->year,
                'rating' => $movie->rating,
                'summary' => $movie->description,
                'poster' => $movie->poster_url,
            ];
        });
        return response()->json($movies);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::latest()->take(10)->get(['id', 'title', 'year', 'rating', 'description', 'poster_url']);
        $movies = $movies->map(function ($movie) {
            return [
                'id' => $movie->id,
                'title' => $movie->title,
                'year' => $movie->year,
                'rating' => $movie->rating,
                'summary' => $movie->description,
                'poster' => $movie->poster_url,
            ];
        });
        return response()->json($movies);
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
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
