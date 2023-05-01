<?php $page_res2 = get_record_from_db('page_master', 'page_id', 2); ?>



<div class="red-square mt-tp">

    <div class="container">
        <div style="box-shadow: -1px 3px 9px 2px #0000001a; overflow: hidden;" class="col-sm-7 col-md-6 content-box">
            <h1 class="title wow fadeInLeft" data-appear-animation="fadeInLeft"
                data-wow-delay="2s">WHAT'S HAPPENING</h1>
            <div class="line wow fadeInLeft" data-appear-animation="fadeInLeft"
                 data-wow-delay="2.3s"></div>
            <div class="content-box-desc wow fadeInUp" data-appear-animation="fadeInUp"
                 data-wow-delay="3.85s">

                <?php echo $page_res2['page_content']; ?>
            </div>
        </div>
        <div style="overflow: hidden" class="col-md-12 form-pd">
            <div class="sub-form">
                <h3 class="sub-heading">Stay updated with our latest developments</h3>
                <!--<form method="post" action="" id="subscribe-form" class="form-inline subscribe-form">

                    <input class="input-sub" type="email" id="email" placeholder="Your email address" name="email" required="">

                    <button class="sub-btn" id="submit" type="submit">SUBSCRIBE</button>
                    <div id='label-text' class="alert alert-success"
                         style="margin-top:30px;display:none; color:red"> Your inquiry has been succesfully
                        sent.
                    </div>
                </form>-->

                <form name="subscribeForm" id="subscribeForm" class="subscribeForm form-inline subscribe-form" method="POST">
                    <input class="input-sub" type="email" id="email" placeholder="Your email address" name="email">
                    <button class="sub-btn subscription-submit" id="submit" type="submit">SUBSCRIBE</button>
                    <div id='label-text' class="alert alert-success label-text" style="float: left; width: 100%;margin: 15px 15px !important;display:none; color:red;background-color: transparent;border-radius: 0;clear: both;font-size: 15px;"> Your inquiry has been sent succesfully.</div>
                </form>

            </div>
        </div>
    </div>

</div>
<!--<div class="container tablet-cont visible-xs visible-sm">
    <div class="row">
        <div  style="box-shadow: -1px 3px 9px 2px #0000001a; padding: 25px;" class="col-sm-12">
            <h1 class="title wow fadeInLeft" data-appear-animation="fadeInLeft"
                data-wow-delay="2s">WHAT'S HAPPENING</h1>
            <div class="line wow fadeInLeft" data-appear-animation="fadeInLeft"
                 data-wow-delay="2.3s"></div>
            <div class="content-box-desc mob-fnt wow fadeInUp" data-appear-animation="fadeInUp"
                 data-wow-delay="3.85s">
                <?php /*echo $page_res2['page_content']; */?>
            </div>
            <div class="imgbox-tablet wow fadeIn" data-appear-animation="fadeInUp"
                 data-wow-delay="4.85s">
                <h3 class="sub-heading">Stay updated with our latest developments</h3>
                <form method="post" id="subscribeForm" class="subscribeForm form-inline subscribe-form" novalidate >

                    <input class="input-sub" type="email" id="email" placeholder="Your email address" name="email">
                    <button class="sub-btn subscription-submit" type="submit"  id="submit">SUBSCRIBE</button>
                    <div id='label-text' class="alert alert-success label-text" style="float: left; width: 100%;margin: 15px 15px !important;display:none; color:red;background-color: transparent; border-color: red;border-radius: 0;clear: both;"> Your inquiry has been sent succesfully.</div>
                </form>
            </div>
        </div>
    </div>
</div>-->
