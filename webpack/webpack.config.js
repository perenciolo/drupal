const path = require('path');
const loaders = require('./loaders');
const paths = require('./paths');
const plugins = require('./plugins');

module.exports = {
  context: path.resolve(__dirname, '../'),
  entry: [`${paths.folders.scripts.src}app.js`],
  module: {
    rules: [
      loaders.CSSLoader,
      loaders.ESLintLoader,
      loaders.JSLoader,
    ]
  },
  plugins: [
    plugins.StyleLintPlugin,
    plugins.MiniCssExtractPlugin,
  ],
  output: {
    path: path.resolve(__dirname, `../${paths.base.src}`),
    filename: "javascript/[name].bundle.js"
  }
}
