<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Dashboard</title>
        <?php
        include "site-includes/css.php";
        ?>
    </head>
    <body>
        <?php
        include "site-includes/nav.php";
        ?>
        <div class="section no-pad-bot" id="index-banner">
            <div class="container">
                <h1 class="header center orange-text">Farmer Dashboard</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Farming made easier, through technology</h5>
                </div>
                <div class="row">
                    <div class="col s12 m4 l4">
                        <div id="gh1_co2Production_gas" class="card-panel teal center-align white-text">
                            Initialising Smoke sensor....
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div id="gh2_co2Production_gas" class="card-panel teal center-align white-text">
                            Initialising Smoke sensor....
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div id="gh3_co2Production_gas" class="card-panel teal center-align white-text">
                            Initialising Smoke sensor....
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <ul class="collection with-header">
                            <li class="collection-header"><h4><i class="material-icons right small">ac_unit</i>Temperatures</h4></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: Depends on time of year.">Green House 1: <span id="gh1-temp"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 7°c - 18°c.">Green House 2: <span id="gh2-temp"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 10°c - 26°c.">Green House 3: <span id="gh3-temp"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 35°c - 45°c.">Muck Heap: <span id="muck-temp"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 0°c - 15°c.">Root Crops: <span id="root-temp"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 5°c - 20°c.">Store Room: <span id="house-temp"> initialising..</span></li>
                        </ul>
                    </div>
                    <div class="col s12 m6 l">
                        <ul class="collection with-header">
                            <li class="collection-header"><h4><i class="material-icons right small">colorize</i>Soil Moisture Level</h4></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 3% - 15% Moisture.">Green House 1: <span id="gh1-hydro">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 10% - 35% Moisture.">Green House 2 Plant Zone: <span id="gh2-hydro">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 10% - 35% Moisture.">Green House 2 Mains: <span id="gh2-hydro2">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 10% - 14% Moisture.">Green House 3: <span id="gh3-hydro">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 50% - 80% Moisture.">Root Crops:    <span id="crops-hydro">initialising..</span></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m6 l6">
                        <ul class="collection with-header">
                            <li class="collection-header"><h4><i id="daylight-icon" class="material-icons right small">wb_sunny</i>Lux levels</h4></li>
                            <li class="collection-item">Sunrise: <span id="sunrise"></span>, Sunset: <span id="sunset"></span>&nbsp;(<span id="daylight-text"></span>)</li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: Over 10,000 Lux.">Green House 1: <span id="gh1-lux">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 5,000 - 15,000 Lux.">Green House 2: <span id="gh2-lux">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 6,000 - 12,000 Lux.">Green House 3: <span id="gh3-lux">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 10 - 100 Lux.">Store Room: <span id="house-lux">initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 5,000 - 12,000 Lux." >Root Crops: <span id="outside-lux">initialising..</span></li>
                        </ul>
                    </div>
                    <div class="col s12 m6 l6">
                        <ul class="collection with-header">
                            <li class="collection-header"><h4><i class="material-icons right small">cloud</i>Humidity</h4></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: Depends on time of year.">Green House 1: <span id="gh1-humid"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 40% - 80% Humidity.">Green House 2: <span id="gh2-humid"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 30% - 60% Humidity.">Green House 3: <span id="gh3-humid"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 60% - 100% Humidity.">Muck Heap: <span id="muck-humid"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 20% - 60% Humidity.">Root Crops: <span id="root-humid"> initialising..</span></li>
                            <li class="collection-item tooltipped" data-position="left" data-delay="50" data-tooltip="Ideal range: 0% - 40% Humidity.">Store Room: <span id="house-humid"> initialising..</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>        
        <?php
        include "site-includes/footer.php";
        ?>
        <script>
            $(document).ready(function () {
                updateHydrometerDashboardElement();
                window.setInterval(function () {
                    updateHydrometerDashboardElement();

                }, 30 * 60 * 1000);

                checkLuxSensors();
                checkTempSensors();
                window.setInterval(function () {
                    checkLuxSensors();
                    checkTempSensors();
                }, 60000);
                window.setInterval(function () {
                    checkGasSensors();
                }, 5000);
            });
        </script>
    </body>
</html>
