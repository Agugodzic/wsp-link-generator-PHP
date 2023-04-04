<?php 
  include 'src/head.php';
  include 'src/components/header.php';
  include 'src/components/notification.php';

  //include 'src/components/notification.php';

  if(isset($_GET['generate-button']) && !isset($_GET['phone'])){
    include_once('src/components/form.php');
  }else if(!isset($_GET['generate-button'])){
    include_once('src/components/form.php');
  }
  else{
    include_once('src/components/generateButton.php');
  };

  include 'src/footer.php';
?>