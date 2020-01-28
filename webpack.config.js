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
        main: [
            `${SRC.BASE + SRC.JS}vendor/jquery`,
            `${SRC.BASE + SRC.JS}vendor/bootstrap`,
            `${SRC.BASE + SRC.JS}utils/cookie`,
        ],
        treasure: [
            `${SRC.BASE + SRC.JS}treasure/index`,
        ],
        ['admin-admins']: `${SRC.BASE + SRC.JS}admin/admins`,
        ['admin-settings']: `${SRC.BASE + SRC.JS}admin/settings`,
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
