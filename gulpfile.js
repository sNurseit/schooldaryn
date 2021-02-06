var gulp 				= require('gulp'),
		browserSync = require('browser-sync').create();

// Static Server + watching sass/html files
gulp.task('serve', function() {

  browserSync.init({
     proxy: "localhost:8888/file-form-lesson/"
  });

  gulp.watch("*.php").on('change', browserSync.reload);
  gulp.watch("*.html").on('change', browserSync.reload);
});

gulp.task('default', ['serve']);