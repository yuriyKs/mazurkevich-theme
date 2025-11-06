import $ from 'jquery';
/* global ajax_object */

$(document).ready(function () {
  acfProductBlock();
});

function acfProductBlock() {
  $('.js-acf-product-block').each(function () {
    const initFilterProduct = function () {
      console.log('filter init');

      const $tabs = $('.posts-filter__tab');
      const $container = $('.posts-filter__content');

      if (
        !$tabs.length ||
        !$container.length ||
        typeof ajax_object === 'undefined'
      ) {
        return;
      }

      $tabs.on('click', function (e) {
        e.preventDefault();

        const $tab = $(this);
        if ($tab.hasClass('is-active')) {
          return;
        }

        $tabs.removeClass('is-active');
        $tab.addClass('is-active');

        const catId = $tab.data('cat-id');

        if (!catId) {
          console.error('No category ID found.');
          return;
        }

        $container.addClass('is-loading');

        $.ajax({
          url: ajax_object.ajax_url,
          type: 'POST',
          data: {
            action: 'load_posts_by_category',
            cat_id: catId,
            _ajax_nonce: ajax_object.nonce,
          },
          success: function (response) {
            $container.html(response).removeClass('is-loading');
          },
          error: function () {
            $container
              .html('<p>Error loading posts. Please try again.</p>')
              .removeClass('is-loading');
          },
        });
      });
    };

    initFilterProduct();
  });
}
