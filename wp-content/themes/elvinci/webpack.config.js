const Webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const StylelintPlugin = require('stylelint-webpack-plugin');

const PATH_ASSETS = path.resolve(__dirname, 'assets');
const WP_URL = process.env.WP_URL || 'http://elvinci.loc/';
const DEV_HTTP_PORT = process.env.DEV_HTTP_PORT || 8080;

module.exports = {
    entry: {
        scripts: './src/scripts/app.js',
    },

    output: {
        filename: 'js/[name].js',
        path: PATH_ASSETS
    },
    mode: 'production',
    externals: {
        jquery: 'jQuery',
    },
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                            publicPath: '../',
                        },
                    },
                    'css-loader',
                    'resolve-url-loader',
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    },
                ],
            },

            {
                test: /\.(png|jpg|gif|svg)$/,
                type: 'asset/resource',
                generator: {
                    filename: './assets/img/[name][ext]',
                }
            },
        ]
    },

    plugins: [
        new Webpack.ProvidePlugin(
            {
                $: 'jquery',
                jQuery: 'jquery',
                'window.jQuery': 'jquery'
            }
        ),
        new MiniCssExtractPlugin({
            filename: 'styles/styles.css',
            chunkFilename: 'styles/[id].css'
        }),
        new CssMinimizerPlugin(),
        new BrowserSyncPlugin({
            files: [
                path.resolve(__dirname, 'assets/**/*'),
                path.resolve(__dirname, '*.php'),
            ],
            proxy: WP_URL,
            port: DEV_HTTP_PORT,
            ui: false,
            ghostMode: false,
        }),
        new StylelintPlugin({
            context: './src',
            failOnError: false
        })
    ],
};
