const gulp = require("gulp");
const webpack = require("webpack-stream");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const browserSync = require("browser-sync");
const postcss = require("gulp-postcss");
const concat = require("gulp-concat");
const rename = require("gulp-rename");
const uglify = require("gulp-uglify");
const cleanCSS = require("gulp-clean-css");
const purgecss = require("gulp-purgecss");
const connect = require("gulp-connect-php");

const paths = {
  projectProxy: "teehuesli.test",
  styles: {
    src: "src/css/*.scss",
    dest: "assets/css/",
  },
  scripts: {
    src: "src/scripts/**/*.js",
    dest: "assets/scripts/",
  },
};

/* Gulp watch tasks */
// This task is used to convert the scss to css and compress it.
gulp.task("sass", function () {
  return gulp
    .src(paths.styles.src)
    .pipe(sassGlob({ sassModules: true }))
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss())
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    )
    .pipe(rename("styles.min.css"))
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.styles.dest))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    );
});
// This task is used to combine all js files in a single scripts.min.js.
gulp.task("scripts", function () {
  return gulp
    .src([paths.scripts.src])
    .pipe(
      webpack({
        mode: "development",
      })
    )
    .pipe(concat("scripts.js"))
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    )
    .pipe(rename("scripts.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(paths.scripts.dest))
    .pipe(
      browserSync.reload({
        stream: true,
      })
    );
});

gulp.task("default", function () {
  return gulp
    .src("src/entry.js")
    .pipe(
      webpack({
        // Any configuration options...
      })
    )
    .pipe(gulp.dest("dist/"));
});

// This task is used to reload the project when changes are made to a html/scss/js file.
gulp.task(
  "browserSync",
  gulp.series(function (done) {
    connect.server({}, function () {
      browserSync({
        proxy: paths.projectProxy,
        notify: false,
        browser: "firefox",
      });
    });
    done();
  })
);

gulp.task(
  "watch",
  gulp.series(["browserSync", "sass"], function () {
    gulp.watch("**/*.php", gulp.series(["sass"]));
    gulp.watch("**/*.php").on("change", function () {
      browserSync.reload();
    });
    gulp.watch("src/css/*.scss", gulp.series(["sass"]));
    gulp.watch(paths.scripts.src, gulp.series(["scripts"]));
  })
);

/* Gulp dist task */
// create a distribution folder for production
const distFolder = "dist/";
const assetsFolder = "dist/assets/";

gulp.task("dist", async function () {
  // remove unused classes from the style.css file with PurgeCSS and copy it to the dist folder
  await purgeCSS();
  // minify the scripts.js file and copy it to the dist folder
  await minifyJs();
  // copy any additional js files to the dist folder
  await moveJS();
  // copy all the assets inside main/assets/img folder to the dist folder
  await moveAssets();
  // copy all html files inside main folder to the dist folder
  await moveContent();
  console.log("Distribution task completed!");
});

function purgeCSS() {
  return new Promise(function (resolve, reject) {
    const stream = gulp
      .src(paths.styles.dest + "styles.css")
      .pipe(
        purgecss({
          content: ["site/**/*.php", paths.scripts.dest + "scripts.js"],
          safelist: {
            standard: [".is-hidden", ".is-visible"],
            deep: [/class$/],
            greedy: [],
          },
          defaultExtractor: (content) =>
            content.match(/[\w-/:%@]+(?<!:)/g) || [],
        })
      )
      .pipe(gulp.dest(distFolder + "/assets/css"));

    stream.on("finish", function () {
      resolve();
    });
  });
}

function minifyJs() {
  return new Promise(function (resolve, reject) {
    const stream = gulp
      .src(paths.scripts.dest + "scripts.js")
      .pipe(uglify())
      .pipe(gulp.dest(distFolder + "/assets/js"));

    stream.on("finish", function () {
      resolve();
    });
  });
}

function moveJS() {
  return new Promise(function (resolve, reject) {
    const stream = gulp
      .src(
        [
          paths.scripts.dest + "*.js",
          "!" + paths.scripts.dest + "scripts.js",
          "!" + paths.scripts.dest + "scripts.min.js",
        ],
        { allowEmpty: true }
      )
      .pipe(gulp.dest(assetsFolder + "js"));

    stream.on("finish", function () {
      resolve();
    });
  });
}

function moveAssets() {
  return new Promise(function (resolve, reject) {
    const stream = gulp
      .src(["main/assets/img/**"], { allowEmpty: true })
      .pipe(gulp.dest(assetsFolder + "img"));

    stream.on("finish", function () {
      resolve();
    });
  });
}

function moveContent() {
  return new Promise(function (resolve, reject) {
    const stream = gulp.src("main/*.html").pipe(gulp.dest(distFolder));

    stream.on("finish", function () {
      resolve();
    });
  });
}
