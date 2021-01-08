const webpack = require('webpack');
const RemoveStrictPlugin = require('remove-strict-webpack-plugin');
module.exports = {
  // モード値を production に設定すると最適化された状態で、
  // development に設定するとソースマップ有効でJSファイルが出力される
  // mode: "production",
  // 開発用
  mode: "development",

  // ファイルを編集ごとに自動バンドル
  watch: true,
  watchOptions: {
    ignored: /node_modules/
  },

  // ソースマップ（ウェブ上で参照できデバッグし易い）
  // devtool: 'inline-source-map',
  // メインのJS
  entry: {
    common: "./src/js/common.js",
    top: "./src/js/top.js"
  },

  // 出力ファイル
  output: {
    filename: "[name].bundle.js"
    // '[name]' 任意の名前
  },

  // // jQUeryの読み込み
  plugins: [
  new RemoveStrictPlugin(),// use strictの削除（IE11)
  new webpack.ProvidePlugin([
    '$', 'jquery',
    'jquery', 'jquery',
    'window.$', 'jquery',
    ]),
  ],

  resolve: {
    modules: ["./node_modules"]
  },

  module: {
    rules: [{
      test: /\.js$/,
      exclude: /node_modules\/(?!(dom7|ssr-window|swiper)\/).*/,
      use: [{
        // use babel
        loader: 'babel-loader',
        options: {
          presets: [
            // プリセットを指定しES2018 を ES5 に変換
            '@babel/preset-env'
          ]
        }
      }]
    }]
  }
}