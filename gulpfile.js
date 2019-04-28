var gulp = require('gulp'),
    sass = require('gulp-sass'),
      autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    imagemin = require('gulp-imagemin'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    cache = require('gulp-cache'),
    del = require('del'),
    browserify = require('gulp-browserify'),
    plumber = require('gulp-plumber');

    gulp.task('styles', function() {
      return sass('src/scss/styles.scss', { style: 'expanded' })
        .pipe(autoprefixer({browsers: ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'], cascade: true}))
        // .pipe(gulp.dest('style.css'))
        .pipe(rename({ suffix: '.min' }))
        .pipe(minifycss())
        .pipe(gulp.dest('assets/css'))
        .pipe(notify({ message: 'Styles task complete' }));
    });


    gulp.task('images', function() {
      return gulp.src('src/images/**/*')
        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
        .pipe(gulp.dest('assets/images'))
        .pipe(notify({ message: 'Images task complete' }));
    });

    gulp.task('clean', function() {
  return del(['assets/styles', 'assets/js', 'assets/images']);
});

// Watch
gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('src/scss/**/*.scss', ['styles']);

  // Watch image files
  gulp.watch('src/images/**/*', ['images']);

});

// Default task
gulp.task('default', ['clean'], function() {
  gulp.start('styles', 'images', 'watch');
});
