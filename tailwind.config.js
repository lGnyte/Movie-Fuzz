/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        "surface": "#f2f5fa",
        "primary": "#042959",
        "secondary": "#66A1ED",
        "accent": "#0F67D9"
      },
      fontFamily: {
        roboto: ['Roboto', 'sans'],
        title: ['Roboto Slab', 'serif'],
      },
    },
  },
  plugins: [],
}

