'use strict';

const gulp = require('gulp');
const del = require('del');
const replace = require('gulp-replace');
const rename = require("gulp-rename");
const gulpif = require('gulp-if');
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const postcssCustomMedia = require('postcss-custom-media');
var minmax = require('postcss-media-minmax');
const shortCssVars = require('postcss-short-css-vars');
const fs = require('fs');
const uglifycss = require('gulp-uglifycss');
const babel = require('gulp-babel');
const { argv } = require('process');

var devBuild = ((process.env.NODE_ENV || 'development').trim().toLowerCase() === 'development');
if (argv.includes('--production') || argv.includes('-prod')) {
    devBuild = false;
}

gulp.task('clean-open-props', function () {
    return del('./src/scss/open-props/*');
});

gulp.task('copy-open-props-base', function () {
    return gulp.src(['./node_modules/open-props/src/*.css', '!**/index.css'])
        .pipe(replace(/@import 'props.([a-z]+).css';/g, "@import '$1';"))
        .pipe(rename(function (path) {
            path.basename = path.basename.replace('props.', '_');
            path.extname = '.scss';
        }))
        .pipe(gulp.dest('./src/scss/open-props'));
});

gulp.task('copy-open-props-extra', function () {
    return gulp.src(['./node_modules/open-props/src/extra/*.css'])
        .pipe(replace(/@import ['"]([a-z]+)\.css['"];/g, "@use '$1';"))
        .pipe(replace(/@import ['"]\.\.\/props\.([a-z]+)\.css['"];/g, "@use '../$1';"))
        .pipe(replace(/@import ['"]theme\.([a-z]+)\.css['"];/g, "@use 'theme_$1';"))
        .pipe(rename(function (path) {
            path.basename = path.basename.replace('.', '_');
            path.extname = '.scss';
        }))
        .pipe(gulp.dest('./src/scss/open-props/extra'));
});

gulp.task('copy-open-props', gulp.parallel('copy-open-props-base', 'copy-open-props-extra'));

gulp.task('open-props', gulp.series('clean-open-props', 'copy-open-props'));

gulp.task('scss', function () {
    const sassOptions = devBuild ? { outputStyle: 'expanded' } : { outputStyle: 'compressed' };

    const postcssPlugins = [postcssCustomMedia(), minmax()];
    if (!devBuild) {
        postcssPlugins.push(shortCssVars());
    }

    return gulp.src('./src/scss/**/*.scss')
        .pipe(gulpif(devBuild, sourcemaps.init()))
        .pipe(sass(sassOptions).on('error', sass.logError))
        .pipe(postcss(postcssPlugins))
        .pipe(gulpif(devBuild, sourcemaps.write()))
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('js', function () {
    return gulp.src('./src/js/**/*.js')
        .pipe(gulpif(devBuild, sourcemaps.init()))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(gulpif(devBuild, sourcemaps.write()))
        .pipe(gulp.dest('./dist/js'));
});

gulp.task('build-css', gulp.series('open-props', 'scss'));
gulp.task('build', gulp.parallel('build-css', 'js'));
gulp.task('run-watch', function () {
    gulp.watch('./src/scss/**/*.scss', gulp.parallel('scss', 'js'));
});
gulp.task('watch', gulp.series('build', 'run-watch'));
gulp.task('default', gulp.series('watch'));
