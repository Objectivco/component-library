---
title: Accordion
layout: component
path_slug: accordion
category: ui
iframe_height: medium
---

Accordions are used widely throughout our sites. Often, they are used as a ACF Flexible Section.

<iframe {% if page.iframe_height %}class="h-{{ page.iframe_height }}"{% endif %} src="{{ site.baseurl }}/component/{{ page.path_slug }}/example.html"></iframe>

<h2>Advanced Custom Fields</h2>
If working with ACF, you will want to utilize the following fields:

**Repeater Field: accordion**

Fields:
* Text: accordion_header
* Text: accordion_label
* WYSIWYG: accordion_content

<h2>Markup</h2>

{% include partials/tabs.md %}

<h2>Styles</h2>

<h3 id="css">CSS</h3>
```css
{% include_relative css/component.css %}
```

<h3 id="sass">Sass</h3>
```scss
{% include_relative css/component.scss %}
```

<h2>Javascript</h2>
<h3>Plugin</h3>
```js
{% include_relative js/component.js %}
```
<h3>Usage</h3>
```js
{% include_relative js/component-usage.js %}
```