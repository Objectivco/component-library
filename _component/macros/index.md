---
title: Macros
layout: component
path_slug: macros
category: twig
---

We love Twig and have created a few Macros that help make things a bit easier for us. One thing to note when working with Macros and Twig is that you need to import the macro everywhere you need it. If you use an `embed` or `block` within your Twig file, you need to call the Macro import within that `embed` or `block`. You can't add a macro import at the top of the file and expect to use it wherever.

By the way, all of this is built into the [starter theme](https://github.com/Objectivco/objectiv-starter-theme) already.

<nav class="PageNav">
    <a href="#responsive-images">Responsive Images</a>
    <a href="#svg-icons">SVG Icons</a>
</nav>

## Classes
We utilize this Macro within the Image and SVG Icons Macros. It takes an array of classes and outputs them appropriately in the Macros.

```twig
{% raw %}{% import '_macros/_classAttr.twig' as m_classAttr %}
{{m_classAttr.classAttr('className')}}{% endraw %}
```

#### Macro
```twig
{% raw %}{% macro classAttr(classes) %}
    {%- if (classes|length) -%}
        class="{{ classes|join(' ') }}"
    {%- endif -%}
{% endmacro %}{% endraw %}
```

## Responsive Images
If you need to work with responsive images use our nifty responsive macro. You can create fixed width images that will generate retina read markup or variable width images with multiple src sets.


### Fixed Width Images
This macro takes 3 parameters:

1. Integer: Image's ID
2. Integer: The width that you want the image to be displayed in
3. Object: Object that takes an alt and class value for outputting the markup

```twig
{% raw %}{% import '_macros/_img.twig' as m_img %}
{{m_img.fixed(imageId, 100, {alt: 'post thumbnail', class: ['fixed']})}}{% endraw %}
```

#### Macro
```twig
{% raw %}{# Create a fixed width responsive image #}
{% macro fixed(assetId, width, options={}) %}
    {% import '_macros/_classAttr.twig' as m_classAttr %}
    
    {# merge the options with the options parameter #}
    {% set options = {
        alt: 'alt',
        class: []
    } | merge(options) %}

    {# Get the asset meta data from WP #}
    {% set assetArray = function('wp_get_attachment_image_src', assetId, 'full') %}
    {% set assetUrl = assetArray[0] %}
    {% set assetMetaData = function('wp_get_attachment_metadata', assetId) %}
    {% set assetNativeWidth = assetMetaData.width %}
    

    <img
        {% if (assetNativeWidth <= width) %}
            src="{{assetUrl}}"
        {% else %}
            src="{{assetUrl|resize(width)}}"
        {% endif %}

        {% if (width*2 == assetNativeWidth) %}
            srcset="{{assetUrl}} 2x"
        {% elseif (width*2 < assetNativeWidth) %}
            srcset="{{assetUrl|resize(width*2)}} 2x"
        {% endif %}

        alt="{{options.alt}}"
        {{m_classAttr.classAttr(options.class)}}
    />

{% endmacro %}{% endraw %}
```

### Responsive Image
This macro takes 3 parameters:

1. Integer: Image's ID
2. Integer: The width that you want the image to be displayed in
3. Object: Object that takes an alt and class value for outputting the markup

```twig
{% raw %}{% import '_macros/_img.twig' as m_img %}
{{m_img.responsive(imageId, {alt: 'post thumbnail', class: ['responsive']})}}{% endraw %}
```

#### Macro
```twig
{% raw %}{# Create a variable width responsive image #}
{% macro responsive(assetId, options={}) %}
    {% import '_macros/_classAttr.twig' as m_classAttr %}
    {# merge the options with options parameter #}
    {% set options = {
        alt: 'alt',
        class: [],
        style: 'default',
    } | merge(options) %}

    {# Get the asset meta data from WP #}
    {% set assetArray = function('wp_get_attachment_image_src', assetId, 'full') %}
    {% set assetUrl = assetArray[0] %}
    {% set assetMetaData = function('wp_get_attachment_metadata', assetId) %}
    {% set assetNativeWidth = assetMetaData.width %}

    {# Image Config
     # Make sure to update the configs to what fits for each site.
     #}
    {% set config = {
        default: {
            srcsetWidths: [640, 1024, 1600],
            sizes: [
                '(min-width: 900px) 1025px',
                '100vw'
            ],
            defaultWidth: 1024
        }
    } %}

    {# Let's get the style that is sent through as parameter #}
    {% set params = config[options.style] %}
    {% set srcset = [] %}

    {# Create the srcset #}
    {% for width in params['srcsetWidths'] %}
        {% set srcset = srcset|merge([assetUrl|resize(width) ~ ' ' ~ width ~ 'w']) %}
    {% endfor %}

    <img 
        {% if (assetNativeWidth <= params['defaultWidth']) %}
            src="{{assetUrl}}"
        {% else %}
            src="{{assetUrl|resize(width)}}"
        {% endif %}

        srcset="{{srcset|join(', ')}}"
        sizes="{{params['sizes']|join(', ')}}"

        alt="{{options.alt}}"

        {{m_classAttr.classAttr(options.class)}}
    />

{% endmacro %}{% endraw %}
```

## SVG Icons
Just like the image macro the SVG macro will output an inline SVG element for you. There are a few requirements to use this macro. You must compile all of your SVG files into a single SVG sprite file with specific ID for each single SVG Icon. We use IcoMoon to generate our SVG icons store them in a directory within the theme and then use Gulp to generate the sprite for us. 

The SVG Macro takes an object as its parameter with the required key value of `icon` with the file name of the SVG icon passed through as the value.

```twig
{% raw %}{% import '_macros/_svg.twig' as m_svg %}
{{m_svg.svg({icon: 'facebook-square', title: 'Facebook', desc: 'Facebook Icon'})}}{% endraw %}
```

#### Macro
```twig
{% raw %}{% macro svg(options={}) %}
    {# merge the options with passed in options #}
    {% set options = {
        icon: 'facebook-square',
        title: 'Facebook',
        desc: ''
    } | merge(options) %}

    {% set title = options.title ? options.title : options.icon %}
    {% set ariaHidden = ' aria-hidden="true"' %}

    <svg class="icon icon-{{options.icon}}" {{ariaHidden}} role="img">
        <title>{{options.title}}</title>
        {% if options.desc %}
            <desc>{{options.desc}}</desc>
        {% endif %}
        <use xlink:href="#icon-{{options.icon}}"></use>
    </svg>
{% endmacro %}{% endraw %}
```

#### Gulp
```js
var gulp = require('gulp');
var svgmin = require( 'gulp-svgmin' );
var svgstore = require( 'gulp-svgstore' );
var del = require( 'del' );
var cheerio = require( 'gulp-cheerio' );

/**
 * Task to concat and compile svg into a single file
 */
gulp.task('svg', function() {
    gulp.src('assets/icons/svg-icons/*.svg')
        .pipe(svgmin())
        .pipe(rename({prefix: 'icon-'}))
        .pipe(svgstore({inlineSvg: true}))
        .pipe(cheerio({
            run: function($, file) {
                $('svg').attr('style', 'display: none');
                $('[fill]').removeAttr('fill');
                $('path').removeAttr('class');
            },
            parserOptions: {xmlMode: true}
        }))
        .pipe(gulp.dest('assets/icons'))
})

gulp.task( 'icons', [ 'svg' ] );
```

