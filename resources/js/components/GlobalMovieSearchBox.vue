
<script setup lang="ts">
import { ref, watch, onMounted } from 'vue';
import { useI18n } from 'vue-i18n';
import MovieCard from '@/components/MovieCard.vue';

const { t } = useI18n();

type Movie = {
  id: number;
  title: string;
  year: number;
  rating: number;
  summary: string;
  poster: string;
  inMyArchive: boolean;
  wantToHave: boolean;
};

const search = ref('');
const movies = ref<Movie[]>([]);
const loading = ref(false);
const page = ref(1);
const totalPages = ref(1);

const fetchMovies = async () => {
  loading.value = true;
  try {
    // Use the correct API endpoint and response structure
    const res = await fetch(`/v1/movies`);
    const data = await res.json();
    // API returns an array of movies
    movies.value = (data || []).map((m: any) => ({
      ...m,
      inMyArchive: Math.random() > 0.5, // TODO: Replace with real user data
      wantToHave: Math.random() > 0.7, // TODO: Replace with real user data
    }));
    totalPages.value = 1;
  } catch {
    movies.value = [];
    totalPages.value = 1;
  } finally {
    loading.value = false;
  }
};

const onSearch = () => {
  page.value = 1;
  fetchMovies();
};

watch([search, page], ([newSearch, newPage], [oldSearch, oldPage]) => {
  if (newSearch !== oldSearch || newPage !== oldPage) fetchMovies();
});

onMounted(() => {
  fetchMovies();
});
</script>

<template>
  <section class="bg-white dark:bg-neutral-900 rounded-lg shadow p-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
      <h2 class="text-xl font-semibold">{{ t('globalMovieSearch') }}</h2>
      <div class="flex gap-2 w-full md:w-auto">
        <input
          v-model="search"
          type="text"
          class="w-full md:w-64 rounded border border-gray-300 dark:border-neutral-700 bg-gray-50 dark:bg-neutral-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"
          :placeholder="t('search') + '...'"
          @keyup.enter="onSearch"
        />
        <button
          class="inline-flex items-center gap-1 rounded bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 text-sm font-medium shadow"
          @click="onSearch"
          :disabled="loading"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          {{ t('search') }}
        </button>
      </div>
    </div>
    <div v-if="loading" class="flex justify-center items-center min-h-[120px]">
      <span class="text-gray-500 dark:text-gray-400">{{ t('loading') || 'Loading...' }}</span>
    </div>
    <div v-else>
      <div v-if="movies.length" class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        <MovieCard v-for="movie in movies" :key="movie.id" :movie="movie" />
      </div>
      <div v-else class="border border-dashed border-gray-300 dark:border-neutral-700 rounded-lg p-8 flex flex-col items-center justify-center min-h-[120px]">
        <span class="text-gray-500 dark:text-gray-400 text-center">{{ t('globalMovieSearchPlaceholder') }}</span>
      </div>
    </div>
  </section>
</template>
