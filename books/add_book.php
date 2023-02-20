<?php 

include("./config/connect.php");

if ($mysqli) {
    if ($_POST) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['release_year'];
        $format = $_POST['format'];
        $language = $_POST['language'];
        $location = $_POST['location'];
        $rating = $_POST['rating'];
        $media = $_POST['media'];
        $date_read = $_POST['date_read'];

        if(empty($media)) {
            $media = "https://images.pexels.com/photos/415071/pexels-photo-415071.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2";
        }

        if (!empty($title) and !empty($author)) {
            $fields = "(title, author";
            $values = "('{$title}', '{$author}'";

            if($year) $fields .= ", release_year";
            if($format) $fields .= ", format";
            if($language) $fields .= ", language";
            if($location) $fields .= ", location";
            if($rating) $fields .= ", my_rating";
            if($media) $fields .= ", media";
            if($date_read) $fields .= ", date_read";
            $fields .= ")";

            if($year) $values .= ", {$year}";
            if($format) $values .= ", '{$format}'";
            if($language) $values .= ", '{$language}'";
            if($location) $values .= ", '{$location}'";
            if($rating) $values .= ", {$rating}";
            if($media) $values .= ", '{$media}'";
            if($date_read) $values .= ", '{$new_date}'";
            $values .= ")";


            var_dump($new_date);
            $sql = "INSERT INTO books $fields VALUES $values";

            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                $affected_rows = mysqli_affected_rows($mysqli);
                if ($affected_rows > 0) {
                    header('location: index.php');
                } else {
                    echo "Error: data not inserted into the database.";
                }
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        } else {
            $error_msg = "* Title and Author is required";
        }
    } 
} else {
    echo "Error: unable to connect to the database.";
}

$mysqli->close();

?>