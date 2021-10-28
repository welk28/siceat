<?php
include('config.php');

$data = (string)strip_tags($_POST['value']);
$field = (string)strip_tags($_POST['field']);

$update = 'UPDATE users3 SET '.$field.' = "'.$data.'" WHERE id_user=1';
$connexion->query($update);
echo $data;
?>