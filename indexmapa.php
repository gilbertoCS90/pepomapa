<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Zonas ppo</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script language="JavaScript" src="CoordConverter.js"></script>
    <script>


/**
*creacion de variables para un circulo
*/

var contador=0;
var puntos = new Array();
var citymap = {};
<?php 
 //header("Content-type: text/javascript");
include("conexionzona.php");
  $consulta=mysqli_query($conexionzona,"select * from zona2 ");   
while($fila=mysqli_fetch_array($consulta)){
$phpNombre=$fila['NOMBRE'];
$phpID=$fila['ID'];
$phpRadio=$fila['RADIO'];  
$phpP1lat1=$fila['P1LAT1'];
$phpP1lat2=$fila['P1LAT2'];
$phpP1lat3=$fila['P1LAT3'];
$phpP1lat4=$fila['P1LAT4'];
$phpP1long1=$fila['P1LONG1'];
$phpP1long2=$fila['P1LONG2'];
$phpP1long3=$fila['P1LONG3'];
$phpP1long4=$fila['P1LONG4'];
?>
var jsP1lat1 = "<?php echo $phpP1lat1; ?>" ;
var jsP1lat2 = "<?php echo $phpP1lat2; ?>" ;
var jsP1lat3 = "<?php echo $phpP1lat3; ?>" ;
var jsP1lat4 = "<?php echo $phpP1lat4; ?>" ;
var jsP1long1 = "<?php echo $phpP1long1; ?>" ;
var jsP1long2 = "<?php echo $phpP1long2; ?>" ;
var jsP1long3 = "<?php echo $phpP1long3; ?>" ;
var jsP1long4 = "<?php echo $phpP1long4; ?>" ;
var jsP1Rad = "<?php echo $phpRadio; ?>" ;
var jsId = "<?php echo $phpID; ?>" ;
//var jsnombre = "<?php echo $phpNombre; ?>"
var strmmr= "mmr_";
var nomId = jsP1Rad*1.0;

//alert (jsRadio);
//alert (contador);
//create an object containing LatLng and population for each city.
mmr_1= GMS2Decimal(jsP1lat1,jsP1lat2,jsP1lat3,"N",jsP1long1,jsP1long2,jsP1long3,"W");
citymap[contador] = {  center: new google.maps.LatLng(mmr_1.latitude,mmr_1.longitude),
  nomcirculo: jsId,
  pos1: mmr_1.latitude,
  pos2: mmr_1.longitude,
  population: nomId };
contador=contador+1;
<?php

}//final del while
?>
//var var cityCircle variable para la creacion del circulo

        
//var map para variable mapa
var map;

var infoWindow;

//dentro de la 
function initialize() {

  var mapOptions = {
    zoom: 7,
    //la siguiente linea inicializa el mapa en una pocicion pero ya que vamos a utilizar nuetra localizacion no la usamos
    center: new google.maps.LatLng(mmr_1.latitude,mmr_1.longitude),
    mapTypeId: google.maps.MapTypeId.TERRAIN
  };
  
 //usamos geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'TU estas aqui.'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
//terminamos de usar geolocalizacion

  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);








  var zonaProhibidaCoordenadas = new Array();

