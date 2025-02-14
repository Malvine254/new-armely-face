<?php 
function displayYoutubeVideos() {
   require '../php/config.php';

    $stmt = $conn->prepare("SELECT url FROM videos ORDER BY id DESC LIMIT 3");
    if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Extract Video ID from iframe
            preg_match('/src="([^"]+)"/', $row['url'], $matches);
            $videoSrc = isset($matches[1]) ? $matches[1] : '';

            $videoId = getYouTubeId($videoSrc);

            if ($videoId) {
                echo '
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="lazy-video" data-src="https://www.youtube.com/embed/' . htmlspecialchars($videoId) . '?autoplay=1">
                        <div class="play-overlay">
                            <img src="https://img.youtube.com/vi/' . $videoId . '/hqdefault.jpg" class="lazy-thumb" alt="Video Thumbnail">
                            <div class="play-button"></div>
                        </div>
                    </div>
                </div>';
            }
        }
    } else {
        echo "<p>No video was found!</p>";
    }

    $stmt->close();
}


 ?>