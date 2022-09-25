<?php
    require 'vendor/autoload.php';

    use App\ContentGenerator;
?>

<html lang="en">
    <body>
        <?php
            if (!isset($_GET['entity'])) {
                echo('Entity undefined. Please, choose cats or dogs');
                die;
            }

            $contentGenerator = new ContentGenerator($_GET['entity']);
            $contentGenerator->generateContent();
        ?>
    </body>
</html>
