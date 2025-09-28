<template>
  <AuthLayout :title="$t('register')" :description="$t('registerSubtitle')">
    <template #lang-switcher>
      <select v-model="locale" class="bg-gray-800 text-white rounded px-2 py-1">
        <option value="fa">FA</option>
        <option value="en">EN</option>
      </select>
    </template>
    <div>
      <div class="flex flex-col items-center">
        <img src="/favicon.svg" alt="Logo" class="h-12 mb-4">
        <h2 class="mt-2 text-center text-3xl font-extrabold text-white">{{ $t('register') }}</h2>
        <p class="mt-2 text-center text-gray-400">{{ $t('registerSubtitle') }}</p>
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
            <input v-model="form.password" id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none rounded relative block w-full px-3 py-2 bg-gray-800 border border-gray-700 placeholder-gray-400 text-white focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm" :class="{'border-red-500': errors.password}" />
            <p v-if="errors.password" class="text-red-400 text-xs mt-1">{{ errors.password }}</p>
          </div>
          <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-200">{{ $t('confirmPassword') }}</label>
            <input v-model="form.password_confirmation" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none rounded relative block w-full px-3 py-2 bg-gray-800 border border-gray-700 placeholder-gray-400 text-white focus:outline-none focus:ring-primary focus:border-primary focus:z-10 sm:text-sm" :class="{'border-red-500': errors.password_confirmation}" />
            <p v-if="errors.password_confirmation" class="text-red-400 text-xs mt-1">{{ errors.password_confirmation }}</p>
          </div>
        </div>
        <div>
          <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded bg-primary text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition">
            {{ $t('register') }}
          </button>
        </div>
      </form>
      <div class="mt-6 text-center">
        <span class="text-gray-400">{{ $t('alreadyHaveAccount') }}</span>
        <a :href="`/login?locale=${locale}`" class="text-primary hover:underline ml-2">{{ $t('login') }}</a>
      </div>
    </div>
  </AuthLayout>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue'
import AuthLayout from '@/layouts/AuthLayout.vue'
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
  password_confirmation: '',
})

const errors = ref({
  email: '',
  password: '',
  password_confirmation: '',
})

function submit() {
  errors.value = { email: '', password: '', password_confirmation: '' }
  if (!form.value.email) {
    errors.value.email = t('emailRequired')
  }
  if (!form.value.password) {
    errors.value.password = t('passwordRequired')
  }
  if (form.value.password !== form.value.password_confirmation) {
    errors.value.password_confirmation = t('passwordsDoNotMatch')
  }
  // TODO: Add API call for registration
}
</script>

<style scoped>
.bg-primary { background-color: #e50914; }
.bg-primary-dark { background-color: #b0060f; }
.text-primary { color: #e50914; }
.focus\:ring-primary:focus { box-shadow: 0 0 0 2px #e50914; }
</style>
