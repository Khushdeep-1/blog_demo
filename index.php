<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>My Blog</h1>
    
    <?php
    // Include database connection file
    require_once "db_connect.php";

    // Fetch blog posts
    $sql_posts = "SELECT * FROM posts";
    $result_posts = $conn->query($sql_posts);

    if ($result_posts->num_rows > 0) {
        // Output data of each row
        while($row = $result_posts->fetch_assoc()) {
            echo "<h2>" . $row["title"] . "</h2>";
            echo "<p>" . $row["content"] . "</p>";

            // Fetch comments for each post
            $post_id = $row["post_id"];
            $sql_comments = "SELECT * FROM comments WHERE post_id = $post_id";
            $result_comments = $conn->query($sql_comments);

            if ($result_comments->num_rows > 0) {
                echo "<h3>Comments:</h3>";
                while($comment = $result_comments->fetch_assoc()) {
                    echo "<p><strong>" . $comment["commenter_name"] . ":</strong> " . $comment["comment_content"] . "</p>";
                }
            } else {
                echo "<p>No comments yet.</p>";
            }
        }
    } else {
        echo "<p>No posts found.</p>";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
