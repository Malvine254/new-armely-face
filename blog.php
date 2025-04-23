<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("blog"); ?>
<!-- End Header Area -->
		
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
	<div class="container">
		<div class="bread-inner">
			<div class="row">
				<div class="col-12">
					<h2>Blogs</h2>
					<ul class="bread-list">
						<li><a href="/">Home</a></li>
						<li><i class="icofont-simple-right"></i></li>
						<li class="active">Blogs</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Single News -->
<section class="news-single section">
	<div class="container col-lg-11">
		<div class="row">
			<div class="col-lg-8 col-12">
				<div class="row">
					<div class="col-12" >
					<?php if (isset($_GET['blogId'])) {
						displayBlogFullDetals();
					} else{
						selectblogByDefault();
					}

					?>


					</div>

				</div>
			</div>
			<div class="col-lg-4 col-12">
				<div class="main-sidebar">
					<!-- Single Widget -->
					<div class="single-widget search">
						<div class="form">
							<input id="searchBar" type="email" placeholder="Search Here...">
							<a class="button default-background" href="#"><i class="fa fa-search"></i></a>
						</div>
					</div>
					<!--/ End Single Widget -->
					
					<!-- Single Widget -->
					<div class="single-widget recent-post box">
						<h3 class="title">Recent post</h3>
						<!-- Single Post -->
						<p style="display: none;" class="alert alert-danger" id="noResults">No results found!!</p>
						<div style="overflow-y: scroll; height:183vh;"><?php displayRecentBlogsOthers() ?></div>
						<!-- End Single Post -->
						
						
					</div>
				
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Single News -->
<?php echo getFooter(); ?>
<!-- Load jQuery before your script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function () {
    $(".shareBtn").click(function () {
      var social = $(this).data("social");
      var url = encodeURIComponent(window.location.href);
      var title = $("#blogTitle").text();
      var shareURL;

      switch (social) {
        case "facebook":
          shareURL = "https://www.facebook.com/sharer/sharer.php?u=" + url;
          break;
        case "twitter":
          shareURL = "https://twitter.com/intent/tweet?url=" + url + "&text=" + title;
          break;
        case "linkedin":
          shareURL = "https://www.linkedin.com/shareArticle?mini=true&url=" + url + "&title=" + title;
          break;
        case "instagram":
          alert("Instagram sharing via browser not supported.");
          return;
      }

      // Open in a new window
      window.open(shareURL, "_blank", "noopener,noreferrer,width=600,height=400");
    });
  });
</script>


<script>
	$(document).ready(function() {
  var contentDiv = $('#content');
var showMoreButton = $('#show-more');

// Check if the content is scrollable
function checkScrollable() {
    if (contentDiv[0].scrollHeight > contentDiv.innerHeight()) {
        showMoreButton.show(); // Show the button if scrollable
    } else {
        showMoreButton.hide(); // Hide if not scrollable
    }
}

// Initial check
checkScrollable();

// Scroll down when the button is clicked
showMoreButton.on('click', function() {
    contentDiv.animate({
        scrollTop: contentDiv[0].scrollHeight
    }, 800, function() {
        checkScrollable(); // Check if button should be hidden after scroll
    });
});

// Hide the button when reaching the bottom
contentDiv.on('scroll', function() {
    if (contentDiv.scrollTop() + contentDiv.innerHeight() >= contentDiv[0].scrollHeight - 1) {
        showMoreButton.fadeOut(); // Use fadeOut for smoother effect
    } else {
        showMoreButton.fadeIn();
    }
});

    

$(document).ready(function() {
    let speechSynthesis = window.speechSynthesis;
    let voices = speechSynthesis.getVoices();
    let isSpeaking = false;
    let isPaused = false;
    let lines;
    let currentIndex = 0;
    let currentUtterance;

    $('#toggleSpeech').click(function() {
        if (!isSpeaking) {
            speak();
        } else if (!isPaused) {
            pause();
        } else {
            resume();
        }
    });

    function speak() {
        let text = $('#blog-content').text(); // Get only the visible text
        // Split text by lines or paragraphs
        lines = text.split(/\n+/).filter(line => line.trim() !== ''); // Remove empty lines
        currentIndex = 0;
        speakLine();
    }

    function speakLine() {
        if (currentIndex < lines.length) {
            let line = lines[currentIndex].trim();
            let utterance = new SpeechSynthesisUtterance(line);
            utterance.voice = voices[0]; // Set the voice

            // Highlight the current line as it's spoken
            utterance.onstart = function() {
                highlightCurrentLine(line);
            };

            // Move to the next line after speaking the current one
            utterance.onend = function() {
                removeHighlight(); // Remove highlight after line is spoken
                currentIndex++;
                if (currentIndex < lines.length && !isPaused) {
                    speakLine();
                } else {
                    isSpeaking = false;
                    isPaused = false;
                }
            };

            currentUtterance = utterance;
            isSpeaking = true;
            isPaused = false;
            $('#volume-icons').removeClass('fa fa-volume-high').addClass('fa fa-volume-xmark');

            speechSynthesis.speak(utterance);
        }
    }

    function pause() {
        if (speechSynthesis.speaking) {
            speechSynthesis.pause();
            isPaused = true;
            $('#volume-icons').removeClass('fa fa-volume-xmark').addClass('fa fa-volume-high');
        }
    }

    function resume() {
        if (isPaused) {
            speechSynthesis.resume();
            isPaused = false;
            $('#volume-icons').removeClass('fa fa-volume-high').addClass('fa fa-volume-xmark');
        }
    }

    function highlightCurrentLine(line) {
        removeHighlight(); // Clear previous highlights

        // Escape special characters in the line to avoid regex issues
        let escapedLine = line.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        
        // Highlight the current line
        let content = $('#blog-content').html();
        let highlightedContent = content.replace(new RegExp(escapedLine, 'g'), `<span class="bg-warning">${line}</span>`);
        $('#blog-content').html(highlightedContent);
    }

    function removeHighlight() {
        $('#blog-content .bg-warning').contents().unwrap(); // Remove previous highlights
    }
});



</script>




</body>
</html>