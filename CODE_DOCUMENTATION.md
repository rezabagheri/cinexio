# Cinexio Code Documentation

This document provides an overview of the main classes and functions in the Cinexio project. It includes links to source files and describes the purpose of each class and its key methods. This is intended to help developers quickly understand the structure and relationships in the codebase.

---

## Table of Contents
- [Models](#models)
- [Seeders](#seeders)
- [Controllers](#controllers)
- [Middleware](#middleware)
- [Providers](#providers)
- [Routes](#routes)

---

## Models

All Eloquent models are located in [`app/Models/`](app/Models/):

| Class | File | Description |
|-------|------|-------------|
| `User` | [User.php](app/Models/User.php) | Main user model, authentication, relationships to reviews, ratings, etc. |
| `Movie` | [Movie.php](app/Models/Movie.php) | Represents a movie, with relationships to genres, tags, people, versions, etc. |
| `Series` | [Series.php](app/Models/Series.php) | Represents a TV series, with seasons and episodes. |
| `Season` | [Season.php](app/Models/Season.php) | Represents a season of a series. |
| `Episode` | [Episode.php](app/Models/Episode.php) | Represents an episode in a season. |
| `Genre` | [Genre.php](app/Models/Genre.php) | Movie/series genre. |
| `Tag` | [Tag.php](app/Models/Tag.php) | Tag for movies/series. |
| `Person` | [Person.php](app/Models/Person.php) | Actor, director, or other person related to a movie/series. |
| `MovieVersion` | [MovieVersion.php](app/Models/MovieVersion.php) | Different versions of a movie (e.g., Director's Cut). |
| `Disk` | [Disk.php](app/Models/Disk.php) | Physical or digital disk containing a movie version. |
| `Subtitle` | [Subtitle.php](app/Models/Subtitle.php) | Subtitle file for a movie version. |
| `Review` | [Review.php](app/Models/Review.php) | User review for a movie. |
| `Rating` | [Rating.php](app/Models/Rating.php) | User rating for a movie. |
| `Comment` | [Comment.php](app/Models/Comment.php) | User comment on a movie, review, or other entity. |
| `Watchlist` | [Watchlist.php](app/Models/Watchlist.php) | User's planned or watched movies. |
| `Favorite` | [Favorite.php](app/Models/Favorite.php) | User's favorite movies. |
| `Playlist` | [Playlist.php](app/Models/Playlist.php) | User-created playlist of movies. |
| `PlaylistMovie` | [PlaylistMovie.php](app/Models/PlaylistMovie.php) | Pivot for movies in playlists. |
| `Notification` | [Notification.php](app/Models/Notification.php) | User notifications. |
| `UserSetting` | [UserSetting.php](app/Models/UserSetting.php) | User preferences/settings. |
| `ActivityLog` | [ActivityLog.php](app/Models/ActivityLog.php) | Logs user actions (polymorphic). |
| `SocialConnection` | [SocialConnection.php](app/Models/SocialConnection.php) | Friend/follow relationships. |
| `FriendRequest` | [FriendRequest.php](app/Models/FriendRequest.php) | Friend request between users. |
| `SharedLink` | [SharedLink.php](app/Models/SharedLink.php) | Links for sharing movies/playlists. |
| `PaymentTransaction` | [PaymentTransaction.php](app/Models/PaymentTransaction.php) | Payment records. |
| `ApiToken` | [ApiToken.php](app/Models/ApiToken.php) | API tokens for user authentication. |
| ... | ... | ... |

Each model contains relationships (e.g., `hasMany`, `belongsToMany`), fillable fields, and sometimes custom methods. See the source files for detailed PHPDoc comments and method documentation.

---

## Seeders

Located in [`database/seeders/`](database/seeders/):

- Each seeder (e.g., [MovieSeeder.php](database/seeders/MovieSeeder.php), [UserSeeder.php](database/seeders/UserSeeder.php)) populates the database with realistic data using Faker.
- Seeders respect relationships and constraints (e.g., unique user/movie reviews).
- The main entry point is [DatabaseSeeder.php](database/seeders/DatabaseSeeder.php).

---

## Controllers

Located in [`app/Http/Controllers/`](app/Http/Controllers/):

- [Controller.php](app/Http/Controllers/Controller.php): Base controller for all other controllers.

---

## Middleware

Located in [`app/Http/Middleware/`](app/Http/Middleware/):

- [HandleAppearance.php](app/Http/Middleware/HandleAppearance.php): Manages user appearance settings.
- [HandleInertiaRequests.php](app/Http/Middleware/HandleInertiaRequests.php): Handles Inertia.js requests.

---

## Providers

Located in [`app/Providers/`](app/Providers/):

- [AppServiceProvider.php](app/Providers/AppServiceProvider.php): Application service bindings.
- [FortifyServiceProvider.php](app/Providers/FortifyServiceProvider.php): Authentication and security.

---

## Routes

Located in [`routes/`](routes/):

- [web.php](routes/web.php): Web routes.
- [auth.php](routes/auth.php): Authentication routes.
- [console.php](routes/console.php): Artisan/console commands.
- [settings.php](routes/settings.php): User settings routes.

---

-## Frontend & UX

### Internationalization (i18n) & Language Switching
- Uses [vue-i18n](https://kazupon.github.io/vue-i18n/) for all UI text and error messages.
- Language switcher is always visible (top-right), persists locale across navigation and reloads.
- Locale is stored in localStorage and synced with `<html lang>` and document direction.
- All navigation, forms, and error messages are fully i18n-ready (English & Persian).

### Netflix-Style Login/Register
- Login and register pages use a modern, Netflix-inspired design with Inertia.js forms.
- Robust error handling: server and client-side errors are shown in the current language.
- Language switcher is available on all auth pages.
- Accessibility: proper labels, focus management, and ARIA attributes.

### Persian Font, RTL, and Alignment
- Global Persian font (Vazirmatn) loaded from Google Fonts and enforced for all `lang='fa'` pages.
- For Persian (`fa`):
	- `direction: rtl` and `text-align: right` are applied globally.
	- All UI elements, forms, and layouts adapt to RTL and right alignment.
- `.font-sans` is overridden to use Vazirmatn for Persian.

### Accessibility & UX
- `<html lang>` and `dir` attributes are always in sync with the current locale.
- All forms and navigation are keyboard accessible.
- Color contrast and font sizes are chosen for readability in both languages.

---

## Useful Tips
- All models and seeders are documented with PHPDoc blocks for clarity.
- Relationships are defined using Eloquent's relationship methods (see each model).
- For more details, see the inline comments and docblocks in each file.
- Use the links above to quickly navigate to the relevant source files.

---

*Generated on 2025-09-28 by GitHub Copilot.*
