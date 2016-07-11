// var path = require('path');
var webpack = require('webpack');

module.exports = {
    devtool: "source-map",
    // entry: "js/app.js",
    output: {
        // path: path.join(__dirname, '/assets/js/builds'),
        filename: "app.bundle.js"
    },
    plugins: [new webpack.optimize.UglifyJsPlugin()],
}