zonaProhibidaCoordenadas[0] = [
    new google.maps.LatLng( 19.426625 ,  -99.2020777778),
     new google.maps.LatLng( 19.42375 ,  -99.1775833333),

    new google.maps.LatLng( 19.4205555556,  -99.1769444444),
     new google.maps.LatLng( 19.4038888889,  -99.1872222222),

    new google.maps.LatLng( 19.4031611111,  -99.1874638889),
     new google.maps.LatLng(19.4022333333 ,  -99.1976416667),

    new google.maps.LatLng( 19.4020277778,  -99.2001666667),
     new google.maps.LatLng( 19.426625,  -99.2020777778)
]; 
zonaProhibidaCoordenadas[1] = [
    new google.maps.LatLng( 19.4652777778,  -99.225),
     new google.maps.LatLng( 19.4616666667,  -99.4616666667),

    new google.maps.LatLng( 19.4536111111,  -99.2188888889),
     new google.maps.LatLng( 19.4436111111,  -99.2125),

    new google.maps.LatLng( 19.4388888889,  -99.2122222222),
     new google.maps.LatLng( 19.4386111111,  -99.2141666667),

    new google.maps.LatLng( 19.435,  -99.2119444444),
     new google.maps.LatLng( 19.4244444444,  -99.2344444444),

    new google.maps.LatLng( 19.4341666667,  -99.25),
     new google.maps.LatLng( 19.44,  -99.2483333333),

    new google.maps.LatLng( 19.4583333333,  -99.2372222222),
     new google.maps.LatLng( 19.4652777778,  -99.225)
]; 
zonaProhibidaCoordenadas[2] = [

    new google.maps.LatLng( 19.3902777778,  -99.2397222222),
     new google.maps.LatLng( 19.3911111111,  -99.2269444444),

    new google.maps.LatLng( 19.3833333333,  -99.2269444444),
     new google.maps.LatLng( 19.3833333333,  -99.2397222222),

    new google.maps.LatLng( 19.3902777778,  -99.2397222222)
]; 
zonaProhibidaCoordenadas[3] = [

    new google.maps.LatLng( 19.4330555556,  -99.1338888889),
     new google.maps.LatLng( 19.4327777778,  -99.13),

    new google.maps.LatLng( 19.4305555556,  -99.1302777778),
     new google.maps.LatLng( 19.4311111111,  -99.1341666667),

    new google.maps.LatLng( 19.4330555556,  -99.1338888889)
]; 
zonaProhibidaCoordenadas[4] = [

    new google.maps.LatLng( 19.3583333333,  -99.0102777778),
     new google.maps.LatLng( 19.3569444444,  -99.0094444444),

    new google.maps.LatLng( 19.3530555556,  -99.0127777778),
     new google.maps.LatLng( 19.3544444444,  -99.0141666667),

    new google.maps.LatLng( 19.3583333333,  -99.0102777778)
]; 
zonaProhibidaCoordenadas[5] = [
new google.maps.LatLng( 19.3222222222,  -99.1383333333),
     new google.maps.LatLng( 19.3291666667,  -99.1444444444),

    new google.maps.LatLng( 19.33,  -99.1405555556),
     new google.maps.LatLng( 19.3222222222,  -99.1383333333)

]; 
zonaProhibidaCoordenadas[6] = [

    new google.maps.LatLng( 19.4238888889,  -99.1425),
     new google.maps.LatLng( 19.4430555556,  -99.1388888889),

    new google.maps.LatLng( 19.4422222222,  -99.1233333333),
     new google.maps.LatLng( 19.4219444444,  -99.1263888889),

    new google.maps.LatLng( 19.4238888889,  -99.1425)
]; 
zonaProhibidaCoordenadas[7] = [

    new google.maps.LatLng( 19.4430555556,  -99.1388888889),
     new google.maps.LatLng( 19.4422222222,  -99.1233333333),

    new google.maps.LatLng( 19.4333333333,  -99.1152777778),
     new google.maps.LatLng( 19.425,  -99.1152777778),

    new google.maps.LatLng( 19.4219444444,  -99.1263888889),
     new google.maps.LatLng( 19.4238888889,  -99.1425),

    new google.maps.LatLng( 19.4430555556,  -99.1388888889)
]; 
zonaProhibidaCoordenadas[8] = [

    new google.maps.LatLng( 19.3747222222,  -99.0638888889),
     new google.maps.LatLng( 19.3636111111,  -99.0694444444),

    new google.maps.LatLng( 19.3647222222,  -99.0597222222),
     new google.maps.LatLng( 19.3747222222,  -99.0597222222),

    new google.maps.LatLng( 19.3747222222,  -99.0638888889)
]; 
zonaProhibidaCoordenadas[9] = [

    new google.maps.LatLng( 19.3161111111,  -99.1211111111),
     new google.maps.LatLng( 19.3166666667,  -99.1066666667),

    new google.maps.LatLng( 19.32,  -99.1133333333),
     new google.maps.LatLng( 19.3208333333,  -99.1222222222),

    new google.maps.LatLng( 19.3236111111,  -99.1283333333),
     new google.maps.LatLng( 19.3208333333,  -99.1308333333)

]; 
zonaProhibidaCoordenadas[10] = [

    new google.maps.LatLng( 19.3797222222,  -99.0611111111),
     new google.maps.LatLng( 19.3830555556,  -99.0605555556),

    new google.maps.LatLng( 19.3811111111,  -99.055),
     new google.maps.LatLng( 19.3786111111,  -99.0555555556)

];
zonaProhibidaCoordenadas[11] = [

    new google.maps.LatLng( 19.2891666667,  -99.1058333333),
     new google.maps.LatLng( 19.2911111111,  -99.1066666667),

    new google.maps.LatLng( 19.2941666667,  -99.1008333333),
     new google.maps.LatLng( 19.2919444444,  -99.1058333333)
];
zonaProhibidaCoordenadas[12] = [

    new google.maps.LatLng( 19.3144444444,  -99.0705555556),
     new google.maps.LatLng( 19.3077777778,  -99.0841666667),

    new google.maps.LatLng( 19.3088888889,  -99.0894444444),
     new google.maps.LatLng( 19.3127777778,  -99.0886111111),

    new google.maps.LatLng( 19.3138888889,  -99.0861111111),
     new google.maps.LatLng( 19.3144444444,  -99.0830555556)
];
zonaProhibidaCoordenadas[13] = [

    new google.maps.LatLng( 19.4233333333,  -99.0772222222),
     new google.maps.LatLng( 19.4252777778,  -99.0766666667),

    new google.maps.LatLng( 19.4269444444,  -99.0738888889),
     new google.maps.LatLng( 19.4225,  -99.0747222222),

    new google.maps.LatLng( 19.4230555556,  -99.0769444444)
];
zonaProhibidaCoordenadas[14] = [
    new google.maps.LatLng( 19.7166666667,  -98.9833333333),
     new google.maps.LatLng( 19.6833333333,  -99.15),

    new google.maps.LatLng( 19.8833333333,  -99.2166666667),
     new google.maps.LatLng( 20.0666666667,  -99.2333333333),

    new google.maps.LatLng( 20.1333333333,  -98.95),
     new google.maps.LatLng( 20.1333333333,  -98.75),

    new google.maps.LatLng( 20.0833333333,  -98.3666666667),
     new google.maps.LatLng( 19.7333333333,  -98.5666666667),

    new google.maps.LatLng( 19.7166666667,  -98.85),
     new google.maps.LatLng( 19.7166666667,  -98.9833333333)
];
zonaProhibidaCoordenadas[15] = [

    new google.maps.LatLng(21.0666666667,  -99.6),
     new google.maps.LatLng(20.2666666667,  -99.3166666667),

    new google.maps.LatLng(20.65,  -100.05),
     new google.maps.LatLng( 21.0666666667,  -99.6),

    new google.maps.LatLng(20.2666666667,  -99.35)

];
zonaProhibidaCoordenadas[16] = [

    new google.maps.LatLng(21.0666666667,  -99.6),
     new google.maps.LatLng(21.1666666667,  -99.1333333333),

    new google.maps.LatLng(21.1666666667,  -99.0833333333),
     new google.maps.LatLng(20.2833333333,  -99.1333333333),

    new google.maps.LatLng(20.2666666667,  -99.3166666667),
     new google.maps.LatLng(21.0666666667,  -99.6)
];
zonaProhibidaCoordenadas[17] = [

    new google.maps.LatLng(19.6833333333,  -98.1833333333),
     new google.maps.LatLng(19.7666666667,  -97.55),

    new google.maps.LatLng(19.5833333333,  -97.2333333333),
     new google.maps.LatLng(18.4666666667,  -97.3833333333),

    new google.maps.LatLng(17.9,  -97.6833333333),
     new google.maps.LatLng(18.3833333333,  -98.1),

    new google.maps.LatLng(18.6,  -98.4333333333),
     new google.maps.LatLng(19.15,  -098.0600),

    new google.maps.LatLng(19.6833333333,  -98.1833333333)

];
zonaProhibidaCoordenadas[18] = [

    new google.maps.LatLng(19.2166666667,  -101.7),
     new google.maps.LatLng(18.15,  -100.65),

    new google.maps.LatLng(18.55,  -99.7666666667),
     new google.maps.LatLng(18.6666666667,  -99.7666666667),

    new google.maps.LatLng(19.3,  -99.8166666667),
     new google.maps.LatLng(19.5,  -100.916666667),

    new google.maps.LatLng(19.2166666667,  -101.7)
];
zonaProhibidaCoordenadas[19] = [

    new google.maps.LatLng(20.9166666667,  -103.083333333),
     new google.maps.LatLng(20.8,  -102.816666667),

    new google.maps.LatLng(20.7166666667,  -102.883333333),
     new google.maps.LatLng(20.6166666667,  -103.116666667),

    new google.maps.LatLng(20.7,  -103.3),
     new google.maps.LatLng(20.7333333333,  -103.333333333),

    new google.maps.LatLng(20.9166666667,  -103.083333333)
];
zonaProhibidaCoordenadas[20] = [

    new google.maps.LatLng(20.75,  -103.516666667),
     new google.maps.LatLng(20.75,  -103.3500),

    new google.maps.LatLng(20.8166666667,  -103.666666667),
     new google.maps.LatLng(20.85,  -103.533333333),

    new google.maps.LatLng(20.8833333333,  -103.4),
     new google.maps.LatLng(20.7333333333,  -103.333333333),

    new google.maps.LatLng(20.75,  -103.516666667)
];
zonaProhibidaCoordenadas[21] = [
    new google.maps.LatLng(20.35,  -103.8),
     new google.maps.LatLng(20.5333333333,  -104.066666667),

    new google.maps.LatLng(20.75,  -104.1),
     new google.maps.LatLng(20.95,  -104.066666667),

    new google.maps.LatLng(20.9333333333,  -103.833333333),
     new google.maps.LatLng(20.75,  -103.833333333),

    new google.maps.LatLng(20.6666666667,  -103.916666667),
     new google.maps.LatLng(20.4833333333,  -103.833333333),

    new google.maps.LatLng(20.35,  -103.8)
];
zonaProhibidaCoordenadas[22] = [

    new google.maps.LatLng(20.9333333333,  -103.833333333),
     new google.maps.LatLng(20.7333333333,  -103.633333333),

    new google.maps.LatLng(20.6333333333,  -103.7),
     new google.maps.LatLng(20.4666666667,  -103.533333333),

    new google.maps.LatLng(20.35,  -103.8),
     new google.maps.LatLng(20.4833333333,  -103.833333333),

    new google.maps.LatLng(20.6666666667,  -103.916666667),
     new google.maps.LatLng(20.75,  -103.833333333),

    new google.maps.LatLng(20.9333333333,  -103.833333333)
];
zonaProhibidaCoordenadas[23] = [

    new google.maps.LatLng(20.35,  -103.8),
     new google.maps.LatLng(20.4,  -103.666666667),

    new google.maps.LatLng(20.4666666667,  -103.533333333),
     new google.maps.LatLng(20.25,  -103.45),

    new google.maps.LatLng(20.1166666667,  -103.4),
     new google.maps.LatLng(20.35,  -103.533333333),

    new google.maps.LatLng(20.2333333333,  -103.583333333),
     new google.maps.LatLng(20.35,  -103.8)
];
zonaProhibidaCoordenadas[24] = [

    new google.maps.LatLng(18.75,  -95.75),
     new google.maps.LatLng(18.75,  -96.0833333333),

    new google.maps.LatLng(19.15,  -96.0833333333),
     new google.maps.LatLng(19.15,  -95.75),

    new google.maps.LatLng(18.75,  -95.75)
];
zonaProhibidaCoordenadas[25] = [

    new google.maps.LatLng(20.9166666667,  -103.083333333),
     new google.maps.LatLng(21.1833333333,  -102.883333333),

    new google.maps.LatLng(21.0166666667,  -102.4),
     new google.maps.LatLng(20.8,  -102.816666667),

    new google.maps.LatLng(20.9166666667,  -103.083333333)
];
zonaProhibidaCoordenadas[26] = [

    new google.maps.LatLng(21.1833333333,  -102.883333333),
     new google.maps.LatLng(21.4333333333,  -102.55),

    new google.maps.LatLng(21.5333333333,  -102.216666667),
     new google.maps.LatLng(21.3666666667,  -101.883333333),

    new google.maps.LatLng(21.0,  -102.166666667),
     new google.maps.LatLng(21.0166666667,  -102.4),

    new google.maps.LatLng(21.1833333333,  -102.883333333)
];
zonaProhibidaCoordenadas[27] = [

    new google.maps.LatLng(22.2588888889,  -97.7936111111),
     new google.maps.LatLng(22.2436111111,  -97.8216666667),

    new google.maps.LatLng(22.2627777778,  -97.8180555556),
     new google.maps.LatLng(22.2788888889,  -97.8272222222),

    new google.maps.LatLng(22.2883333333,  -97.8119444444),
     new google.maps.LatLng(22.2588888889,  -97.7936111111)
];
zonaProhibidaCoordenadas[28] = [

    new google.maps.LatLng(21.9666666667,  -88.4166666667),
     new google.maps.LatLng(21.5666666667,  -88.05),

    new google.maps.LatLng(21.2666666667,  -89.1333333333),
     new google.maps.LatLng(21.9666666667,  -88.4166666667)
];
zonaProhibidaCoordenadas[29] = [

    new google.maps.LatLng(20.6833333333,  -89.3),
     new google.maps.LatLng(20.3666666667,  -87.8666666667),

    new google.maps.LatLng(19.8833333333,  -87.6166666667),
     new google.maps.LatLng(19.0,  -88.3333333333),

    new google.maps.LatLng(20.6833333333,  -89.3)
];
zonaProhibidaCoordenadas[30] = [

    new google.maps.LatLng(20.4166666667,  -93.3166666667),
     new google.maps.LatLng(20.4166666667,  -91.5),

    new google.maps.LatLng(19.0722222222,  -91.5),
     new google.maps.LatLng(18.8333333333,  -91.7616666667),

    new google.maps.LatLng(18.8333333333,  -91.9611111111),
     new google.maps.LatLng(18.7763888889,  -91.9722222222),

    new google.maps.LatLng(18.5619,  -93.3166666667),
     new google.maps.LatLng(20.4166666667,  -93.3166666667)
];
zonaProhibidaCoordenadas[31] = [

    new google.maps.LatLng(16.6433333333,  -92.57),
     new google.maps.LatLng(16.6533333333,  -92.2566666667),

    new google.maps.LatLng(16.54,  -92.475),
     new google.maps.LatLng(16.57,  -92.72),

    new google.maps.LatLng(16.6433333333,  -92.57)
];
zonaProhibidaCoordenadas[32] = [

   new google.maps.LatLng(14.7002777778,  -92.41),
    new google.maps.LatLng(14.6966666667,  -92.4136111111),

   new google.maps.LatLng(14.6833333333,  -92.3966666667),
    new google.maps.LatLng(14.6858333333,  -92.3941666667),

   new google.maps.LatLng(14.6930555556,  -93.3944444444),
    new google.maps.LatLng(14.6966666667,  -92.3994444444),

   new google.maps.LatLng(14.7025,  -92.4030555556),
    new google.maps.LatLng(14.7033333333,  -92.4063888889),

   new google.maps.LatLng(14.7002777778,  -92.41)
];

  for (var i = 0; i < 33; i++) {
  zonaProhibida0 = new google.maps.Polygon({
    paths: zonaProhibidaCoordenadas[i],
    strokeColor: '#001EFF',
    strokeOpacity: 0.8,
    strokeWeight: 3,
    fillColor: '#B8D1FF',
    fillOpacity: 0.35
  });
  zonaProhibida0.setMap(map);
  google.maps.event.addListener(zonaProhibida0, 'click', showArrays);
  };

  //Add a listener for the click event.

