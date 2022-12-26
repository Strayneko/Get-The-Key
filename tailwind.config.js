/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    container: {
      center: true
    },
    extend: {
      container: {
        screens: {
          xl: "1500px"
        }
      },
      colors: {
        primary: "#0097e6"
      }
    }
  },
  plugins: []
};
