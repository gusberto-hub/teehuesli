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
      animation: {
        "spin-slow": "spin 14s linear infinite",
        "fadeIn" : "fadeIn 800ms ease-in forwards",
        "fadeInRight" : "fadeInRight 800ms ease-in forwards",
        "fadeInLeft" : "fadeInLeft 800ms ease-in forwards",
      },
      keyframes: {
        fadeInRight: {
          'from':{ transform: 'translateX(10rem) translateY(-6rem)', opacity: 0 },
          '100%':{ opacity: 1 },
        },
        fadeInLeft: {
          'from':{ transform: 'translateX(-8rem) translateY(-4rem)', opacity: 0 },
          '100%':{ opacity: 1 },
        },
        fadeIn: {
          '0%':{ opacity: 0 },
          '100%':{ opacity: 1 },
        }
      },
      gridTemplateAreas: {
        verein_intro_sm: ["img1", "img2", "title", "text"],
        verein_intro_md: ["img2 img1", "img2 title", "text text"],
        verein_intro_lg: ["title img1", "text img2"],
        form_verein_sm: ["text_form", "form", "img"],
        form_verein_md: ["img text_form", "form form"],
        form_verein_lg: ["text_form text_form text_form text_form . form form form form form form form", "img img img img . form form form form form form form"],
        contact_grid_sm: ["img", "contact", "title", "map"],
        contact_grid_md: ["img contact", "title title", "map map"],
        contact_grid_lg: ["img img", "contact map", "title map"],
      },
      gridTemplateColumns: {
        "form-grid-sm": "1fr 2fr",
        "1_3": "1fr 3fr",
      },
      gridTemplateRows: {},
    },
    fontFamily: {
      sans: ["Graphik", "sans-serif"],
      simplon_medium: ["Simplon Mono Medium", "monospace"],
      simplon_regular: ["Simplon Mono Regular", "monospace"],
    },
    colors: {
      primary: "#00618F",
      secondary: "#EB6446",
      neutral: "#EFEFEB",
      white: colors.white,
      red: colors.red,
    },
  },
  plugins: [require("@savvywombat/tailwindcss-grid-areas")],
};
