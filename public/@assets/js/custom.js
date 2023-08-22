$(function () {

  $("#sendApplicationForm input, #sendApplicationForm textarea").jqBootstrapValidation({
      preventSubmit: true,
      submitError: function ($form, event, errors) {
      },
      submitSuccess: function ($form, event) {
          event.preventDefault();
          $this = $("#sendApplicationButton");
          $this.prop("disabled", true).html('<div class="spinner-grow text-white mr-2 align-self-center loader-sm"></div> Please wait, your documents are being uploaded.');

          var formData = new FormData($('#sendApplicationForm')[0]);
          var endpointUrl = $('#sendApplicationForm').attr('action');
          var csrfToken = $('meta[name="csrf-token"]').attr('content'); 

          $.ajax({
              url: endpointUrl,
              type: "POST",
              headers: {
                "X-CSRF-Token": csrfToken,
              },
              data: formData,
              processData: false,
              contentType: false,
              success: function (response) {
                  console.log(response);
                  $('#success').html("<div class='alert alert-success'>");
                  $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                          .append("</button>");
                  $('#success > .alert-success')
                          .append("<strong>"+response.message+"</strong>");
                  $('#success > .alert-success')
                          .append('</div>');
                  $('#sendApplicationForm').trigger("reset");
              },
              error: function (xhr, status, error) {
                  console.log(xhr);
                  $('#success').html("<div class='alert alert-danger'>");
                  $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                          .append("</button>");
                  if (xhr.status != "") {
                    $('#success > .alert-danger').append($("<strong>").html(formatErrorMessage(xhr, error)));
                  } else {
                    $('#success > .alert-danger').append($("<strong>").text("Sorry, it seems that our mail server is not responding. Please try again later!"));
                  }
                  
                  $('#success > .alert-danger').append('</div>');
                  // $('#sendApplicationForm').trigger("reset");
              },
              complete: function () {
                  setTimeout(function () {
                      $this.prop("disabled", false).text('Submit');
                  }, 1000);
              }
          });
      },
      filter: function () {
          return $(this).is(":visible");
      },
  });

  $("a[data-toggle=\"tab\"]").click(function (e) {
      e.preventDefault();
      $(this).tab("show");
  });
});

$('#full_name').focus(function () {
  $('#success').html('');
});


function formatErrorMessage(jqXHR, exception) {
  if (jqXHR.status === 0) {
      return "Not connected.\nPlease verify your network connection.";
  } else if (jqXHR.status == 404) {
      return "The requested page not found. [404]";
  } else if (jqXHR.status === 419) {
      // CSRF token mismatch error
      return "CSRF token mismatch. Please refresh the page and try again.";
  } else if (jqXHR.status == 500) {
      return "Internal Server Error [500].";
  } else if (exception === "parsererror") {
      return "Requested JSON parse failed.";
  } else if (exception === "timeout") {
      return "Time out error.";
  } else if (exception === "abort") {
      return "Ajax request aborted.";
  } else {
      // return "Uncaught Error.\n" + formatErrorResponseText(jqXHR.responseText);
      return formatErrorResponseText(jqXHR.responseText);
  }
}

function formatErrorResponseText(errorResponse){
  errorResponse = JSON.parse(errorResponse);
  var errors = errorResponse.errors;
  var errorMessage = "";

  $.each(errors, function(fieldName, errorMessageArr) { 
      var errMsg = errorMessageArr[0];
      errorMessage += errMsg + "<br/>";
  });
  return errorMessage;
}

// $(document).ready(function () {
//   $('#sendApplicationForm').submit(function(event) {
//     event.preventDefault(); // Prevent the default form submission
//     var submitButton = $('#sendApplicationButton');
//     submitButton.prop('disabled', true).html('<div class="spinner-grow text-white mr-2 align-self-center loader-sm"></div> Processing'); // Disable the submit button

//     var formData = new FormData(this);
//     var endpointUrl = $('#sendApplicationForm').attr('action');
//     // var csrfToken = $('meta[name="csrf-token"]').attr('content'); 

//     $.ajax({
//       url: endpointUrl, 
//       type: 'POST',
//       data: formData,
//       processData: false,
//       contentType: false,
//       success: function(response) {
//         console.log(response);
//         submitButton.prop('disabled', false).text('Submit');
//       },
//       error: function(xhr, status, error) {
//         console.log(xhr);
//         submitButton.prop('disabled', false).text('Submit');
//       }
//   });
// });
// });