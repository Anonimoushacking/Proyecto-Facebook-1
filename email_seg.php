<?php
 $conex=mysql_connect ("localhost","root","") or die ("servidor");
mysql_select_db ("videoaula",$conex) or die ("BD");
$username = $_POST['username'];
$sql= "SELECT * FROM usuarios WHERE email='".$username."'"; 
$result=mysql_query($sql,$conex);
 $recorset=mysql_num_rows($result);
  if ($recorset==1)
   {?>

<script>$("#coe").html("<input type='hidden' id='dato' value='1'><div id='aler' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-cross'></span> "+username+" No Esta Disponible...</div>");</script>
 <?php }else{ ?>
<script>$("#coe").html("<input type='hidden' id='dato' value='0'> <div id='aler' class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><span class='icon-checkmark'></span> "+username+" Esta Disponible...</div>");</script>
<?php  } ?>


