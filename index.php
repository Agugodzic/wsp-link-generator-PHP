<?php 
  include 'src/head.php';
  include 'src/footer.php';
  include 'src/components/form.php';
  include 'src/components/header.php';
  include 'src/components/generateButton.php';
  //include 'src/components/notification.php';

  head();

  if(isset($_GET['generate-button']) && !isset($_GET['phone'])){
    form();
  }else if(!isset($_GET['generate-button'])){
    form();
  }
  else{
    generateButton();
  };

  footer();


?>