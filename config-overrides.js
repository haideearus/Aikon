const path = require('path');

module.exports = function override(config, env) {
  // se poate adauga un loader pentru fișierele de imagine
  config.module.rules.push({
    test: /\.(png|jpe?g|gif)$/i,
    use: [
      {
        loader: 'file-loader',
        options: {
          name: 'static/media/[name].[hash:8].[ext]',
        },
      },
    ],
  });

  return config;
};
