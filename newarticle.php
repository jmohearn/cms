<?php 
    require 'includes/database.php';

    $conn = getDB();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        

        $sql = "INSERT INTO article (title, content, published_at)
                VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt === false) {

        echo mysqli_error($conn);

    } else {
        
        mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['published_at']);

        if (mysqli_stmt_execute($stmt)) {
            
            $id = mysqli_insert_id($conn);
            echo "Inserted record with ID: $id";

        } else {
            echo mysqli_stmt_error($stmt);
        }

    
    }
    }

?>

<?php require 'includes/header.php' ?>

<h2>New article</h2>

<form method="post">

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Article title">
    </div>
    <div>
        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="Article content"></textarea>
    </div>
    <div>
        <label for="published_at">Publication date and time</label>
        <input type="datetime-local" name="published_at" id="published_at">
    </div>

    <button>Add</button>

</form>

<?php require 'includes/footer.php' ?>