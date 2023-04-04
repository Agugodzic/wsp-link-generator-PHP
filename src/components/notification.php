<?php 
  function notification($notificationText,$buttonText){
    echo '
    <script>
      function buttonFunction(){
        let URL = window.location.toString();
        URL = URL.substr(0, URL.length - 14);
        window.location = URL;
      }
    </script>
    <div id="notification-background"></div>
    <div id="notification-container">
      <p id="notification-text">'.$notificationText.'</p>
      <button onclick="buttonFunction()" class="notification-button">'.$buttonText.'</button>
    </div>
    ';
  };
?>