<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@5/turf.min.js"></script>
    <x-slot name="header">
        <a class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </a>
    </x-slot>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <script src="//api.tiles.mapbox.com/mapbox.js/plugins/turf/v1.4.0/turf.min.js"></script>
    <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script>

    <div style="height:900px; width:900px" id="map"></div>

</x-app-layout>

<script>
var p=[];


var map = L.map('map', {
    center: [40.329796, -3.720919],
    zoom:10
});
L.marker([40.416845138888885, -3.720919]).addTo(map);
L.marker([40, -3]).addTo(map);

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);



function getColor(d) {
return d > 15 ? '#800026' :
       d > 13  ? '#BD0026' :
       d > 11  ? '#E31A1C' :
       d > 6  ? '#FC4E2A' :
       d > 4   ? '#FD8D3C' :
       d > 2   ? '#FEB24C' :
       d > 0   ? '#FED976' :
                  '#FFFFFF';
}


function style(feature) {
return {
    fillColor: getColor(feature.properties.count),
    weight: 2,
    opacity: 1,
    color: 'white',
    dashArray: '3',
    fillOpacity: 0.7
};
}



var bbox = [-106.754150390625, 35.02887183968363,-106.47674560546875, 35.18615531474442];
var size = .01;
var hexgrid = turf.hex(bbox, size);
for(var x=0;x<Object.keys(hexgrid.features).length;x++){
hexgrid.features[x].properties.count=0;}


var params="f=json&outSR=4326&outFields=*&where=1=1";
var url = "http://coagisweb.cabq.gov/arcgis/rest/services/public/environmentalissues/MapServer/1/query"; 
//var url = "http://coagisweb.cabq.gov/arcgis/rest/services/public/APD_Incidents/MapServer/0/query";
//var url = "http://coagisweb.cabq.gov/arcgis/rest/services/public/ParkingCitationLocations/MapServer/0/query";
console.log(params);
http=new XMLHttpRequest();
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
http.onreadystatechange = function() {//Call a function when the state changes.
if(http.readyState == 4 && http.status == 200) {
    //console.log(http.responseText);
    var result= JSON.parse(http.responseText);
    console.log(Object.keys(hexgrid.features).length);
    for(x=0;x<Object.keys(hexgrid.features).length;x++){
console.log(result.features[x].attributes.OBJECTID);
        var t = L.marker([result.features[x].geometry.y,result.features[x].geometry.x]);//.addTo(map);
        p.push(t.toGeoJSON());
}
test();
}};
http.send(params);


function test(){

    for(var y=0;y<Object.keys(hexgrid.features).length-1;y++){

            for(var c=0;c<p.length-1;c++){
                var poly=turf.polygon(hexgrid.features[y].geometry.coordinates);
                
                if(turf.inside(p[c],poly)){hexgrid.features[y].properties.count+=1;console.log(hexgrid.features[y].properties.count);}
            }//inside inside for
            
        }//end for
        

L.geoJson(hexgrid,{style: style}).addTo(map);	
}
</script>