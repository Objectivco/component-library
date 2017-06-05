---
title: Accordion
layout: component
path_slug: accordion
category: ui
iframe_height: medium
---

Accordions are used widely throughout our sites. Often, they are used as a ACF Flexible Section.

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

## Advanced Custom Fields
If working with ACF, you will want to utilize the following fields:

**Repeater Field: accordion**

Fields:
* Text: accordion_header
* Text: accordion_label
* WYSIWYG: accordion_content

## Markup

{% include partials/tabs.md %}

## Styles

### CSS
```css
{% include_relative css/component.css %}
```

### Sass
```scss
{% include_relative css/component.scss %}
```

## Javascript
### Plugin
```js
{% include_relative js/component.js %}
```
### Usage
```js
{% include_relative js/component-usage.js %}
```