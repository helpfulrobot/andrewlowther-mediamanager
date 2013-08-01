;(function ($, window, undefined) {
  $(function () {
    $.cloudinary.config({
      cloud_name: window.mediamanager.cloudinary.cloud_name,
      api_key: window.mediamanager.cloudinary.api_key
    });

    $('#Form_ItemEditForm_CloudinaryRef').fileupload();
  });
})(jQuery, window);