/**
FIN DE LA PARTE PARA GENERAR UNA ZONA
*/











/**
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ Caractristicas  Circulo ++++++++++++++++++++++++++++++++++++++++++
*/
var cityCircle;
  infoWindow = new google.maps.InfoWindow();

// Construct the circle for each value in citymap.
  // Note: We scale the area of the circle based on the population.
  for (var city in citymap) {
    var populationOptions = {
      strokeColor: '#00FF09',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#A5FFA8',
      fillOpacity: 0.35,
      map: map,
      center: citymap[city].center,
      radius: citymap[city].population,

    };
    cityCircle = new google.maps.Circle(populationOptions);
    // Add the circle for this city to the map.
 google.maps.event.addListener(cityCircle, 'click', showArraysc);

/*
      var infowindowcirculo = new google.maps.InfoWindow({
       map: map,
        position: citymap[city].center,
        content: strmmr+''+citymap[city].nomcirculo
      });

      var infowindowcirculo = new google.maps.InfoWindow({
       map: map,
        position: citymap[city].center,
        content: 'centro: \n'+citymap[city].pos1+','+citymap[city].pos2
      });

    */

  };
  //terminamos de crear los circulos
/**
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ END OF Caractristicas  Circulo ++++++++++++++++++++++++++++++++++++++++++
*/


}//este es el final de inicializar

  function showArraysc(event) {
      var contentString = '<b>Zona Prohibida</b><br>' +'location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +      '<br>';
  infoWindow.setContent(contentString);
            infoWindow.setPosition(event.latLng);
            infoWindow.open(map);
  }
