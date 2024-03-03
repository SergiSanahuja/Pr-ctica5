/** Sergi Sanahuja **/
function insert(){
    var result = "<?php insertar(); ?>"
    document.getElementById("result").innerHTML = result;
}

var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'captcha.php?' + Date.now();
}