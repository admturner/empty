# Changelog: Bream - A WordPress Starter Theme

Author: Adam Turner
URI: https://github.com/admturner/bream/

This document details all notable changes to the Bream WordPress theme. It uses [Semantic Versioning](http://semver.org/).

<!--
## Major.MinorAddorDeprec.Bugfix (YYYY-MM-DD)

### Todo (for upcoming changes)
### Security (in case of fixed vulnerabilities)
### Fixed (for any bug fixes)
### Changed (for changes in existing functionality)
### Added (for new features)
### Deprecated (for once-stable features removed in upcoming releases)
### Removed (for deprecated features removed in this release)
-->

## 0.4.0-alpha-4 (:construction: WIP 2019-06-26)

### Added

- Template function to conditionally add body classes.
- :sparkles: All of the base template files and template parts.
- A footer widget area.
- Contribution guidelines and process in CONTRIBUTING.md in a new `.github` directory.
- Template tag functions file at `includes/template-tags.php` to handle custom template printing functions.
- Helper functions file at `includes/helper-functions.php` to handle internal helper methods.
- Options file at `includes/options-functions.php` to handle getting and setting theme options.
- Template functions file at `includes/template-functions.php` to handle functions that modify WordPress defaults using hooks.
- :wrench: Webpack configuration file.
- :wrench: PostCSS package configuration file.
- :construction_worker: Add Travis CI configuration file.
- NVM version file to pin version.
- :wrench: Config file for the `npm-package-json-lint` package.
- A `.gitattributes` file to ignore build tools when downloading the project as a zip archive.
- Head matter and 118n instructions to README.md file.
- Languages directory for i18n files.

### Changed

- Update footer site info.
- Set main `./style.css` to an empty placeholder for theme metadata.
- :warning: Fix PHP and CSS lint issues.
- :truck: Reorganize source CSS, JS, and image directories.
- :recycle: Refactor functions.php to handle theme setup.
- :wrench: Replace Sass- and Uglify-based build tools with postCSS- and Webpack-based build tools using WordPress babel, eslint, and jest configuration defaults. Refactor to meet npm-package-json-lint coding standards.
- :heavy_plus_sign: :heavy_minus_sign: Replace 'squizlabs' php codesniffer with 'dealerdirect' dependency and upgrade wpcs coding standards dependency.
- :wrench: Reformat Composer scripts to use phpcs.xml.dist config.
- Simplify and update gitignore file for WP 5.0+ build changes.
- :wrench: Update phpcs lint configuration and rules for WP 5.0+.
- :wrench: Use `stylelint-config-wordpress` rules in place of fully manual stylelint rules.
- :wrench: Use `@wordpress/eslint-plugin/recommended` rules in place of previous mixed eslint rules.
- Standardize editorconfig file.

### Removed

- :boom: Remove theme setup class (disperse class methods among functions.php and helper files in `/includes`).
- Old style guide JS and CSS guideline files.
- :fire: Jekyll-based embedded docs site.
- :fire: Remove robots.txt sample from the theme.

## 0.3.2 (2018-07-12)

### Fixed

- Switch from global variable to getter method for Bream theme version to fix #3.

## 0.3.1 (2018-07-12)

### Fixed

- Overzealous find-and-replace changed "empty" to "bream" in lint configs. Oops.

### Changed

- Move theme setup methods to a dedicated class.
- Organizing baseline Sass files.
- Trim base functions file to bare necessities.

### Added

- Default global views with `header.php`, `index.php`, and `footer.php`.
- Image directories with Bream logo assets.
- Preliminary customizer.js file.

## 0.2.0 (2018-03-09)

### Changed

- Move `guidelines.js` to the `style-guide/` directory for use as a reference and testing resource.
- Change phpcs npm script so that it checks the `includes/` and `template-parts/` directories.
- Change phpcs npm script so that it aborts the build process if it returns an error.
- Move `guidelines.scss` to the `style-guide/` directory for use as a reference and testing resource.
- Update stylelint to require `line-height` to be unitless.
- Update stylelint to allow comments with URLs to exceed 80 charaters.
- Update stylelint to prevent camelCase selectors in CSS.
- Update npm dev dependency versions.
- Add .ylm extension to .stylelint for more directed syntax highlighting.

### Added

- NPM script to test the lint config rules on the `guidelines.*` files in the style-guide directory.
- NPM scripts to handle running complete test and build tasks.
- NPM script to handle minifying and compressing svgs as well as copying images (to later minify them as well).
- svgo npm dependency for SVG processing.

## 0.1.0 (2018-02-23)

### Added

- First commit with general build tasks defined but no PHP to speak of yet.
- NPM scripts for sass to css processing and autoprefixing to include minification.
- A `src` directory for pre-build assets like Sass files, human-readable JavaScript, and uncompressed images.
- Start installation instructions in the readme file.
- Use browserslist in package.json to specify target browsers for autoprefixer (and for potential future use of eslint-plugin-compat for ESLint and stylelint-no-unsupported-browser-features for Stylelint).
- NPM method to minify css rather than rely on Sass's compress flag, which doesn't do as good a job.
- NPM script for stylelint to lint scss files.
- NPM script for uglifyjs to mangle and compress (and concatenate) js files.
- NPM script to run eslint on source js files for js linting and coding standards.
- Eslint config file (`.eslintrc.json`) with rules to enforce WP coding standards.
- NPM script to run php codesniffer.
- Config files for git and build tools.
- Sample `guidelines.scss` to test style linting and Sass processing.
