$(document).ready(()=>{
	$('#searchInput').on('keyup', function() {
       
        var searchText = $(this).val().toLowerCase();
        $('#searchResults').empty();
        
        // Array of PHP page URLs
        var pageURLs = ['index', 'blog', 'services'];
        var resultsCount = 0;
        // Loop through each page URL
        pageURLs.forEach(function(pageURL) {
            // Fetch the content of each PHP page using AJAX
            $.ajax({
                url: pageURL,
                success: function(response) {
                    var pageContent = $(response).text().toLowerCase();
                    var matches = pageContent.match(new RegExp(searchText, 'gi'));
                   
                    if (matches && resultsCount < 5) {
                        // If content found, display a link to the page with relevant snippets
                        var pageTitle = $(response).filter('title').text();
                        var snippets = getSnippets(pageContent, searchText);
                        $('#searchResults').append('<div>' + snippets + '<a class="default-color" href="' + pageURL + '"> Click here to access the content</a></div><hr>');
                         resultsCount++;
                    }
                }
            });
        });
         // Check if no results were found
        // if (resultsCount === 0) {
        //     $('#searchResults').append('<div>No results found</div>');
        // }
    });
// Function to get snippets of content surrounding the matched search term
function getSnippets(content, searchText) {
    var maxSnippetLength = 200; // Maximum length of each snippet
    var snippetCount = 3; // Number of snippets to display
    
    var snippets = [];
    var regex = new RegExp('(?:\\s|^)(.{0,' + maxSnippetLength + '}\\b' + searchText + '\\b.{0,' + maxSnippetLength + '})(?=\\s|$)', 'gi');
    var match;
    var snippetIndex = 0;
    
    while ((match = regex.exec(content)) !== null && snippetIndex < snippetCount) {
        snippets.push(match[1]);
        snippetIndex++;
    }
    
    return snippets.join(' ... ');
}
// search bar for blogs
$('#searchBar').on('input', function() {
    var filter = $(this).val().toLowerCase();
    var matchedItems = 0;
    $('#noResults').hide();

    $('.data-item').each(function() {
        var text = $(this).text().toLowerCase(); 
        if (text.includes(filter)) {
            $(this).show();
            matchedItems++;
        } else {
            $(this).hide();
        }
    });

    // Show or hide the "No results found" message
    if (matchedItems === 0) {
        $('#noResults').show();
    } else {
        $('#noResults').hide();
    }
});


})

//start of cookies 
// Automatically show the snackbar after a delay 
setTimeout(function() {
    $('#snackbar').addClass('show');
}, 1000);

// Close button functionality
$('.btn-close').click(function() {
    $('#snackbar').removeClass('show');
});



    // Function to check if the cookie ID is present and hide the snackbar
    function checkCookieAndHideSnackbar() {
        var userID = getCookie('userID');
        if (userID) {
         $('#snackbar').css("display", "none");
        }
    }

    // Call the function initially to hide the snackbar if the cookie ID is already present
    

    // Function to periodically check for the presence of the cookie ID and hide the snackbar
    setInterval(()=>{
        checkCookieAndHideSnackbar();
    }, 1000); // Check every 3 seconds (adjust as needed)
    
    // Rest of your code
    $('#acceptAll').on('click', function() {
        setCookie('userConsent', 'accepted', 365);
        trackUser();
        
    });

    $('#rejectAll').on('click', function() {
        setCookie('userConsent', 'rejected', 365);
    });

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function generateUUID() {
        return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
            var r = Math.random() * 16 | 0,
                v = c === 'x' ? r : (r & 0x3 | 0x8);
            return v.toString(16);
        });
    }

    function trackUser() {
        var userID = getCookie('userID');
        if (!userID) {
            userID = generateUUID();
            setCookie('userID', userID, 365);
        }

        $.get("php/cookies.php", { userID: userID }, function(data) {
            console.log("User tracked:", data);
        }).fail(function(xhr, status, error) {
            console.error("Error tracking user:", error);
        });
    }


// submit contact form
$('#contact-form').submit(function(event) {
event.preventDefault(); // Prevent the default form submission

// Retrieve the form data
var formData = $(this).serialize();

// Perform an AJAX request to submit the form data
$.ajax({
  type: 'POST',
  url: 'php/submit_contact', // Replace with your actual server-side endpoint
  data: formData,
  success: function(response) {
    // Handle the success response
    if (response==="1") {
      Swal.fire({
      title: 'Success!',
      text: "Message was sent successfully",
      confirmButtonColor: 'rgb(47,85,151)', 
      icon: 'success',
    });
      $("#contact-form")[0].reset();
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


$('#consultation-form').submit(function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Retrieve the form data
    var formData = $(this).serialize();

    // Perform an AJAX request to submit the form data
    $.ajax({
      type: 'POST',
      url: 'php/actions', // Replace with your actual server-side endpoint
      data: formData,
      success: function(response) {
        // Handle the success response
        if (response==="1") {
          Swal.fire({
          title: 'Success!',
          text: "Message was sent successfully",
          confirmButtonColor: 'rgb(47,85,151)', 
          icon: 'success',
        });
          $("#consultation-form")[0].reset();
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