
//Load plugins
var gulp = require('gulp'),
    gutil= require('gulp-util'),
    sass = require('gulp-ruby-sass'),
    prefixer = require('gulp-autoprefixer'),
    concat = require('gulp-concat'),
    stripDebug = require('gulp-strip-debug'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify');

// Where do you store your Sass files?
var sassDir = 'scss';

// Which directory should Sass compile to?
var targetCSSDir = 'public/css';

// Where do you store your Bower files?
var bowerDir = 'bower_components';

// Where do you store your JS files?
var jsDir = 'js';

// Which directory should js compile to?
var targetjsDir = 'public/js';

//Styles
gulp.task('styles', function(){
    return gulp.src(sassDir + '/styles.scss')
        .pipe(sass({ style: 'extended' }).on('error', gutil.log))
        .pipe(prefixer('last 10 version'))
        .pipe(gulp.dest(targetCSSDir))
        .pipe(notify({ message: 'All done, oh great one!'}));
});

// JS concat, strip debugging and minify
gulp.task('scripts', function() {
    gulp.src([
        bowerDir + '/foundation/js/foundation.min.js',
        bowerDir + '/flexslider/jquery.flexslider-min.js',
        jsDir + '/app.js'
        ])
        .pipe(concat('script.js'))
        .pipe(stripDebug())
        .pipe(uglify())
        .pipe(gulp.dest(targetjsDir));
});

// Keep an eye on Sass files for changes...
gulp.task('watch', function () {
    gulp.watch(sassDir + '/**/*.scss', ['styles']);
});

// What tasks does running gulp trigger?
gulp.task('default', ['styles', 'scripts', 'watch']);


//// Images
//gulp.task('images', function() {
//    return gulp.src('src/images/**/*')
//        .pipe(cache(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true })))
//        .pipe(livereload(server))
//        .pipe(gulp.dest('dist/images'))
//        .pipe(notify({ message: 'Images task complete' }));
//});
//

