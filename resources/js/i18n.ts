import { createI18n } from 'vue-i18n'

const messages = {
  en: {
    welcome: 'Welcome',
    login: 'Login',
    register: 'Register',
    sliderTitle: 'Test Slider',
    latestMovies: 'Latest Movies',
    mostPopularMovies: 'Most Popular Movies',
    latestSeries: 'Latest Series',
    // ...
  },
  fa: {
    welcome: 'خوش آمدید',
    login: 'ورود',
    register: 'ثبت نام',
    sliderTitle: 'اسلایدر تست',
    latestMovies: 'جدیدترین فیلم‌ها',
    mostPopularMovies: 'محبوب‌ترین فیلم‌ها',
    latestSeries: 'جدیدترین سریال‌ها',
    // ...
  },
}

export const i18n = createI18n({
  legacy: false,
  locale: 'fa',
  fallbackLocale: 'en',
  messages,
})
