<?php
$web_arr = get_website_details();

?>


<section class="menu">
    <div class="menu-holder full-height-relative">
        <div class="layers">
            <div class="box"></div>
            <!--<div class="box"></div>
            <div class="box"></div>-->
            <div class="glich"></div>
        </div>
      
        <div class="navigation">
            <div class="centerer nav-centrer">
                <div class="nav-left moshenebaregular menu-head">


                    <?php
                    if ($module == 'philosophy') {
                        $home_cl = 'active';
                    } else {
                        $home_cl = '';
                    }
                    ?>
                    <div class="item" data-id="7" data-count="0" data-page="1">
                        <a class="<?php echo $home_cl; ?> animate-color" href="<?php echo HTTP_SERVER . WS_ROOT; ?>philosophy">OUR PHILOSOPHY
                            <h5 class="short-title">what we use, how we approach work</h5>
                        </a>

                    </div>

                    <?php
                    if ($module == 'works') {
                        $works_cl = 'active';
                    } else {
                        $works_cl = '';
                    }
                    ?>
                    <div class="item" data-id="3" data-count="0">
                        <a class="<?php echo $works_cl; ?> animate-color" href="<?php echo HTTP_SERVER . WS_ROOT; ?>works">WORKS
                            <h5 class="short-title">what we create</h5>
                        </a>

                    </div>


                    <?php
                    if ($module == 'subscribe') {
                        $subscribe_cl = 'active';
                    } else {
                        $subscribe_cl = '';
                    }
                    ?>
                    <div class="item" data-id="8" data-count="0">
                        <a class="<?php echo $subscribe_cl; ?> animate-color" href="<?php echo HTTP_SERVER . WS_ROOT; ?>subscribe">WHAT'S HAPPENING
                            <h5 class="short-title">upcoming events, news</h5>
                        </a>

                    </div>


                    <?php
                    if ($module == 'contact-us') {
                        $Contact_cl = 'active';
                    } else {
                        $Contact_cl = '';
                    }
                    ?>
                    <div class="item" data-id="5" data-count="0">
                        <a class="<?php echo $Contact_cl; ?> animate-color" href="<?php echo HTTP_SERVER . WS_ROOT; ?>contact-us">CONTACT
                            <h5 class="short-title">where to find us</h5>
                        </a>

                    </div>

                </div>
            </div>

            <div class="nav-right">
                <div class="item type-1  " data-id="7">
                    <div class="image-box">
                        <div><img src="images/nav/1.png"></div>
                    </div>
                </div>
                <div class="item type-1  " data-id="3">
                    <div class="image-box">
                        <div><img src="images/nav/2.png"></div>
                    </div>
                </div>
                <div class="item type-1  " data-id="8">
                    <div class="image-box">
                        <div><img src="images/nav/3.png"></div>
                    </div>
                </div>
                <div class="item type-1  " data-id="5">
                    <div class="image-box">
                        <div><img src="images/nav/4.png"></div>
                    </div>
                </div>

            </div>

            <div class="powered-by ls-sm-shown">
                <a href="https://www.leavingstone.com/" target="_blank">
                    <img src="images/nav/leavingstone-logo-white.png">
                </a>
            </div>

            <div class="social_mobile">

                <a href="https://www.instagram.com/opulentfinejewels/" target="_blank" class="fb">
                    <i class="fa fa-instagram insta" aria-hidden="true"></i>
                </a>
                <a href="mailto:info@opulentfinejewels.com" target="_blank" class="tw">

                    <i class="fa fa-envelope gmail" aria-hidden="true"></i>
                </a>


            </div>

            <div class="footer">


                <div class="received">
                    <p>© Opulent Fine Jewels. All rights reserved.</p>
                </div>

                <div class="designed">
                    <p>Designed by <a href="http://www.kavisashah.com/" target="_blank">Kavisa Shah. </a> Developed By Eastern Techno Solution</p>

                </div>

            </div>

        </div>
      
     

    </div>



</section>
  

<nav>
    <button class="burger white">
        <span></span>
        <span></span>
        <span></span>
    </button>


    <div class="social">

        <a href="https://www.instagram.com/opulentfinejewels/" target="_blank" class="fb">
            <i class="fa fa-instagram insta" aria-hidden="true"></i>
        </a>
        <a href="mailto:info@opulentfinejewels.com" target="_blank" class="tw">

            <i class="fa fa-envelope gmail" aria-hidden="true"></i>
        </a>


    </div>

</nav>

<div class="header-logo">

    <a href="<?php echo HTTP_SERVER . WS_ROOT; ?>">
        <img src="<?php echo $web_arr['logo']; ?>" class="img-responsive mb-logo">
    </a>
</div>





