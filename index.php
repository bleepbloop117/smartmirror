<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Smart Mirror</title>
    <link rel="stylesheet" href="css/weather-icons.min.css">
  </head>
  <body>

    <div class="date-day"></div>

    <div class="weather-temp"></div>
    <div class="weather-temp-icon"></div>
    <div class="weather-temp-high"></div>
    <div class="weather-temp-low"></div>

    <div class="corgi-photo"></div>

    <script src="js/lib/jquery-1.12.0.min.js"></script>
    <script src="js/app.js"></script>
    
    <script>
    function jsonFlickrApi(data) {
      var s = "";
      for (var i=0; i < data.photos.photo.length; i++) {
        photo = data.photos.photo[i];
        t_url = "http://farm" + photo.farm + ".static.flickr.com/" +
          photo.server + "/" + photo.id + "_" + photo.secret + "_" + "n.jpg";
        s +=  '<img alt="" src="' + t_url + '"/>';
      }
      $('.corgi-photo').html(s);
    }</script>
    <script src="https://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=741bef16bf4309bddaadc1932671a695&tags=welshcorgi&per_page=1&format=json"></script>

  </body>
</html>
