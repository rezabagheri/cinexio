<template>
  <div :dir="direction" class="min-h-screen flex flex-col bg-black text-white">
    <header class="flex items-center justify-between px-6 py-4 bg-gradient-to-b from-black/80 to-transparent">
      <div class="flex items-center gap-4">
        <span class="text-2xl font-bold tracking-wide">Cinexio</span>
      </div>
      <nav class="flex items-center gap-6">
        <slot name="nav"></slot>
      </nav>
    </header>
    <main class="flex-1 w-full max-w-7xl mx-auto px-2 sm:px-4 pt-8 pb-16">
      <slot />
    </main>
    <footer class="w-full text-center py-4 text-xs text-gray-400 bg-black/60 border-t border-neutral-800">
      © {{ new Date().getFullYear() }} Cinexio
    </footer>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue'
import { useI18n } from 'vue-i18n'
const { locale } = useI18n()
const direction = computed(() => (locale.value === 'fa' ? 'rtl' : 'ltr'))
</script>

<style scoped>
header {
  /* Shared header styles */
}
footer {
  /* Shared footer styles */
}
</style>
