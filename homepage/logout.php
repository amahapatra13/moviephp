<?php
session_start();
session_destroy();
header ("location: ../landing/index.php");
 ?>