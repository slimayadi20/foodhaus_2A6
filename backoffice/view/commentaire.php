<?php 
include "../controller/commentC.php";
	include "../model/comment.php";
	
//ajout
if (isset($_POST['valider']))
{
    $cat = new comment($_POST['name'],$_POST['email'],$_POST['message']) ;
	 $categ=new commentC;
   $categ->ajoutercomment($cat) ;
   echo '<body onLoad="alert(/'Votre commentaire a été envoyé avec succès/')">';
		echo '<meta http-equiv="refresh" content="0;URL=index.html">';
 
}
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from View/html/gym/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Nov 2020 18:54:00 GMT -->
<head>
<meta charset="utf-8">
<title>Gym HTML-5 Template | Blog Single</title>
<!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">

<!-- Color Switcher Mockup -->
<link href="css/color-switcher-design.css" rel="stylesheet">

<!-- Color Themes -->
<link id="theme-color-file" href="css/color-themes/default-theme.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&amp;family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body class="hidden-bar-wrapper">

<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
 	<!-- Main Header-->
    <header class="main-header header-style-two">
    	
		<!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="clearfix">
				
					<!-- Top Left -->
					<div class="top-left pull-left">
						<!-- Info List -->
                        <ul class="info-list">
							<li><span class="icon fa fa-location-arrow"></span> 27 Division St, New York, USA</li>
							<li><span class="icon fa fa-phone"></span> <a href="tel:+1-044-123-456-789"> +1 (044) 123 456 789</a></li>
							<li><span class="icon fa fa-envelope-o"></span> <a href="mailto:info@example.com"> info@example.com</a></li>
						</ul>
					</div>
					
					<!-- Top Right -->
                    <div class="top-right pull-right">
						
						<!--Language-->
                        <div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"><span class="flag-icon fa fa-globe"></span>EN &nbsp;<span class="icon fa fa-angle-down"></span></a>
                        	<ul class="dropdown-menu style-one" aria-labelledby="dropdownMenu2">
                                <li><a href="#">English</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Arabic</a></li>
                                <li><a href="#">Hindi</a></li>
                            </ul>
                        </div>
						
                    </div>
					
                </div>
            </div>
        </div>
		
		<!-- Header Upper -->
        <div class="header-upper">
        	<div class="auto-container clearfix">
            	
				<div class="pull-left logo-box">
					<div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
				</div>
				
				<div class="nav-outer clearfix">
					<!--Mobile Navigation Toggler-->
					<div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
					<!-- Main Menu -->
					<nav class="main-menu navbar-expand-md">
						<div class="navbar-header">
							<!-- Toggle Button -->    	
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
						<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
							<ul class="navigation clearfix">
								<li class="dropdown"><a href="#">Home</a>
									<ul>
										<li><a href="index.html">Home Page 01</a></li>
										<li><a href="index-2.html">Home Page 02</a></li>
										<li><a href="index-3.html">Home Page 03</a></li>
										<li class="dropdown"><a href="#">Header Styles</a>
											<ul>
												<li><a href="index.html">Header Style 01</a></li>
												<li><a href="index-2.html">Header Style 02</a></li>
												<li><a href="index-3.html">Header Style 03</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="dropdown"><a href="#">About</a>
									<ul>
										<li><a href="about.html">About Us</a></li>
										<li><a href="faq.html">Faq</a></li>
										<li><a href="price.html">Price</a></li>
										<li><a href="team.html">Team</a></li>
										<li><a href="time-table.html">Time Table</a></li>
										<li><a href="testimonial.html">Testimonial</a></li>
										<li><a href="comming-soon.html">Comming Soon</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#">Classes</a>
									<ul>
										<li><a href="classes.html">Classes</a></li>
										<li><a href="classes-detail.html">Classes Detail</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#">Portfolio</a>
									<ul>
										<li><a href="portfolio.html">Portfolio</a></li>
										<li><a href="portfolio-detail.html">Portfolio Detail</a></li>
									</ul>
								</li>
								<li class="dropdown"><a href="#">Shop</a>
									<ul>
										<li><a href="shop.html">Our Products</a></li>
										<li><a href="shop-single.html">Product Single</a></li>
										<li><a href="shopping-cart.html">Shopping Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="account.php">Account</a></li>
									</ul>
								</li>
								<li class="current dropdown"><a href="#">Blog</a>
									<ul>
										<li><a href="blog.html">Our Blog</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
										<li><a href="not-found.html">Not Found</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact us</a></li>
							</ul>
						</div>
					</nav>
					
				</div>
				
            </div>
        </div>
        <!--End Header Upper-->
        
		<!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="index.html" title=""><img src="images/logo-2.png" alt="" title=""></a>
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav><!-- Main Menu End-->
					
                </div>
            </div>
        </div><!-- End Sticky Menu -->
    
		<!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-multiply"></span></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="images/logo-2.png" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
            </nav>
        </div>
		<!-- End Mobile Menu -->
	
    </header>
    <!-- End Main Header -->
	
	<!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/11.jpg)">
    	<div class="auto-container">
			<div class="clearfix">
				<div class="pull-left">
					<h2>Latest News</h2>
					<div class="text">Fitness is not a destination it is a way of life.</div>
				</div>
				<div class="pull-right">
					<ul class="page-breadcrumb">
						<li><a href="index.html">home</a></li>
						<li>Blog</li>
					</ul>
				</div>
			</div>
        </div>
    </section>
    <!--End Page Title-->
	
	<!-- Sidebar Cart Item -->
	<div class="xs-sidebar-group info-group">
		<div class="xs-overlay xs-bg-black"></div>
		<div class="xs-sidebar-widget">
			<div class="sidebar-widget-container">
				<div class="widget-heading">
					<a href="#" class="close-side-widget">
						X
					</a>
				</div>
				<div class="sidebar-textwidget">
					
					<!-- Sidebar Info Content -->
					<div class="sidebar-info-contents">
						<div class="content-inner">
							<div class="logo">
								<a href="index.html"><img src="images/logo.png" alt="" /></a>
							</div>
							<div class="content-box">
								<h2>About Us</h2>
								<p class="text">The argument in favor of using filler text goes something like this: If you use real content in the Consulting Process, anytime you reach a review point you’ll end up reviewing and negotiating the content itself and not the design.</p>
								<a href="#" class="theme-btn btn-style-two"><span class="txt">Consultation</span></a>
							</div>
							<div class="contact-info">
								<h2>Contact Info</h2>
								<ul class="list-style-one">
									<li><span class="icon fa fa-location-arrow"></span>Chicago 12, Melborne City, USA</li>
									<li><span class="icon fa fa-phone"></span>(111) 111-111-1111</li>
									<li><span class="icon fa fa-envelope"></span>Gym@gmail.com</li>
									<li><span class="icon fa fa-clock-o"></span>Week Days: 09.00 to 18.00 Sunday: Closed</li>
								</ul>
							</div>
							<!-- Social Box -->
							<ul class="social-box">
								<li class="facebook"><a href="#" class="fa fa-facebook-f"></a></li>
								<li class="twitter"><a href="#" class="fa fa-twitter"></a></li>
								<li class="linkedin"><a href="#" class="fa fa-linkedin"></a></li>
								<li class="instagram"><a href="#" class="fa fa-instagram"></a></li>
								<li class="youtube"><a href="#" class="fa fa-youtube"></a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- END sidebar widget item -->
	
	<!--Sidebar Page Container-->
    <div class="sidebar-page-container style-two">
    	<div class="auto-container">
        	<div class="row clearfix">
            	
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar sticky-top">
						
						<!-- Search -->
						<div class="sidebar-widget search-box">
							<form method="post" action="https://expert-themes.com/html/gym/contact.html">
								<div class="form-group">
									<input type="search" name="search-field" value="" placeholder="Search....." required>
									<button type="submit"><span class="icon fa fa-search"></span></button>
								</div>
							</form>
						</div>
						
						<!-- Categories Widget -->
						<div class="sidebar-widget categories-widget">
							<div class="sidebar-title">
								<h4>Categories</h4>
							</div>
							<div class="widget-content">
								<ul class="blog-cat">
									<li><a href="#">FITNESS <span>( 24 )</span></a></li>
									<li><a href="#">HEALTH  <span>( 03 )</span></a></li>
									<li><a href="#">LIFESTYLE <span>( 01 )</span></a></li>
									<li><a href="#">NUTRITION <span>( 02 )</span></a></li>
									<li><a href="#">SPORT SCIENCE <span>( 10 )</span></a></li>
									<li><a href="#">TRAINING PROGRAM <span>( 02 )</span></a></li>
								</ul>
							</div>
						</div>
						
						<!-- Categories Widget -->
						<div class="sidebar-widget popular-posts">
							<div class="sidebar-title">
								<h4>Recent Post</h4>
							</div>
							<div class="widget-content">
								<article class="post">
									<div class="post-inner">
										<figure class="post-thumb"><img src="images/resource/post-thumb-5.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
										<div class="text"><a href="blog-single.html">Meal prep for a full week easy</a></div>
										<div class="post-info">19.9.2019</div>
									</div>
								</article>
								<article class="post">
									<div class="post-inner">
										<figure class="post-thumb"><img src="images/resource/post-thumb-6.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
										<div class="text"><a href="blog-single.html">Off Season is finnish now what?</a></div>
										<div class="post-info">19.9.2019</div>
									</div>
								</article>
								<article class="post">
									<div class="post-inner">
										<figure class="post-thumb"><img src="images/resource/post-thumb-7.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
										<div class="text"><a href="blog-single.html">Fitness helps you think & Feel Better.</a></div>
										<div class="post-info">19.9.2019</div>
									</div>
								</article>
							</div>
						</div>
						
						<!-- Search -->
						<div class="sidebar-widget newsletter-box">
							<div class="sidebar-title">
								<h4>GET NEWSLETTER</h4>
							</div>
							<form method="post" action="https://expert-themes.com/html/gym/contact.html">
								<div class="form-group">
									<input type="search" name="search-field" value="" placeholder="Entery Email" required>
									<button type="submit"><span class="icon flaticon-paper-plane-1"></span></button>
								</div>
							</form>
						</div>
						
						<!-- Popular Posts -->
						<div class="sidebar-widget popular-tags">
							<div class="sidebar-title">
								<h4>TAGS</h4>
							</div>
							<div class="widget-content">
								<a href="#">Fitness</a>
								<a href="#">Health</a>
								<a href="#">Lifestyle</a>
								<a href="#">Nutrition</a>
								<a href="#">Sport</a>
								<a href="#">Science</a>
								<a href="#">Training</a>
								<a href="#">Program</a>
							</div>
						</div>
						
						<!-- Instagram Widget -->
						<div class="sidebar-widget instagram-widget">
							<div class="sidebar-title">
								<h4>Instagram</h4>
							</div>
							<div class="widget-content">
								<div class="clearfix">
									<figure class="post-thumb"><img src="images/resource/instagram-1.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images/resource/instagram-2.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images/resource/instagram-3.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images/resource/instagram-4.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images/resource/instagram-5.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
									<figure class="post-thumb"><img src="images/resource/instagram-6.jpg" alt=""><a href="blog-single.html" class="overlay-box"><span class="icon fa fa-link"></span></a></figure>
								</div>
							</div>
						</div>
						
					</aside>
				</div>
				
				<!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                	<!-- Blog Single -->
                	<div class="blog-single">
						<div class="inner-box">
							<div class="image">
								<img src="images/resource/news-10.jpg" alt="" />
							</div>
							<div class="lower-content">
								<ul class="post-meta">
									<li><span class="icon flaticon-folder"></span> GYM</li>
									<li><span class="icon flaticon-user-1"></span> By Jone Ankar</li>
									<li><span class="icon flaticon-comment-1"></span> 02</li>
									<li><span class="icon flaticon-calendar-1"></span> 01.02.2012</li>
								</ul>
								<h3>weight loss program</h3>
								<p>Going to workout on an empty stomach is not a good idea because you may not have enough energy to keep going. Although it is often read or said that playing sports without eating allows you to "hit the fat directly", what we do not tell you is that you will quickly be weak and tired, which will make you feel good. below your abilities and will not allow you to progress or give yourself 100%. In other words, other than hurting yourself, losing muscle, or being at your lowest, it won't have helped. </p>
								<p>Eating something with a high glycemic index, or something sweet, is also not a good idea, as you may have a hypoglycemic attack during the workout.
									The myth of eating sugar before exercise is a misconception. Indeed, the insulin spike that this causes will bring you a very big energy spike for a few minutes, before you drop very badly and find yourself under diet, thus leading to a hypoglycemia crisis. Fruit juices, sodas, cakes, cookies, rice cakes, compotes, sugar, meringues, candies etc. are therefore foods to ban before doing your session.</p>
								<div class="two-column">
									<div class="row clearfix">
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<div class="image">
												<img src="images/resource/news-11.jpg" alt="" />
											</div>
										</div>
										<div class="column col-lg-6 col-md-6 col-sm-12">
											<div class="image">
												<img src="images/resource/news-12.jpg" alt="" />
											</div>
										</div>
									</div>
								</div>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequu ntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, consectetur, adipisci velit.sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
								<blockquote>Prepare to Take on Everything with Your Hnad. <br> This Session Strips it Back. <div class="quote-icon flaticon-quote-4"></div></blockquote>
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.sed quia non numquam eius modi tempora incidunt ut labore et dolore voluptatem.</p>
								<!--Video Box-->
								<div class="video-box style-two">
									<figure class="video-image">
										<img src="images/resource/news-13.jpg" alt="">
									</figure>
									<a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image overlay-box"><span class="flaticon-play-arrow"><i class="ripple"></i></span></a>
								</div>
								<h4>Working daily, with goals in mind will truly make all the difference for classe service</h4>
								<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequu ntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolo rem ipsum quia dolor sit amet, consectetur, adipisci velit.sed quia non numquam eius modi temp ora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
								
								<!-- Post Share Options-->
								<div class="post-share-options">
									<div class="post-share-inner clearfix">
										<div class="pull-left tags"><span>Post Tags: </span><a href="#">Fit,</a> <a href="#">gym, </a><a href="#">fitness,</a> <a href="#">Cardio</a></div>
										<ul class="social-box pull-right">
											<span class="flaticon-share-1"></span>
											<li class="facebook"><a href="#"><span class="fa fa-facebook-f"></span></a></li>
											<li class="twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
											<li class="twitter"><a href="#"><span class="fa fa-google"></span></a></li>
											<li class="linkedin"><a href="#"><span class="fa fa-whatsapp"></span></a></li>
										</ul>
									</div>
								</div>
								
								<!-- Author Box -->
								<div class="author-box">
									<div class="author-inner">
										<div class="thumb"><img src="images/resource/author-6.jpg" alt=""></div>
										<div class="name">About The Theodore</div>
										<ul class="social-icon clearfix">
											<li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										</ul>
										<div class="author-text">Dynamically innovate resource and leveling customer service for state of the art customer service.</div>
									</div>
								</div>
								
								<!-- Comments Area -->
								<div class="comments-area">
									<div class="group-title">
										<h4>02 Comments</h4>
									</div>
									
									<div class="comment-box">
										<div class="comment">
											<div class="author-thumb">
												<img src="images/resource/author-7.jpg" alt="">
												<a class="theme-btn reply-btn" href="#"> Reply</a>
											</div>
											<div class="comment-info clearfix"><strong>Paul Jones </strong><div class="comment-time">August 29, 2017</div></div>
											<div class="text">There are all Happy and Free these days you wanna be where everybody knows your name fish do not fry in the kitchen and beans do not burn on the grill.</div>
										</div>
									</div>
									
									<div class="comment-box reply-comment">
										<div class="comment">
											<div class="author-thumb">
												<img src="images/resource/author-8.jpg" alt="">
												<a class="theme-btn reply-btn" href="#"> Reply</a>
											</div>
											<div class="comment-info clearfix"><strong>Catherine Brown </strong><div class="comment-time">August 29, 2017</div></div>
											<div class="text">Happy and Free these days you wanna be where everybody knows your name fish do not fry in the kitchen and beans do not burn on the grill.</div>
										</div>
									</div>
									
								</div>
								
								<!-- Comments Form -->
								<div class="comments-form">
									<div class="group-title">
										<h4>Leave Reply</h4>
									</div>
									
									<!-- Default Form -->
									<div class="default-form style-two">
										
										<!-- Default Form -->
										<form method="post" action="commentaire.php">
											<div class="row clearfix">
											
												<div class="col-lg-6 col-md-6 col-sm-12 form-group">
													<input type="text" name="name" placeholder="Name" required>
												</div>
												
												<div class="col-lg-6 col-md-6 col-sm-12 form-group">
													<input type="email" name="email" placeholder="Email" required>
												</div>
												
												<div class="form-group col-lg-12 col-md-12 col-sm-12">
													<textarea name="message" placeholder="Your Comments"></textarea>
												</div>
												
												<div class="form-group clearfix col-lg-12 col-md-12 col-sm-12">
													<div class="btn-three-outer"><button class="theme-btn btn-style-three" type="submit" name="valider"><span class="txt">Sand Now</span></button></div>
												</div>
												
											</div>
										</form>
										
										<!--End Default Form -->
									</div>
									
									
								</div>
								
							</div>
						</div>
                    </div>
                </div>
                
				
			</div>
		</div>
	</div>
	
	<!-- Subscribe Section -->
	<section class="subscribe-section">
		<div class="auto-container">
			<div class="inner-container margin-bottom">
				<div class="pattern-layer" style="background-image:url(images/background/7.jpg)"></div>
				<div class="section-image" style="background-image:url(images/resource/newslatter.png)"></div>
				<div class="row clearfix">
					
					<!-- Title Column -->
					<div class="title-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<h3>Don’t miss any updates <br> Get subscribed!</h3>
						</div>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							
							<div class="newsletter-form">
								<form method="post" action="https://expert-themes.com/html/gym/contact.html">
									<div class="form-group">
										<input type="email" name="email" value="" placeholder="Add your email ......" required="">
										<button type="submit" class="theme-btn submit-btn"><span class="txt">Subscribe</span></button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End Subscribe Section -->
	
	<!-- Main Footer -->
    <footer class="main-footer style-four" style="background-image:url(images/background/2.jpg)">
		<div class="auto-container">
        	<!-- Widgets Section -->
            <div class="widgets-section">
            	<div class="row clearfix">
                	
                    <!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							
							<!--Footer Column-->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget logo-widget">
									<div class="logo">
                                    	<a href="index.html"><img src="images/footer-logo.png" alt="" /></a>
                                    </div>
									<div class="text">Gym Expert is a champ in providing its users with absolutely everything a fitness or gym site needs. consectetur adipiscing elit. Suspendisse interdum nulla eu posuere scelerisque.</div>
									<div class="social-links">
										<span>Follow on Socials </span>
										<a href="#" class="fa fa-facebook"></a>
										<a href="#" class="fa fa-twitter"></a>
										<a href="#" class="fa fa-instagram"></a>
										<a href="#" class="fa fa-linkedin"></a>
									</div>
								</div>
							</div>
							
							<!-- Footer Column -->
							<div class="footer-column col-lg-6 col-md-6 col-sm-12">
								<div class="footer-widget news-widget">
									<h4>Latest Posts</h4>
									<!-- Footer Column -->
									<div class="widget-content">
										<div class="post">
											<div class="thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-3.jpg" alt=""></a></div>
											<h5><a href="blog-single.html">Your Future is Created by What You Do Today</a></h5>
											<span class="date">JUNE 21, 2020</span>
										</div>

										<div class="post">
											<div class="thumb"><a href="blog-single.html"><img src="images/resource/post-thumb-4.jpg" alt=""></a></div>
											<h5><a href="blog-single.html">How to Maximise Time Spent at The GYM.</a></h5>
											<span class="date">JUNE 21, 2019</span>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					
					<!-- Big Column -->
                    <div class="big-column col-lg-6 col-md-12 col-sm-12">
                        <div class="row clearfix">
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget links-widget">
									<h4>Our Services</h4>
									<ul class="list-link">
										<li><a href="#">Fat Burn</a></li>
										<li><a href="#">Streching</a></li>
										<li><a href="#">Weight Loss</a></li>
										<li><a href="#">Self Defense</a></li>
										<li><a href="#">Body Building</a></li>
										<li><a href="#">Psycho Trainning</a></li>
										<li><a href="#">Strength Trainning</a></li>
									</ul>
								</div>
							</div>
							
							<!-- Footer Column -->
                            <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                <div class="footer-widget timing-widget">
									<h4>Working Hours</h4>
									<ul>
										<li>Monday – Friday:<span>07:00 – 21:00</span></li>
										<li>Saturday:<span>07:00 – 16:00</span></li>
										<li>Sunday Closed</li>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="copyright">Copyright 2020 Theme by expertthemes</div>
			</div>
		
		</div>
	</footer>
	
