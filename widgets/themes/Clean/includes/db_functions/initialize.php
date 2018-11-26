<?php
// initialize.php initializes path constants and db connection

//dirname() returns the path to the deirectory
    define("DATABASE_PATH", dirname(__FILE__));
    define("INCLUDES_PATH", dirname(DATABASE_PATH));
    define("PROJECT_PATH", dirname(INCLUDES_PATH));
?>
<!--
<?php echo DATABASE_PATH;?> <br />
<?php echo INCLUDES_PATH;?> <br />
<?php echo PROJECT_PATH;?> <br />
-->
<?php

    require_once('functions.php');
    require_once('database.php');
//    require_one('query_functions.php');

    $iConn = db_connect() or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
                                
?>