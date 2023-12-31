<?php

require 'includes/database.php';

$conn = getDB();

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    
    $sql = "SELECT *
            FROM article
            WHERE id = " . $_GET['id']; 
    
    $results = mysqli_query($conn, $sql);
    
    if ($results === false) {
        echo mysqli_error($conn);
    } else {
        $article = mysqli_fetch_assoc($results);
    
    }
} else {

    $article = null;
}

?>

<?php require 'includes/header.php'; ?>
            <?php if ($article === null): ?>
                <p>No articles found.</p>

            <?php else: ?>

            <ul>
                
                    <li>
                        <article>
                            <h2><?= $article['title']; ?></h2>
                            <p><?= $article['content']; ?></p>
                        </article>
                    </li>
                
            </ul>
            <?php endif; ?>
<?php require 'includes/footer.php'; ?>