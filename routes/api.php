<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::apiResource('movies', App\Http\Controllers\Api\V1\MovieController::class);
    Route::apiResource('series', App\Http\Controllers\Api\V1\SeriesController::class);
    Route::apiResource('people', App\Http\Controllers\Api\V1\PersonController::class);
    Route::apiResource('users', App\Http\Controllers\Api\V1\UserController::class);
    Route::apiResource('genres', App\Http\Controllers\Api\V1\GenreController::class);
    Route::apiResource('tags', App\Http\Controllers\Api\V1\TagController::class);
    Route::apiResource('reviews', App\Http\Controllers\Api\V1\ReviewController::class);
    Route::apiResource('playlists', App\Http\Controllers\Api\V1\PlaylistController::class);
    Route::apiResource('watchlists', App\Http\Controllers\Api\V1\WatchlistController::class);
    Route::apiResource('comments', App\Http\Controllers\Api\V1\CommentController::class);
    Route::apiResource('ratings', App\Http\Controllers\Api\V1\RatingController::class);
    Route::apiResource('favorites', App\Http\Controllers\Api\V1\FavoriteController::class);
    Route::apiResource('notifications', App\Http\Controllers\Api\V1\NotificationController::class);
    Route::apiResource('user-settings', App\Http\Controllers\Api\V1\UserSettingController::class);
    Route::apiResource('activity-logs', App\Http\Controllers\Api\V1\ActivityLogController::class);
    Route::apiResource('social-connections', App\Http\Controllers\Api\V1\SocialConnectionController::class);
    Route::apiResource('friend-requests', App\Http\Controllers\Api\V1\FriendRequestController::class);
    Route::apiResource('shared-links', App\Http\Controllers\Api\V1\SharedLinkController::class);
    Route::apiResource('payment-transactions', App\Http\Controllers\Api\V1\PaymentTransactionController::class);
    Route::apiResource('api-tokens', App\Http\Controllers\Api\V1\ApiTokenController::class);
    Route::apiResource('seasons', App\Http\Controllers\Api\V1\SeasonController::class);
    Route::apiResource('episodes', App\Http\Controllers\Api\V1\EpisodeController::class);
    Route::apiResource('disks', App\Http\Controllers\Api\V1\DiskController::class);
    Route::apiResource('subtitles', App\Http\Controllers\Api\V1\SubtitleController::class);
    Route::apiResource('movie-versions', App\Http\Controllers\Api\V1\MovieVersionController::class);
    Route::apiResource('movie-genres', App\Http\Controllers\Api\V1\MovieGenreController::class);
    Route::apiResource('movie-tags', App\Http\Controllers\Api\V1\MovieTagController::class);
    Route::apiResource('movie-people', App\Http\Controllers\Api\V1\MoviePersonController::class);
    Route::apiResource('series-people', App\Http\Controllers\Api\V1\SeriesPersonController::class);
    // Add more as needed
});
