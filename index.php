<?php
    require 'vendor/autoload.php';

    use App\ContentGenerator;
?>

<html lang="en">
    <body>
        <?php
            $contentGenerator = new ContentGenerator();
            $contentGenerator->generateContent();
        ?>
    </body>
</html>