/** @this {google.maps.Polygon} */
function showArrays(event) {

  // Since this polygon has only one path, we can call getPath()
  // to return the MVCArray of LatLngs.
  var vertices = this.getPath();
  var contentString = '<b>Zona Prohibida</b><br>' +'location: <br>' + event.latLng.lat() + ',' + event.latLng.lng() +      '<br>';
  // Iterate over the vertices.
  // Replace the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(event.latLng);

  infoWindow.open(map);
}

function GMS2Decimal(latitude_deg, latitude_min, latitude_sec, latitude_dir,
                       longitude_deg, longitude_min, longitude_sec, longitude_dir)
  {
    // Initial transformations

    latitude_sign = 1;
    longitude_sign = 1;

    if(latitude_dir.toLowerCase() == "s")
      latitude_sign = -1;

    if(longitude_dir.toLowerCase() == "w")
      longitude_sign = -1;

    latitude_sec = Math.abs(Math.round(latitude_sec * 1000000.0)/1000000);
    latitude_min = Math.abs(Math.round(latitude_min * 1000000.0)/1000000);

    longitude_min = Math.abs(Math.round(longitude_min * 1000000.0)/1000000);
    longitude_sec = Math.abs(Math.round(longitude_sec * 1000000.0)/1000000);

    // Calculations

    absdlat = Math.abs(Math.round(latitude_deg * 1000000.0));
    absmlat = Math.abs(Math.round(latitude_min * 1000000.0));
    absslat = Math.abs(Math.round(latitude_sec * 1000000.0));

    absdlon = Math.abs(Math.round(longitude_deg * 1000000.0));
    absmlon = Math.abs(Math.round(longitude_min * 1000000));
    absslon = Math.abs(Math.round(longitude_sec * 1000000.0));

    // Validations

    if(latitude_dir.toLowerCase() != "n" && latitude_dir.toLowerCase() != "s")
      throw "Latitude (N or S) is incorrect: " + latitude_dir;

    if(longitude_dir.toLowerCase() != "e" && longitude_dir.toLowerCase() != "w")
      throw "Longitude (E or W) is incorrect: " + longitude_dir;


    if(absdlat > (90 * 1000000))
      throw "Latitude.degrees (-90 < d < 90) invalid: " + latitude_deg;

    if(absmlat >= (60 * 1000000))
      throw "Latitude.minutes (0 < m < 59) invalid: " + latitude_min;

    if(absslat > (59.99999999 * 1000000)) 
      throw "Latitude.seconds (0 < s < 60) invalid: " + latitude_sec;


    if(absdlon > (180 * 1000000)) 
      throw "Longitude.degrees (-180 < d < 180) invalid: " + longitude_deg;

    if(absmlon >= (60 * 1000000))
      throw "Longitude.minutes (0 < m < 59) invalid: " + longitude_min;

    if(absslon > (59.99999999 * 1000000))
      throw "Longitude.seconds (0 < s < 60) invalid: " + longitude_sec;

    // Final calculation

    latitude  = Math.round(absdlat + (absmlat/60.) + (absslat/3600.0)) * latitude_sign/1000000;
    longitude = Math.round(absdlon + (absmlon/60) + (absslon/3600)) * longitude_sign/1000000;

    // Packing the results

    return {
      "latitude": latitude,
                        "longitude": longitude
    };
  }


google.maps.event.addDomListener(window, 'load', initialize);

    </script>
        
  </head>
  <body>
    <div id="map-canvas"></div>
    



  </body>
</html>