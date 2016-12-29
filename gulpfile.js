// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var sass = require('gulp-sass');
var notify = require("gulp-notify");
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');
var base64 = require('gulp-base64');
var plumber = require('gulp-plumber');
var autoprefixer = require('gulp-autoprefixer');
var minifycss = require('gulp-minify-css');
var gutil = require('gulp-util');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var rigger = require('gulp-rigger');
var browserSync = require("browser-sync");
var rimraf = require('rimraf'); // do usuwania
var reload = browserSync.reload;
var environments = require('gulp-environments');
var stripDebug = require('gulp-strip-debug');

var development = environments.development;
var production = environments.production;

// Domyślne ścieżki //
var path = {
    build: { // Swieżozbudowane pliki wrzucamy do build
        js: 'build/js/',
        style: 'build/style/',
        img: 'build/img/',
        font: 'build/font/'
    },
    src: { // Pliki źródłowe bierzemy stąd
        js: [
            'src/js/*.js',
            // Różne pluginy
            'node_modules/blazy/blazy.js',
        ],
        style: [
            'src/style/*.scss',
            // Różne pluginy
        ],
        img: 'src/img/**/*.*', // bierzemy wszystko, co jest w tych folderach
        font: 'src/font/*.*'
    },
    watch: { // Wskazujemy, za jakimi plikami śledzimy
        js: 'src/js/**',
        style: 'src/style/**',
        img: 'src/img/*.*',
        font: 'src/font/*.*'
    },
    clean: './build'
};

// Żeby F5 nie męczyć //
gulp.task('webserver', function () {
    browserSync({
        logPrefix: 'Pogoń Lwów',
        host:      'site1.domain.dev',
        port:      3060,
        open:      false,
        notify:    false,
        ghost:     false,

        // Change this property with files of your project
        // that you want to refresh the page on changes.
        files:     [
            'public/css/**.min.css',
            'public/js/**.min.js',
            'app/**/*.php',
            'index.php',
            '.htaccess'
        ]
    });
});

// error function for plumber
var onError = function(err) {
    gutil.beep();
    console.log(err);
    this.emit('end');
};

// Browser definitions for autoprefixer
var AUTOPREFIXER_BROWSERS = [
    '> 3%',
    'ie >= 10',
    'ios >= 8',
    'android >= 4.4',
    'bb >= 10'
];

// Compile Our Sass
gulp.task('scss', function() {
    return gulp.src(path.src.style)
        .pipe(plumber({
            errorHandler: notify.onError("Error: <%= error.message %>")
        }))
        .pipe(development(sourcemaps.init())) // sourcemapy tylko na devie
        .pipe(sass({
            style: 'expanded'
        }))
        .pipe(autoprefixer(AUTOPREFIXER_BROWSERS))
        .pipe(base64({
            baseDir: 'src',
            maxImageSize: 32 * 1024,
            extensions: ['svg', 'png'],
            exclude: ['fontello.svg'],
            debug: false
        }))
        .pipe(minifycss({
            keepSpecialComments: 0
        }))
        .pipe(development(sourcemaps.write('./'))) // sourcemapy tylko na devie
        .pipe(gulp.dest(path.build.style))
        .pipe(notify({
            onLast: true,
            message: 'scss done'
        }))
        .pipe(reload({
            stream: true
        }));
});

// Minify JS
gulp.task('js', function() {
    return gulp.src(path.src.js)
        .pipe(rigger())
        .pipe(development(sourcemaps.init())) // sourcemapy tylko na devie
        .pipe(rename({
            extname: '.min.js'
        }))
        .pipe(production(uglify()))
        .pipe(production(stripDebug()))
        .pipe(development(sourcemaps.write())) // sourcemapy tylko na devie
        .pipe(gulp.dest(path.build.js))
        .pipe(notify({
            onLast: true,
            message: 'js done'
        }))
        .pipe(reload({
            stream: true
        }));
});

// Minify images
gulp.task('img', function() {
    return gulp.src(path.src.img)
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false
            }],
            use: [pngquant()],
            interlaced: true
        }))
        .pipe(gulp.dest(path.build.img))
        .pipe(reload({
            stream: true
        }));
});

gulp.task('fonts', function() {
    gulp.src(path.src.font)
        .pipe(gulp.dest(path.build.font)) //spit it to build
        .pipe(reload({
            stream: true
        })); // reload
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch(path.watch.js, ['js']);
    gulp.watch(path.watch.style, ['scss']);
    gulp.watch(path.watch.img, ['img']);
    gulp.watch(path.watch.font, ['fonts']);
});

// Usuwa katalog build
gulp.task('clean', function(cb) {
    rimraf(path.clean, cb);
});
// Ustawiamy środowisko jako dev
gulp.task('set-dev', development.task);
gulp.task('set-prod', production.task);

// TASKS
gulp.task('dev', ['set-dev', 'scss', 'js', 'img', 'fonts', 'webserver', 'watch']);
gulp.task('devv', ['set-dev', 'scss', 'js', 'img', 'fonts', 'watch']);
gulp.task('prod', ['set-prod', 'scss', 'js', 'img', 'fonts']);
