---
layout: default
---

# Site Components

We were so inspired by 10up's Component library that we decided to build our own. Since 10up opensourced their component library, we've taken the parts about it that we love and incorporated it to work really well with our new starter theme.

### Our setup
Our setup is most likely different from yours, so there will be some difference in how we handle some things from what you might prefer. We have tried to implement an overall structure that can be utilized within different formats. For example, we are switching to working primarily with [Timber](https://www.upstatement.com/timber/) and [Twig](https://twig.sensiolabs.org/) for building our these. You will see markup snippets for each component with Twig samples. 

We also use [Advanced Custom Fields (ACF)](http://advancedcustomfields.com) for handling all of our custom fields. For components that might require some ACF fields, we will be providing the field IDs that will work with the code snippets and the types of fields that we recommend. 

One other thing that you might notice that is strange is the way we write our classes. We have been following the [Suit CSS](https://suitcss.github.io/) methodology. We find it more readable and follows the component structure found in many new Javascript libraries.

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
