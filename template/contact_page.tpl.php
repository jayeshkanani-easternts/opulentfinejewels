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

<body class="ofj-bg-contact contact overflow">
<?php include 'common/loader.php'; ?>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<!--custom js-->

<script src="js/interact.min.js"></script>
<script src="js/bundle.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/wow.js"></script>

<script src="js/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>
<script>

    function openSideMenu() {
        document.getElementById('side-menu').style.width = '600px';
        document.getElementById('main').style.marginLeft = '225px';
    }

    function closeSideMenu() {
        document.getElementById('side-menu').style.width = '0px';
        document.getElementById('main').style.marginLeft = '0px';
    }


    getPlaceholder: function () {
        var placeholderOption;
        return this.opts.element.attr("placeholder") ||
            this.opts.element.attr("data-placeholder") || // jquery 1.4 compat
            this.opts.element.data("placeholder") ||
            this.opts.placeholder ||
            ((placeholderOption = this.getPlaceholderOption()) !== undefined ? placeholderOption.text() : undefined);
    }
    ,
</script>


<script>


    var x, i, j, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    for (i = 0; i < x.length; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < selElmnt.length; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function (e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                h = this.parentNode.previousSibling;
                for (i = 0; i < s.length; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = 'Interested in '+  this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        for (k = 0; k < y.length; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function (e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        for (i = 0; i < y.length; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < x.length; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
</script>


<script>


    $(document).ready(function () {
        $('#career-form').validate({
            rules: {
                crname: {
                    required: true
                },
                cremail: {
                    required: true
                },
                crmsg: {
                    required: true
                }

            },
            messages: {
                crname: {
                    required: "Please Enter Name"
                },
                cremail: {
                    required: "Please Enter Email"
                },

                crmsg: {
                    required: "Please Enter Message"
                }

            },
            onsubmit: true,
            submitHandler: function (form, event) {

                event.preventDefault();
                var base_url = window.location.origin;
                var data = new FormData($('#career-form')[0]);
                console.log(data);
                $('#submit').html('Loading ..');
                $('#submit').prop('disabled', true);
                $.ajax({
                    url: "inquiry.php",
                    type: "post",
                    cache: false,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#submit').prop('disabled', true);
                        $('#submit').html('Loading....');
                    },
                    data: data,
                    success: function (data) {
                        if (data) {
                            console.log(data);
                            $('#label-text').show();
                            $('#submit').attr('value', '');
                            $('#submit').prop('disabled', false);
                            $('#submit').html('Submit');
                            $("#career-form").closest('form').find("input[type=text],input[type=email], textarea").val("");
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
    });

</script>



<script>


    $(document).ready(function(){
        $("#select-selected").change(function(){
            alert("Selected value is : " + document.getElementById("select-selected").value);
        });
    });
    /*$('.select-selected').prepend("interested");


    $("#select_option1").change(function () {
        alert("The text has been changed.");
    });

    $('#select_option').on('change', function (e) {
        console.log("ggggh");
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;

        console.log(valueSelected);
    });


    $(function () {
        $("#select_option").change(function () {
            console.log("ggggh");
            alert($('option:selected', this).text());
        });
    });*/

</script>


</body>
</html>
