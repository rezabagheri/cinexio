<script setup lang="ts">
import { useI18n } from 'vue-i18n';

const { t } = useI18n();
</script>

<template>
  <section class="bg-white dark:bg-neutral-900 rounded-lg shadow p-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4 gap-4">
      <h2 class="text-xl font-semibold">{{ t('myArchive') }}</h2>
      <div class="flex gap-2 w-full md:w-auto">
        <input
          type="text"
          class="w-full md:w-64 rounded border border-gray-300 dark:border-neutral-700 bg-gray-50 dark:bg-neutral-800 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500"
          :placeholder="t('search') + '...'"
          disabled
        />
        <button
          class="inline-flex items-center gap-1 rounded bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 text-sm font-medium shadow disabled:opacity-60"
          disabled
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          {{ t('search') }}
        </button>
        <button
          class="inline-flex items-center gap-1 rounded bg-green-600 hover:bg-green-700 text-white px-4 py-2 text-sm font-medium shadow disabled:opacity-60"
          disabled
        >
          <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 4v16m8-8H4"/></svg>
          {{ t('add') || '+' }}
        </button>
      </div>
    </div>
    <div class="border border-dashed border-gray-300 dark:border-neutral-700 rounded-lg p-8 flex flex-col items-center justify-center min-h-[120px]">
      <span class="text-gray-500 dark:text-gray-400 text-center">{{ t('myArchivePlaceholder') }}</span>
    </div>
  </section>
</template>
