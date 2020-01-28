const { resolve, join } = require('path');

module.exports = ({ mode = 'development' }) => ({
    mode,
    entry: {
        main: [
            './src/assets/js/vendor/jquery.js',
            './src/assets/js/vendor/bootstrap.js',
            './src/assets/js/utils/cookie.js',
        ],
        treasure: [
            './src/assets/js/treasure/index'
        ],
        ['admin-admins']: './src/assets/js/admin/admins',
        ['admin-settings']: './src/assets/js/admin/settings',
        live: './src/assets/js/admin/live',
    },
    output: {
        path: resolve('./src/assets/dist/js'),
        libraryTarget: 'umd',
    },
    resolve: {
        extensions: ['.js'],
        alias: {
            '@': join(__dirname, 'src/assets/js'),
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
