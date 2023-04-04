<?php
$phone = null;
$text = '';
$linkWsp = '';
$inputClass = '';

if(isset($_GET['phone'])){
  $phone = $_GET['phone'];
};

if(isset($_GET['textarea'])){
  $text = $_GET['textarea'];
};

if(isset($_GET['notification']) && !isset($_GET['phone'])){
  notification('El campo se encuentra vacio','Ok');
}else if(isset($_GET['notification'])){
  notification('Link copiado al portapapeles','Ok');
};

if(isset($_GET['phone']) && isset($_GET['textarea'])){
  $text = $_GET['textarea'];
  if(strlen($text)>0){
    $linkWsp = "https://api.whatsapp.com/send?phone=".urlencode($phone)."&text=".urlencode($text);
  }else{
    $linkWsp = "https://api.whatsapp.com/send?phone=".urlencode($phone);
  };
}; 

if(isset($_GET['generate-button']) && !isset($_GET['phone'])){
  $inputMessage = 'Debe completar este campo';
}else if(!isset($_GET['generate-button'])){
  $inputMessage = '';
}
?>

<script>
  async function copyLink(){
    await navigator.clipboard.writeText("<?=$linkWsp?>");
    let URL = window.location;
    window.location = URL + "?&notification";
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
            <input value=<?="'$phone'"?> name="phone">
            <p id="input-danger"><?= $inputMessage ?></p>
            <p>Mensaje predefinido: (opcional)</p>
            <textarea class="textarea" name="textarea"><?= $text ?></textarea>
            <button onclick="" type="submit" class="button1">Generar</button>
          </form>
        </div>
      </div>
      <div id="result">
        <div id="result-content">
          <p>Tu link:</p>
          <textarea class="textarea"><?= $linkWsp ?></textarea>
          <button onclick=copyLink() class="button2">Copiar link</button>
          <button onclick=generateButton() class="button1">Generar boton html - css</button>
        </div>
      </div>
  </div>
</div>



