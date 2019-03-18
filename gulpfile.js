var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var postcssPresetEnv = require('postcss-preset-env');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');
const cleanCSS = require('gulp-clean-css');
const rename = require('gulp-rename');

const base = {
  src: './themes/gus_gulp/',
  dest: './',
  node: 'node_modules',
  config: './themes/gus_gulp/config'
};

const folders = {
  images: {
    src: `${base.src}images/`
  },
  scripts: {
    src: `${base.src}javascript/`
  },
  styles: {
    src: `${base.src}scss/`,
    dest: `${base.src}css/`,
    maps: `${base.src}css/`
  },
  config: {
    src: `${base.src}hint/`
  }
};

gulp.task('styles', function () {
  var processors = [
    postcssPresetEnv({
      browsers: 'last 2 versions',
      autoprefixer: {
        grid: true
      }
    })
  ];

  return gulp.src(`${folders.styles.src}style.scss`)
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(cleanCSS({
      compatibility: 'ie8'
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(notify("success"))
    .pipe(gulp.dest(`${folders.styles.dest}`))
    .pipe(livereload());
});

/**
 * Minify CSS
 */


/*gulp.task('watch:styles', function () {
  livereload.listen();
  gulp.watch(`${folders.styles.src}** /*.scss`, ['styles']);
});*/
