---
title: Mobile Menu
layout: component
path_slug: mobile-menu
category: navigation
iframe_height: large
---
This implementation uses `classList` which is not fully supported in all browsers (stupid IE). If you need it, you should pull in the the [polyfill](https://developer.mozilla.org/en-US/docs/Web/API/Element/classList).

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

## Markup
```html
{% include_relative component.html %}
```

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