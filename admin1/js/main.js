$('#addBlogTable').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    var formData = new FormData();
    // Retrieve the form data
    var editorData = CKEDITOR.instances.blogBody.getData();
    formData.append("body", editorData);

    // Perform an AJAX request to submit the form data
    $.ajax({
      type: 'POST',
      url: 'php/uploads.php', 
      data: formData,
      contentType: false, // Required for FormData
      processData: false, // Required for FormData
      success: function(response) {
        // Handle the success response
        if (response === "1") {
          Swal.fire({
            title: 'Success!',
            text: "Message was sent successfully",
            confirmButtonColor: 'rgb(47,85,151)', 
            icon: 'success',
          });
          $("#addBlogTable")[0].reset(); // Reset the form
          CKEDITOR.instances.blogBody.setData(''); // Reset the CKEditor
        } else {
          Swal.fire({
            title: 'Warning',
            text: response,
            icon: 'warning',
            confirmButtonText: 'OK',
            confirmButtonColor: 'rgb(47,85,151)'
          });
        }
        console.log(response); // You can do something with the response data
      },
      error: function(error) {
        // Handle the error response
        console.error('Form submission error');
        console.error(error); // You can display an error message or perform other actions
        Swal.fire({
          title: 'Error',
          text: 'An error occurred while submitting the form.',
          icon: 'error',
          confirmButtonText: 'OK',
          confirmButtonColor: 'rgb(47,85,151)'
        });
      }
    });
});


// .........................start of submit new blog articles...........................

$('#addBlogForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create FormData object
    var formData = new FormData();

    // Append file to FormData object
    var blog_image = $('#blog_image')[0].files[0]; // Assuming 'cv' is the id of your file input
    var blogBody = CKEDITOR.instances['blogBody'].getData();
   
    // Append other form fields to FormData object
    formData.append('blog_title', $('#blog_title').val());
    formData.append('blog_body', blogBody)
    formData.append('blog_image', blog_image);
    //alert(blogBody)
    // Perform an AJAX request to submit the form data
    $.ajax({
      type: 'POST',
      url: 'php/uploads', // Replace with your actual server-side endpoint
      data: formData,
      processData: false, // Prevent jQuery from automatically processing data
      contentType: false,
      success: function(response) {
        // Handle the success response
        if (response==="1") {
          Swal.fire({
          title: 'Success!',
          text: "Blog was uploaded successfully",
          confirmButtonColor: 'rgb(47,85,151)', 
          icon: 'success',
        });
          $("#addBlogForm")[0].reset();
          CKEDITOR.instances.blogBody.setData(''); 
        }else{
          Swal.fire({
        title: 'Warning',
        text: response,
        icon: 'warning',
        confirmButtonText: 'OK',
         confirmButtonColor: 'rgb(47,85,151)'
      });
        }
         
        console.log(response); // You can do something with the response data
      },
      error: function(error) {
        // Handle the error response
        console.error('Form submission error');
        console.error(error); // You can display an error message or perform other actions
      }
    });
  });

// .........................end of submit new blog articles...........................

// .........................start of submit new blog articles...........................

$('#customerStoriesForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create FormData object
    var formData = new FormData();

    // Append file to FormData object
    var profile = $('#profile')[0].files[0]; // Assuming 'cv' is the id of your file input
    var body_content = CKEDITOR.instances['editCustomerBody'].getData();
   
    // Append other form fields to FormData object
    formData.append('position', $('#clientPosition').val());
    formData.append('name', $('#clientName').val())
    formData.append('profile', profile);
    formData.append('body_content', body_content);
    //alert(blogBody)
    // Perform an AJAX request to submit the form data
    $.ajax({
      type: 'POST',
      url: 'php/uploads', // Replace with your actual server-side endpoint
      data: formData,
      processData: false, // Prevent jQuery from automatically processing data
      contentType: false,
      success: function(response) {
        // Handle the success response
        if (response==="1") {
          Swal.fire({
          title: 'Success!',
          text: "Customer Stories was updated successfully",
          confirmButtonColor: 'rgb(47,85,151)', 
          icon: 'success',
        });
          $("#customerStoriesForm")[0].reset();
          CKEDITOR.instances.editCustomerBody.setData(''); 
        }else{
          Swal.fire({
        title: 'Warning',
        text: response,
        icon: 'warning',
        confirmButtonText: 'OK',
         confirmButtonColor: 'rgb(47,85,151)'
      });
        }
         
        console.log(response); // You can do something with the response data
      },
      error: function(error) {
        // Handle the error response
        console.error('Form submission error');
        console.error(error); // You can display an error message or perform other actions
      }
    });
  });

// .........................end of submit new blog articles...........................

// .........................start of submit new career banner...........................

$('#careerForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create FormData object
    var formData = new FormData();

    // Append file to FormData object
    var profile = $('#career_image')[0].files[0]; // Assuming 'cv' is the id of your file input
    var career_body = CKEDITOR.instances['careerBody'].getData();
   
    // Append other form fields to FormData object
    formData.append('career_title', $('#career_title').val());
    formData.append('name', $('#clientName').val())
    formData.append('career_image', profile);
    formData.append('career_body', career_body);
    //alert(blogBody)
    // Perform an AJAX request to submit the form data
    $.ajax({
      type: 'POST',
      url: 'php/uploads', // Replace with your actual server-side endpoint
      data: formData,
      processData: false, // Prevent jQuery from automatically processing data
      contentType: false,
      success: function(response) {
        // Handle the success response
        if (response==="1") {
          Swal.fire({
          title: 'Success!',
          text: "Career Banner was updated successfully",
          confirmButtonColor: 'rgb(47,85,151)', 
          icon: 'success',
        });
          $("#careerForm")[0].reset();
          CKEDITOR.instances.careerBody.setData(''); 
        }else{
          Swal.fire({
        title: 'Warning',
        text: response,
        icon: 'warning',
        confirmButtonText: 'OK',
         confirmButtonColor: 'rgb(47,85,151)'
      });
        }
         
        console.log(response); // You can do something with the response data
      },
      error: function(error) {
        // Handle the error response
        console.error('Form submission error');
        console.error(error); // You can display an error message or perform other actions
      }
    });
  });

// .........................end of submit new career banner..........................

// .........................start of submit new blog articles...........................

$('#footerForm').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Create FormData object
    var formData = new FormData();

    // Append file to FormData object
   
    var footerBody = CKEDITOR.instances['footerBody'].getData();
   
    // Append other form fields to FormData object
  
    formData.append('footerBody', footerBody);
    //alert(blogBody)
    // Perform an AJAX request to submit the form data
    $.ajax({
      type: 'POST',
      url: 'php/uploads', // Replace with your actual server-side endpoint
      data: formData,
      processData: false, // Prevent jQuery from automatically processing data
      contentType: false,
      success: function(response) {
        // Handle the success response
        if (response==="1") {
          Swal.fire({
          title: 'Success!',
          text: "Footer was updated successfully",
          confirmButtonColor: 'rgb(47,85,151)', 
          icon: 'success',
        });
          $("#footerForm")[0].reset();
          CKEDITOR.instances.footerBody.setData(''); 
        }else{
          Swal.fire({
        title: 'Warning',
        text: response,
        icon: 'warning',
        confirmButtonText: 'OK',
         confirmButtonColor: 'rgb(47,85,151)'
      });
        }
         
        console.log(response); // You can do something with the response data
      },
      error: function(error) {
        // Handle the error response
        console.error('Form submission error');
        console.error(error); // You can display an error message or perform other actions
      }
    });
  });

// .........................end of submit new blog articles...........................