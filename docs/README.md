# Documentation

*Experimental, Under Development*

A Jekyll-based documentation site with a pattern library using Custom Elements and Shadow DOM for encapsulation.

## Contents

Coming.

### Layouts

Refers to files within the `_layouts` directory, that define the markup for your theme.

  - `default.html`: This base layout sets the foundation for all other layouts. The dependent content layouts insert their contents into this file at the `{{ content }}` line and link this layout via the [FrontMatter](https://jekyllrb.com/docs/frontmatter/) declaration `layout: default`.
    - `home.html`: The content layout for the home/index page.
    - `page.html`: The content layout for pages that are not posts.
    - `patterns.html`: The content layout to display the pattern library content. This layout template includes the JavaScript and CSS scripts to generate the `pattern-demo` custom element and shadow DOM.
    - `post.html`: The layout for chronologically organized pages (that is, posts).

### Includes

Snippets of code you can insert in multiple layouts (or just about any other file) within the same theme. These are all in the `_includes` directory.

  - `disqus_comments.html`: Code to markup disqus comment box. Forked from the default Minima theme.
  - `footer.html`: Defines the contents of the site's global footer section.
  - `google-analytics.html`: Prints the Google Analytics module (active only in the production environment).
  - `head.html`: Code-block that defines the global `<head></head>` content, called by the *default* layout.
  - `header.html`: Defines the site's global header section. By default, pages with a defined `title` attribute will have links displayed here.

### Sass

The `.scss` files within the `_sass` directory define the theme's styles. They are compiled by the `main.scss` file in the `assets/css/` directory.

  - `all.scss`: The core file that defines the variable defaults used for the UI theme and imports the sass partials from `_sass/partials`.
    - `partials/_base.scss`: Resets and defines base styles for HTML elements.
    - `partials/_layout.scss`: Defines the visual style for various layouts.
    - `partials/_syntax-highlighting.scss`: Defines the styles for syntax-highlighting.

### Assets

Contains the theme asset files including CSS, images, and JavaScript.

  - `css/`: Subdirectory containing `main.scss`, which imports Sass files from the `_sass` directory. This `main.scss` is processed into the theme's main stylesheet, `main.css`, called by `_layouts/default.html` via `_includes/head.html`.
  - `images/`: Subdirectory containing theme images.
  - `js`: Subdirectory containing JavaScript for the theme.

### Plugins

Coming.

## Usage

Coming.

### Customize navigation links

This allows you to set which pages you want to appear in the navigation area and configure order of the links.

For instance, to only link to the `about` and the `portfolio` page, add the following to you `_config.yml`:

```yaml
header_pages:
  - about.md
  - portfolio.md
```

--

### Change default date format

You can change the default date format by specifying `date_format` in `_config.yml`.

`date_format: "%b %-d, %Y"`

--

### Enabling comments (via Disqus)

Optionally, if you have a Disqus account, you can tell Jekyll to use it to show a comments section below each post.

To enable it, add the following lines to your Jekyll site:

```yaml
  disqus:
    shortname: my_disqus_shortname
```

You can find out more about Disqus' shortnames [here](https://help.disqus.com/customer/portal/articles/466208).

Comments are enabled by default and will only appear in production, i.e., `JEKYLL_ENV=production`

If you don't want to display comments for a particular post you can disable them by adding `comments: false` to that post's YAML Front Matter.

--

### Social networks

You can add links to the accounts you have on other sites, with respective icon, by adding one or more of the following options in your config:

```yaml
twitter_username: jekyllrb
github_username:  jekyll
dribbble_username: jekyll
facebook_username: jekyll
flickr_username: jekyll
instagram_username: jekyll
linkedin_username: jekyll
pinterest_username: jekyll
youtube_username: jekyll
googleplus_username: +jekyll
rss: rss

mastodon:
 - username: jekyll
   instance: example.com
 - username: jekyll2
   instance: example.com
```

--

### Enabling Google Analytics

To enable Google Anaytics, add the following lines to your Jekyll site:

```yaml
  google_analytics: UA-NNNNNNNN-N
```

Google Analytics will only appear in production, i.e., `JEKYLL_ENV=production`

--

### Enabling Excerpts on the Home Page

To display post-excerpts on the Home Page, simply add the following to your `_config.yml`:

```yaml
show_excerpts: true
```

## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/admturner/empty-style-guide. This project is intended to be a safe, welcoming space for collaboration, and contributors are expected to adhere to the [Contributor Covenant](http://contributor-covenant.org) code of conduct.

## Development

## License

The theme is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
