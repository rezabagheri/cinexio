<template>
  <DefaultLayout>
    <div class="fixed top-4 right-4 z-50">
      <select v-model="locale" class="bg-gray-800 text-white rounded px-2 py-1">
        <option value="fa">FA</option>
        <option value="en">EN</option>
      </select>
    </div>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-12 px-4 sm:px-6 lg:px-8">
      <div class="max-w-md w-full space-y-8 bg-black/80 rounded-xl shadow-2xl p-8">
        <div class="flex flex-col items-center">
          <img src="/favicon.svg" alt="Logo" class="h-12 mb-4">
          <h2 class="mt-2 text-center text-3xl font-extrabold text-white">{{ $t('login') }}</h2>
          <p class="mt-2 text-center text-gray-400">{{ $t('loginSubtitle') }}</p>
        </div>
        <form @submit.prevent="submit" class="mt-8 space-y-6">
          <div class="rounded-md shadow-sm -space-y-px">
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-200">{{ $t('email') }}</label>
              <input v-model="form.email" id="email" name="email" type="email" autocomplete="email" required class="appearance-none rounded relative block w-full px-3 py-2 bg-gray-800 border border-gray-700 placeholder-gray-400 text-white focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm" :class="{'border-red-500': errors.email}" />
              <p v-if="errors.email" class="text-red-400 text-xs mt-1">{{ errors.email }}</p>
            </div>
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-200">{{ $t('password') }}</label>
              <input v-model="form.password" id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded relative block w-full px-3 py-2 bg-gray-800 border border-gray-700 placeholder-gray-400 text-white focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm" :class="{'border-red-500': errors.password}" />
              <p v-if="errors.password" class="text-red-400 text-xs mt-1">{{ errors.password }}</p>
            </div>
            <div class="flex items-center mb-4">
              <input v-model="form.remember" id="remember" name="remember" type="checkbox" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" />
              <label for="remember" class="ml-2 block text-sm text-gray-200">{{ $t('rememberMe') }}</label>
            </div>
          </div>
          <div>
            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded bg-primary text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition">
              {{ $t('login') }}
            </button>
          </div>
        </form>
        <div class="mt-6 text-center">
          <span class="text-gray-400">{{ $t('noAccount') }}</span>
          <a :href="`/register?locale=${locale}`" class="text-primary hover:underline ml-2">{{ $t('register') }}</a>
        </div>
      </div>
    </div>
  </DefaultLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import DefaultLayout from '@/layouts/DefaultLayout.vue'
import { useI18n } from 'vue-i18n'
const { t, locale } = useI18n()

onMounted(() => {
  const urlParams = new URLSearchParams(window.location.search)
  const loc = urlParams.get('locale')
  if (loc && (loc === 'fa' || loc === 'en')) {
    locale.value = loc
  }
})

const form = ref({
  email: '',
  password: '',
  remember: false,
})

const errors = ref({
  email: '',
  password: '',
})

function submit() {
  errors.value = { email: '', password: '' }
  if (!form.value.email) {
    errors.value.email = t('emailRequired')
  }
  if (!form.value.password) {
    errors.value.password = t('passwordRequired')
  }
  // TODO: Add API call for login
}
</script>

<style scoped>
.bg-primary { background-color: #e50914; }
.bg-primary-dark { background-color: #b0060f; }
.text-primary { color: #e50914; }
.focus\:ring-primary:focus { box-shadow: 0 0 0 2px #e50914; }
</style>
