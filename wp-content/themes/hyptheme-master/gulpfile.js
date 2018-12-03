// =================================
// ========= Config ================
// =================================

// config gulp and dependencies.
var gulp                = require   ('gulp'),
    watch               = require   ('gulp-watch'),
    browserSync         = require   ('browser-sync'),
    sass                = require   ('gulp-sass'),   // scss compilator
    concat              = require   ('gulp-concat'), // create one big js-file theme.js
    uglify              = require   ('gulp-uglify'),// minificator
    imagemin            = require   ('gulp-imagemin'), //minify-any-image
    plumber             = require   ('gulp-plumber'), // looking mistake in Gulp
    notify              = require   ('gulp-notify'),  //
    autoprefixer        = require   ('gulp-autoprefixer'),
    sourcemaps          = require   ('gulp-sourcemaps'),
    cleanCSS            = require   ('gulp-clean-css'),
    del                 = require   ('del');


// Config of folder structure.
var source = './src';
var destination = './dist';


// config plumber notifications.
var plumberErrorHandler = {errorHandler: notify.onError ({
        title: 'Shit...',
        message : 'Error: <%= error.message %>'
    })
};


// =================================
// ==== Main Workflow  =============
// =================================

/**
 * Compile Vendor SCSS to CSS, and minify. (Third party code)
 */
gulp.task('sass-vendor', function ( ){
    gulp.src(source + '/vendor/scss/base.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS({compatibility: 'ie9'}))
        .pipe(concat('vendor.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(destination + '/css'))
        .pipe(browserSync.stream());
});


/**
 * Compile SCSS to CSS, and minify.
 */
gulp.task('sass', function ( ){
    gulp.src(source + '/scss/style.scss')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS({compatibility: 'ie9'}))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(destination + '/css'))
        .pipe(browserSync.stream());

});


/**
 * Compile Vendor JS , Concat and minify.
 */
gulp.task('js-vendor', function () {
    gulp.src(source + '/vendor/js/**/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('vendor.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(destination + '/js'))
        .pipe(browserSync.stream());

});


/**
 * Compile JS , Concat and minify.
 */
gulp.task('js', function () {
    gulp.src(source + '/js/**/*.js')
        .pipe(plumber(plumberErrorHandler))
        .pipe(sourcemaps.init())
        .pipe(uglify())
        .pipe(concat('dist.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(destination + '/js'))
        .pipe(browserSync.stream());
});


/**
 * Config browser sync (for Developer localhost) (we have different local URL's )
 */
gulp.task('browser-sync', function (){
    var files = [
        destination + '/style.css',
        // './**/*.html',
        './templates_parts/**/*.php'
    ] ;

    browserSync.init (files, {
        proxy: "sivenkoff",
        notify: false
    });
});

/**
 * Config browser sync (for Server)
 */
gulp.task('browser-sync-server', function (){
    browserSync.init ( {
        open: 'external',
        proxy: "sense.dev",
        host: "sense.dev",
        port: 8080
    });
});


/**
 * Copy fonts folder from src to dist. (does not remove files).
 * Will not be watched, after each change need to rerun gulp.
 * And if files were deleted, need to call "gulp delete-dist" and than gulp again.
 */
gulp.task('sync-fonts', function () {
    gulp.src([source + '/fonts/**/*', source + '/vendor/fonts/**/*'])
        .pipe(gulp.dest(destination + '/fonts'));

});




/**
 * Browser auto full refresh on php change.
 */
gulp.task('php', function () {
    browserSync.reload();
});


// =================================
// ==== Other Tasks  ===============
// =================================

/**
 * Smush Images from src and put them in dist.
 * Will not run automatically, need to run it manually with "gulp smush"
 */
gulp.task('smush', function () {
    gulp.src(source +'/img/**/*.{png,jpg,jpeg,gif,svg,ico}')
        .pipe(plumber(plumberErrorHandler))
        .pipe(imagemin ({
            optimizationLevel: 5,
            progressive: true
        }))
        .pipe(gulp.dest(destination + '/img'));
});


/**
 * Clean the dist folder (delete It completely)
 * Will not run automatically, need to run it manually with "gulp delete-dist"
 */
gulp.task('delete-dist', function () {
    del(destination);
});




// =================================
// ==== Define Watch ===============
// =================================

gulp.task ('watch', function (){
    gulp.watch(source + '/vendor/scss/**/*',['sass-vendor']);
    gulp.watch(source + '/scss/**/*',['sass']);
    gulp.watch(source + '/vendor/js/**/*',['js-vendor']);
    gulp.watch(source + '/js/**/*',['js']);
    gulp.watch('./../**/*.php',['php']);
});

gulp.task ('watchsassonly', function (){
    gulp.watch(source + '/scss/**/*',['sass']);
});

gulp.task ('watchsassphp', function (){
    gulp.watch(source + '/scss/**/*',['sass']);
    gulp.watch('./templates_parts/**/*.php',['php']);
});


// =================================
// ========= Commands ==============
// =================================

/**
 * Basic Commands
 * ----------------
 * gulp - Alex's workflow.
 * gulp jhonny - servers workflow
 *
 * Manual Commands
 * ------------------
 * gulp smush - will optimize all images.
 * gulp delete-dist - will delete the dist/output folder, after this command you should call gulp to rebuild it.
 *
 *
 */
//
//

//
//
//

// run "gulp" (for Alexander setup)
gulp.task ('default',[
    'sass-vendor',
    'sass',
    'js-vendor',
    'js',
    'sync-fonts',
    'watch',
    'browser-sync'
]);


// run "gulp easy" (for Alexander setup)
gulp.task ('compile',[
    'sass-vendor',
    'sass',
    'js-vendor',
    'js'
]);

// run "gulp sassonly" (for Alexander setup)
gulp.task ('easy',[
    'js',
    'sass',
    'watchsassonly'
]);

// run "gulp jhonny" ()
gulp.task ('server',[
    'sass-vendor',
    'sass',
    'js-vendor',
    'js',
    'sync-fonts',
    'watch',
    'browser-sync-server']);


// to refresh the project
// gulp delete-dist
// gulp smush
// gulp