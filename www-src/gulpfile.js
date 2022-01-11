'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const browserSync = require('browser-sync').create();
const cleanCSS = require('gulp-clean-css');

function serve() {
	browserSync.init({
		ui: false,
		port: process.env.BROWSER_SYNC_PORT,
		proxy: 'https://' + process.env.WEB_DOMAIN,
		https: {
			key: process.env.CRT_KEY_FILE,
			cert: process.env.CRT_FILE,
		},
		open: false,
		ghostMode: false,
	});

	gulp.watch('**/*.scss', buildClientStyle);
}

function buildClientStyleFront() {
	return gulp.src('front.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(cleanCSS({compatibility: 'ie8'}))
		.pipe(gulp.dest('../www/design/front'))
		.pipe(browserSync.stream());
}

const buildClientStyle = gulp.parallel(buildClientStyleFront);

exports.default = buildClientStyle;
exports.serve = serve;
