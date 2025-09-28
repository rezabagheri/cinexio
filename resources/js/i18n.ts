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
  registerSubtitle: 'Create your account to start streaming.',
  email: 'Email',
  password: 'Password',
  confirmPassword: 'Confirm Password',
  alreadyHaveAccount: 'Already have an account?',
  emailRequired: 'Email is required.',
  passwordRequired: 'Password is required.',
  passwordsDoNotMatch: 'Passwords do not match.',
  loginSubtitle: 'Sign in to your account to continue.',
  rememberMe: 'Remember me',
  noAccount: "Don't have an account?",
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
  registerSubtitle: 'برای تماشای فیلم و سریال ثبت‌نام کنید.',
  email: 'ایمیل',
  password: 'رمز عبور',
  confirmPassword: 'تکرار رمز عبور',
  alreadyHaveAccount: 'قبلاً ثبت‌نام کرده‌اید؟',
  emailRequired: 'ایمیل الزامی است.',
  passwordRequired: 'رمز عبور الزامی است.',
  passwordsDoNotMatch: 'رمزهای عبور یکسان نیستند.',
  loginSubtitle: 'برای ورود به حساب کاربری وارد شوید.',
  rememberMe: 'مرا به خاطر بسپار',
  noAccount: 'حساب کاربری ندارید؟',
  // ...
  },
}

export const i18n = createI18n({
  legacy: false,
  locale: 'fa',
  fallbackLocale: 'en',
  messages,
})
