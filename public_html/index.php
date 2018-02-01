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
        <main>
            <?php
            include "site-includes/nav.php";
            ?>
            <ul id="slide-out" class=" side-nav fixed container">
                <div class="col hide-on-small-only m3 l2 right-align">
                    <ul class="section table-of-contents">
                        <li><a id="link0" href="#introduction">Introduction</a></li>
                        <li><a id="link1" href="#second">Second</a></li>
                        <li><a id="link2" href="#third">Third</a></li>
                        <li><a id="link3" href="#fourth">Fourth</a></li>
                    </ul>
                </div>
            </ul>

            <div  class="parallax-container">
                <div id="wee" class="parallax example-classname"><img src="images/mountains.jpg"></div>
                <div class="valign-wrapper valign-demo ">
                    <div id="introduction" class="container section scrollspy ">
                        <h1 class="header center white-text">Jack Noone</h1>
                        <h5 class ="center white-text"> Computer Science undergraduate</h5>
                    </div>
                </div>
            </div>

            <div  class="parallax-container">
                <div class="parallax example-classname"><img src="images/Computer.jpg"></div>
                <div class="valign-wrapper valign-demo ">
                    <div class ="side-barjack1 hide-on-small-only"></div>
                    <div id="second" class="container section scrollspy ">
                        <h1 class="header center white-text">Jack Noone</h1>
                        <h5 class ="center white-text"> Computer Science undergraduate</h5>
                    </div>
                </div>
            </div>

            <div  class="parallax-container">
                <div class="parallax example-classname"><img src="images/waterfall.jpeg"></div>
                <div class="valign-wrapper valign-demo ">
                    <div class ="side-barjack2 hide-on-small-only"></div>
                    <div id="third" class="container section scrollspy ">
                        <h1 class="header center white-text">Jack Noone</h1>
                        <h5 class ="center white-text"> Computer Science undergraduate</h5>
                    </div>
                </div>
            </div>

            <div  class="parallax-container">
                <div class="parallax example-classname"><img src="images/grass.jpeg"></div>
                <div class="valign-wrapper valign-demo ">
                    <div id="fourth" class="container section scrollspy ">
                        <h1 class="header center white-text">Jack Noone</h1>
                        <h5 class ="center white-text"> Computer Science undergraduate</h5>
                    </div>
                </div>
            </div>

        </main>
    </body>
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
                        scrollSpeed: 1500,
                        scrollbars: false,
                        overflowScroll: false,
                    });
                });
                $("#link0").click(function (e) {
                    e.preventDefault();
                    $.scrollify.move(0);
                });

                $("#link1").click(function (e) {
                    e.preventDefault();
                    $.scrollify.move(1);
                });

                $("#link2").click(function (e) {
                    e.preventDefault();
                    $.scrollify.move(2);
                });

                $("#link3").click(function (e) {
                    e.preventDefault();
                    $.scrollify.move(3);
                });




                $('.scrollspy').scrollSpy();

            });

        });
    </script>


</html>
