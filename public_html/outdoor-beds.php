<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Outdoor Beds</title>
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
                <h1 class="header center orange-text">Outdoor Beds</h1>                
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
                    getLast30MinutesOutdoorHydrometer(false);

                }, 30 * 60 * 1000);

                getOutdoorHydrometerData();
                
                getOutsideLuxData();
                getOutsideTempGraph();
                getOutsideHumidGraph();
                window.setInterval(function () {
                    getOutsideLuxData();
                    getOutsideTempGraph();
                    getOutsideHumidGraph();
                }, 120000);
            });
        </script>
    </body>
</html>
