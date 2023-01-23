var origin = "";
var destination = "";
var destCoords;
var originCoords;
var radius;
var allowCheckout = false;

function geoFindMe() {
    const status = document.querySelector('#status');
    const mapLink = document.querySelector('#map-link');
  
    function success(position) {
      const latitude  = position.coords.latitude;
      const longitude = position.coords.longitude;
      origin = [latitude,longitude];
  
      status.textContent = '';
      document.querySelector('#origin').value = latitude + "," + longitude;
    }
  
    function error() {
      status.textContent = 'Unable to retrieve your location';
    }
    if(!navigator.geolocation) {
      status.textContent = 'Geolocation is not supported by your browser';
    } else {
      // status.textContent = 'Locating…';
      navigator.geolocation.getCurrentPosition(success, error);
    }
}

// Function to measure the distance of the polyline
function haversine_distance(mk1, mk2) {
  var R = 6371.0710; // Radius of the Earth in kilometers
  var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
  var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
  var difflat = rlat2-rlat1; // Radian difference (latitudes)
  var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

  var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
  return d;
}

function initMap()
{
        var options ={ 
        center:{lat: 43.654, lng: -79.383},
        zoom: 10
        //mapTypeId: google.maps.MapTypeId.HYBRID
    };

    origin = document.querySelector("#origin").value; 

    if (origin == '' || selectedStoreAddress == ''){ 
      // Location for toronto
      var mapOrigin = {lat: 43.653908, lng: -79.384293}
      basicMap(mapOrigin); // Creates a map object
  
    }else{
    // Gets address inputted in 'origin' text box

    // Calls func geocode with the plain text address, returns coordinates
    // Since geocode has an asynchronous api call, 
    // Promise is used to wait for the data of geocode.
    geocode(origin).then(coords => {
      originCoords = coords;
      mapOrigin = {lat: originCoords[0], lng: originCoords[1]};

      // Get plain text address from input box
      //var destination = document.querySelector("#destination").value;
  
      // Repeat geocode
      geocode(selectedStoreAddress).then(coords => {
        destCoords =  coords;
        mapDestination = {lat: destCoords[0], lng: destCoords[1]};

        basicMap(mapOrigin);

        if (typeof mapOrigin !== 'undefined'){
          var marker = new google.maps.Marker(
              {position: mapOrigin, map: map});    
          var infoWindow = new google.maps.InfoWindow(
              { content: "<h5> source </h5>"});
          marker.addListener("click", function()
              { infoWindow.open(map, marker); });
        }
    
        if (typeof mapDestination !== 'undefined'){
          var marker2 = new google.maps.Marker(
              {position: mapDestination, map: map});    
          var infoWindow2 = new google.maps.InfoWindow(
              { content: "<h5> dest </h5x>"});
          marker2.addListener("click", function()
              { infoWindow2.open(map, marker2); });
            }

          console.log(destCoords);
        
          // Line and distance between markers
          var line = new google.maps.Polyline({path: [mapOrigin, mapDestination], map: map});
          radius = haversine_distance(marker, marker2);
          console.log(radius);
          document.getElementById('radius').innerHTML = "Distance: " + radius.toFixed(2) + " km.";

          // Has to be under 50km
          if (radius <= 50)
          {
            document.getElementById('radius').innerHTML += "<br>Locations within range. Proceed for checkout!";
          }
          else {
            document.getElementById('radius').innerHTML += "<br>Locations not within range. Please reduce distance!";
          }

      });
  });
}
}


function basicMap(mapOrigin){
  map = new google.maps.Map(document.getElementById("map"),
            { zoom: 13,
              center: mapOrigin,
            });
            
  var inputOrigin = document.getElementById('origin');
  var searchBoxOrigin = new google.maps.places.SearchBox(inputOrigin);

  map.addListener('bounds_changed', function(){
    searchBoxOrigin.setBounds(map.getBounds());
  });
}
  
async function geocode(address){
  address = address.replace(/\s/g, "+");
  url = `https://maps.googleapis.com/maps/api/geocode/json?address=${address}&key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM`
  console.log(url);

  const request = await fetch(url);
  const data = await request.json();

  var lat = await data.results[0].geometry.location.lat;
  var lng = await data.results[0].geometry.location.lng;
  return [lat,lng];
}

// END MAP


//stuff i just added
var selectedStoreAddress;
function btnfunction() {
  const rbs = document.querySelectorAll('input[name="choice"]');
  for (const rb of rbs) {
      if (rb.checked) {
          selectedStoreAddress = rb.value;
          showTable(selectedStoreAddress);
          break;
      }
  }
  //alert(selectedStoreAddress);
  console.log(selectedStoreAddress);
};

function test(str){
  console.log("hello");
  console.log(str);
}
//show items table
function showTable(str) {
  if (str == "") {
    document.getElementById("show-car-table").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // console.log(this.responseText);
        document.getElementById("show-car-table").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","sql/itemTable.php?q="+str,true);
    xmlhttp.send();
  }
}
function setPrice(){
  console.log("setPrice called");
  tier = document.querySelector("#item-price1").innerText;
  console.log(tier);
  price = 0;
 
}
function infoForPayment(){
  console.log("got to infoforpayment");
  origin;
  console.log(origin);
  selectedStoreAddress;
  console.log(selectedStoreAddress);
  // if(origin == ""){
  //   alert("Please enter your address!");
  // }

  var selectedRow = findSelectedTableRow();
  if (selectedRow == null){
    alert("Please select what you want");
    allowCheckout = false;
  }
  else {
    allowCheckout = true;
    var rCars = document.getElementById("car-table");
    var row = rCars.rows[selectedRow].childNodes;

    var itemId = row[3].innerText;
    var item = row[5].innerText;
    var storename = row[7].innerText;
    var price = row[9].innerText;
  }
  console.log("THE JASON");
    var myJSON = `{"userId": "",
      "storename": "` + storename + `",
      "destination": "` + origin + `",
      "itemInfo":{
        "itemId": `+ itemId +`,
        "item": "`+ item +`",
        "pickup": "`+ selectedStoreAddress +`",
        "price":"`+ price +`"
      }
    }`;

  console.log(myJSON);
  localStorage.setItem('jsonItems',myJSON);
  }

function findSelectedTableRow(){
  var allRadios = document.querySelectorAll('input[name="rowSelect"]');
  var selectedRow = null;

  for (var radio of allRadios) {
    if (radio.checked) {
        selectedRow = radio.value;
        break;
    }
  }
  return selectedRow;
}

function unhideItemsTable(){
  $("#car-table").css("visibility","visible");
}

$(document).ready(function (){
  document.querySelector('#find-me').addEventListener('click', geoFindMe);
  document.querySelector('#show-map').addEventListener('click', initMap);
  document.querySelector('#show-map').addEventListener('click', unhideItemsTable);
  document.querySelector('#checkout').addEventListener('click',infoForPayment);
  document.getElementById("#checkout").onclick = function () {
    if (allowCheckout){
      window.open("paymentItems.php");
    }
  }
})
