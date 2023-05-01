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


    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/animate.min.css">

</head>

<body class="ofj-bg-subscribe subscribe sub-mt-tp">


<!-- Main Header-->
<?php include 'common/loader.php'; ?>
<!-- Main Header End -->

<!-- Main Header-->
<?php include 'common/header.php'; ?>
<!-- Main Header End -->


<!-- Main Content -->
<?php include $content_include; ?>
<!-- Main Content End-->
  <?php include 'common/analytics.php'; ?>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!--custom js-->

<script src="js/interact.min.js"></script>
<script src="js/bundle.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/jquery.validate.min.js"></script>


<script>
    /*$(document).ready(function () {

        $('#subscribe-form').validate({

            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: {
                    required: "Please Enter Email Address",
                    email: "Please Enter Valid Email Address"
                },
            },

            onsubmit: true,
            submitHandler: function (form, event) {

                var data = new FormData($('#subscribe-form')[0]);
                // console.log(data);
                // $('#submit').html('Loading ..');
                $('#submit').prop('disabled', true);
                $.ajax({
                    url: "subscription.php",
                    type: "post",
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#submit').prop('disabled', true);
                        // $('#submit').html('Loading....');
                    },
                    data: data,
                    success: function (data) {
                        if (data) {
                            console.log(data);
                            $('#label-text').show();
                            // $('#submit').attr('value', '');
                            $('#submit').prop('disabled', false);
                            // $('#submit').html('Submit');
                            $("#subscribe-form").closest('form').find("input[type=text],input[type=email], textarea").val("");
                            setInterval(function () {
                                $('#label-text').hide();
                            }, 6000);
                        } else {
                            alert('There occured some problem');
                        }
                    }
                })
            }


        });
    });*/

    $(document).ready(function() {

        $('#subscribeForm').validate({

            rules: {
                email: {
                    required: true,
                    email: true
                },

            },
            messages: {
                email: {
                    required: "Please Enter Email Address"
                },
            },

            onsubmit: true,
            errorPlacement: function(error, element) {
                if (element.attr("name") == "email") {
                    error.insertAfter("#submit");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form ,event) {
                event.preventDefault();

                var data = new FormData($('#subscribeForm')[0]);
                console.log(data);
                $('#submit').html('Loading ..');
                $('#submit').prop('disabled',true);
                $.ajax({
                    url:"subscription.php",
                    type:"post",
                    cache:false,
                    processData : false,
                    contentType: false,
                    beforeSend : function(){
                        $('#submit').prop('disabled',true);
                        $('#submit').html('Loading....');
                    },
                    data: data,
                    success : function(data){
                        if(data) {
                            console.log(data);
                            $('#label-text').show();
                            $('#submit').attr('value','');
                            $('#submit').prop('disabled',false);
                            $('#submit').html('Submit');
                            $("#subscribeForm").closest('form').find("input[type=text],input[type=email], textarea").val("");
                            setInterval(function(){
                                $('#label-text').hide();
                            }, 6000);
                        }else{
                            alert('There occured some problem');
                        }
                    }
                })

            }
        });
    });

</script>


<script>

    function openSideMenu() {
        document.getElementById('side-menu').style.width = '600px';
        document.getElementById('main').style.marginLeft = '225px';
    }

    function closeSideMenu() {
        document.getElementById('side-menu').style.width = '0px';
        document.getElementById('main').style.marginLeft = '0px';
    }


</script>
<script>
    $(document).ready(function () {
        $("body").addClass("loaded");
    });
</script>


</body>
</html>
