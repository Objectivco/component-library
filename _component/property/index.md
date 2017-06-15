---
title: Property
layout: component
path_slug: property
category: content
iframe_height: medium
---

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>


## Markup
We are only including the HTML markup for this component. This is because the information for this component can come from multiple different sources. We use the SimplyRETS API so that we can have complete control over the data when displaying real estate properties.

```html
{% include_relative component.html %}
```

## Styles

### CSS
```css
{% include_relative css/component.css %}
```