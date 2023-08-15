<?php
require_once('views/header.php');
?>
<main>

    <?php
    require_once("utilities/DBConn.php");
    $dbconn = new DBConn();
    $dbconn->connect();
    ?>
</main>
<?php
require_once('views/footer.php');
?>