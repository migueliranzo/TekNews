
module.exports = {
  mode: 'jit',
  content : [
    './build/**/*.php',
  ],
  theme: {
    extend: {
        keyframes: {
        wiggle: {
          '0%, 100%': { transform: 'rotate(-3deg)' },
          '50%': { transform: 'rotate(3deg)' },
        },
        fadein:{
          '0%': {opacity: 0},
          '100%': {opacity: 1}
        }
      }
    },
    fontFamily:{
      Readex: ["Readex Pro, sans-serif"],
      IBMMONO: ["IBM Plex Mono, monospace"],
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

  plugins: [
    require('@tailwindcss/typography'),
  ],
}
