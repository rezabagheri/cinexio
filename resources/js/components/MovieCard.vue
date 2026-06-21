<script setup lang="ts">
import { defineProps } from 'vue';
import { useI18n } from 'vue-i18n';

const props = defineProps<{
  movie: {
    id: number;
    title: string;
    year: number;
    rating: number;
    summary: string;
    poster: string;
    inMyArchive: boolean;
    wantToHave: boolean;
  }
}>();

const { t } = useI18n();
</script>

<template>
  <div class="bg-white dark:bg-neutral-900 rounded-lg shadow p-4 flex flex-col h-full">
    <img :src="props.movie.poster" :alt="props.movie.title" class="rounded-md w-full aspect-[2/3] object-cover mb-3" />
    <div class="flex-1 flex flex-col">
      <h3 class="font-bold text-base mb-1 truncate">{{ props.movie.title }}</h3>
      <div class="text-xs text-gray-500 dark:text-gray-400 mb-1 flex items-center gap-2">
        <span>{{ props.movie.year }}</span>
        <span>·</span>
        <span>{{ t('rating') }}: {{ props.movie.rating }}</span>
      </div>
      <div class="text-xs text-gray-600 dark:text-gray-400 mb-2 line-clamp-2">{{ props.movie.summary }}</div>
      <div class="flex items-center gap-2 mb-2">
        <span v-if="props.movie.inMyArchive" class="inline-flex items-center px-2 py-0.5 rounded bg-green-100 text-green-700 text-xs font-medium">
          {{ t('inMyArchive') }}
        </span>
        <span v-else class="inline-flex items-center px-2 py-0.5 rounded bg-gray-100 text-gray-600 text-xs font-medium">
          {{ t('notInMyArchive') }}
        </span>
      </div>
      <div class="flex gap-2 mt-auto">
        <button
          class="flex-1 inline-flex items-center justify-center gap-1 rounded bg-primary-600 hover:bg-primary-700 text-white px-2 py-1 text-xs font-medium shadow disabled:opacity-60"
          :disabled="props.movie.inMyArchive"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
          {{ t('addToArchive') }}
        </button>
        <button
          class="flex-1 inline-flex items-center justify-center gap-1 rounded bg-yellow-500 hover:bg-yellow-600 text-white px-2 py-1 text-xs font-medium shadow disabled:opacity-60"
          :disabled="props.movie.wantToHave"
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14"/></svg>
          {{ t('wantToHave') }}
        </button>
      </div>
    </div>
  </div>
</template>
