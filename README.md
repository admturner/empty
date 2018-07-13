# Bream

<img src="/assets/images/bream.svg" alt="Bream logo of a pink fish spelled with the word Bream." width="100" height="100" style="float:right;">

A WordPress starter theme. It's more-or-less empty. It has a bunch of testing files and configurations ready for you to make your own.

## For Developers

@todo Explain the directory structure, build process, and build and testing tools.

### Initial Setup

#### Naming Things

@todo Explain what things to rename.

#### Build Tools

1. Install the NPM dependencies.
2. Install the Composer dependencies.
3. Ensure PHP coding standards are properly sniffed.
4. Ensure SASS files are properly linted.
5. Ensure JS files are properly linted and sniffed.

In a terminal:

~~~
npm install
composer install
npm run phpcs
npm run lintscss
npm run lintjs
~~~

### Internationalization

Place your theme language files in the `languages/` directory. You'll find the base `.pot` file there.

Please refer to the following resources to learn more about translating WordPress themes:

* https://codex.wordpress.org/I18n_for_WordPress_Developers
* https://make.wordpress.org/polyglots/teams/
* https://developer.wordpress.org/themes/functionality/localization/
* https://developer.wordpress.org/reference/functions/load_theme_textdomain/

If using VVV for development, you already have the WordPress i18n tools installed in the WordPress development version (likely installed at `{vvv root}/www/wordpress-develop/`). These tools include a php script (called `makepot.php`) that'll use the `xgettext` utility to generate a `.pot` file for your theme.

1. In a terminal navigate to `/www/wordpress-develop/public_html/tools/i18n`
2. Generate a .pot file for your theme with the command: `php makepot.php wp-theme ../../src/wp-content/themes/bream`
3. Move the `.pot` file into the theme languages directory manually or with `mv bream.pot ../../src/wp-content/themes/bream/languages/`

### License

**Bream** is copyright 2017 Adam Turner [https://adamturner.org/](https://adamturner.org/) under a GNU General Public License version 3 or later.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software
Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
