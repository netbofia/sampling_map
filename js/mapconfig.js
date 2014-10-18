$(document).ready(function(){
// create a map in the "map" div, set the view to a given place and zoom
  $map = L.map('chartdiv').setView([38.644, -9.2019], 7);
// add an OpenStreetMap tile layer
  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo($map);


});
