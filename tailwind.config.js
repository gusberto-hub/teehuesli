const colors = require("tailwindcss/colors");

module.exports = {
  content: ["./src/**/*.scss", "./site/**/*.php"],
  theme: {
    extend: {
      colors: {
        mint: "#C8E1D3",
        beige: "#EFEFEB",
        blue: "#00618F",
        orange: "#EB6446",
      },
    },
    fontFamily: {
      sans: ["Graphik", "sans-serif"],
    },
    colors: {
      primary: "#00618F",
      secondary: "#EB6446",
      neutral: "#EFEFEB",
      white: colors.white,
      red: colors.red,
    },
  },
  plugins: [],
};
