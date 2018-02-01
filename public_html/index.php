<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Jack Noone</title>
        <?php
        include "site-includes/css.php";
        ?>
    </head>
    <body>
    </main>
    <div class="parallax-container">
        <?php
        include "site-includes/nav.php";
        ?>
        <div class="parallax"><img src="images/mountains.jpg"></div>
        <ul id="slide-out" class=" side-nav fixed container">
            <div class="col hide-on-small-only m3 l2 right-align">
                <ul class="section table-of-contents">
                    <li><a href="#introduction">Introduction</a></li>
                    <li><a href="#second">Second</a></li>
                    <li><a href="#initialization">Intialization</a></li>
                </ul>
            </div>

        </ul>


        <div class="valign-wrapper valign-demo example-classname">
            <div id="introduction" class="container section scrollspy ">
                <h1 class="header center white-text">Jack Noone</h1>
                <h5 class ="center white-text"> Computer Science undergraduate</h5>
                <div class="row center">

                </div>
            </div>
        </div>



    </div>

    <div  class="parallax-container">
        <div class="parallax"><img src="images/Computer"></div>
        <div class ="side-barjack hide-on-small-only">

        </div>
        <div class="valign-wrapper valign-demo example-classname">

            <div  class="container  ">

                <h1 class="header center orange-text">Jack Noone</h1>
                <h5 id="second" class ="center orange-text section scrollspy"> Computer Science undergraduate</h5>

                <div class="row center">
                    <h5 class="header col s12 light">Farming made easier, through technology</h5>
                </div>
            </div>
        </div>

    </div>
</main>
<?php
include "site-includes/footer.php";
?>

<script>
    $(document).ready(function () {
        $(document).ready(function () {
            $('.parallax').parallax();

            $(function () {
                $.scrollify({
                    section: ".example-classname",
                });
            });



            $('.scrollspy').scrollSpy();
        });

    });
</script>

</body>
</html>
