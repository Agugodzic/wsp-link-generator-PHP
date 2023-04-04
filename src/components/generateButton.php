<?php
$phone;
$text;
$linkWsp;
$html;
$css;

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
  $linkWsp = "https://api.whatsapp.com/send?phone=".urlencode($phone)."&text=".urlencode($text);
  $html = "<a target='_blank' href='".$linkWsp."'><img class='wsp-link-button' src='https://i.postimg.cc/Dwr0RGPv/1490889687-whats-app-82529.png'></a>";
  $css = ".wsp-link-button{position: fixed;height: 45px;bottom: 30px;right: 20px;cursor: pointer;animation-name: wsp-animation;animation-duration: 1s;}.wsp-link-button:hover {height: 55px;}@keyframes wsp-animation {0% {opacity: 0%;}100% {}}";
};
?>

<script>
  async function copyHtml(){
    await navigator.clipboard.writeText("<?=$html?>");
    let URL = window.location;
    window.location = URL + "&notification";
  };
  async function copyCss(){
    await navigator.clipboard.writeText("<?=$css?>");
    let URL = window.location;
    window.location = URL + "&notification";
  };
  </script>
  
  <script>
    function volver(){
    let URL = window.location;
    window.location = "";
    }
  </script>

<div id="content">
<h2 id="form-title">Implementa el codigo en tu Web</h2>
  <div id="form-container">

    <div id="result">
      <div id="result-content">
        <p>codigo HTML:</p>
        <textarea class="textareaCode" rows="14" cols="40"><?= $html ?></textarea>
        <button onclick="copyHtml()" class="button1">Copiar HTML</button>
      </div>
    </div>

      <div id="result">
        <div id="result-content">
          <p>codigo CSS:</p>
          <textarea class="textareaCode" rows="14" cols="40"><?=$css?></textarea>
          <button onclick="copyCss()" class="button2">Copiar CSS</button>
        </div>
      </div>
  </div>
  <button class="button-back" onclick="volver()">< volver</button>
</div>
