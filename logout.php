<?php

session_start();
session_unset(); 
session_destroy(); 

echo "<center> <h1> your account is logout </h1></center>";

include 'registration.html';

exit();

?>
