const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const paths = require('./paths');

const CSSLoader = {
  test: /\.css$/,
  exclude: /node_modules/,
  use: [{
      loader: MiniCssExtractPlugin.loader,
      options: {
        publicPath: __dirname + paths.folders.styles.maps
      }
    },
    {
      loader: 'css-loader',
      options: {
        importLoaders: 1
      }
    },
    {
      loader: 'postcss-loader',
      options: {
        config: {
          path: `${__dirname}/postcss.config.js`
        }
      }
    }
  ]
};

const ESLintLoader = {
  test: /\.js$/,
  enforce: 'pre',
  exclude: /node_modules/,
  use: {
    loader: 'eslint-loader',
    options: {
      configFile:  `.eslintrc.json`
    }
  }
};

const JSLoader = {
  test: /\.js$/,
  exclude: /node_modules/,
  use: {
    loader: 'babel-loader',
    options: {
      presets: ['@babel/preset-env']
    }
  }
};

module.exports = {
  CSSLoader: CSSLoader,
  ESLintLoader: ESLintLoader,
  JSLoader: JSLoader,
};
