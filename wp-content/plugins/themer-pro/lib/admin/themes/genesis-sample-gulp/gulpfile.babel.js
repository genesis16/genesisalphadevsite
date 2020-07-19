import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import sass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import zip from "gulp-zip";
import info from "./package.json";
import wpPot from "gulp-wp-pot";
const PRODUCTION = yargs.argv.prod;

export const primaryStyles = () => {
  return src('src/scss/style.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'));
}

export const frontEndStyles = () => {
  return src('src/scss/front-end.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'));
}

export const styleEditorStyles = () => {
  return src('src/scss/style-editor.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([ autoprefixer ])))
    .pipe(gulpif(PRODUCTION, cleanCss({compatibility:'ie8'})))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('dist/css'));
}

export const scripts = () => {
  return src('src/js/scripts.js')
    .pipe(named())
    .pipe(webpack({
      module: {
        rules: [
          {
            test: /\.js$/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: []
            }
          }
        }
      ]
    },
    mode: PRODUCTION ? 'production' : 'development',
    devtool: !PRODUCTION ? 'inline-source-map' : false,
    output: {
      filename: '[name].js'
    },
    externals: {
      jquery: 'jQuery'
    },
  }))
  .pipe(dest('dist/js'));
}

export const images = () => {
  return src('src/scss/images/**/*.{jpg,jpeg,png,svg,gif,ico}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('dist/css/images'));
}

export const copy = () => {
  return src(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'])
    .pipe(dest('dist'));
}

export const clean = () => del(['dist']);
export const clean_images = () => del(['dist/css/images']);

export const watchForChanges = () => {
  watch('src/scss/partials/**/*.scss', primaryStyles);
  watch('src/scss/front-end.scss', frontEndStyles);
  watch('src/scss/style-editor.scss', styleEditorStyles);
  watch('src/scss/images/**/*.{jpg,jpeg,png,svg,gif,ico}', series(clean_images, images));
  watch(['src/**/*','!src/{images,js,scss}','!src/{images,js,scss}/**/*'], copy);
  watch('src/js/**/*.js', scripts);
}

export const compress = () => {
return src([
  "**/*",
  "!node_modules{,/**}",
  "!bundled{,/**}",
  "!src{,/**}",
  "!.babelrc",
  "!.gitignore",
  "!gulpfile.babel.js",
  "!package.json",
  "!package-lock.json",
  ])
  .pipe(zip(`${info.name}.zip`))
  .pipe(dest('bundled'));
};

export const pot = () => {
  return src("**/*.php")
  .pipe(
      wpPot({
        domain: "_themename",
        package: info.name
      })
    )
  .pipe(dest(`languages/${info.name}.pot`));
};

export const dev = series(clean, parallel(primaryStyles, frontEndStyles, styleEditorStyles, images, copy, scripts), watchForChanges);
export const build = series(clean, parallel(primaryStyles, frontEndStyles, styleEditorStyles, images, copy, scripts), pot, compress);
export default dev;