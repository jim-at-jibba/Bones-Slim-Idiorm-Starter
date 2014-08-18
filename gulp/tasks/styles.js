
var sass = require('gulp-ruby-sass');
var prefixer = require('gulp-autoprefixer');
var gulp         = require('gulp');
var notify       = require('gulp-notify');
var handleErrors = require('../util/handleErrors');

// Where do you store your Sass files?
var sassDir = 'dev/scss';

// Which directory should Sass compile to?
var targetCSSDir = 'public/css';

//Styles
gulp.task('styles', function(){
    return gulp.src(sassDir + '/styles.scss')
        .pipe(sass({ style: 'extended' }).on('error', handleErrors))
        .pipe(prefixer('last 10 version'))
        .pipe(gulp.dest(targetCSSDir))
        .pipe(notify({ message: 'All done, oh great one!'}));
});
