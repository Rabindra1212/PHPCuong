define([
  'jquery',
  'Magento_Ui/js/modal/modal',
  'Magento_Customer/js/customer-data'
], function($, modal, customerData) {

  "use strict";

  $.widget('phpcuong_product_quickview.customModal', $.mage.modal, {
    closeModal: function () {
      var sections = ['cart'];
      customerData.invalidate(sections);
      customerData.reload(sections, true);
      $('[data-block="minicart"]').trigger('contentUpdated');
      $('#phpcuong-quickview-container').find('.quickview-content').html('');
      return this._super();
    },
  });
  return $.phpcuong_product_quickview.customModal;
});
