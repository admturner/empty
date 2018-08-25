---
layout: page
title: Pattern Library
---

<ul>
    {%- assign patterns = site.patterns | group_by: 'category' | sort: 'name'  -%}
    {%- for group in patterns -%}
        {%- if '' != group.name -%}
            <li>
                {%- assign items = group.items | sort: 'order' -%}
                <a href="{{ items.first.url | relative_url }}">{{ group.name }}</a>
                {%- for item in items -%}
                    <ul>
                        <li><a href="{{ item.url | relative_url }}">{{ item.title }}</a></li>
                    </ul>
                {%- endfor -%}
            </li>
        {%- endif -%}
    {%- endfor -%}
</ul>
