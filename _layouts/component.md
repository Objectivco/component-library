---
layout: default
---
<div class="Component">
	{% if page.title %}
		<h1>{{ page.title }}</h1>
	{% endif %}
	
	{{ content }}
</div>
