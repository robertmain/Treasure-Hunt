const { resolve } = require('path');

module.exports = ({ mode = 'development' }) => ({
    mode,
    entry: {
        main: [
            './src/assets/js/vendor/jquery.js',
            './src/assets/js/vendor/bootstrap.js',
            './src/assets/js/utils/cookie.js',
        ],
    },
    output: {
        path: resolve('./src/assets/dist/js'),
        libraryTarget: 'umd',
    },
    resolve: {
        extensions: ['.js'],
    },
    optimization: {
        splitChunks: {
            chunks: 'initial',
            name: 'vendor',
        },
    },
});
