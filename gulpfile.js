const { task, series, parallel, src, dest, watch } = require('gulp');
const gulp        = require('gulp');
const sass        = require('gulp-sass');
const sassGlob    = require('gulp-sass-glob');
const stylus      = require('gulp-stylus');
const path        = require('path');
// 自動でcssをソート順にする
const postcss     = require('gulp-postcss');
const cssdeclsort = require('css-declaration-sorter');
// IE11に自動対応するための自動補完記述
const gulpAutoprefixer = require('gulp-autoprefixer');
const autoprefixer = require('autoprefixer');
// メディアクエリをまとめる
const gcmq = require('gulp-group-css-media-queries');
// error handling
const plumber     = require('gulp-plumber');
const sourcemaps  = require('gulp-sourcemaps');
const notify      = require(`gulp-notify`);
// browser launch
const browserSync = require('browser-sync');
// javascript minify
const uglify = require("gulp-uglify-es").default;
const cleanCSS = require('gulp-clean-css');
const babel = require('gulp-babel');
// sprite(not responsive)
const spritesmith = require('gulp.spritesmith');
// webpack setting
const webpack = require('webpack');
const webpackStream = require('webpack-stream');
const webpackConfig = require('./webpack.config.js');
// image min
const tinyping = require("gulp-tinypng-compress");
const imagemin = require('gulp-imagemin');
// jpg圧縮
const mozjpeg = require("imagemin-mozjpeg");
// png圧縮
const pngquant = require("imagemin-pngquant");
// 変更があるファイルだけ処理(未完成)
const changed = require('gulp-changed');
// Pug
const pug = require("gulp-pug");

const paths = {
  rootDir: "dist/",
  htmlSrc: "dist/html/*.html",
  jsSrc: "src/js/*",
  imgSrc: "src/image/*",
  cssSrc: "src/css/*.css",
  scssSrc: [
    "src/scss/**/*.scss"
  ],
  ignoreScssSrc: [
    "src/scss/*.scss",
    "src/scss/**/*.scss",
    "!src/scss/**/(_)*.scss"
  ],
  stylusSrc: ['stylus/*.styl','!stylus/_*.styl'],
  pugSrc: [
    "src/pug/*.pug",
    "src/pug/_config/*.pug",
    "src/pug/_element/*.pug",
    "src/pug/_layout/*.pug",
  ],
  ignorePugSrc: [
    "src/pug/!(_)*.pug",
    "src/pug/_config/!(_)*.pug",
    "src/pug/_element/!(_)*.pug",
    "src/pug/_layout/!(_)*.pug",
  ],
  outPug: "dist/html/",
  outCss: "dist/css/",
  outJs: "dist/js/",
  outImg: "dist/image/"
};

// webpack
function webpackFunc() {
  return plumber({
    errorHandler: notify.onError('エラー：<%= error.message %>'),
  })
  .pipe(webpackStream(webpackConfig, webpack))
  .pipe(babel())
  .pipe(uglify({}))
  .pipe(dest(paths.outJs))
  .pipe(notify({
    title: 'JSをバンドルしました。',
    message: new Date()
    }));
}

// Pug
function pugFunc(cb) {
  const pugOptions = {
    pretty: true,
    basedir: path.resolve(__dirname, 'src')
  };

  src(paths.ignorePugSrc)
  .pipe(plumber({
      errorHandler: notify.onError("エラー: <%= error.message %>")
    }))
  .pipe(pug(pugOptions))
  .pipe(dest(paths.outPug))
  .pipe(notify({
    title: 'Pugをコンパイルしました。',
    message: new Date()
    }));
  cb();
}

// scssコンパイルタスク
// ▼CSSdeclsortプロパティ一覧
// alphabetical   : アルファベット順（初期設定）
// smacss         : SMACSSが定義するレイアウトに最も重要な順に
// concentric-css : Concentric CSSが提唱するボックスモデルの外側から内側の順に
function sassFunc(cb) {
  var plugins = [
    autoprefixer({
      cascade: false,
      grid: true
    }),
    cssdeclsort()
  ];

  src(paths.ignoreScssSrc)
  .pipe(sassGlob())
  .pipe(plumber({
    errorHandler: notify.onError('エラー: <%= error.message %>'),
  }))
  .pipe(sass({outputStyle: 'expanded'}))
  .pipe(postcss(plugins))
  .pipe(gcmq())
  .pipe(dest(paths.outCss))
  .pipe(notify({
    title: 'Scssをコンパイルしました。',
    message: new Date()
    }));
  cb();
}

// image圧縮（仕様運転中）
function tinypngFuc(cb) {
  src(paths.imgSrc)
  .pipe(
    tinyping({
      key: "M7vQ0zkJMgXb3260ZrGp37QgLmWJpQZ3" // TinyPNGのAPI Key
    })
  )
  .pipe(dest(paths.outImg));
  cb();
}

// image圧縮（一旦使用停止中）
function imgminFunc(cb) {
  src(paths.imgSrc)
  .pipe(changed(paths.outImg))
  .pipe(dest(paths.outImg))
  .pipe(imagemin(
    [
      mozjpeg({
        quality: 85//画像圧縮率
      }),
      pngquant(),
      imagemin.svgo({
        plugins: [
          { removeViewBox: false },
          { removeMetadata: false },
          { removeUnknownsAndDefaults: false },
          { convertShapeToPath: false },
          { collapseGroups: false },
          { cleanupIDs: false }
        ]
      })
    ],
    {
      verbose: true
    }
  ))
  .pipe(dest(paths.outImg));
  cb();
}

//JS圧縮 ES6対応
function jsminFunc(cb) {
  plumber({
    errorHandler: notify.onError('<%= error.message %>'),
  })
  .pipe(webpackStream(webpackConfig, webpack))
  // .pipe(babel())
  // .pipe(uglify({}))
  .pipe(dest(paths.outJs));
  cb();
}

//CSS圧縮
function cssminFunc(cb) {
  src(paths.cssSrc)
  .pipe(cleanCSS())
  .pipe(dest(paths.outCss));
  cb();
}

// ブラウザリロード
function reloadFunc(cb) {
  browserSync.init({
    server: {
      baseDir: './dist/',//対象ディレクトリ
      routes: {
        '/html': 'dist'
      }
    },
    startPath: '/html/'
  });
  cb();
}

function watchFunc(cb) {
  const reload = () => {
    browserSync.reload();
  };

  watch(paths.htmlSrc).on('change', gulp.series(reload));
  watch(paths.pugSrc).on('change', gulp.series(pugFunc,reload));
  watch(paths.scssSrc).on('change', gulp.series(sassFunc,reload));
  watch(paths.imgSrc).on('change', gulp.series(tinypngFuc, reload));
  watch(paths.jsSrc).on('change', gulp.series(reload));
  cb();
}

exports.j = webpackFunc;
exports.c = cssminFunc;
exports.default = series(sassFunc, pugFunc, tinypngFuc, imgminFunc, watchFunc, reloadFunc);