<template>
  <div :dir="direction" class="welcome-page min-h-screen bg-black text-white">
    <header class="flex items-center justify-between px-6 py-4 bg-gradient-to-b from-black/80 to-transparent">
      <div class="flex items-center gap-4">
        <span class="text-2xl font-bold tracking-wide">Cinexio</span>
      </div>
      <nav class="flex items-center gap-6">
        <button class="hover:text-primary transition">{{ $t('login') }}</button>
        <button class="hover:text-primary transition">{{ $t('register') }}</button>
        <select v-model="locale" class="bg-gray-800 text-white rounded px-2 py-1 ml-4">
          <option value="fa">FA</option>
          <option value="en">EN</option>
        </select>
      </nav>
    </header>
    <main class="pt-8 pb-16 px-4">
      <section class="mb-10">
        <h2 class="text-xl font-semibold mb-4">{{ $t('sliderTitle') }}</h2>
        <Swiper
          :modules="swiperModules"
          :slides-per-view="3"
          :space-between="24"
          navigation
          pagination
          class="movie-swiper"
        >
          <SwiperSlide v-for="movie in movies" :key="movie.id">
            <div class="movie-card relative w-56 flex-shrink-0 rounded-lg overflow-hidden bg-gray-900 shadow-lg">
              <div class="w-full h-80 flex items-center justify-center bg-gray-700">
                <img v-if="movie.poster" :src="movie.poster" :alt="movie.title" class="object-cover w-full h-full" />
                <span v-else>Poster</span>
              </div>
              <div class="p-4">
                <div class="text-lg font-bold mb-1">{{ movie.title }}</div>
                <div class="text-sm text-gray-300 mb-2">{{ movie.year }}</div>
                <div class="text-xs text-yellow-400">★ {{ movie.rating }}</div>
                <div class="text-xs mt-2">{{ movie.summary }}</div>
              </div>
            </div>
          </SwiperSlide>
        </Swiper>
      </section>
      <section class="mb-10">
        <h2 class="text-xl font-semibold mb-4">{{ $t('seriesSliderTitle') || 'Series Slider' }}</h2>
        <Swiper
          :modules="swiperModules"
          :slides-per-view="3"
          :space-between="24"
          navigation
          pagination
          class="movie-swiper"
        >
          <SwiperSlide v-for="series in seriesList" :key="series.id">
            <div class="movie-card relative w-56 flex-shrink-0 rounded-lg overflow-hidden bg-gray-900 shadow-lg">
              <div class="w-full h-80 flex items-center justify-center bg-gray-700">
                <img v-if="series.poster" :src="series.poster" :alt="series.title" class="object-cover w-full h-full" />
                <span v-else>Poster</span>
              </div>
              <div class="p-4">
                <div class="text-lg font-bold mb-1">{{ series.title }}</div>
                <div class="text-sm text-gray-300 mb-2">{{ series.year }}</div>
                <div class="text-xs text-yellow-400">★ {{ series.rating }}</div>
                <div class="text-xs mt-2">{{ series.summary }}</div>
              </div>
            </div>
          </SwiperSlide>
        </Swiper>
      </section>
    </main>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'
import { useI18n } from 'vue-i18n'
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import axios from 'axios'

const swiperModules = [Navigation, Pagination]

const { locale } = useI18n()
const direction = computed(() => (locale.value === 'fa' ? 'rtl' : 'ltr'))

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

const movies = ref([...demoMovies])
const seriesList = ref([...demoSeries])

onMounted(async () => {
  try {
    const res = await axios.get('/api/v1/movies')
    if (Array.isArray(res.data) && res.data.length > 0) {
      movies.value = res.data
    }
  } catch (e) {
    movies.value = [...demoMovies]
  }

  try {
    const res = await axios.get('/api/v1/series')
    if (Array.isArray(res.data) && res.data.length > 0) {
      seriesList.value = res.data
    }
  } catch (e) {
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
.slider::-webkit-scrollbar {
  height: 8px;
  background: #222;
}
.slider::-webkit-scrollbar-thumb {
  background: #444;
  border-radius: 4px;
}
.movie-card {
  min-width: 14rem;
  max-width: 14rem;
  min-height: 20rem;
  box-shadow: 0 4px 24px 0 #000a;
}
</style>
