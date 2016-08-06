<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"><!-- test compiled and minified CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css"><!-- Optional theme -->
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css"><!-- Latest compiled and minified JavaScript -->
    <link rel="stylesheet" href="./css/introduction_style.css"><!-- Style sheet for index.html -->

    <script   src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js">
    </script> 

    <title>
        CESA web testpage
    </title>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary navbar-fixed-top">
        <div id="main-nav" class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->


            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">☰<span class="sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="/#">CESA</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="page_nav" href="/#introduction">Introduction</a>
                    </li>
                    <li>
                        <a class="page_nav" href="/#activities">Activities</a>
                    </li>

                    <li>
                        <a class="page_nav" href="/#resources">Resources</a>
                    </li>
                        </ul>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
    <div class="main-header container-fluid">
        <h1>Chinese Engineering Student Association</h1>    
        
        <h3 class="wrap_typed">
        We <span class="typed_element"></span>
    </h3>
    </div>
    

    <div id="introductionTitle" class="main-title">

        <h1 class="display-3">Introduction</h1>

    </div>


    <div class="jumbotron">
        <p class="lead">Chinese Engineering Student Association is committed to provide high-quality services and resources to help Chinese Engineering students on campus to achieve their academic and career goals.</p>
        </p>
    </div>
    
    <div  class="jumbotron2">
 
         
        <p class="lead">As the largest minority group on the UIUC campus today, one third of the over 5000 Chinese international students population attend to the College of Engineering. Thus, we see the necessity to establish an association that strives to help them achieve excellence and success in both academic and professional fields. Specifically, CESA aims to perform the functions as described below.
        </p>
        </p>

       
    </div>

    <div  class="jumbotron">
 
         
        <p class="lead">First of all, CESA will build a platform for Chinese engineering students to share their study experiences and resources by collecting resources from students who are taking or have taken different engineering courses in their curriculum. All membership of CESA can use these resources and have responsibility to share their own resources. Nonetheless, we object to pure duplication of homework and projects while encouraging original work and ideas.</p>
       
        </p>

       
    </div>

    <div  class="jumbotron2">
 
         
        <p class="lead">Also, through general meetings, activities and workshops, CESA offers members the opportunity to socialize with peer students, build study groups, and share research and job opportunities. In order to make this function more efficient, we will appoint an undergraduate student advisor for each department .
        </p>
        
        </p>

       
    </div>

    <div class="jumbotron">
 
         
        <p class="lead">In addition, each semester, we will invite professors from the Engineering Department and representatives from corporations in the field to give speeches. Through the speeches, our members will not only learn the current trends in the Engineering field, but also build network with prospective employers. Moreover, these speeches can be opportunities of researches and internship as well as answers to questions about future study and career for students.
        </p>
        
        </p>

       
    </div>

    </div>

    <div  class="jumbotron2">
 
         
        <p class="lead">At the same time, we will hold some indoor and outdoor activities to enrich engineering students’ life, such as sports tournaments, weight training groups, paintball, BBQ parties, etc. During these activities, we will also corporate with other student organizations on campus, which will help our CESA members to get involved in American campus life. We do believe that physical fitness is as important as academic ability even for engineering students.
        </p>
        
        </p>

       
    </div>



    <hr>
    <h3 align="center">关注我们的微信公众号</h3>
    <img id="cesaqr" src="/img/qrcode_for_gh_f3a5ec0968b5_430.jpg"> 
    <script src="/js/typed.js">
    </script> 
    <script>
    $(function(){
        $(".typed_element").typed({
            strings: ["build.", "share.", "PARTY!"],
            typeSpeed: 0,
            loop: true,
            backDelay: 500          
        });
    });

    $(".page_nav").click(function(){
        $(".collapse").collapse("hide");
    });
    //smooth scrolling https://css-tricks.com/snippets/jquery/smooth-scrolling/ 
    //this code will disable the data-slide for carousel
/*
    $(function() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
        });
    });
*/
    </script>


</body>
</html>
