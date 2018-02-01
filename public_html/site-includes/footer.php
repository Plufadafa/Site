<footer class="page-footer orange">


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
