<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Green House 3</title>
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
                <br><br>
                <h1 class="header center orange-text">Green House 3</h1>                
                <div class="row">
                    <div class="col s12 m6 offset-m3">
                        <div id="gh3_co2Production_gas" class="card-panel teal center-align white-text">
                            Initialising Smoke sensor....
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section">
                <ul id="tabs-swipe-demo" class="tabs">
                    <li class="tab col s4"><a class="active" href="#test-swipe-1">Light</a></li>
                    <li class="tab col s4"><a class="active" href="#test-swipe-2">Hydrometer</a></li>
                    <li class="tab col s4"><a href="#test-swipe-3">Temperature</a></li>
                    <li class="tab col s4"><a href="#test-swipe-4">Humidity</a></li>
                </ul>
                <div id="test-swipe-1" class="col s12">                
                    <div class="row">
                        <div class="col s12 m10 offset-m1 l10 offset-l1">
                            <canvas id="lux-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div id="test-swipe-2" class="col s12">
                    <div class="row">
                        <div class="col s12 m10 offset-m1 l10 offset-l1">
                            <canvas id="hydro-chartAverage"></canvas>
                        </div>
                        <div class="col s12 m10 offset-m1 l10 offset-l1">
                            <canvas id="hydro-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div id="test-swipe-3" class="col s12">
                    <div class="row">
                        <div class="col s12 m10 offset-m1 l10 offset-l1">
                            <canvas id="temp-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div id="test-swipe-4" class="col s12">
                    <div class="row">
                        <div class="col s12 m10 offset-m1 l10 offset-l1">
                            <canvas id="humid-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
        <?php
        include "site-includes/footer.php";
        ?>
        <script>
            $(document).ready(function () {

                window.setInterval(function () {
                    getLast30MinutesGH3Hydrometer(false);

                }, 10 * 60 * 1000);

                getGh3HydrometerData();

                getGh3LuxData();
                getGh3TempGraph();
                getGh3HumidGraph();
                window.setInterval(function () {
                    getGh3LuxData();
                    getGh3TempGraph();
                    getGh3HumidGraph();
                }, 120000);
                window.setInterval(function () {
                    checkLatestGasSensorReading("gh3_co2Production_gas");
                }, 5000);
            });
        </script>
    </body>
</html>
