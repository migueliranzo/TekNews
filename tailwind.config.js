
module.exports = {
  mode: 'jit',
  content : [
    './build/**/*.php',
  ],
  theme: {
    extend: {},
    fontFamily:{
      Readex: ["Readex Pro, sans-serif"],
    },
    container: {
      center: true,
      padding: "1rem",
      screens: {
        lg: "1314px",
        xl: "1314px",
        "2xl": "1314px",

      }
    },
  },

  plugins: [],
}
