// Include gulp
var gulp = require('gulp'),

// Include Our Plugins
sass = require('gulp-ruby-sass'),
prefix = require('gulp-autoprefixer'),
minifycss = require('gulp-minify-css'),
jshint = require('gulp-jshint'),
uglify = require('gulp-uglify'),
imagemin = require('gulp-imagemin'),
rename = require('gulp-rename'),
rimraf = require('gulp-rimraf'),
concat = require('gulp-concat'),
notify = require('gulp-notify'),
cache = require('gulp-cache'),
livereload = require('gulp-livereload');

//Sass
gulp.task('styles', function() {
  return gulp.src('_scss/*.scss')
  .pipe(sass({ style: 'expanded' }))
  .pipe(prefix({ cascade: true }))
  .pipe(gulp.dest('resources/css'))
  .pipe(rename({suffix: '.min'}))
  .pipe(minifycss())
  .pipe(gulp.dest('resources/css'))
  .pipe(notify({ message: 'Styles task complete' }));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
  return gulp.src('_coffeescript/*.js')
  .pipe(jshint())
  .pipe(jshint.reporter('default'))
  .pipe(concat('main.js'))
  .pipe(gulp.dest('resources/js'))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest('resources/js'))
  .pipe(notify({ message: 'Scripts task complete' }));
});

// Optimize Images
gulp.task('images', function() {
  return gulp.src('_img/*')
  .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
  .pipe(gulp.dest('resources/img'))
  .pipe(notify({ message: 'Images task complete' }));
});

//Clean everything

gulp.task('rimraf', function() {
  return gulp.src(['resources/css', 'resources/js', 'resources/img'], {read: false})
  .pipe(rimraf());
});



gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('_scss/*.scss', ['styles']);

  // Watch .js files
  gulp.watch('_coffescript/*.js', ['scripts']);

  // Watch image files
  gulp.watch('_img/*', ['images']);


  // Create LiveReload server
  var server = livereload();

  // Watch any files in dist/, reload on change
  gulp.watch(['resources/**']).on('change', function(file) {
    server.changed(file.path);
  });



});

  gulp.task('default', ['rimraf'], function() {
  gulp.start('styles', 'scripts', 'images','watch');
});