let preprocessor = 'sass'; // Preprocessor (sass, scss, less, styl)
let fileswatch   = 'html,htm,txt,json,md,woff2'; // List of files extensions for watching & hard reload (comma separated)
let imageswatch  = 'jpg,jpeg,png,webp,svg'; // List of images extensions for watching & compression (comma separated)

const { src, dest, parallel, series, watch } = require('gulp');
const sass         = require('gulp-sass');
const scss         = require('gulp-sass');
const less         = require('gulp-less');
const styl         = require('gulp-stylus');
const smartgrid = require("smart-grid");
const cleancss     = require('gulp-clean-css');
const concat       = require('gulp-concat');
const browserSync  = require('browser-sync').create();
const uglify       = require('gulp-uglify-es').default;
const autoprefixer = require('gulp-autoprefixer');
const imagemin     = require('gulp-imagemin');
const newer        = require('gulp-newer');
const rsync        = require('gulp-rsync');
const del          = require('del');

// Local Server

function browsersync() {
	browserSync.init({
		server: { baseDir: 'app' },
		notify: false,
		// online: false, // Work offline without internet connection
	})
}

// Custom Styles

function styles() {
	return src('app/' + preprocessor + '/main.*')
	.pipe(eval(preprocessor)())
	.pipe(concat('app.min.css'))
	.pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true }))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } }))
	.pipe(dest('app/css'))
	.pipe(browserSync.stream())
}

function grid (cb) {
    smartgrid("app/sass/", {
    outputStyle: 'sass', /* less || scss || sass || styl */
    filename: "_smart-grid",
    columns: 12, /* number of grid columns */
    offset: '16px', /* gutter width px || % || rem */
    mobileFirst: false, /* mobileFirst ? 'min-width' : 'max-width' */
    container: {
        maxWidth: '1200px', /* max-width оn very large screen */
        fields: '20px' /* side fields */
    },

    breakPoints: {
        xl: {
            width: '1200px' /* -> @media (max-width: 1100px) */
        },
        lg: {
            width: '984px'
        },
        md: {
            width: '768px'
            //fields: '15px' /* set fields only if you want to change container.fields */
        },
        sm: {
            width: '480px'
        },
        xs: {
            width: '320px'
        }
        /* 
        We can create any quantity of break points.

        some_name: {
            width: 'Npx',
            fields: 'N(px|%|rem)',
            offset: 'N(px|%|rem)'
        }
        */
    }
	});

	cb();
}

// Scripts & JS Libraries

function scripts() {
	return src([
		// 'node_modules/jquery/dist/jquery.min.js', // npm vendor example (npm i --save-dev jquery)
		'app/js/app.js' // app.js. Always at the end
		])
	.pipe(concat('app.min.js'))
	.pipe(uglify()) // Minify JS (opt.)
	.pipe(dest('app/js'))
	.pipe(browserSync.stream())
}

// Images

function images() {
	return src('app/images/src/**/*')
	.pipe(newer('app/images/dest'))
	.pipe(imagemin())
	.pipe(dest('app/images/dest'))
}

function cleanimg() {
	return del('app/images/dest/**/*', { force: true })
}

// Deploy

function deploy() {
	return src('app/')
	.pipe(rsync({
		root: 'app/',
		hostname: 'username@yousite.com',
		destination: 'yousite/public_html/',
		// include: ['*.htaccess'], // Included files
		exclude: ['**/Thumbs.db', '**/*.DS_Store'], // Excluded files
		recursive: true,
		archive: true,
		silent: false,
		compress: true
	}))
}

// Watching

function startwatch() {
	watch('app/' + preprocessor + '/**/*', parallel('styles'));
	watch(['app/**/*.js', '!app/js/*.min.js'], parallel('scripts'));
	watch(['app/**/*.{' + imageswatch + '}'], parallel('images'));
	watch(['app/**/*.{' + fileswatch + '}']).on('change', browserSync.reload);
}

exports.browsersync = browsersync;
exports.assets      = series(cleanimg, styles, scripts, images);
exports.styles      = styles;
exports.grid        = grid;
exports.scripts     = scripts;
exports.images      = images;
exports.cleanimg    = cleanimg;
exports.deploy      = deploy;
exports.default     = parallel(images, styles, scripts, browsersync, startwatch);
