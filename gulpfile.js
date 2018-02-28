const gulp = require('gulp');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const del = require('del');
const concat = require('gulp-concat');

var config = {
  message: {
    start: 'Running defined gulp tasks...',
    end: 'Finishing up with gulp tasks...'
  }
}

gulp.task('message-start', function(){
  console.log(config.message.start)
});

/* Clean the public CSS directory */
gulp.task('clean', function(){
  return del.sync(['public_html/assets/css/**', '!public_html/assets/css']);
});

/* Minify css that came with libraries (such as select
   and move it to assets/css directory */
gulp.task('minify-library-css', function(){
  return gulp.src('src/library-css/*.css')
  .pipe(cleanCSS({compatibility: 'ie8'}))
  .pipe(gulp.dest('public_html/assets/css'))
});

/* Compile sass files, minify the css output
   and move to assets/css directory */
gulp.task('sass', function(){
  return gulp.src('src/scss/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(concat('app.css'))
    .pipe(gulp.dest('public_html/assets/css'));
});

gulp.task('sass:watch', function(){
  gulp.watch('src/scss/**/*.scss', ['sass']);
});

/* Uglify javascript and move it to assets/js directory */
gulp.task('uglify-js', function(){
  return gulp.src('src/js/**/*.js')
    .pipe(uglify())
    .pipe(gulp.dest('public_html/assets/js'))
})

/* Move debug.js to the debug javascript directory */
gulp.task('additional-moves', function(){
  return gulp.src('src/assets/js/debug/debug.js')
  .pipe(gulp.dest('public_html/assets/js/debug'))
});

gulp.task('message-end', function(){
  console.log(config.message.end)
});

/* Main gulp task consisting of partial tasks */
gulp.task('push',
 [
   'message-start',
   'clean',
   'minify-library-css',
   'sass',
   'uglify-js',
   'additional-moves',
   'message-end'
 ]
);
