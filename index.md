---
layout: default
---

<h1 class="PageTitle">Objectiv Components</h1>

<p>We were so inspired by 10up's Component library that we decided to build our own. Since 10up opensourced their component library, we've taken the parts about it that we love and incorporated it to work really well with our new starter theme.</p>

<div class="Categories">
    {% for category in site.data.categories %}
        <div class="Category">
            <h2>{{category.pretty}}</h2>
            <ul class="ComponentList">
                {% for component in site.component %}
                    {% if component.category == category.slug %}
                        <li class="ComponentList-item"><a href="{{ site.baseurl }}{{ component.url }}">{{ component.title }}</a></li>
                    {% endif %}
                {% endfor %}
            </ul>
        </div>
    {% endfor %}
</div>
