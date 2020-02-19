const { resolve, join } = require('path');
const { compilerOptions } = require ('./jsconfig.json');

const SRC = {
    BASE: './src/assets',
    JS: 'js',
    FONTS: 'fonts',
    STYLES: 'css',
    IMAGES: 'img'
};

const DIST = {
    ...SRC,
    BASE: './src/assets/dist',
}

module.exports = ({ mode = 'development' }) => ({
    mode,
    entry: {
        main: `${join(__dirname, SRC.BASE, SRC.JS)}/index`,
        treasure: `${join(__dirname, SRC.BASE, SRC.JS)}/treasure/index`,
        ['admin-admins']: `${join(__dirname, SRC.BASE, SRC.JS)}/admin/admins`,
        ['admin-settings']: `${join(__dirname, SRC.BASE, SRC.JS)}/admin/settings`,
        ['admin-pirates']: `${join(__dirname, SRC.BASE, SRC.JS)}/admin/pirates`,
        ['admin-dashboard']: `${join(__dirname, SRC.BASE, SRC.JS)}/admin/dashboard`,
        live: `${join(__dirname, SRC.BASE, SRC.JS)}/admin/live`,
    },
    output: {
        path: join(__dirname, DIST.BASE, DIST.JS),
        publicPath: join(__dirname, DIST.BASE, DIST.JS) + '/',
    },
    resolve: {
        extensions: ['.js'],
        alias: {
            ...Object.entries(compilerOptions.paths)
                .reduce((acc, [alias, [path]]) => ({
                    ...acc,
                    [alias.replace(/\/\*$/gi, '')]: join(__dirname, SRC.BASE, '/', path).replace(/\/\*$/gi, ''),
                }), {}),
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
                test: /\.(s?css)$/,
                use: [
                    'style-loader',
                    {
                        loader: 'css-loader',
                        options: {
                            import: true,

                        },
                    },
                    'sass-loader',
                ]
            },
            {
                test: /\.((j|t)sx?)$/,
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                }
            },
            {
                test: /\.(woff|woff2|eot|ttf|otf|svg)$/,
                loader: 'file-loader',
                options: {
                    name: '[name].[ext]',
                    outputPath: `../${DIST.FONTS}/`,
                    publicPath: `/${DIST.BASE}/${DIST.FONTS}/`,
                },
            },
        ],
    },
});
