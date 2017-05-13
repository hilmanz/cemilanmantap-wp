<?php
$loc = get_query_var('location'); 
$terms = get_terms([
    'taxonomy' => 'location',
    'hide_empty' => false,
]);
?>
<option <?php if($loc == '') echo 'selected'; ?> value="*">Pilih Kota</option>
<?php foreach($terms as $term): ?>
<option value=".filter-<?php echo $term->slug; ?>" <?php echo (($loc == $term->slug) ? 'selected' : ''); ?>><?php echo $term->name; ?></option>
<?php 
endforeach; 
wp_reset_query();