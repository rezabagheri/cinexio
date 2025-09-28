# Cinexio

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red?logo=laravel)](https://laravel.com/)
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

A modern web application for managing your personal movie and series archive, with powerful social networking features. Built with Laravel.

---

## Project Overview

Cinexio is a feature-rich platform for:
- Cataloging and managing your movie and series collection
- Creating and sharing playlists and watchlists
- Marking favorites and tracking watched items
- Writing reviews, comments, and giving ratings
- Social features: follow friends, send friend requests, share lists, and more
- Activity logging, notifications, and flexible user settings
- API token management for integrations

---

## Key Features
- **Movie & Series Archive:** Organize, search, and filter your collection
- **Playlists & Watchlists:** Create, share, and manage custom lists
- **Favorites:** Mark and revisit your favorite titles
- **Reviews & Ratings:** Share your thoughts and rate content
- **Comments:** Discuss with friends and the community
- **Social Networking:** Friend requests, connections, and activity feeds
- **Sharing:** Generate shareable links for movies, playlists, and more
- **Notifications:** Stay updated on activity and interactions
- **User Settings:** Personalize your experience
- **API Access:** Secure API tokens for integrations

---

## Tech Stack
- [Laravel](https://laravel.com/) (PHP framework)
- [Eloquent ORM](https://laravel.com/docs/eloquent)
- [Faker](https://fakerphp.github.io/) (for seeders)
- [MySQL](https://www.mysql.com/) or [SQLite](https://www.sqlite.org/) (database)
- [Inertia.js](https://inertiajs.com/) (optional, for SPA)

---

## Getting Started

1. **Clone the repository:**
   ```sh
   git clone https://github.com/rezabagheri/cinexio.git
   cd cinexio
   ```
2. **Install dependencies:**
   ```sh
   composer install
   npm install
   ```
3. **Copy and edit environment file:**
   ```sh
   cp .env.example .env
   # Edit .env as needed
   ```
4. **Generate application key:**
   ```sh
   php artisan key:generate
   ```
5. **Run migrations and seeders:**
   ```sh
   php artisan migrate --seed
   ```
6. **Start the development server:**
   ```sh
   php artisan serve
   ```

---

## Project Checklist

- [ ] Project scaffolding and initial setup
- [x] Eloquent models and relationships
- [x] Database migrations
- [x] Realistic seeders for all tables
- [x] User authentication and registration
- [x] Movie and series CRUD
- [x] Playlists, watchlists, and favorites
- [x] Reviews, ratings, and comments
- [x] Social features (friends, requests, sharing)
- [x] Notifications and activity logs
- [x] User settings and preferences
- [x] API token management
- [ ] RESTful API endpoints
- [ ] Frontend (Inertia.js or Vue/React)
- [ ] Responsive UI/UX
- [ ] Testing (unit, feature)
- [ ] Deployment scripts and documentation

Feel free to check off items as you complete them!

---

## Development Roadmap

We are building Cinexio in clear, focused phases. Each phase is tracked in the checklist below. As features are completed, checkboxes will be marked off.

### Current Phase: User Movie Submission
- [ ] User-facing controller for movie submission
- [ ] Movie submission form (view/UI)
- [ ] Validation and error handling
- [ ] User-specific movie listing
- [ ] Tests for movie submission

### Upcoming Phases
- [ ] Series/season/episode management
- [ ] Social features (friend requests, activity feed, etc.)
- [ ] Sharing and notifications
- [ ] API endpoints
- [ ] Frontend SPA (Vue/React/Inertia.js)
- [ ] Responsive design and accessibility
- [ ] Full test coverage

---

## License

This project is open-sourced under the [MIT license](LICENSE).

---

## Useful Links
- [Laravel Documentation](https://laravel.com/docs)
- [Faker Documentation](https://fakerphp.github.io/)
- [Inertia.js Documentation](https://inertiajs.com/)
- [MIT License](https://opensource.org/licenses/MIT)

---

*For more details, see the [CODE_DOCUMENTATION.md](CODE_DOCUMENTATION.md) file.*
