const path = require('path');
const UglifyJSPlugin = require('uglifyjs-webpack-plugin');
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const extractSass = new ExtractTextPlugin({
  filename: "../css/[name].min.css",
});

module.exports = {
  entry: {
     admin: './assets/js/admin.js',
     public: './assets/js/public.js',
  },
  plugins: [
    new UglifyJSPlugin(),
    extractSass
  ],
  output: {
    filename: '[name].min.js',
    path: path.resolve(__dirname, 'assets/js')
  },
  externals: {
    jquery: 'jQuery'
  },
  module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)/,
          use: {
            loader: 'babel-loader',
            options: {
              presets: ['babel-preset-env']
            }
          }
        },
        {
          test: /\.(css|scss|sass)$/,
          use: extractSass.extract({
              use: [{
                  loader: "css-loader",
                  options: {
                    minimize: true
                  }
              }, {
                  loader: "sass-loader"
              }],
              fallback: "style-loader"
          })
        }
      ]
    }
};