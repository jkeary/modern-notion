<?php
// the option name
define('MN_CATEGORY_META', 'category_meta');

add_filter('edit_category_form_fields', 'my_category_fields');
function my_category_fields($tag) {
    $category_meta = get_option(MN_CATEGORY_META);
?>

<table class="form-table">
    <tr class="form-field">
        <th scope="row" valign="top"><label for="category_color">Category Color</label></th>
        <td><input name="category_color" id="category_color" type="text" size="40" aria-required="false" value="<?php echo $category_meta[$tag->term_id]['color']; ?>" />
        <p class="description">Color associated with this category.</p></td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="category_icon">Category Icon</label></th>
        <td><input name="category_icon" id="category_icon" type="text" size="40" aria-required="false" value="<?php  echo $category_meta[$tag->term_id]['icon']; ?>" />
        <p class="description">Icon associated with this category.</p></td>
    </tr>
</table>

    <?php
}

add_filter('edited_terms', 'update_category_meta');
function update_category_meta($term_id) {
  if($_POST['taxonomy'] == 'category'):
    $category_meta = get_option(MN_CATEGORY_META);
    $category_meta[$term_id]['color'] = strip_tags($_POST['category_color']);
    $category_meta[$term_id]['icon'] = strip_tags($_POST['category_icon']);
    update_option(MN_CATEGORY_META, $category_meta);
  endif;
}


add_filter('deleted_term_taxonomy', 'remove_category_meta');
function remove_category_meta($term_id) {
  if($_POST['taxonomy'] == 'category'):
    $category_meta = get_option(MN_CATEGORY_META);
    unset($category_meta[$term_id]);
    update_option(MN_CATEGORY_META, $category_meta);
  endif;
}