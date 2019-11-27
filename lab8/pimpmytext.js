function baseSetting() {
  document.getElementById('biggerPimpin').onclick = biggerButton;
  document.getElementById('biling').onclick = bilingButton;
  document.getElementById('snoopify').onclick = snoopify;
  document.getElementById('pigLatin').onclick = pigLatin;
  document.getElementById('malkovitch').onclick = malkovitch;
}

function biggerButton(){
  console.log(document.getElementById('text').style.fontSize);
  var txt = document.getElementById('text');
  const increseFont = setInterval(function() {
    console.log(txt.style.fontSize);
    var currentSize = parseInt(txt.style.fontSize);
    console.log(currentSize);
    if (document.getElementById('text').style.fontSize==""){
      document.getElementById('text').style.fontSize = '12pt'
    }
    else{
      document.getElementById('text').style.fontSize = (currentSize+2).toString() + 'pt';
    }
  }, 500);

}

function bilingButton(){
  alert("you click Biling Checkbox")
  var txt = document.getElementById("text");
  var chkbox = document.getElementById('biling');

  if ( chkbox.checked == true )
  {
     txt.style.fontWeight = "bold";
     txt.style.backgroundImage = "url('https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg')";
    // txt.style.color = "green";
    // txt.style.textDecoration = "underline";
  }
  else
  {
    txt.style.fontWeight = "";
    txt.style.backgroundImage = "url('')";
    //txt.style.color = "";
    //txt.style.textDecoration = "";
  }
}

function snoopify(){
  var txt = document.getElementById("text");
  let upper = txt.value.toUpperCase();
  var txtsplit = upper.split('.');
  txt.value = txtsplit.join('-izzle.');
}

function pigLatin(){
  var txt = document.getElementById("text");
  var txtsplit = txt.value.split(' ');
  let pigarr = [];
  txtsplit.map(word => {
    pigarr.push(translatePigLatin(word));
  })
  txt.value = pigarr.join(' ');
}

function malkovitch(){
  var txt = document.getElementById("text");
  var txtsplit = txt.value.split(' ');
  let pigarr = [];
  txtsplit.map(word => {
    console.log(word.length);
    if(word.length === 5){
      pigarr.push("Malkovich");
    }
    else {
      pigarr.push(word);
    }
  })
  txt.value = pigarr.join(' ');
}

function translatePigLatin(str) {
  let consonantRegex = /^[^aeiou]+/;
  let myConsonants = str.match(consonantRegex);
  if(myConsonants === null){
    myConsonants = "";
  }

  console.log(myConsonants);
  console.log(str.replace(consonantRegex, ""));
  console.log(str);
  return str
        .replace(consonantRegex, "")
        .concat(myConsonants)
        .concat("ay")
}


window.onload = baseSetting;
