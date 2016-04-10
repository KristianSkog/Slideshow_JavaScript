var xmlDoc, image, currentID = 0;
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


   // eventlistener calling previmg
    document.getElementById("prevBTN").addEventListener("click", function(){
      event.preventDefault();
      prevImg();
    }, false);

    // eventlistener calling nextimg
    document.getElementById("nextBTN").addEventListener("click", function(){
      event.preventDefault();
      nextImg();
    }, false);

    document.addEventListener("keydown", function(){
      key = event.keyCode;
      if(key === 37){
        prevImg();
      }
      if(key === 39){
        nextImg();
      }
    })

    xmlDoc();
    displayCurrentID()
  }
};
xmlhttp.open("GET", "gallery.xml", true);
xmlhttp.send();

function xmlDoc(){
  xmlDoc = xmlhttp.responseXML;
  image = xmlDoc.getElementsByTagName("image");
  myFunction();
}

function myFunction() {
  var i, title, date, text, path, imageResult = "";
  for (i = 0; i < image.length; i++) {
    title = image[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
    date = image[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;
    text = image[i].getElementsByTagName("text")[0].childNodes[0].nodeValue;
    path = image[i].getElementsByTagName("path")[0].childNodes[0].nodeValue;
      imageResult += "<p>" + title + ", " + date + "</p><img src=' " + path +"' width='200px' ><p>" + text +"</p>";
      document.getElementById("demo").innerHTML = imageResult;
  }
}

function displayCurrentID() {
  document.getElementById('slideshowimg').src = image[currentID].getElementsByTagName("path")[0].childNodes[0].nodeValue;
}

function nextImg() { 
  if(++currentID >= image.length){
    currentID = 0;
  }
  displayCurrentID();
}


function prevImg() {
  if ( --currentID < 0) {
    currentID = image.length-1;
  }
  displayCurrentID();
}