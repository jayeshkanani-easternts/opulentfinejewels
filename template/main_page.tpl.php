<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title; ?></title>

    <meta name="keywords" content="<?php echo $keyword; ?>"/>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <!--    <link href="http://www.jqueryscript.net/css/top.css" rel="stylesheet" type="text/css">-->


    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/pietimer.css">

</head>

<body class="home_navbar">

 <!--   <div id="outerdiv">
      <div id="innerdiv">
      </div>
    </div>-->


<?php include 'common/loader.php'; ?>
<!-- Main Header-->
<?php include 'common/header.php'; ?>
<!-- Main Header End -->

<!-- Main Header-->
<?php include 'common/slider.php'; ?>
<!-- Main Header End -->

<!-- Main Content -->
<?php include $content_include; ?>
<!-- Main Content End-->
  <?php include 'common/analytics.php'; ?>

<!--Scroll to top-->


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<!--custom js-->

<script src="js/interact.min.js"></script>
<script src="js/bundle.js"></script>
<script type="text/javascript" src="js/jquery.pietimer.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/wow.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.pietimer.js"></script>


<script>
    $(document).ready(function () {
        $("body").addClass("loaded");
    });
</script>


<!--ofj slider script-->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script>
     $(document).ready(function () {
         const $cont = $('.cont');
         const $slider = $('.slider');
         const $nav = $('.nav');
         const winW = $(window).width();
         const animSpd = 750; // Change also in CSS
         const distOfLetGo = winW * 0.2;
         let curSlide = 1;
         let animation = false;
         let autoScrollVar = true;
         let diff = 0;
         // Generating slides
         let arrCities = ['Singapore', 'New—York', 'Rome', 'Amsterdam']; // Change number of slides in CSS also
         let numOfCities = arrCities.length;
         let arrCitiesDivided = [];
         arrCities.forEach(function (city) {

             var citylength = city.length;
             var letters = Math.floor(citylength / 4);
             var exp = new RegExp(".{1," + letters + "}", "g");
             arrCitiesDivided.push(city.match(exp));
         });


         $('.nav__slide--1').addClass('nav-active');

         // Navigation
         function bullets(dir) {
             resetSliderFn(curSlide)
             $('.nav__slide--' + curSlide).removeClass('nav-active');
             $('.nav__slide--' + dir).addClass('nav-active');
         }

         function timeout() {
             animation = false;
         }

         function pagination(direction) {

             animation = true;
             diff = 0;
             $slider.addClass('animation');
//            if (cur_slide === 0) {
//                $slider.css({
//                    'transform': 'translate3d(+' + ((curSlide - direction) * 100) + '%, 0, 0)'
//                });
//            } else {
             $slider.css({
                 'transform': 'translate3d(-' + ((curSlide - direction) * 100) + '%, 0, 0)'
             });
//            }

             $slider.find('.slide__darkbg').css({
                 'transform': 'translate3d(' + ((curSlide - direction) * 50) + '%, 0, 0)'
             });

             $slider.find('.slide__letter').css({
                 'transform': 'translate3d(0, 0, 0)',
             });

             $slider.find('.slide__text').css({
                 'transform': 'translate3d(0, 0, 0)'
             });
         }


         function navigateRight(cur_slide) {
             console.log("------navigating right")
             console.log("cur_slide", cur_slide)
             console.log("curSlide", curSlide)
             console.log("/------navigating right")
             if (cur_slide === 0) {
                 curSlide = cur_slide;
             }
             // Final comment
             timerStart = true;
             if (!autoScrollVar) return;
             //if (curSlide >= numOfCities) return;
             pagination(0);
             setTimeout(timeout, animSpd);
             bullets(curSlide + 1);
             curSlide++;
             // reverse on 0 to 4th slider
             if (curSlide == 5) {
                 curSlide = 0
                 pagination(0);
                 setTimeout(timeout, animSpd);
                 bullets(curSlide + 1);
                 curSlide++;
             }

             // don't touch
             /* if (!timerChange) {
              //                currentSlide = curSlide;
              resetSliderFn(curSlide - 1);

              }*/


         }


         function navigateLeft(cur_slide, reset) {
             console.log("-----navigating left")
             console.log("cur_slide", cur_slide)
             console.log("curSlide", curSlide)
             console.log("reset", curSlide)
             console.log("/-----navigating left")

             if (cur_slide === 0 && reset) {
                 curSlide = cur_slide;
             }
             timerStart = true;

             if (curSlide < 1) {
                 return
             }
             pagination(2);
             setTimeout(timeout, animSpd);
             bullets(curSlide - 1);
             curSlide--;
             // reverse on 0 to 4th slider
             if (curSlide == 0) {
                 curSlide = 5
                 pagination(2);
                 setTimeout(timeout, animSpd);
                 bullets(curSlide - 1);
                 curSlide--;
             }
             resetSliderFn(curSlide - 1)


             /* console.log(curSlide, 'curSlide Left')
              resetSliderFn();
              resetAllSliderFn()*/
//


             /*    currentSlide = curSlide - 1;
              timerChangeFn();
              console.log('navigateLeft', curSlide);*/
         }

         function toDefault() {
             pagination(1);
             setTimeout(timeout, animSpd);
         }

         $('.homeSlider__navigationPin.nav__slide').on('click', function () {

             var getSlider = this.classList[2];
             var sliderNo = parseInt(getSlider[getSlider.length - 1]);
             bullets(sliderNo);
             curSlide = sliderNo;
             pagination(1);
             resetSliderFn(sliderNo - 1)
         });

         // Events
         $(document).on('mousedown touchstart', '.slide', function (e) {
             if (animation) return;
             var target = +$(this).attr('data-target');
             var startX = e.pageX || e.originalEvent.touches[0].pageX;
             $slider.removeClass('animation');

             $(document).on('mousemove touchmove', function (e) {

                 var x = e.pageX || e.originalEvent.touches[0].pageX;
                 diff = startX - x;

                 //if (target === 1 && diff < 0 || target === numOfCities && diff > 0) return;
                 if (target === 1 && diff < 0) return;


                 $slider.css({
                     'transform': 'translate3d(-' + ((curSlide - 1) * 100 + (diff / 30)) + '%, 0, 0)'
                 });

                 $slider.find('.slide__darkbg').css({
                     'transform': 'translate3d(' + ((curSlide - 1) * 50 + (diff / 60)) + '%, 0, 0)'
                 });

                 $slider.find('.slide__letter').css({
                     'transform': 'translate3d(' + (diff / 60) + 'vw, 0, 0)',
                 });

                 $slider.find('.slide__text').css({
                     'transform': 'translate3d(' + (diff / 15) + 'px, 0, 0)'
                 });


             })
         })


         $(document).on('mouseup touchend', function (e) {
             console.log("mouseup touchend")
             $(document).off('mousemove touchmove');

             if (animation) return;

             if (diff >= distOfLetGo) {
                 navigateRight();
             } else if (diff <= -distOfLetGo) {
                 navigateLeft();
             } else {
                 toDefault();
             }

         });

         $(document).on('click', '.nav__slide:not(.nav-active)', function () {
             let target = +$(this).attr('data-target');
             bullets(target);
             curSlide = target;
             pagination(1);
         });
         var timerStart = true;
         var slide = 4;
         var currentSlide = 0;
         var totalSec = 1;
         var strokeStart = 749;
         var sliderOffsetData = {
             1: {from: 1985, to: 995},
             2: {from: 1710, to: 870},
             3: {from: 2300, to: 1160},
             4: {from: 1710, to: 913},
         }

         function setTimer(timerFn) {
             // $('.homeSlider__navigationPin--active.nav-active')
             var myTimerFn = setInterval(timerFn, 1);
             intervalNumbers.push(myTimerFn)
             return myTimerFn
         }

         var intervalNumbers = []

         function setTimerFn(onlyClearInterval) {
             if (onlyClearInterval) {
                 clearInterval(myTimerFn);
             } else {

                 timerStart = true;
                 if (!totalSec) {
                     totalSec = 1;
                 }
                 var mainSec = totalSec;
                 var totalTime = totalSec * 1000;
                 var totalSec = totalTime;
                 // reset slider
                 if (currentSlide > 4) {
                     currentSlide = 1;
                 }
                 var startTime = sliderOffsetData[currentSlide] ? sliderOffsetData[currentSlide].from : sliderOffsetData[1].from;
                 var toTime = sliderOffsetData[currentSlide] ? sliderOffsetData[currentSlide].to : sliderOffsetData[1].to;
                 var milisec = 1000;
                 var diffSec = startTime - toTime;
                 var getDiffToMinus = (diffSec / totalTime);
                 var setStroke = startTime;
                 var pathTag = $('.homeSlider__navigationArc.homeSlider__navigationArc--front.slide-' + currentSlide);
                 pathTag.css('visibility', "visible");
//            pathTag.attr('stroke-dashoffset', toTime);
                 $('.nav__slide--' + currentSlide).addClass('homeSlider__navigationPin--active nav-active');

             }


             var myTimerFn = setTimer(timerFn)


             function timerFn() {
                 clearAllIntervals(myTimerFn)
                 if (timerStart) {
                     var fromTill = sliderOffsetData[currentSlide] ? sliderOffsetData[currentSlide].to : sliderOffsetData[1].to;
                     var startStroke = sliderOffsetData[currentSlide] ? sliderOffsetData[currentSlide].from : sliderOffsetData[1].from;
                     if (setStroke >= fromTill) {
                         setStroke = setStroke - getDiffToMinus;
//                        setStroke = setStroke - getDiffToMinus;
                         pathTag.attr('stroke-dashoffset', setStroke);
                     } else {
                         /*if(pathTag)*/
                         pathTag.attr('stroke-dashoffset', startStroke);
                         $('.nav__slide--' + currentSlide).removeClass('homeSlider__navigationPin--active nav-active');
                         timerStart = false;
                         clearInterval(myTimerFn);
                         timerChangeFn();
                         navigateRight();
                     }
                 }
             }

         };


         function timerChangeFn() {
             console.log("calling timer change timerStart", timerStart)
             if (timerStart == false) {
                 /*                timerStart = true;
                 currentSlide = currentSlide + 1;

                 if (currentSlide <= slide) {
                     setTimerFn();
                 } else {
                     resetSliderFn();
                 }*/

             } else {
                 setTimerFn();
             }
         };

         function clearAllIntervals(except) {
             for (var i = 0; i < intervalNumbers.length; i++) {
                 if (intervalNumbers[i] != except) {
                     clearInterval(intervalNumbers[i])
                 }
             }
         }


         function resetSliderFn(curSlide) {
             var allPathTag = $('.homeSlider__navigationArc.homeSlider__navigationArc--front');

             allPathTag.each(function (index, currentEle) {
                 if ((index) != curSlide) {
                     $(this).css('visibility', "hidden");
                 } else {
                     $(this).css('visibility', "visible");
                 }
                 var currentStroke = sliderOffsetData[(index + 1)];
                 $(this).attr('stroke-dashoffset', currentStroke.from);
             });
//            console.log(allPathTag);
//            pathTag.attr('stroke-dashoffset', strokeStart);
             $('.homeSlider__navigationPin.nav__slide').removeClass('homeSlider__navigationPin--active nav-active');
             if (curSlide) {

                 currentSlide = curSlide;
                 //setTimerFn('clearInterval');
             } else {
                 // this is for repeating function at slider 4
                 currentSlide = 0;
                 curSlide = 0
                 // It is second time at first iteration, Do not uncomment. It will repeat first silder twice.
                 //navigateLeft(0, true);
             }
             timerStart = true;
             clearAllIntervals()
             startTimeInitially();
         }

         function startTimeInitially(cur_slide) {
             if (cur_slide) {
                 currentSlide = cur_slide;
             } else {
                 currentSlide = currentSlide + 1;
             }
             setTimerFn();

         }

         startTimeInitially();
         $(document).on('click', '.side-nav', function () {
             var target = $(this).attr('data-target');

             if (target === 'right') navigateRight();
             if (target === 'left') navigateLeft();
         });

         $(document).on('keydown', function (e) {
             if (e.which === 39) navigateRight();
             if (e.which === 37) navigateLeft();
         });

         $(document).on('mousewheel DOMMouseScroll', function (e) {
             if (animation) return;
             var delta = e.originalEvent.wheelDelta;

             if (delta > 0 || e.originalEvent.detail < 0) navigateLeft();
             if (delta < 0 || e.originalEvent.detail > 0) navigateRight();
         });
     });
 </script>


</body>
</html>
