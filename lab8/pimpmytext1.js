

function helloWorld(){
  document.getElementById("text").style.fontSize = "24pt";
}

function bilingButton(chkbox){
  alert("you click Biling Checkbox")
  var txt = document.getElementById("text");
  if ( chkbox.checked == true )
  {
     txt.style.fontWeight = "bold";
    // txt.style.color = "green";
    // txt.style.textDecoration = "underline";
  }
  else
  {
    txt.style.fontWeight = "";
    txt.style.color = "";
    txt.style.textDecoration = "";
  }
}

function snoopify(){
  var txt = document.getElementById("text");
  txt.style.textTransform = "uppercase";
  var txtsplit = txt.value.split('.');
  txt.value = txtsplit.join('-izzle.');
}
