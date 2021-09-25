/* HTML */
import htmlmin from 'gulp-htmlmin'

/* CSS */
import postcss from 'gulp-postcss'
import cssnano from 'cssnano'
import autoprefixer from 'autoprefixer'

/* JavaScript */

import gulp from 'gulp'
import babel from 'gulp-babel'
import terser from 'gulp-terser'

/* PUG */
import pug from 'gulp-pug'

/* SASS */
var sass = require('gulp-sass')(require('sass'))

/* Common */
import concat from 'gulp-concat'

/* Clean css */
import clean from 'gulp-purgecss'

/* Cache bust */
import cacheBust from 'gulp-cache-bust'

/* Optiomizar imagenes */
import imagemin from 'gulp-imagemin'

/* Browser Sync */
import {init as server, stream, reload} from 'browser-sync'

/* Plumber sirve para evitar que caiga la pagina y ademas te muestra el error */
import plumber from 'gulp-plumber'

/* Variables/Constantes */

const production = false //En esta variable controlamos la minificacion del codigo

const cssPlugins = [
    cssnano(),
    autoprefixer()
]

/* ------------CREANDO LAS TAREAS CON GULP--------- */

//TAREA PARA TRASPILAR CODIGO HTML NUEVO A VERSIONES MAS ANTIGUAS
gulp.task('html-min', () => {
    return gulp
        .src('./src/*.html')
        .pipe(plumber())
        .pipe(htmlmin({
            collapseWhitespace: true,
            removeComments: true
        }))
        .pipe(gulp.dest('./public'))
})

//TAREA PARA TRASPILAR CODIGO CSS NUEVO A VERSIONES MAS ANTIGUAS
/* gulp.task('styles', () => {
    return gulp
        .src('./src/css/*.css')
        .pipe(plumber())
        .pipe(concat('styles-min.css'))
        .pipe(postcss(cssPlugins))
        .pipe(gulp.dest('./public/css'))
        .pipe(stream())
}) */



//TAREA PARA TRASPILAR CODIGO JS NUEVO A VERSIONES MAS ANTIGUAS
gulp.task('babel', () => {
    return gulp
        .src('./src/js/*.js')
        .pipe(plumber())
        .pipe(concat('scripts-min.js'))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(terser())
        .pipe(gulp.dest('./public/js'))
})

//TAREA PARA TRASPILAR PUG
gulp.task('views', () => {
    return gulp
        .src('./src/views/pages/*.pug') // Creamos la ruta de los archivos
        .pipe(plumber())
        .pipe(pug({
            pretty: production ? false : true
        }))
        .pipe(cacheBust({
            type: 'timestamp'
        }))
        .pipe(gulp.dest('./public')) // Le decimos la ruta del los archivos ya listos para subir al servidor
})

//TAREA PARA TRASPILAR SASS
gulp.task('sass', () => {
    return gulp
        .src('./src/scss/styles.scss') // Creamos la ruta de los archivos  
        .pipe(sass({
            outputStyle: 'compressed'
        }))
        .pipe(gulp.dest('./public/css')) // Le decimos la ruta del los archivos ya listos para subir al servidor
        .pipe(stream())
})
//TAREA PARA LIMPIAR EL CSS
gulp.task('clean', () => {
    return gulp
        .src('./public/css/styles.css') // Creamos la ruta de los archivos
        .pipe(clean({
            content: ['./public/*.html']
        }))
        .pipe(gulp.dest('./public/css')) // Le decimos la ruta del los archivos ya listos para subir al servidor
})

//TAREA PARA OPTIMIZAR LAS IMAGENES
gulp.task('imagemin', () => {
    return gulp
        .src('./src/images/*') // Creamos la ruta de los archivos
        .pipe(imagemin([
            imagemin.gifsicle({
                interlaced: true
            }),
            imagemin.mozjpeg({
                quality: 30,
                progressive: true
            }),
            imagemin.optipng({
                optimizationLevel: 1
            })
        ]))
        .pipe(gulp.dest('./public/images')) // Le decimos la ruta del los archivos ya listos para subir al servidor
})

//Tarea para vigilar los archivos automaticamente
//gulp.series('nombre de la tarea) ejecuta las tares en orden, es decir finaliza una y continua con la otra 
gulp.task('default', () => {
    server({
        server: './public'
    })
    gulp.watch('./src/*.html', gulp.series('html-min'))
    //gulp.watch('./src/css/*.css', gulp.series('styles'))
    gulp.watch('./src/views/**/*.pug', gulp.series('views')).on('change', reload)
    gulp.watch('./src/scss/**/*.scss', gulp.series('sass'))
    gulp.watch('./src/js/*.js', gulp.series('babel')).on('change', reload)
})