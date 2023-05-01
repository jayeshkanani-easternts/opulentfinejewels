<?php $page_res3 = get_record_from_db('page_master', 'page_id', 3); ?>


<div class="red-square hidden-sm hidden-xs">

    <div class="container">


        <div style="box-shadow: -1px 3px 9px 2px #0000001a; overflow: hidden;" class="col-sm-7 col-md-6 content-box">
            <h1 class="title wow fadeInLeft" data-appear-animation="fadeInLeft"
                data-wow-delay="2s">WORKS</h1>
            <div class="line wow fadeInLeft" data-appear-animation="fadeInLeft"
                 data-wow-delay="2.3s"></div>
            <div class="content-box-desc wow fadeInUp" data-appear-animation="fadeInUp"
                 data-wow-delay="3.85s">

                <?php echo $page_res3['page_content']; ?>
            </div>
        </div>


        <div class="col-sm-5 col-md-6 image-box wow fadeIn" data-appear-animation="fadeIn"
             data-wow-delay="3.85s">
            <?php
            $slidersql = "select * from sliderimage where status = 'E' order by sortorder asc";
            $sliderqry = ets_db_query($slidersql) or die(ets_db_error());
            if (ets_db_num_rows($sliderqry) > 0) {
                ?>
                <div class="owl-slider">
                    <div id="carousel" class="owl-carousel">
                        <?php while ($result = ets_db_fetch_assoc($sliderqry)) { ?>
                            <div class="item">
                                <img class="owl-lazy"
                                     data-src="<?php echo DIR_WS_SLIDER_PATH . $result['image']; ?>"
                                     alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>


    </div>

</div>
<div class="container tablet-cont visible-xs visible-sm">
    <div class="row">
        <div  style="box-shadow: -1px 3px 9px 2px #0000001a; padding: 25px;" class="col-sm-12">
            <h1 class="title wow fadeInLeft" data-appear-animation="fadeInLeft"
                data-wow-delay="2s">WORKS</h1>
            <div class="line wow fadeInLeft" data-appear-animation="fadeInLeft"
                 data-wow-delay="2.3s"></div>
            <div class="content-box-desc mob-fnt wow fadeInUp" data-appear-animation="fadeInUp"
                 data-wow-delay="3.85s">

                <?php echo $page_res3['page_content']; ?>
            </div>
            <div class="col-md-6 imgbox-tablet slider-wd wow fadeIn" data-appear-animation="fadeIn"
                 data-wow-delay="4.85s">
                <?php
                $slidersql = "select * from sliderimage where status = 'E' order by sortorder asc";
                $sliderqry = ets_db_query($slidersql) or die(ets_db_error());
                if (ets_db_num_rows($sliderqry) > 0) {
                    ?>
                    <div class="owl-slider">
                        <div id="carousel1" class="owl-carousel">
                            <?php while ($result = ets_db_fetch_assoc($sliderqry)) { ?>
                                <div class="item">
                                    <img class="owl-lazy"
                                         data-src="<?php echo DIR_WS_SLIDER_PATH . $result['image']; ?>"
                                         alt="">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>










