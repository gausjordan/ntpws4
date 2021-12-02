<?php

    $url = 'https://www.metaweather.com/api/location/851128/';
    $url .= date("Y") . "/" . date("n") . "/" . date("j") . "/";
    $data = file_get_contents($url);
    $weather = json_decode($data);

    echo '<div id="weatherblock">';
    $slika = 'https://www.metaweather.com/static/img/weather/png/' . $weather[0]->weather_state_abbr . '.png';
    echo '<img src="' . $slika . '">';
    echo '<h3>Weather in Zagreb:<br>' . $weather[0]->weather_state_name . ', ' . (int)$weather[0]->the_temp . '°C </h3>';

    echo '</div>';

?>