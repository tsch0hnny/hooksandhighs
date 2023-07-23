/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}", "./dist/**/*.{html,js}"],
  theme: {
      colors: {
          'purple': '#7b2c80',
          'deep-purple': '#3a153d',
          'deeper-purple': '#2c102e',
          'barely-purple': '#564356',
          'barely-purple-light': '#d2c6d2',
          'barely-purple-dark': '#433743',
          'green': '#3daa75',
          'black': '#171614',
          'white': '#F7FFF6',
          'cool-gray': '#7D8CA3',
      },
      extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    /** require('@tailwindcss/forms'), */
    /** require('@tailwindcss/aspect-ratio'), */
    /** require('@tailwindcss/container-queries'),*/
  ],
}

