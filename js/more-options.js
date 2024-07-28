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