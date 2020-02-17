class Station{
    constructor(city) {
        this.city = city;
    }

    requetExist() {
        let ajaxGet = new AjaxGet("http://api.weatherstack.com/current?access_key=3e3c3bfbc5193d9be3bbd174a98d52cc&query=" + this.city + "", function(reponse) {
            let weather = JSON.parse(reponse);

            if (weather.success == false) {
                document.getElementById('city_error').innerHTML = "<i class=\"fas fa-exclamation-triangle\"></i> Attention, cette ville n'est pas répertoriée !";
                document.getElementById('city_error').style.color = "orange";
            } else {
                let temp = weather.current.temperature;
                let precip = weather.current.precip;
                let weatherCode = weather.current.weather_code;
                let windSpeed = weather.current.wind_speed;
                let visib = weather.current.visibility;

                let tempN;
                let precipN;
                let weatherCodeN;
                let windSpeedN;
                let visibN;

                // IF Cold
                if (Number(temp) < 0) {
                    tempN = 10;
                } else if (0 < Number(temp) < 15) {
                    tempN = 15;
                } else if (15 < Number(temp) < 23 ) {
                    tempN = 12;
                } else if (Number(temp) >= 23) {
                    tempN = 8;
                }

                // IF Rain
                if (Number(precip) == 0) {
                    precipN = 20;
                } else if (0 < Number(precip) < 33) {
                    precipN = 16;
                } else if (33 < Number(precip) < 66) {
                    precipN = 12;
                } else if (Number(precip) >= 66) {
                    precipN = 10;
                }

                // IF Cloudy
                if (Number(weatherCode) >= 200) {
                    if (Number(weatherCode) == 248) {
                        weatherCodeN = 13;
                    } else if (262 <Number(weatherCode) < 267) {
                        weatherCodeN = 11;
                    } else if (292 <Number(weatherCode) < 297) {
                        weatherCodeN = 12;
                    } else if (298 <Number(weatherCode) < 303) {
                        weatherCodeN = 8;
                    } else if (304 <Number(weatherCode) < 312) {
                        weatherCodeN = 5;
                    } else {
                        weatherCodeN = 4;
                    }
                } else if (100 < Number(weatherCode) < 199) {
                    if ((Number(weatherCode) == 113) || (Number(weatherCode) == 116)) {
                        weatherCodeN = 17;
                    } else if ((Number(weatherCode) == 119) || (Number(weatherCode) == 122) || (Number(weatherCode) == 143)) {
                        weatherCodeN = 14;
                    } else if ((Number(weatherCode) == 182) || (Number(weatherCode) == 176)) {
                        weatherCodeN = 8;
                    } else if ((Number(weatherCode) == 179) || (Number(weatherCode) == 185)) {
                        weatherCodeN = 6;
                    } else if ((Number(weatherCode) == 179) || (Number(weatherCode) == 185)) {
                        weatherCodeN = 6;
                    }
                }

                // IF Wind
                if ((Number(windSpeed) >= 0) && (Number(windSpeed) <= 200)) {
                    if (Number(windSpeed) < 50) {
                        if (Number(windSpeed) < 25){
                            if (Number(windSpeed) < 12) {
                                windSpeedN = 19;
                            } else {
                                windSpeedN = 15;
                            }
                        } else if (Number(windSpeed) < 37) {
                            windSpeedN = 10;
                        } else {
                            windSpeedN = 8;
                        }
                    } else if (Number(windSpeed) < 100) {
                        if (Number(windSpeed) < 75){
                            if (Number(windSpeed) < 62) {
                                windSpeedN = 5;
                            } else {
                                windSpeedN = 4;
                            }
                        } else if (Number(windSpeed) < 87) {
                            windSpeedN = 3;
                        } else {
                            windSpeedN = 2;
                        }
                    } else if (Number(windSpeed) >= 100) {
                        if (Number(windSpeed) < 130){
                            if (Number(windSpeed) < 115) {
                                windSpeedN = 1;
                            } else {
                                windSpeedN = 0;
                            }
                        } else if (Number(windSpeed) < 150) {
                            windSpeedN = 1;
                        } else {
                            windSpeedN = 0;
                        }
                    }
                } else {
                    windSpeedN = 10;
                }

                // IF Visibility
                if (Number(visib) < 3) {
                    visibN = 3;
                } else if (Number(visib) < 6) {
                    visibN = 7;
                } else if (Number(visib) < 9) {
                    visibN = 11;
                } else if (Number(visib) < 12) {
                    visibN = 15;
                } else {
                    visibN = 19;
                }

                let result = ((Number(tempN) + Number(precipN) + Number(weatherCodeN) + Number(windSpeedN) + Number(visibN))/5)/2

                document.getElementById('resultWeather').textContent = (Number(result)).toFixed(1) + "/10";
                document.getElementById('resultCityName').textContent = weather.location.name;
                document.getElementById('resultCountryName').textContent = weather.location.country;

                document.getElementById('weather').textContent = (Number(weatherCodeN)/2) + '/10';
                document.getElementById('temp').textContent = temp + "°C";
                document.getElementById('rain').textContent = precip + "%";
                document.getElementById('wind').textContent = windSpeed  + 'km/h dir ' + weather.current.wind_dir;
                document.getElementById('visibility').textContent = (Number(visibN)/2).toFixed(1) + "/10";
            }
        });
    }

}


