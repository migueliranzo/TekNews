
module.exports = {
  purge: {enabled:false, content: ['./build/**/*.php']},
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
    fontFamily:{
      Readex: ["Readex Pro, sans-serif"],
    },
    container: {
      center: true,
      padding: "1rem",
      screens: {
        lg: "1124px",
        xl: "1124px",
        "2xl": "1124px",

      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
