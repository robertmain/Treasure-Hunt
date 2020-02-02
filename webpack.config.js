const { resolve, join } = require('path');

const SRC = {
    BASE: './src/assets/',
    JS: 'js/'
};

const DIST = {
    BASE: `${SRC.BASE}dist/`,
    JS: SRC.JS,
}

module.exports = ({ mode = 'development' }) => ({
    mode,
    entry: {
        main: `${SRC.BASE + SRC.JS}index`,
        treasure: `${SRC.BASE + SRC.JS}treasure/index`,
        ['admin-admins']: `${SRC.BASE + SRC.JS}admin/admins`,
        ['admin-settings']: `${SRC.BASE + SRC.JS}admin/settings`,
        ['admin-pirates']: `${SRC.BASE + SRC.JS}admin/pirates`,
        live: `${SRC.BASE + SRC.JS}admin/live`,
    },
    output: {
        path: resolve(DIST.BASE + DIST.JS),
        libraryTarget: 'umd',
    },
    resolve: {
        extensions: ['.js'],
        alias: {
            '@': join(__dirname, SRC.BASE + SRC.JS),
            'jquery': 'jquery-slim/dist/jquery.slim.js',
        },
    },
    optimization: {
        splitChunks: {
            chunks: 'initial',
            name: 'vendor',
        },
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: {
                  loader: 'babel-loader',
                }
            }
        ],
    },
});
