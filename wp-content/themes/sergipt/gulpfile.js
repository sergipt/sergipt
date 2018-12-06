var gulp = require('gulp'),
    sass = require('gulp-sass'),
    concat = require('gulp-concat'),
    minifyCSS = require('gulp-minify-css'),
    autoprefixer = require('gulp-autoprefixer'),
    watch = require('gulp-watch'),
    browserSync = require('browser-sync');

gulp.task('styles', function() {
  return gulp.src('assets/scss/*.scss')
    .pipe(sass({
      'sourcemap=none': true
    }))
    .on('error', function (err) {
          console.log(err.message);
          this.emit('end');
      })
    .pipe(concat('styles.min.css'))
    .pipe(minifyCSS())
    .pipe(autoprefixer('last 2 version', 'ie 9'))
    .pipe(gulp.dest('assets/css/'))
});


gulp.task('watch', function() {
   gulp.watch('assets/scss/*.scss', ['styles']);
});

gulp.task('browser-sync', function () {
   var files = [
      '**/*.php',
      'assets/css/**/*.css',
      'assets/img/**/*.png',
      'assets/js/**/*.js'
   ];

   browserSync.init(files, {
      proxy: "http://localhost:8888/sergipt.com/"
   });
});

gulp.task('default', ['styles', 'watch','browser-sync']);