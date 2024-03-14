(function($) {
  "use strict";

  $(document).ready(function() {

    $("#feedback-link-1").on('click', function(event) {
    event.preventDefault(); // Evitar que se añada # a la URL
      activateLink($(this));
      hideElement("#feedback-donate");
      showElement("#qcsendmail");
      showElement("#feedback-submit");
      showElement("#feedback-cancel");
      resetFormFields();
      $("#subscriber_message").removeAttr("placeholder").attr("placeholder", "Cuéntame tu idea...");
    });

    $("#feedback-link-2").on('click',function(event) {
    event.preventDefault(); // Evitar que se añada # a la URL
      activateLink($(this));
      hideElement("#feedback-donate");
      showElement("#qcsendmail");
      showElement("#feedback-submit");
      showElement("#feedback-cancel");
      resetFormFields();
      $("#subscriber_message").removeAttr("placeholder").attr("placeholder", '¿Cómo podemos ayudarte?');
      
    });

    $("#feedback-link-3").on('click', function(event) {
    event.preventDefault(); // Evitar que se añada # a la URL
      activateLink($(this));
      showElement("#feedback-donate");
      hideElement("#qcsendmail");
      hideElement("#feedback-submit");
      hideElement("#feedback-cancel");
      resetFormFields();
    });

    $("#feedback-cancel").on('click', function(event) {
    event.preventDefault(); // Evitar que se añada # a la URL
      deactivateLinks();
      hideElement("#feedback-donate");
      hideElement("#qcsendmail");
      hideElement("#feedback-submit");
      hideElement("#feedback-cancel");
      resetFormFields();
    });
  });

  function activateLink(link) {
    link.addClass('link-active').siblings().removeClass('link-active');
    link.closest('li').siblings().find('a').removeClass('link-active');
  }

  function deactivateLinks() {
    $("#feedback-link-1, #feedback-link-2, #feedback-link-3").removeClass('link-active');
  }

  function showElement(selector) {
    $(selector).removeClass('hidden').addClass('show');
  }

  function hideElement(selector) {
    $(selector).removeClass('show').addClass('hidden');
  }

  function resetFormFields() {
    $("#subscriber_name, #subscriber_email, #subscriber_message").val("");
  }

})(jQuery);
