var gulp = require('gulp');

gulp.task('watch', ['setWatch'], function() {
	gulp.watch('dev/scss/**', ['compass']);
	gulp.watch('dev/img/**', ['images']);
	gulp.watch('dev/js/**', ['scripts']);
	// Note: The browserify task handles js recompiling with watchify
});
