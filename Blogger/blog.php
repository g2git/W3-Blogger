<?php

include_once 'database.php';
?>

<html>

    <head>

        <link rel="stylesheet" href="style.css">
        <script src="../jquery-3.2.0.min.js"></script>

    </head>

    <body>

    <?php

    if(isset($_POST['submitBlog'])) {

        $authorName = $_POST["author"];
        $authorID = $_POST["authorId"];
        $title = $_POST["title"];
        $blogArticle = $_POST["blogArticle"];
      //  $password = $_POST["authorPsw"];


        $sql = "INSERT INTO blogs (author, authorId, title, blogArticle)
          VALUES ('$authorName', '$authorID','$title', '$blogArticle')";

        $result = mysqli_query($connection, $sql);


            ?><div><p><?php echo "Your blog has been posted"?></p></div>
    <?php

        }


/*        else {
                    */?><!--<div><p><?php /*echo "Failed to upload blog"*/?></p></div>
            --><?php
/*            }*/
        ?>



                <div id="wrapper">

                    <form  method="POST">
                        <label for="author">Please enter your name here</label>
                        <input type="text" name="author"><br>
                        <label for="authorId">Enter your id here</label>
                        <input type="text" name="authorId"><br>
                        <label for="title">Title</label>
                        <input type="text" name="title"><br>
                        <label for="blogArticle">Write your blog here</label>
                        <input type="textarea" id="text" name="blogArticle">
                        <input type="submit" name="submitBlog" value="Submit blog">
                    </form>

                </div>

            </body>

</html>