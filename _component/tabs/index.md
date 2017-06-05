---
title: Tabs
layout: component
layout: component
path_slug: tabs
category: ui
iframe_height: medium
---

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

## Advanced Custom Fields
If working with ACF, you will want to utilize the following fields:

**Repeater Field: `tabs`**

Fields:
* Text: `tab_title`
* WYSIWYG: `tab_content`

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