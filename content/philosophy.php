<?php $page_res1 = get_record_from_db('page_master', 'page_id', 1); ?>



<div class="red-square hidden-xs hidden-sm">
        <div class="container">
            <div style="box-shadow: -1px 3px 9px 2px #0000001a; overflow: hidden;" class="col-sm-12 col-md-6 content-box">
                <h1 class="title wow fadeInLeft" data-appear-animation="fadeInLeft"
                    data-wow-delay="2s">OUR PHILOSOPHY
                </h1>
                <div class="line wow fadeInLeft" data-appear-animation="fadeInLeft"
                     data-wow-delay="2.3s"></div>

                <div class="content-box-desc wow fadeInUp" data-appear-animation="fadeInUp"
                     data-wow-delay="3.85s">
                    <?php echo $page_res1['page_content']; ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 image-box wow fadeIn" data-appear-animation="fadeIn"
                 data-wow-delay="3.85s">
                <img src="<?php echo DIR_WS_PAGE_IMAGE_PATH . $page_res1['page_image']; ?>" class="img-responsive">
            </div>
        </div>
</div>
<div class="container tablet-cont visible-xs visible-sm">
    <div class="row">
        <div  style="box-shadow: -1px 3px 9px 2px #0000001a; padding: 25px;" class="col-sm-12">
            <h1 class="title wow fadeInLeft" data-appear-animation="fadeInLeft"
                data-wow-delay="2s">OUR PHILOSOPHY</h1>
            <div class="line wow fadeInLeft" data-appear-animation="fadeInLeft"
                 data-wow-delay="2.3s"></div>
            <div class="content-box-desc mob-fnt wow fadeInUp" data-appear-animation="fadeInUp"
                 data-wow-delay="3.85s">
                <?php echo $page_res1['page_content']; ?>
            </div>
            <img class="img-responsive imgbox-tablet wow fadeIn" data-appear-animation="fadeIn"
                 data-wow-delay="4.85s" src="<?php echo DIR_WS_PAGE_IMAGE_PATH . $page_res1['page_image']; ?>">
        </div>
    </div>
</div>