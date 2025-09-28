import { createI18n } from 'vue-i18n'

const messages = {
  en: {
    welcome: 'Welcome',
    login: 'Login',
    register: 'Register',
    sliderTitle: 'Test Slider',
    // ...
  },
  fa: {
    welcome: 'خوش آمدید',
    login: 'ورود',
    register: 'ثبت نام',
    sliderTitle: 'اسلایدر تست',
    // ...
  },
}

export const i18n = createI18n({
  legacy: false,
  locale: 'fa',
  fallbackLocale: 'en',
  messages,
})
