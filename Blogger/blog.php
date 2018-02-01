<?php

include_once '/database.php';
?>



<head>

    <link rel="stylesheet" href="style.css">
    <script src="../jquery-3.2.0.min.js"></script>

</head>

<body>

<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {

    $authorName = $_POST["author"];
    $authorID = $_POST["authorId"];
    $title = $_POST["title"];
    $blogArticle = $_POST["blogArticle"];
    $password = $_POST["authorPsw"];


    $sql = "INSERT INTO blogs (author, authorId, title, blogArticle)
      VALUES ('$authorName', '$authorID','$title', '$blogArticle');";

    $result = mysqli_query($connection, $sql);

    if ($result->num_rows == 1) {

        echo "Your blog has been posted";

    } else {
        $error = "Failed to upload blog";
    }

}

    ?>



            <div id="wrapper">

                <form id="submitForm">
                    <label for="author">Please enter your name here</label>
                    <input type="text" name="author"><br>
                    <label for="authorId">Enter your id here</label>
                    <input type="text" name="authorId"><br>
                    <label for="title">Title</label>
                    <input type="text" name="title"><br>
                    <label for="blogArticle">Write your blog here</label>
                    <input type="textarea" id="text" name="blogArticle">
                    <input type="submit" name="submit" id="submitBlog" value="Submit blog">
                </form>

            </div>

        </body>