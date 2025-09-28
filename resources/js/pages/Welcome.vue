<template>
  <DefaultLayout>
    <template #nav>
      <button class="hover:text-primary transition">{{ $t('login') }}</button>
      <button class="hover:text-primary transition">{{ $t('register') }}</button>
      <select v-model="locale" class="bg-gray-800 text-white rounded px-2 py-1 ml-4">
        <option value="fa">FA</option>
        <option value="en">EN</option>
      </select>
    </template>
    <!-- Welcome page content -->
    <!-- Latest Movies Slider -->
    <section class="mb-10">
      <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <span class="inline-block w-2 h-6 bg-blue-500 rounded-sm"></span>
        جدیدترین فیلم‌ها
      </h2>
      <Swiper
        :modules="swiperModules"
        :slides-per-view="1"
        :space-between="12"
        :breakpoints="swiperBreakpoints"
        navigation
        pagination
        class="movie-swiper bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 rounded-xl py-4"
      >
        <SwiperSlide v-for="movie in latestMovies" :key="movie.id">
          <div class="movie-card group relative w-full sm:w-72 flex-shrink-0 rounded-2xl overflow-hidden bg-gray-900 shadow-2xl transition-transform duration-300 hover:-translate-y-2 hover:shadow-blue-700/40">
            <div class="w-full h-80 flex items-center justify-center bg-gray-700 overflow-hidden">
              <img v-if="movie.poster" :src="movie.poster" :alt="movie.title" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-300" />
              <span v-else>Poster</span>
            </div>
            <div class="p-5">
              <div class="text-xl font-bold mb-1 truncate">{{ movie.title }}</div>
              <div class="text-sm text-gray-300 mb-2">{{ movie.year }}</div>
              <div class="text-xs text-blue-400 font-bold">★ {{ movie.rating }}</div>
              <div class="text-xs mt-2 line-clamp-2">{{ movie.summary }}</div>
            </div>
          </div>
        </SwiperSlide>
      </Swiper>
    </section>
    <!-- ...existing code... -->
  </DefaultLayout>

</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import DefaultLayout from '@/layouts/DefaultLayout.vue'
import { useI18n } from 'vue-i18n'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import axios from 'axios'

const swiperModules = [Navigation, Pagination]

const swiperBreakpoints = {
  640: { slidesPerView: 2, spaceBetween: 16 },
  1024: { slidesPerView: 3, spaceBetween: 24 },
  1440: { slidesPerView: 4, spaceBetween: 32 },
}
const popularBreakpoints = {
  640: { slidesPerView: 3, spaceBetween: 12 },
  1024: { slidesPerView: 4, spaceBetween: 18 },
  1440: { slidesPerView: 5, spaceBetween: 24 },
}

const { locale } = useI18n()

const latestDemo = [
  {
    id: 11,
    title: 'Dune: Part Two',
    year: 2025,
    rating: 9.1,
    summary: 'Paul Atreides unites with Chani and the Fremen while seeking revenge.',
    poster: 'https://image.tmdb.org/t/p/w500/8b8R8l88Qje9dn9OE8PY05Nxl1X.jpg',
  },
  {
    id: 12,
    title: 'Oppenheimer',
    year: 2023,
    rating: 8.7,
    summary: 'The story of American scientist J. Robert Oppenheimer.',
    poster: 'https://image.tmdb.org/t/p/w500/ptpr0kGAckfQkJeJIt8st5dglvd.jpg',
  },
  {
    id: 13,
    title: 'Barbie',
    year: 2023,
    rating: 7.5,
    summary: 'Barbie suffers a crisis that leads her to question her world.',
    poster: 'https://image.tmdb.org/t/p/w500/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg',
  },
  {
    id: 14,
    title: 'Test Latest',
    year: 2025,
    rating: 10,
    summary: 'Test summary',
    poster: '',
  },
]

const popularDemo = [
  {
    id: 21,
    title: 'The Shawshank Redemption',
    year: 1994,
    rating: 9.3,
    summary: 'Two imprisoned men bond over a number of years.',
    poster: 'https://image.tmdb.org/t/p/w500/q6y0Go1tsGEsmtFryDOJo3dEmqu.jpg',
  },
  {
    id: 22,
    title: 'The Godfather',
    year: 1972,
    rating: 9.2,
    summary: 'The aging patriarch of an organized crime dynasty transfers control.',
    poster: 'https://image.tmdb.org/t/p/w500/3bhkrj58Vtu7enYsRolD1fZdja1.jpg',
  },
  {
    id: 23,
    title: 'The Dark Knight',
    year: 2008,
    rating: 9.0,
    summary: 'Batman faces the Joker, a criminal mastermind.',
    poster: 'https://image.tmdb.org/t/p/w500/qJ2tW6WMUDux911r6m7haRef0WH.jpg',
  },
  {
    id: 24,
    title: 'Test Popular',
    year: 2025,
    rating: 10,
    summary: 'Test summary',
    poster: '',
  },
]

