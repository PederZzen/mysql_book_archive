<?php 

include("./config/connect.php");

$sql = "SELECT * FROM books";

$result = mysqli_query($mysqli, $sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

if(empty($books)) {
    $output = "<p>Library is empty, read more books!</p>";
} else {
    foreach ($books as $book) {
        $output .= "
        <div class='book_wrapper'>
            <div>
                <img src='$book[media]'>
            </div>
            <div>
                <h3>$book[title]</h3>
                <p>$book[author]</p>
                <p>($book[release_year])</p>
                <span>Rating: $book[my_rating]</span> 
            </div>
            <div>
                <div>
                    <h4>Language</h4>
                    <p>$book[language]</p>
                </div>
                <div>
                    <h4>Date Read</h4>
                    <p>$book[date_read]</p>
                </div>
            </div>
            <div>
                <div>
                    <h4>Format</h4>
                    <p>$book[format]</p>
                </div>
                <div>
                    <h4>Location of Book</h4>
                    <p>$book[location]</p>  
                </div>
            </div>
            <div class='buttons'>
                <button class='deleteButton'>
                    <a href='./books/delete_book.php?id=$book[id]'>Delete</a> 
                </button>
                <button class='updateButton' data-id='$book[id]'>Update</button>
            </div>
        </div>
         ";
    };
}
$mysqli->close();

?>

<?php include("./books/add_book.php") ?>
<?php include("./books/delete_book.php") ?>
<?php include("./utils/header.php") ?>

<body>
    <nav>
        <div class="container">
            <h1>My Books</h1>
        </div>
    </nav>
    <div id="main">
        <div id="addBooks">
            <div class="container">
                <h2>Add new book</h2>
                <p id="errorMsg"><?php echo $error_msg ?></p>
                <form method="post">
                    <?php include('./utils/form.php') ?>
                    <button class="addBook" id="addBookBtn">Add Book</button>
                </form>
            </div>
        </div>
        <?php echo $output ?>
    </div>
    <div class="modalWrapper">
        <span id="closeModal"></span>
        <div id="updateModal">
            <form method="post">
                <?php include('./utils/form.php') ?>
                <button class="addBook" id="updateBookBtn">Update Book</button>
            </form>
        </div>
    </div>
</body>
</html>

