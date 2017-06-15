---
title: Person
layout: component
path_slug: person
category: content
iframe_height: large
---

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

## Markup
```html
{% include_relative component.html %}
```