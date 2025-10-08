/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.ts",
    "./app/View/Components/**/*.php",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        'website': ['var(--font-family-website)'],
        'sans': ['var(--font-family-website)'], // This makes the website font the default sans font
      },
      backgroundImage: {
        'website-primary': 'linear-gradient(114.65deg, rgba(239, 246, 255, 0.99) 12.67%, rgba(191, 219, 254, 0.99) 51.81%)',
      },
    },
  },
  plugins: [],
} 