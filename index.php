<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Smart Mirror</title>
    <link rel="stylesheet" href="css/weather-icons.min.css">
  </head>
  <body>
    <div class="weather-temp"></div><div class="weather-temp-icon"></div>

    <script src="js/lib/jquery-1.12.0.min.js"></script>

    <script>
      function weather() {
        var apiKey = 'a35348ed01d607d9d4743b250e58d533';
        var url = 'https://api.forecast.io/forecast/';
        //lat and long laconia, nh
        var lati = 43.5275;
        var longi = 71.4703;
        var data;

        $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {

          //Current temp
          var forecastIOTemp = Math.round(data.currently.temperature);
          $('.weather-temp').html(forecastIOTemp + "°");

          //Current weather icon
          $('.weather-temp-icon').html('<i class="wi wi-forecast-io-'+ data.currently.icon +'"></i>');

        });
      }
      weather();
    </script>
  </body>
</html>
