var origin = "";
var destination = "";
var destCoords;
var originCoords;
var radius =0 ;
var map;
var tripDurInMins;
var price;
var tier;
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
  // Gets address inputted in 'origin' text box
  origin = document.querySelector("#origin").value; 
  destination = document.querySelector("#destination").value;

  // If text boxes are empty: when refreshing page
  if (origin == '' || destination == ''){ 
    // Location for toronto
    var mapOrigin = {lat: 43.653908, lng: -79.384293}
    basicMap(mapOrigin); // Creates a map object

  }else{

    // Calls func geocode with the plain text address, returns coordinates
    // Since geocode has an asynchronous api call, 
    // Promise is used to wait for the data of geocode.
    geocode(origin).then(coords => {
      originCoords = coords;
      mapOrigin = {lat: originCoords[0], lng: originCoords[1]};
  
      // Repeat geocode
      geocode(destination).then(coords => {
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
          document.getElementById('distance-value').innerHTML = radius.toFixed(2) + " km.";

          // Has to be under 50km
          if (radius <= 50)
          {
            document.getElementById('status').innerHTML = "Locations accepted. Please select a tier!";
          }
          else {
            document.getElementById('status').innerHTML = "Locations not within 50km. Please reduce distance!";
          }
          var event = new CustomEvent("mapReloadedEvent");
          document.dispatchEvent(event);
      });
    });
  }
  // This event is used to recognize when the map is reloaded - in order to change price
  
}

function basicMap(mapOrigin){
  map = new google.maps.Map(document.getElementById("map"),
            { zoom: 13,
              center: mapOrigin,
            });
            
  var inputDest = document.getElementById('destination');
  var inputOrigin = document.getElementById('origin');
  var searchBoxDest = new google.maps.places.SearchBox(inputDest);
  var searchBoxOrigin = new google.maps.places.SearchBox(inputOrigin);
  
  map.addListener('bounds_changed', function(){
    searchBoxDest.setBounds(map.getBounds());
  });

  map.addListener('bounds_changed', function(){
    searchBoxOrigin.setBounds(map.getBounds());
  });
}
  
async function geocode(address){
  address = address.replace(/\s/g, "+");
  url = `https://maps.googleapis.com/maps/api/geocode/json?address=${address}&key=AIzaSyCIumcSOTeP890tfGtNPajH0WmErIjAgcM`

  const request = await fetch(url);
  const data = await request.json();

  var lat = await data.results[0].geometry.location.lat;
  var lng = await data.results[0].geometry.location.lng;
  return [lat,lng];
}

// END MAP
// FORMS 

function editInputDate(){
    currDateAndTime = currDateAndTime();
    document.querySelector("#date").setAttribute("value", currDateAndTime[0]);
    document.querySelector("#date").setAttribute("min", currDateAndTime[0]);
    console.log("Tried to change time to " + currDateAndTime[1]);
    document.querySelector("#time").setAttribute("value", currDateAndTime[1])
  }
  
function currDateAndTime() {
  var d = new Date();
  var month = '' + (d.getMonth() + 1);
  var day = '' + d.getDate();
  var year = d.getFullYear();

  if (month.length < 2) 
      month = '0' + month;
  if (day.length < 2) 
      day = '0' + day;
  var date = [year, month, day].join('-')

  var hours = d.getHours();
  var min = d.getMinutes();
  if (min.length == 1){
    min = ("0" + min)
  }
  var time = [hours,min].join(':')
  return [date,time]
}
  
  // DATABASE / CAR TABLE
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
    xmlhttp.open("GET","sql/carTable.php?q="+str,true);
    xmlhttp.send();
  }
    
}

function setPrice(){
  console.log("setPrice called");
  tier = document.querySelector("#tier").value;
  var distance = radius.toFixed(2); // Distance in km
  price = 0;
  tripDurInMins = (radius / 0.35) + 1; // 0.675km/minute is average speed in downtown toronto acc to my calc
 
  // Check if within 50km 
  if (radius < 50 && radius != 0) {
    if (tier == 'econ'){
      // Base: $2.50; Booking fee: $2.75; Minimum: $5.25; per Minute: $0.18; per Km: $0.81 
      price = (2.75 + 5.25 + (0.18 * tripDurInMins) + (0.81 * distance))
    }
    else if (tier == 'xl'){
      // Base: $5; Booking fee: $3; Minimum: $8; per Minute: $0.36 ; Per Km: $1.55
      price = (3 + 3 + 8 + (0.40 * tripDurInMins) + (1.75 * distance))
    }
    else if (tier == 'premium'){
      // Base: $8.75; Booking fee: $0; Minimum: $15.75; per Minute: $0.85; Per Km: $2.23
      price = (5 + 0 + 15.75 + (0.95 * tripDurInMins) + (2.30 * distance))
    }
    console.log("inside if");
    document.querySelector("#price-value").innerHTML = "CA$" + price.toFixed(2);
    document.querySelector("#duration-value").innerHTML = tripDurInMins.toFixed(0) + " minutes.";
  }
  else {
    console.log("inside else");
    document.querySelector("#price-value").innerHTML = '';
    document.querySelector("#duration-value").innerHTML = '';
  }
}

function unhideTableRow(){
  if (radius < 50){
    $("#bottom-left-table").css("visibility","visible");
  }
}
  
function infoForPayment(){
  console.log("got to infoforpayment");
  origin;
  destination;
  radius;
  tripDurInMins;
  price;
  tier;
  var date = document.getElementById("date").value;
  var time = document.getElementById("time").value;

  var selectedRow = findSelectedTableRow();
  if (selectedRow == null){
    alert("Please select a car on the table.");
    allowCheckout = false;
  }
  else if (radius > 50) {
    alert("Locations more than 50km apart, please reduce distance.")
  }
  else {
    allowCheckout = true;
    var rCars = document.getElementById("car-table");
    var row = rCars.rows[selectedRow].childNodes;

    var carId = row[3].innerText;
    var carModel = row[5].innerText;
    var driver = row[7].innerText;
  }

  var myJSON = `{"userId": "",
    "pickup": "` + origin + `",
    "destination": "` + destination + `",
    "distance": ` + radius.toFixed(2) + `,
    "price": ` + price.toFixed(2) + `,
    "tripTime": ` + tripDurInMins.toFixed(0) + `,
    "date": {
      "date": "` + date + `",
      "time": "`+ time +`"
    },
    "tier": "` + tier + `",
    "carInfo":{
      "carId": `+ carId +`,
      "carModel": "`+ carModel +`",
      "driver": "`+ driver +`"
    }
  }`;

  console.log(myJSON);
  localStorage.setItem('json',myJSON);
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


$(document).ready(function (){
  document.querySelector('#find-me').addEventListener('click', geoFindMe);
  document.querySelector('#show-map').addEventListener('click',() => {initMap(), unhideTableRow()});  
  document.querySelector('#distance-value').addEventListener('change', setPrice);
  document.querySelector('#checkout').addEventListener('click',infoForPayment);
  document.addEventListener("mapReloadedEvent", setPrice, {passive:true});
  editInputDate();
  
  document.getElementById("checkout").onclick = function () {
    if (allowCheckout){
      window.open("payment.php");
    }
  };

  // document.querySelector('input[name="rowSelect"]').onclick = function(){
  //   console.log("radio pressed");
  //   $("#checkout").css("visibility","visible");
  // };
    
 //$('#car-table tr').click(function() {
 //  console.log('pressed');
 //  $(this).find('th input:radio').prop('checked', true);
 //})
});