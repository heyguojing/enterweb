<?php /*a:5:{s:62:"D:\wamp64\www\enterweb\application\index\view\index\index.html";i:1559612167;s:61:"D:\wamp64\www\enterweb\application\index\view\public\css.html";i:1559611076;s:62:"D:\wamp64\www\enterweb\application\index\view\public\head.html";i:1559446610;s:62:"D:\wamp64\www\enterweb\application\index\view\public\foot.html";i:1559203605;s:60:"D:\wamp64\www\enterweb\application\index\view\public\js.html";i:1559203580;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Conpany</title>
    <!-- css -->
<link rel="stylesheet" href="/static/index/css/owl.carousel.css">
<link rel="stylesheet" href="/static/index/css/barfiller.css">
<link rel="stylesheet" href="/static/index/css/animate.css">
<link rel="stylesheet" href="/static/index/css/font-awesome.min.css">
<link rel="stylesheet" href="/static/index/css/bootstrap.min.css">
<link rel="stylesheet" href="/static/index/css/slicknav.css">
<link rel="stylesheet" href="/static/index/css/main.css">
</head>

<body>
    <div class="preloader">
        <span class="preloader-spin"></span>
    </div>
    <div class="site">
        <!-- head -->
        <header>
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-3 logo-column">
                <a href="index.html" class="logo">
                    <img src="/static/index/images/logo.png" alt="logo">
                </a>
            </div>
            <div class="col-6 col-sm-9 nav-column clearfix">
                <div class="right-nav">
                    <span class="search-icon fa fa-search"></span>
                    <form action="#" class="search-form">
                        <input type="search" placeholder="search now">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <div class="header-social">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-github"></a>
                    </div>
                </div>
                <nav id="menu" class="d-none d-lg-block">
                    <ul>
                        <li class="current-menu-item has-child">
                            <a href="index.html">Home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home - 01</a></li>
                                <li><a href="index-2.html">Home - 02</a></li>
                                <li><a href="index-3.html">Home - 03</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo url('Index/about'); ?>">About</a></li>
                        <li><a href="<?php echo url('Index/service'); ?>">Service</a></li>
                        <li class="has-child">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="career.html">Career</a></li>
                                <li><a href="coming-soon.html">Coming Soon</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="faq.html">Faq</a></li>
                                <li><a href="portfolio.html">Portfolio</a></li>
                                <li><a href="pricing.html">Pricing</a></li>
                                <li><a href="service.html">Service</a></li>
                                <li><a href="team.html">Team</a></li>
                                <li><a href="testimonial.html">Testimonial</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo url('index/contact'); ?>">联系我们</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
        <div class="hero-slider">
            <?php if(is_array($carousel) || $carousel instanceof \think\Collection || $carousel instanceof \think\Paginator): $i = 0; $__LIST__ = $carousel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$show): $mod = ($i % 2 );++$i;?>
            <div class="single-slide" style="background-image:url(<?php echo htmlentities($show['pic']); ?>)">
                <div class="inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slide-content">
                                    <h2><?php echo htmlentities($show['title']); ?></h2>
                                    <p><?php echo htmlentities($show['desc']); ?></p>
                                    <div class="slide-btn">
                                        <a href=")" class="button">Learn More</a>
                                        <a href="#" class="button-2">Live Preview</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="brand-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-6 single-brand">
                        <div class="inner">
                            <a href="#">
                                <img src="/static/index/images/brand1.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 single-brand">
                        <div class="inner">
                            <a href="#">
                                <img src="/static/index/images/brand2.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 single-brand">
                        <div class="inner">
                            <a href="#">
                                <img src="/static/index/images/brand3.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 single-brand">
                        <div class="inner">
                            <a href="#">
                                <img src="/static/index/images/brand4.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-area bg2 sp">
            <div class="container">
                <div class="section-title">
                    <h2>Our Service</h2>
                    <p>Malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 single-service">
                        <div class="inner">
                            <div class="title">
                                <div class="icon">
                                    <i class="fa fa-film"></i>
                                </div>
                                <h4>Video Making</h4>
                            </div>
                            <div class="content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 single-service">
                        <div class="inner">
                            <div class="title">
                                <div class="icon">
                                    <i class="fa fa-camera"></i>
                                </div>
                                <h4>Photography</h4>
                            </div>
                            <div class="content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 single-service">
                        <div class="inner">
                            <div class="title">
                                <div class="icon">
                                    <i class="fa fa-music"></i>
                                </div>
                                <h4>Music Composing</h4>
                            </div>
                            <div class="content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 single-service">
                        <div class="inner">
                            <div class="title">
                                <div class="icon">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <h4>Product Marketing</h4>
                            </div>
                            <div class="content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 single-service">
                        <div class="inner">
                            <div class="title">
                                <div class="icon">
                                    <i class="fa fa-magic"></i>
                                </div>
                                <h4>Video Editing</h4>
                            </div>
                            <div class="content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 single-service">
                        <div class="inner">
                            <div class="title">
                                <div class="icon">
                                    <i class="fa fa-bar-chart"></i>
                                </div>
                                <h4>Presentation</h4>
                            </div>
                            <div class="content">
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="portfolio-area sp">
            <div class="container">
                <div class="section-title">
                    <h2>Latest Work</h2>
                    <p>Malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                </div>
                <div class="row">
                    <div class="single-portfolio col-md-4">
                        <div class="inner">
                            <div class="portfolio-img">
                                <img src="/static/index/images/portfolio1.jpg" alt="portfolio-image">
                                <div class="hover-content">
                                    <div>
                                        <a href="#" class="button">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <a href="#">
                                    <h3>The Back Chiropractor</h3>
                                </a>
                                <span>Ceramics, Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4">
                        <div class="inner">
                            <div class="portfolio-img">
                                <img src="/static/index/images/portfolio2.jpg" alt="portfolio-image">
                                <div class="hover-content">
                                    <div>
                                        <a href="#" class="button">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <a href="#">
                                    <h3>The Back Chiropractor</h3>
                                </a>
                                <span>Ceramics, Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4">
                        <div class="inner">
                            <div class="portfolio-img">
                                <img src="/static/index/images/portfolio3.jpg" alt="portfolio-image">
                                <div class="hover-content">
                                    <div>
                                        <a href="#" class="button">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <a href="#">
                                    <h3>The Back Chiropractor</h3>
                                </a>
                                <span>Ceramics, Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4">
                        <div class="inner">
                            <div class="portfolio-img">
                                <img src="/static/index/images/portfolio4.jpg" alt="portfolio-image">
                                <div class="hover-content">
                                    <div>
                                        <a href="#" class="button">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <a href="#">
                                    <h3>The Back Chiropractor</h3>
                                </a>
                                <span>Ceramics, Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4">
                        <div class="inner">
                            <div class="portfolio-img">
                                <img src="/static/index/images/portfolio5.jpg" alt="portfolio-image">
                                <div class="hover-content">
                                    <div>
                                        <a href="#" class="button">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <a href="#">
                                    <h3>The Back Chiropractor</h3>
                                </a>
                                <span>Ceramics, Design</span>
                            </div>
                        </div>
                    </div>
                    <div class="single-portfolio col-md-4">
                        <div class="inner">
                            <div class="portfolio-img">
                                <img src="/static/index/images/portfolio6.jpg" alt="portfolio-image">
                                <div class="hover-content">
                                    <div>
                                        <a href="#" class="button">View Case Study</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-content">
                                <a href="#">
                                    <h3>The Back Chiropractor</h3>
                                </a>
                                <span>Ceramics, Design</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center" data-margin="40px 0 0">
                        <a href="#" class="button">More Works</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-area sp bg1">
            <div class="container">
                <div class="section-title white">
                    <h2>Clients Review</h2>
                    <p>Malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                </div>
                <div class="testimonial-slider">
                    <div class="single-slide">
                        <div class="inner">
                            <p>When I was just starting 6th grade I got my first job. Paperboy! Boy, was I excited. At
                                that time I had spent a lot of time actually playing the video official.</p>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="/static/index/images/client.jpg" alt="client">
                                </div>
                                <div class="client-data">
                                    <h4>Jhon Doe</h4>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="inner">
                            <p>When I was just starting 6th grade I got my first job. Paperboy! Boy, was I excited. At
                                that time I had spent a lot of time actually playing the video official.</p>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="/static/index/images/client.jpg" alt="client">
                                </div>
                                <div class="client-data">
                                    <h4>Jhon Doe</h4>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="inner">
                            <p>When I was just starting 6th grade I got my first job. Paperboy! Boy, was I excited. At
                                that time I had spent a lot of time actually playing the video official.</p>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="/static/index/images/client.jpg" alt="client">
                                </div>
                                <div class="client-data">
                                    <h4>Jhon Doe</h4>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-slide">
                        <div class="inner">
                            <p>When I was just starting 6th grade I got my first job. Paperboy! Boy, was I excited. At
                                that time I had spent a lot of time actually playing the video official.</p>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="/static/index/images/client.jpg" alt="client">
                                </div>
                                <div class="client-data">
                                    <h4>Jhon Doe</h4>
                                    <span>Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="faq-area sp bg2">
            <div class="container">
                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>Malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae.</p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="faq">
                            <div class="single-item">
                                <h4>Low Cost Advertising Available or Not?</h4>
                                <div class="content">
                                    Pellentesque habitant morbi tristique senectus et netus et malesu ada fames and
                                    reply to all.
                                </div>
                            </div>
                            <div class="single-item">
                                <h4>What Is The Big R For Marketing Your Business?</h4>
                                <div class="content">
                                    Pellentesque habitant morbi tristique senectus et netus et malesu ada fames and
                                    reply to all.
                                </div>
                            </div>
                            <div class="single-item">
                                <h4>Does Using Banner Stands Increase Trade Show Traffic?</h4>
                                <div class="content">
                                    Pellentesque habitant morbi tristique senectus et netus et malesu ada fames and
                                    reply to all.
                                </div>
                            </div>
                            <div class="single-item">
                                <h4>How To Write Better Advertising Copy?</h4>
                                <div class="content">
                                    Pellentesque habitant morbi tristique senectus et netus et malesu ada fames and
                                    reply to all.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="faq-img text-center">
                            <img src="/static/index/images/fag-img.png" alt="faq">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4>About</h4>
                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
                            egestas.</p>
                        <p>Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, antesenectus
                            et netus et malesuada fames ac turpis egestas.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4>Company</h4>
                        <ul>
                            <li><a href="#">Company Overview</a></li>
                            <li><a href="#">Meet The Team</a></li>
                            <li><a href="#">Our Awesome Partners</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Frequently Asked Questions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4>Recent Posts</h4>
                        <div class="media">
                            <a href="#">
                                <img src="/static/index/images/recent1.jpg" class="d-flex mr-3" alt="">
                            </a>
                            <div class="media-body">
                                <h5>
                                    <a href="#">Curling irons are as individual as the women</a>
                                </h5>
                                <span>June 22, 2017</span>
                            </div>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="/static/index/images/recent2.jpg" class="d-flex mr-3" alt="">
                            </a>
                            <div class="media-body">
                                <h5>
                                    <a href="#">Curling irons are as individual as the women</a>
                                </h5>
                                <span>June 22, 2017</span>
                            </div>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="/static/index/images/recent3.jpg" class="d-flex mr-3" alt="">
                            </a>
                            <div class="media-body">
                                <h5>
                                    <a href="#">Curling irons are as individual as the women</a>
                                </h5>
                                <span>June 22, 2017</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 footer_widget">
                    <div class="inner">
                        <h4>Address</h4>
                        <h5>Flat Pro, Inc.</h5>
                        <p>649 Folsom Ave, Suite 400 <br>San Francisco, CA 63105 <br>P: (123) 456-7890</p>
                        <h4>Newsletter</h4>
                        <form action="#" class="nw_form">
                            <input placeholder="Enter your email" type="email">
                            <button><i class="fa fa-paper-plane"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright-txt">
                        Â© 2017 Flat Pro. All Rights Reserved.
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <div class="footer-nav">
                        <a href="#">Home</a>
                        <a href="#">Portfolio</a>
                        <a href="#">Pages</a>
                        <a href="#">Shortcode</a>
                        <a href="#">Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
    </div>
    <!--Required JS files-->
    <!-- js -->
<script src="/static/index/js/jquery-2.2.4.min.js"></script>
<script src="/static/index/js/vendor/popper.min.js"></script>
<script src="/static/index/js/vendor/bootstrap.min.js"></script>
<script src="/static/index/js/vendor/owl.carousel.min.js"></script>
<script src="/static/index/js/vendor/isotope.pkgd.min.js"></script>
<script src="/static/index/js/vendor/jquery.barfiller.js"></script>
<script src="/static/index/js/vendor/loopcounter.js"></script>
<script src="/static/index/js/vendor/slicknav.min.js"></script>
<script src="/static/index/js/active.js"></script>
</body>

</html>