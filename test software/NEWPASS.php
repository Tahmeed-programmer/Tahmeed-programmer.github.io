<?php  
 $newpass=password_hash('12345678',PASSWORD_DEFAULT,array('cost'=>11));
 echo $newpass;
?>