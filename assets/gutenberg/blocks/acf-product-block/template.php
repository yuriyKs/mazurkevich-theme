<?php
/**
 * @var array $block
 * @var string $content
 * @var bool $is_preview
 * @var int $post_id
 * @var array $fields contains all ACF fields
 */
$classes = [
    'acf-product-block',
    'js-acf-product-block',
    $block['className'] ?? '',
    $is_preview ? 'is-editor' : '',
    !empty($block['align']) ? 'align' . esc_attr($block['align']) : 'alignnone',
    function_exists('get_acf_block_visibility_classes') ? get_acf_block_visibility_classes($block) : '',
];
$classes_string = implode(' ', array_filter($classes));

$categories = get_categories([
    'taxonomy' => 'category',
    'hide_empty' => true,
]);
$default_cat_id = (int) $categories[0]->term_id;
?>

<div
    <?php echo !empty($block['anchor']) ? 'id="' . esc_attr($block['anchor']) . '"' : ''; ?>
    class="<?php echo esc_attr($classes_string); ?>"
>
    <div class="inner">
        <?php if ($categories) { ?>
            <div class="posts-filter">
                <ul class="posts-filter__tabs">
                    <?php
                    foreach ($categories as $cat) {
                        ?>
                        <li class="posts-filter__tab<?php echo $cat->term_id === $default_cat_id ? ' is-active' : ''; ?>"
                            data-cat-id="<?php echo esc_attr($cat->term_id); ?>">
                            <?php echo esc_html($cat->name); ?>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>
        <?php
        $args = [
            'post_type' => 'post',
            'posts_per_page' => -1,
            'cat' => $default_cat_id,
            'no_found_rows' => true,
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) { ?>
        <div id="posts-container" class="posts-filter__content">
            <?php
            while ($query->have_posts()) {
                $query->the_post();
                get_template_part('parts/loop-post', get_post_type());
            }
            wp_reset_postdata();
            ?>
        </div>
            <?php
        }
        ?>
    </div>
</div>