</div>
<!--End pagewrapper-->

<!-- Color Palate / Color Switcher -->

<div class="color-palate">
    <div class="color-trigger">
        <i class="fa fa-gear"></i>
    </div>
    <div class="color-palate-head">
        <h6>Choose Your Color</h6>
    </div>
	<div class="various-color clearfix">
        <div class="colors-list">
            <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
            <span class="palate green-color" data-theme-file="css/color-themes/green-theme.css"></span>
            <span class="palate olive-color" data-theme-file="css/color-themes/olive-theme.css"></span>
            <span class="palate orange-color" data-theme-file="css/color-themes/orange-theme.css"></span>
            <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
            <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
            <span class="palate brown-color" data-theme-file="css/color-themes/brown-theme.css"></span>
            <span class="palate redd-color" data-theme-file="css/color-themes/redd-color.css"></span>
        </div>
    </div>
	
    <h5>Other Options</h5>
	<ul class="rtl-version option-box"> <li class="rtl">RTL Version</li> <li>LTR Version</li> </ul>
	
    <a href="#" class="purchase-btn">Purchase now $17</a>
    
    <div class="palate-foo">
        <span>You will find much more options for colors and styling in admin panel. This color picker is used only for demonstation purposes.</span>
    </div>

</div>

<!-- Search Popup -->
<div class="search-popup">
	<button class="close-search style-two"><span class="flaticon-multiply"></span></button>
	<button class="close-search"><span class="flaticon-up-arrow-1"></span></button>
	<form method="post" action="https://expert-themes.com/html/gym/blog.html">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- End Header Search -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-up"></span></div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/appear.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/tilt.jquery.min.js"></script>
<script src="js/jquery.paroller.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/wow.js"></script>
<script src="js/nav-tool.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/script.js"></script>
<script src="js/color-settings.js"></script>

</body>

<!-- Mirrored from View/html/gym/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Nov 2020 18:54:07 GMT -->
</html>