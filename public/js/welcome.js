$(window).on("load", function() {
    console.log("loaded");
    $("#loading").fadeOut(500);
});

$(document).ready(function() {
    console.log("welcome");
    var weatherID = document.getElementById("weather");
    weatherID.innerHTML = "";
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            weatherID.innerHTML =
                "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        console.log(position);
        let reqURL = `https://api.openweathermap.org/data/2.5/onecall?lat=${position.coords.latitude}&lon=${position.coords.longitude}&exclude=hourly,daily,minutely&units=metric&appid=c23077a03dc6dc7c1287044552a9cd18`;
        let request = new XMLHttpRequest();
        request.open("GET", reqURL);
        request.responseType = "json";
        request.send();
        request.onload = function() {
            var weatherInfo = request.response;
            console.log(HTMLtext);
            var HTMLtext = `<div class="container"><div class="row">`;
            HTMLtext += `<div class="col-sm-3 col-md-2 col-lg-2"> <h3><b>Local Weather</b><h3></div>`;
            HTMLtext += `<div class="col-sm-9 col-md-10 col-lg-10"><div class="row">`;
            HTMLtext += `<div class="col-sm-4 col-md-3 col-lg-2"> <div class="row"><b>Temperature:</b></div> <div class="row">${weatherInfo.current.temp} &#8451</div></div>`;
            HTMLtext += `<div class="col-sm-4 col-md-3 col-lg-2"> <div class="row"><b>Pressure:</b></div> <div class="row">${weatherInfo.current.pressure} hPa</div></div>`;
            HTMLtext += `<div class="col-sm-4 col-md-3 col-lg-2"> <div class="row"><b>Humidity:</b></div> <div class="row">${weatherInfo.current.humidity} %rH</div></div>`;
            HTMLtext += `<div class="col-sm-4 col-md-3 col-lg-2"> <div class="row"><b>UV Index:</b></div> <div class="row">${weatherInfo.current.uvi} </div></div>`;
            HTMLtext += `<div class="col-sm-4 col-md-3 col-lg-2"> <div class="row"><b>${weatherInfo.current.weather[0].main}:</b></div> <div class="row">${weatherInfo.current.weather[0].description}</div></div>`;
            HTMLtext += `</div></div></div></div>`;
            weatherID.innerHTML = HTMLtext;
        };
    }
    getLocation();
    $(".postCard").hover(
        function() {
            $(this).css("background-color", "yellow");
        },
        function() {
            $(this).css("background-color", "white");
        }
    );
    function randomColour(x) {
        let randomColor =
            "#" + Math.floor(Math.random() * 16777215).toString(16);
        x.css("background-color", randomColor);
    }
    $(".btn").click(function() {
        $(".postCard").animate({ opacity: "0.5" }, "slow");
        $(".postCard").animate({ opacity: "1" }, "slow");
    });
});