const demoMovies = [
  {
    id: 1,
    title: 'Inception',
    year: 2010,
    rating: 8.8,
    summary: 'A thief who steals corporate secrets through dream-sharing technology.',
    poster: 'https://image.tmdb.org/t/p/w500/qmDpIHrmpJINaRKAfWQfftjCdyi.jpg',
  },
  {
    id: 2,
    title: 'Interstellar',
    year: 2014,
    rating: 8.6,
    summary: 'A team of explorers travel through a wormhole in space.',
    poster: 'https://image.tmdb.org/t/p/w500/rAiYTfKGqDCRIIqo664sY9XZIvQ.jpg',
  },
  {
    id: 3,
    title: 'The Matrix',
    year: 1999,
    rating: 8.7,
    summary: 'A computer hacker learns about the true nature of his reality.',
    poster: 'https://image.tmdb.org/t/p/w500/f89U3ADr1oiB1s9GkdPOEpXUk5H.jpg',
  },
  {
    id: 4,
    title: 'Test Movie',
    year: 2025,
    rating: 10,
    summary: 'Test summary',
    poster: '',
  },
]

const demoSeries = [
  {
    id: 1,
    title: 'Breaking Bad',
    year: 2008,
    rating: 9.5,
    summary: 'A high school chemistry teacher turned methamphetamine producer.',
    poster: 'https://image.tmdb.org/t/p/w500/ggFHVNu6YYI5L9pCfOacjizRGt.jpg',
  },
  {
    id: 2,
    title: 'Game of Thrones',
    year: 2011,
    rating: 9.2,
    summary: 'Nine noble families wage war against each other in order to gain control over the mythical land of Westeros.',
    poster: 'https://image.tmdb.org/t/p/w500/u3bZgnGQ9T01sWNhyveQz0wH0Hl.jpg',
  },
  {
    id: 3,
    title: 'Stranger Things',
    year: 2016,
    rating: 8.7,
    summary: 'A group of young friends witness supernatural forces and secret government exploits.',
    poster: 'https://image.tmdb.org/t/p/w500/x2LSRK2Cm7MZhjluni1msVJ3wDF.jpg',
  },
  {
    id: 4,
    title: 'Test Series',
    year: 2025,
    rating: 10,
    summary: 'Test summary',
    poster: '',
  },
]

const latestMovies = ref([...latestDemo])
const popularMovies = ref([...popularDemo])
const movies = ref([...demoMovies])
const seriesList = ref([...demoSeries])

onMounted(async () => {
  try {
    const res = await axios.get('/v1/movies/latest')
    if (Array.isArray(res.data) && res.data.length > 0) {
      latestMovies.value = res.data
    }
  } catch {
    latestMovies.value = [...latestDemo]
  }

  try {
    const res = await axios.get('/v1/movies/popular')
    if (Array.isArray(res.data) && res.data.length > 0) {
      popularMovies.value = res.data
    }
  } catch {
    popularMovies.value = [...popularDemo]
  }

  try {
    const res = await axios.get('/v1/movies')
    if (Array.isArray(res.data) && res.data.length > 0) {
      movies.value = res.data
    }
  } catch {
    movies.value = [...demoMovies]
  }

  try {
    const res = await axios.get('/v1/series')
    if (Array.isArray(res.data) && res.data.length > 0) {
      seriesList.value = res.data
    }
  } catch {
    seriesList.value = [...demoSeries]
  }
})
</script>

<style scoped>
@import 'swiper/css';
@import 'swiper/css/navigation';
@import 'swiper/css/pagination';

.welcome-page {
  background: linear-gradient(180deg, #181818 0%, #111 100%);
}
.movie-swiper {
  padding-bottom: 2.5rem;
}

.movie-card {
  min-width: 0;
  max-width: 20rem;
  min-height: 18rem;
  box-shadow: 0 4px 24px 0 #000a;
  transition: box-shadow 0.3s, transform 0.3s;
}

.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

@media (max-width: 640px) {
  .movie-card {
    max-width: 100%;
    min-width: 0;
  }
}
</style>
