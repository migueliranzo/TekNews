
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
        lg: "1314px",
        xl: "1314px",
        "2xl": "1314px",

      }
    },
  },
  variants: {
    extend: {
      flex: ["responsive", "hover", 'group-hover'],
      margin: ["responsive", "hover", 'group-hover'],
      padding: ["responsive", "hover", 'group-hover'],
      height: ["responsive", "hover", 'group-hover'],
      width: ["responsive", "hover", 'group-hover'],
      rotate: ['active', 'group-hover'],
      scale: ['active', 'group-hover'],
      transform : ['group-hover'],
      translate : ['group-hover', 'hover'],
    },
  },
  plugins: [],
}
