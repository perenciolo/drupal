var gulp = require('gulp');
var postcss = require('gulp-postcss');
var sass = require('gulp-sass');
var postcssPresetEnv = require('postcss-preset-env');
var notify = require('gulp-notify');
var livereload = require('gulp-livereload');

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
    postcssPresetEnv()
  ];

  return gulp.src(`${folders.styles.src}style.scss`)
    .pipe(sass())
    .pipe(postcss(processors))
    .pipe(notify("success"))
    .pipe(gulp.dest(`${folders.styles.dest}`))
    .pipe(livereload());
});

/*gulp.task('watch:styles', function () {
  livereload.listen();
  gulp.watch(`${folders.styles.src}** /*.scss`, ['styles']);
});*/
