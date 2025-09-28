<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Series;
use App\Models\Person;
use App\Models\User;

class SearchController extends Controller
{
    /**
     * Global search across movies, series, people, and users.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $query = $request->input('q');
        if (!$query) {
            return response()->json([
                'results' => [],
                'message' => __('messages.not_found'),
            ]);
        }

        $movies = Movie::where('title', 'like', "%$query%")
            ->orWhere('original_title', 'like', "%$query%")
            ->limit(10)->get(['id', 'title', 'poster_url', 'year', 'type' => 'movie']);
        $series = Series::where('title', 'like', "%$query%")
            ->limit(10)->get(['id', 'title', 'poster_url', 'year', 'type' => 'series']);
        $people = Person::where('name', 'like', "%$query%")
            ->limit(10)->get(['id', 'name', 'photo_url', 'type' => 'person']);
        $users = User::where('name', 'like', "%$query%")
            ->orWhere('username', 'like', "%$query%")
            ->limit(10)->get(['id', 'name', 'avatar', 'type' => 'user']);

        $results = [
            'movies' => $movies,
            'series' => $series,
            'people' => $people,
            'users' => $users,
        ];

        return response()->json([
            'results' => $results,
            'message' => __('messages.search_placeholder'),
        ]);
    }
}
