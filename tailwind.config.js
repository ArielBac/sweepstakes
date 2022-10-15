/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
        colors: {
            primary: {
                base: "#0000CD",
                light: "#4B0082",
                dark: "#000080",
                red: "#E80003"
            }
        }
    },
  },
  plugins: [],
}
