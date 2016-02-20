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
      //
      $('.weather-temp-high').html("High " + Math.round(forecastioJson.temperatureMax) + "°");
      $('.weather-temp-low').html("Low " + Math.round(forecastioJson.temperatureMin) + "°");
    });
  }

  function dateDay() {
    var newDate = new Date();
    var locale = "en-us";
    var month = newDate.toLocaleString(locale, { month: "long" });

    $('.date-day').html(newDate.getDate() + " " + month)
  }

  // Initalize
  weather();
  dateDay();
});
