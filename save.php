<?php
session_start();
echo "save is reached\n";
if (file_exists('dados') == false){
  mkdir('dados');
}

if (isset($_GET['save'])){
    echo "save is a get<br>";
}
if (isset($_POST['dados'])){
    $dados=$_POST['dados'];
    if (file_put_contents('dados/'.$_POST['save'].'.txt',rawurldecode($_POST['dados']).PHP_EOL) == false){
    	echo 'falha';
    }else {echo 'saved '.$_POST['save'];}
  
}
