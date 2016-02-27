$(document).ready(function($) {
  function weather() {
    var apiKey = 'a35348ed01d607d9d4743b250e58d533';
    var url = 'https://api.forecast.io/forecast/';
    //lat and long laconia, nh
    var lati = 43.5275;
    var longi = 71.4703;
    var data;

    $.getJSON(url + apiKey + "/" + lati + "," + longi + "?callback=?", function(data) {
      //get weekly > daily data
      var forecastioJson = data.daily.data[0];
      //get current data
      var currentTemp = data.currently.temperature;
      var currentIcon = data.currently.icon;
      //round temp
      var forecastIOTemp = Math.round(currentTemp);
      $('.weather-temp').html("Currently " + forecastIOTemp + "°");
      //Current weather icon
      $('.weather-temp-icon').html('<i class="wi wi-forecast-io-'+ currentIcon +'"></i>');
      //High and low temp for the day
      $('.weather-temp-high').html("High " + Math.round(forecastioJson.temperatureMax) + "°");
      $('.weather-temp-low').html("Low " + Math.round(forecastioJson.temperatureMin) + "°");
    });
  }

  function dateDay() {
    var newDate = new Date();
    var locale = "en-us";
    var month = newDate.toLocaleString(locale, { month: "long" });
    var day = newDate.toLocaleString(locale, { weekday: "long" });
    var date = newDate.toLocaleString(locale, { day: "numeric" });
    var time = newDate.toLocaleString(locale, { hour: "2-digit", minute: "2-digit" });

    $('.date-day').html(day + " " + date + " " + month + " " + time)
  }

  function corgi() {
    var apikey = '741bef16bf4309bddaadc1932671a695';
    var groupId = '99569006@N00'
    var url = 'https://api.flickr.com/services/rest/?&method=';
    var flickerGet = 'flickr.groups.pools.getPhotos';
    var flickerUser = '24982374@N07';

    $.getJSON(url + flickerGet + '&api_key=' + apikey + '&group_id=' + groupId + '&format=json&jsoncallback=?', function(data) {
        var flickrPhoto = data.photos.photo[0];
        //Corgi photo
        $('.corgi-photo').html('<img src="http://c2.staticflickr.com/' + flickrPhoto.farm + '/' + flickrPhoto.server + '/' + flickrPhoto.id + '_' + flickrPhoto.secret + '_n.jpg" alt="">');
    });

  }

  // Initalize
  weather();
  dateDay();
  corgi();
});
