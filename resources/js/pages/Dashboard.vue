<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { useI18n } from 'vue-i18n';
import MyArchiveBox from '@/components/MyArchiveBox.vue';
import FriendsListBox from '@/components/FriendsListBox.vue';
import GlobalMovieSearchBox from '@/components/GlobalMovieSearchBox.vue';
import { ref } from 'vue';
import { VueDraggableNext } from 'vue-draggable-next';

const { t } = useI18n();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: t('dashboard'),
        href: dashboard().url,
    },
];

const dashboardBoxes = ref([
  { id: 'myArchive', label: t('myArchive') },
  { id: 'friendsList', label: t('friendsList') },
  { id: 'globalMovieSearch', label: t('globalMovieSearch') },
]);
</script>

<template>
    <Head :title="t('dashboard')" />
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="container mx-auto py-8 space-y-10">
            <h1 class="text-2xl font-bold mb-6">{{ t('dashboard') }}</h1>
            <!-- Draggable Dashboard Boxes Grid -->
            <VueDraggableNext v-model="dashboardBoxes" class="grid auto-rows-min gap-4 md:grid-cols-3 mb-8" :animation="200">
                <template #item="{ element }">
                    <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border bg-white dark:bg-neutral-900 flex flex-col items-center justify-center shadow cursor-move">
                        <span class="text-lg font-semibold">{{ element.label }}</span>
                    </div>
                </template>
            </VueDraggableNext>
            <!-- My Archive Section -->
            <MyArchiveBox />
            <!-- Friends List Section -->
            <FriendsListBox />
            <!-- Global Movie Search Section -->
            <GlobalMovieSearchBox />
        </div>
    </AppLayout>
</template>
