const BLOCK_NAME = 'core/list';

wp.domReady(() => {
  wp.blocks.registerBlockStyle(BLOCK_NAME, [
    {
      name: '',
      label: wp.i18n.__('По умолчанию', 'base-theme'),
      isDefault: true,
    },
    {
      name: 'two-columns',
      label: wp.i18n.__('Два столбца', 'base-theme'),
    },
    {
      name: 'three-columns',
      label: wp.i18n.__('Три столбца', 'base-theme'),
    },
  ]);
});
