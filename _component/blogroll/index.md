---
title: Blog Roll
layout: component
path_slug: blogroll
category: content
iframe_height: medium
---

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

## Markup

{% include partials/markup.md %}