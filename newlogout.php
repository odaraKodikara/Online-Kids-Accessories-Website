<?php
session_start ();
unset ($_SESSION ['First_Name']);
session_destroy ();

header ("Location: index.html");
exit;
?>