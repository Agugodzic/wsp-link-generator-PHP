<?php
$phone;
$text;
$linkWsp;
$html;
$css = '
#chat {
  position: fixed;
  height: 45px;
  bottom: 30px;
  right: 20px;
  cursor: pointer;
  animation-name: chat;
  animation-duration: 1s;
}
#chat:hover {
  height: 55px;
}
@keyframes chat {
  0% {
    opacity: 0%;
  }
  100% {
  }
}';

if(isset($_GET['phone'])){
  $phone = $_GET['phone'];
};

if(isset($_GET['textarea'])){
  $text = $_GET['textarea'];
};

if(isset($_GET['notification'])){
  notification('texto copiado al portapapeles','Ok');
};

if(isset($_GET['phone']) && isset($_GET['textarea'])){
  $linkWsp = "https://api.whatsapp.com/send?phone=+".$phone."&text=".urlencode($text);
  $html = (string) '<a target="_blank" href="'.$linkWsp.'"><img class="wsp-link-button" src="https://i.postimg.cc/Dwr0RGPv/1490889687-whats-app-82529.png"></a>';
};


function generateButton(){
  global $linkWsp;
  global $phone;
  global $text;
  global $html;
  global $css;

  echo'
    <script>
      async function copyHtml(){
        await navigator.clipboard.writeText("'.$html.'");
        let URL = window.location;
        window.location = URL + "&notification";
      }
    </script>

    <div id="content">
    <h2 id="form-title">Implementa el codigo en tu Web</h2>
      <div id="form-container">

        <div id="result">
          <div id="result-content">
            <p>codigo HTML:</p>
            <textarea rows="14" cols="40">'.$html.'</textarea>
            <button onclick="copyHtml()" class="button1">Copiar HTML</button>
          </div>
        </div>

         <div id="result">
            <div id="result-content">
              <p>codigo CSS:</p>
              <textarea rows="14" cols="40">'.$css.'</textarea>
              <button onclick="copyCss()" class="button2">Copiar CSS</button>
            </div>
         </div>
      </div>
      <button class="button-volver">< volver</button>
    </div>
';};
?>