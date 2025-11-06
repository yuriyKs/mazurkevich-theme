<?php

/**
 * The name variable is required and should NOT include the namespace.
 */
$name = 'product-block';

/**
 * @see https://www.advancedcustomfields.com/resources/acf_register_block_type/
 */
$settings = [
    'title' => __('Product ACF Block', 'base-theme'),
    'description' => __('ACF Product block.', 'base-theme'),
    'category' => 'custom',
    'icon' => 'block-default',
    'supports' => [
        'mode' => false,
        'align' => ['wide', 'full'],
        'anchor' => true,
    ],
];

$controller = function ($block_attributes) {
    return array_merge($block_attributes, []);
};
