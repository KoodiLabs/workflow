'use strict';

var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');

var sass = require('gulp-sass');
var webpack = require('gulp-webpack');
var webpackConfig = require("./assets/webpack.config.js");


gulp.task('webpack', function() {
    return gulp.src('assets/js/*.js')
        .pipe(plumber())
        .pipe(webpack(webpackConfig))
        .pipe(gulp.dest('assets/js/builds/'));
});

gulp.task('sass', function() {
    return gulp.src('assets/sass/app.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('assets/css'))
});

gulp.task('default', ['webpack', 'sass']);

