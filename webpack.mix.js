const mix = require('laravel-mix');

/**
 * Asset directory paths.
 */
const src = 'assets/src';
const dist = 'assets/dist';

/**
 * Options and other Laravel Mix configs.
 */
mix.options({
  autoprefixer: {
    options: {
      browsers: ['last 2 versions'],
    },
  },
  terser: {
    extractComments: false,
  },
  processCssUrls: false,
}).setPublicPath(`${dist}`);

/**
 * CSS.
 */
mix.sass(`${src}/styles/unity-accordion.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-audio.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-blockquote.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-jump-link.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-image-carousel.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-lightbox.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-lightbox-gallery.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-numbers.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-tabs.scss`, `${dist}/styles`);
mix.sass(`${src}/styles/unity-video.scss`, `${dist}/styles`);

/**
 * JS.
 */
mix.js(`${src}/scripts/unity-accordion.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-audio.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-jump-link.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-image-carousel.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-lightbox.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-lightbox-gallery.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-numbers.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-tabs.js`, `${dist}/scripts`);
mix.js(`${src}/scripts/unity-video.js`, `${dist}/scripts`);

/**
 * Externally-loaded libraries.
 */
mix.webpackConfig({
  externals: {
    'jquery': 'jQuery',
    'modaal': 'Modaal',
  }
});

/**
 * Production build.
 */
if (mix.inProduction()) {
  mix.version();
}
