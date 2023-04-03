<?php
include 'notification.php';


$phone;
$text;
$linkWsp;

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
};


function form(){
  global $linkWsp;
  global $phone;
  global $text;

  echo'
    <script>
      async function copyLink(){
        await navigator.clipboard.writeText("'.$linkWsp.'");
        let URL = window.location;
        window.location = URL + "&notification";
      }

      function generateButton(){
        let URL = window.location;
        window.location = URL + "?&generate-button";
      }
    </script>

   <div id="content">
   <h2 id="form-title">Generar link de Whatsapp</h2>
      <div id="form-container">
         <div id="form">
           <div id="form-content">
             <form method="get">
               <p>Numero de celular:</p>
               <input value="'.$phone.'" id="phone" type="tel" name="phone">
               <p>Mensaje predefinido: (opcional)</p>
               <textarea name="textarea" rows="10" cols="40">'.$text.'</textarea>
               <button type="submit" class="button1">Generar</button>
             </form>
           </div>
         </div>
         <div id="result">
            <div id="result-content">
              <p>Tu link:</p>
              <textarea rows="10" cols="40">'.$linkWsp.'</textarea>
              <button onclick="copyLink()" class="button2">Copiar link</button>
              <button onclick="generateButton()" class="button1">Generar boton html - css</button>
            </div>
         </div>
      </div>
   </div>
';};
?>

