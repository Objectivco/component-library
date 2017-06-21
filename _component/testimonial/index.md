---
title: Testimonial
layout: component
path_slug: testimonial
category: content
iframe_height: small
---

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

## Advanced Custom Fields
If working with ACF, you will want to utilize the following fields:

Fields:
* Textarea: `testimonial_quote`
* Text: `testimonial_author`

## Markup
{% include partials/markup.md %}
