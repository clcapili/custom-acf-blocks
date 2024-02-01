<?php
/**
 * Card Block Template.
 *
 * @param array  $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool   $is_preview True during backend preview render.
 * @param int    $post_id The post ID the block is rendering content against.
 *                     This is either the post ID currently being displayed inside a query loop,
 *                     or the post ID of the post hosting this block.
 * @param array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'custom-block card-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$heading        = get_field('heading') ?? 'Heading';
$description    = get_field('description') ?? '';

?>

<div <?= $anchor ?> class="<?= $class_name ?> card">
    <div class="card-body">
        <?php if (!empty($heading)) { ?>
            <h3 class="mb-3"><?= $heading ?></h3>
        <?php } ?>
        
        <?php if (!empty($description)) { ?>
            <p class="lead"><?= $description ?></p>
        <?php } ?>
    </div>
</div>