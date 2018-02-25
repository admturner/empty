# Changelog: Empty - A WordPress Starter Theme

Author: Adam Turner
URI: https://github.com/admturner/empty/

This document details all notable changes to the Empty WordPress theme. It uses [Semantic Versioning](http://semver.org/).

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

## 0.2.0 (unreleased)

### Changed

- Add .ylm extension to .stylelint for more directed syntax highlighting.

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
