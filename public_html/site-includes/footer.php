<footer class="page-footer orange">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">
                <script type="text/javascript">
                moWWidgetParams = "moAllowUserLocation:false~moBackgroundColour:white~moColourScheme:grey~moDays:3~moDomain:www.metoffice.gov.uk~moFSSI:322089~moListStyle:vertical~moMapDisplay:none~moShowFeelsLike:true~moShowUV:true~moShowWind:true~moSpecificHeight:250~moSpecificWidth:300~moSpeedUnits:M~moStartupLanguage:en~moTemperatureUnits:C~moTextColour:black~moGridParams:weather,temperature,pop,humidity,warnings~";</script>
                <script type="text/javascript" src="js/loader.js"></script>
            </div>
            <div class="col s12 m6 l6">
                <div class="icon-block white-text">
                    <h2 class="center"><i class="material-icons medium">brightness_high</i></h2>
                    <h5 class="center">Solar Power in last 24 Hours</h5>
                    <p id="outside_shed_solar" class="light center">Initialising solar data..</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">4 nerds with a Death Wish</a>
        </div>
    </div>
</footer>
<!--  Scripts-->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/materialize.js"></script>
<script src="js/custom.js"></script>
<script src="js/Chart.bundle.js"></script>
<script>
                $(document).ready(function () {
                    $(".dropdown-button").dropdown({belowOrigin: true});
                    $(".button-collapse").sideNav();
                    getSolarData("outside_shed_solar");
                });
</script>
