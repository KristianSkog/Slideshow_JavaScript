var xmlDoc, image, Id = 0;
var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

    // The event listener for prevImage 
    document.getElementById("prevBTN").addEventListener("click", function(){
      event.preventDefault();
      prevImage();
    }, false);
    
    // The event listener for nextImage 
    document.getElementById("nextBTN").addEventListener("click", function(){
      event.preventDefault();
      nextImage();
    }, false);

    document.addEventListener("keydown", function(){
      key = event.keyCode;
      if(key === 37){
        prevImage();
      }
      if(key === 39){
        nextImage();
      }
    })

    xmlDoc();
    currentImageID()
    deleteBTN()
    
  }
};
xmlhttp.open("GET", "gallery.xml", true);
xmlhttp.send();

// Displays all the images in the XML file.
function allImages() {
  var i, title, date, text, path, imageResult = "", deleteInput = "";
  for (i = 0; i < image.length; i++) {
    title = image[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
    date = image[i].getElementsByTagName("date")[0].childNodes[0].nodeValue;
    text = image[i].getElementsByTagName("text")[0].childNodes[0].nodeValue;
    path = image[i].getElementsByTagName("path")[0].childNodes[0].nodeValue;
      imageResult += "<div class='row margin-top allImages'><div class='text-align'><div class='col-xs-12 '><p>" + title + "<br> " + date + "</p> <img src=' " + path +"' width='200px' /> <p>" + text +"</p></div></div></div>";
      document.getElementById("demo").innerHTML = imageResult;
  }
}

function xmlDoc(){
  xmlDoc = xmlhttp.responseXML;
  image = xmlDoc.getElementsByTagName("image");
  allImages();
}

// Shows the text, date, image and text for the specific image
function currentImageID() {
  document.getElementById('imageTitle').innerHTML = image[Id].getElementsByTagName("title")[0].childNodes[0].nodeValue;
  document.getElementById('imageDate').innerHTML = image[Id].getElementsByTagName("date")[0].childNodes[0].nodeValue; 
  document.getElementById('slideshowimg').src = image[Id].getElementsByTagName("path")[0].childNodes[0].nodeValue; 
  document.getElementById('imageText').innerHTML = image[Id].getElementsByTagName("text")[0].childNodes[0].nodeValue; 
}

// Adds hidden input and a delete button
function deleteBTN(){
  document.getElementById('deleteForm').innerHTML = "<input type='hidden' name='path' value='" + image[Id].children[3].innerHTML + "'></input><button id='delete' class='glyphicon glyphicon-trash buttonStyle formButten' type='submit' name='deleteImage' value='" + image[Id].getAttribute('id')+ "'></button> ";
  document.getElementById('delete'),addEventListener('click', xmlDoc());
}

// Go to the next image
function nextImage() { 
  if(++Id >= image.length){
    Id = 0;
  }
  currentImageID();
}

// Go to the previous image
function prevImage() {
  if ( --Id < 0) {
    Id = image.length-1;
  }
  currentImageID();
}