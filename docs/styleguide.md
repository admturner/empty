---
layout: page
title: "Style Guide"
---

{%- assign guides = site.styleguide | group_by: 'category' | sort: 'name'  -%}
{%- for guide in guides -%}

    {%- if '' != guide.name -%}
		{%- assign items = guide.items | sort: 'order' -%}

		<h2><a href="{{ items.first.url | relative_url }}">{{ guide.name }}</a></h2>

		{%- for item in items -%}

        	<h3><a href="{{ item.url | relative_url }}">{{ item.title }}</a></h3>

        {%- endfor -%}

    {%- endif -%}

{%- endfor -%}
