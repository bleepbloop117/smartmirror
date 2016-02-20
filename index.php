<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Smart Mirror</title>
  </head>
  <body>
    <div id="weather"></div>

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
          $('#weather').html('The temperature is: ' + data.currently.temperature + " " + data.currently.summary);
        });
      }
      weather();
    </script>
  </body>
</html>
