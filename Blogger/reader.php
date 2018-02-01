<?php
/**
 * Created by PhpStorm.
 * User: gimmy
 * Date: 31-1-18
 * Time: 14:00
 */

include_once ('database.php');
?>


<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <script src="../jquery-3.2.0.min.js"></script>

    </head>

    <body>

        <?php

        if (isset($_POST['submitTitle'])) {
            $name = $_POST['authorsearch'];
            $authID = $_POST['idsearch'];

            $query = "SELECT title, blogArticle, dateTime FROM blogs WHERE author = '$name' AND authorId = '$authID' ORDER BY dateTime DESC;";
            $result = mysqli_query($connection, $query);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);


            if($result->num_rows > 0){
                ?>
                <div id="blgList">
                    <table>
                        <th><?php echo "Author: ".$name ?></th>
                        <?php

                        foreach ($row as $k => $v){
                                        ?>
                            <tr><td><?php echo "Date: ".$v["dateTime"]?></td></tr>
                            <tr><td><?php echo "Title: ".$v["title"]?></td></tr>
                            <tr><td><?php echo $v["blogArticle"]?></td></tr>
                            <tr><td><?php echo ""?></td></tr>
                                    <!--<tr><td><a href="<?php /*$v["title"] */?>?val="<?php /*echo $v["title"]*/?>><?php /*echo $v["title"] */?> </a> </td></tr>-->
                                        <?php

                        }

                        ?>
                    </table>
                </div>

                <?php

            }else{
                echo "The name and ID you entered did not return any results";
            }
        }

        if (isset($_POST['submitId'])) {
            $authId = $_POST['authoridsearch'];

        $query = "SELECT DISTINCT authorId FROM blogs WHERE author ='$authId'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($result->num_rows > 0) {
        ?>
            <div id="blgId">

                <table>
                    <th><?php echo "Author: ".$authId ?></th>
                    <?php

                    foreach ($row as $k => $v){
                        ?>
                        <tr><td><?php echo "ID: ".$v["authorId"] ?> </td></tr>
                        <?php

                    }
                    ?>
                </table>

            </div>

        <?php
        } else {
            echo "The name you entered did not return any results";
        }
        }


        ?>

<!--    <form id="frmFav" action= "" method="POST">
        <label for="Favorite">Add your favorite writer's name</label>
        <input class = "form-control" type="text" id="inpFav" >
        <input type="search" class="btn btn-info">
    </form>-->

        <form id="searchTitle" action="" method="POST">
            Enter author's name:
            <input type="search" name="authorsearch">
            Enter author's id:
            <input type="search" name="idsearch">
            <input type="submit" id="submitTitle" name="submitTitle" value="Search blog">
        </form>



        <form id="searchId" action="" method="POST">
            Search for author's Id:
            <input type="search" name="authoridsearch">
            <input type="submit"  id ="submitId" name="submitId" value="Search id">
        </form>


<?php
/*        $link=$_GET['val'];
        foreach($row as $k => $v){
            if ($link == $v["title"]){
                $query = "SELECT blogArticle FROM blogs WHERE title = '$name' AND authorId = '$authID';";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result, MYSQLI_ASSOC);

                */?><!--
                <div>
                    <?php
/*                    echo $row["blogArticle"];
                    */?>
                </div>
        --><?php
/*            }
        }

*/?>


    </body>
</html>