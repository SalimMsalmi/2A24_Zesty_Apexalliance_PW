<?php
$update=-1;

if(isset($_POST['soin']))
{
   $update=2;
}
else if(isset($_POST['coloration']))
{
    $update=3;
}
else if(isset($_POST['maquillage']))
$update=1;
?>
