# Cinexio

Cinexio is a free and open-source personal movie and series archive management system with social networking features. It allows users to organize their movie collections, track versions and storage locations, and connect with other movie enthusiasts to discover rare films without direct file sharing. Built with simplicity and scalability in mind, Cinexio is designed for both individual collectors and communities.

## Features

- **Movie and Series Management**:
  - Catalog movies and series with detailed metadata (title, original title, release year, description).
  - Support for multiple versions (e.g., BluRay, DVD, 1080p, 720p) with quality, duration, and storage details.
  - Integration with TMDb API for easy metadata import.
- **Storage Management**:
  - Track storage disks (e.g., HDD, external drives) with capacity and free space monitoring.
  - Associate movie versions with specific disks for easy retrieval.
- **Search and Filtering**:
  - Real-time search by title, genre, or tags.
  - Advanced filtering by year, quality, or disk.
- **Social Networking**:
  - Connect with other users to find rare movies (metadata sharing, not files).
  - Wish lists and match suggestions for discovering new content.
  - Private messaging for community interaction.
- **User Interface**:
  - Clean, responsive UI built with Laravel, Livewire, and Tailwind CSS.
  - Dashboard with stats, recent movies, and notifications.
- **Open Source**:
  - MIT License for maximum flexibility.
  - Well-documented codebase with phpDoc for easy contribution.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/rezabagheri/cinexio.git
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Copy `.env.example` to `.env` and configure your database and TMDb API key.
4. Run migrations:
   ```bash
   php artisan migrate
   ```
5. Build assets:
   ```bash
   npm run dev
   ```
6. Serve the application:
   ```bash
   php artisan serve
   ```

## TODO

Below is a list of planned features and their current status:

- [x] **Database Schema**:
  - [x] Movies table and model (Completed)
  - [x] Disks table and model (Completed)
  - [x] Movie versions table and model (Completed)
  - [x] Genres table and model (Completed)
  - [x] Tags table and model (Completed)
  - [x] Series, seasons, and episodes tables and models (Completed)
  - [x] Persons table and model with pivot tables for movies and series (Completed)
  - [x] Subtitles and audio tables and models (Completed)
  - [ ] Users, wish lists, matches, and messages for social features (Not started)
- [ ] **Core Features**:
  - [ ] TMDb integration for movie import (Not started)
  - [ ] Real-time search and filtering (Not started)
  - [ ] Dashboard with stats and recent movies (Not started)
- [ ] **Social Networking**:
  - [ ] User connections and match suggestions (Not started)
  - [ ] Private messaging (Not started)
- [ ] **UI/UX**:
  - [ ] Responsive homepage with Livewire (Not started)
  - [ ] Detailed movie and disk views (Not started)
- [ ] **Documentation**:
  - [x] Initial README with project overview (Completed)
  - [ ] API documentation (Not started)
  - [ ] Contribution guidelines (Not started)

## Contributing

Contributions are welcome! Please read the [CONTRIBUTING.md](CONTRIBUTING.md) (coming soon) for details on how to contribute to Cinexio.

## License

Cinexio is open-source software licensed under the [MIT License](LICENSE).

## Contact

- Author: Reza Bagheri
- Email: rezabagheri@gmail.com
- GitHub: [rezabagheri](https://github.com/rezabagheri)

---
Built with ❤️ in Gyumri, Armenia.