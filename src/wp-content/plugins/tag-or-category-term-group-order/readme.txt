===Tag or Category term_group Order ===

Contributors: ravidreams, logeshmba

Tags: term_group, category order, sort categories, category group, category grouping, category sorting, sort, sorting, order, reorder, group

Donate link: http://ravidreams.com/

Requires at least: 3.0.1

Tested up to: 3.2.1

Stable tag: trunk



Adds a group field to tags and categories, allowing to sort them based on term_group order.



== Description ==



This plugin is intended as an aid to theme and plugin developers. It changes the term_group field value in a core WordPress database table

($wpdb->terms). So, please be aware of the risks involved and always back up your site before activating a new plugin.



The purpose of the plugin is to allow sorting of tags or categories based on 'term_group'. This allows queries that

fetch terms to use 'term_group' as a sort order.



This can be used to display tags or categories in a semantic way in archives and individual posts.



For example,



If we have three groups of categories for size, color and object, then categories displayed as



Small, Green, Table



Big, Blue, Chair



are more readable than



Table, small, green



Chair, big, blue



== Installation ==

1. Upload the category term_group order folder to /wp-content/plugins/.

2. Activate the plugin through the "Plugins" menu in WordPress.

3. You will now be able to set a 'Group' field for categories.

4. Paste the following code in single.php , index.php , archive.php to display the categories based on term_group order


<code>
$args = array('orderby' => 'term_group', 'order' => 'ASC', 'fields' => 'all');

$terms = wp_get_object_terms($post->ID, 'category', $args );

$count = count($terms);

if($count > 0){

echo 'Posted in <ul id="catlist">';

foreach ($terms as $term) {

echo '<li><a href="'.get_term_link($term->slug, 'category').'">'.$term->name.'</a> .</li>';

}

echo '</ul>';

}</code>

== Changelog ==

= 0.1 =
* This is the first version of this plugin.

== Frequently Asked Questions ==

This is the first version of the plugin. So, no FAQ yet.

== Upgrade Notice ==

= 0.1 =

This is the first version of this plugin.

== Screenshots ==

1. 'group' available when adding a new term.

