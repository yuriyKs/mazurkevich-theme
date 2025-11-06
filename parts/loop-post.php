<?php
global $post;

$post_id = get_the_ID();

$price = get_field('price', $post_id);
$post_slug = isset( $post->post_name ) ? sanitize_title( $post->post_name ) : sanitize_title( get_the_title() );
;?>

<!-- BEGIN of Post -->
<article id="post-<?php the_ID(); ?>" <?php post_class('preview preview--' . get_post_type()); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <a href="#<?php echo $post_slug; ?>" data-fancybox class="post-thumbnail">
            <?php the_post_thumbnail('medium', ['class' => 'preview__thumb']); ?>
        </a>
        <div id="<?php echo $post_slug; ?>" style="display:none;">
            <?php the_post_thumbnail('full'); ?>
        </div>
    <?php } ?>
    <div class="">
        <h3 class="preview__title">
            <?php echo get_the_title() ?: __('No title', 'base-theme'); ?>
        </h3>
        <?php if (is_sticky()) { ?>
            <span class="secondary label preview__sticky"><?php _e('Sticky', 'base-theme'); ?></span>
        <?php } ?>
      <?php if($price) : ?>
        <span class="post__price"><?php echo $price;?></span>
      <?php endif; ?>

    </div>
</article>
<!-- END of Post -->
