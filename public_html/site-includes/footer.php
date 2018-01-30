<footer class="page-footer orange">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 l6">

            </div>
            <div class="col s12 m6 l6">

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
