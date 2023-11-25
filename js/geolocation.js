var loc = document.getElementById('location');
navigator.geolocation.getCurrentPosition(showLoc);

function showLoc(pos) {
    loc.innerHTML = "<img src='images/icon-marker.png'>&ensp;" + pos.coords.latitude + ", " + pos.coords.longitude;
}