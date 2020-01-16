class Station{
    constructor(city) {
        this.city = city;
    }

    requetWeather() {
        let ajaxGet = new AjaxGet("http://api.weatherstack.com/current?access_key=3e3c3bfbc5193d9be3bbd174a98d52cc&query=" + this.city + "", function(reponse) {
            let weather = JSON.parse(reponse);

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

            if (Number(temp) < 0) {
                tempN = 10;
            } else if (0 < Number(temp) < 15) {
                tempN = 15;
            } else if (15 < Number(temp) < 23 ) {
                tempN = 12;
            } else if (Number(temp) >= 23) {
                tempN = 8;
            }

            if (Number(precip) == 0) {
                precipN = 20;
            } else if (0 < Number(precip) < 33) {
                precipN = 16;
            } else if (33 < Number(precip) < 66) {
                precipN = 12;
            } else if (Number(precip) >= 66) {
                precipN = 10;
            }

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


            let result = ((Number(tempN) + Number(precipN) + Number(weatherCodeN))/3)/2

            document.getElementById('resultWeather').textContent = result.toFixed(1);
            document.getElementById('resultCityName').textContent = weather.location.name;
            document.getElementById('resultCountryName').textContent = weather.location.country;
        });
    }
}


