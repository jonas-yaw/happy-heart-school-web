<?php require_once("includes/db.php"); ?>
<?php //require_once("includes/session.php"); 
session_start();

function logged_in() {
		return isset($_SESSION['username']);
}
		function confirm_logged_in() {
		if (!logged_in()) {
			echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
		}
	}
	
confirm_logged_in();
$username=$_SESSION['username'];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Happy Heart School</title>

    <!-- Mobile Specific Metas-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Bootstrap-->
    <link rel="stylesheet" href="stylesheet/bootstrap.css">

    <!-- Template Style-->
    <link rel="stylesheet" href="stylesheet/font-awesome.css"> 
    <link rel="stylesheet" href="stylesheet/animate.css">
    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="stylesheet/shortcodes.css">
    <link rel="stylesheet" href="stylesheet/jquery-fancybox.css">
    <link rel="stylesheet" href="stylesheet/responsive.css">
    <link rel="stylesheet" href="stylesheet/flexslider.css">
    <link rel="stylesheet" href="stylesheet/owl.theme.default.min.css">
    <link rel="stylesheet" href="stylesheet/owl.carousel.min.css">
    <link rel="stylesheet" href="stylesheet/jquery.mCustomScrollbar.min.css">

    <link href="icon/favicon.ico" rel="shortcut icon">
</head>
<body>
<!--
    <div id="loading-overlay">
        <div class="loader"></div>
    </div> -->
    <div class="bg-header4">
       
   <div class="wrap-header">
        <header class="header flat-header lh-header header-style5 clearfix">
            <div class="site-header-inner">
                    <div class="container">
                        <div id="logo" class="logo">
                            <h4>HAPPY HEART</h4>
                        </div>                        <div class="mobile-button"><span></span></div>
                        <div class="header-menu">
                            <nav id="main-nav" class="main-nav">
                                <ul class="menu">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="classes.html">Our classes</a></li>
                                    <li><a href="special-event.html">Special Event</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="contact.html" class="nav-sing-disp">Apply</a></li>
                                    <li class="nav-sing">
                                    <a class="sing-in" href="contact.html">Apply</a>
                                </li>
                                </ul>
                            </nav>
                        </div> 
                    </div>
            </div>
        </header><!-- header -->
    </div><!-- wrap-header -->
            <div class="page-title page-title-blog">
                <div class="page-title-inner">
                    <div class="breadcrumbs breadcrumbs-blog text-left">
                        <div class="container">  
                            <div class="breadcrumbs-wrap">
                                <ul class="breadcrumbs-inner">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="forum.html">Forum</a></li>
                                </ul>
                                <div class="title">
                                    Forum
                                </div>
								<li><a href="logout.php">Log Out</a></li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    <!-- bg-header -->
    <div class="blog-bl content-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
              <div class="site-content clearfix">
                        <article class="post post-blog-single">
                       
                            <div class="content-blog-single">
                                <ul class="social social-blog-single pd-top8">
                                    <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
                                    <li><i class="fa fa-google-plus" aria-hidden="true"></i></li>
                                </ul>
                                <div class="content-blog-single-inner">
                                    <div class="content-blog-single-wrap">
                                        <h1 class="title pd-title-single">
                                            <a href="#">How can my kid do better?</a>
                                        </h1>
                                        <p>
                                            If it was not for beautiful designs, we???d all live in a drab world. Steve Jobs would have been anonymous, and nobody would buy Apple products. The best designers, people like Janoff, who designed the Apple logo in 2 weeks.
                                        </p>
                                       
                                    </div>
								
                                    <div id="respond" class="comment-respond">
                                        <h3 id="reply-title" class="comment-reply-title mg-bottom24">
                                            Post A Comment
                                        </h3><a id="success" style="visibility:hidden">Comment has been sent</a><a id="error" style="visibility:hidden">Check your internet connectivity</a>
                                        <form class="comments">
                                            <div class="message-wrap">
                                                <textarea name="comment" id="comment-message" rows="3" placeholder="Type here Message"></textarea>
                                            </div>
                                            <div class="mg-top30">
                                                <button type="button" onclick="addds()" class="btn btn-post-comment box-shadow-type1">
                                                    Post Comment
                                                </button>
												
                                            </div>
                                        </form>                                     </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="widget widget-categories">
                            <h4 class="widget-title">
                                <span>Topics</span>
                            </h4>
                            <ul class="categories-wrap">
                                <li><a href="#">General</a></li>
                                <li><a href="#">Academic</a></li>
                                <li><a href="#">Suggestions</a></li>
                               
                            </ul>
                        </div>
                       <h4 class="widget-title">
                                <span>Forum</span>
                            </h4><br>
                            <div class="news-block">
                                <div class="w-content news-block-content news-block-content-cus">
                                    <ul id="dynamic_field">
						<?php 
						$fetchID="SELECT * FROM forum";
	$sddd=mysqli_query($conn,$fetchID);
	while($noi=mysqli_fetch_assoc($sddd))
	{
		
		echo' <li><p>'.$noi['message'].'</p><a id="firstname" style="color:blue;font-size:10px">'.$noi['sender'].'</a> <a id="dated" style="color:blue;font-size:10px">'.$noi['dated'].'</a><i style="color:green" class="fa fa-check" aria-hidden="true"></i></li>';
	}
	
                         
							
						?>
                                    </ul>
                                </div>
								<input name="username" id="username" style="visibility:hidden" value="<?php echo"$username";?>"/> 
								
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- content-blog -->
 <br><br><br>
    <footer id="footer" class="footer-type1">
        <div id="footer-widget">
            <div class="container">
                <div class="row footer-row">
                    <div class="col-lg-3 col-footer">
                       <div class="logo-footer">
                           <div></div>
                       </div>
                    </div>
                    <div class="col-lg-2 col-company">
                        <h3 class="widget widget-title">
                            School
                        </h3>
                        <ul class="widget-nav-menu">
                            <li><a href="about.html">About School</a></li>
                            <li><a href="classes.html">Classes</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-link">
                        <h3 class="widget widget-title">
                            Help Links
                        </h3>
                        <ul class="widget-nav-menu">
                            <li><a href="#">Apply</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="special-event.html">Events</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-media">
                        <h3 class="widget widget-title">
                            Social Media
                        </h3>
                        <ul class="widget-social-media">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="bottom" class="bottom-type1 clearfix has-spacer">
            <div id="bottom-bar-inner" class="container">
                <div class="bottom-bar-inner-wrap">
                    <div class="bottom-bar-content">
                        <div id="copyright">
                            ?? 
                            <span class="text-year">
                                2022
                            </span>
                            <span class="text-name">
                                SpecUp IT solutions.
                            </span>
                            <span class="license">
                                <a href="#">All Rights Reserved</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a id="scroll-top" class="show"></a>
    </footer><!-- footer -->
	
		
					
					<script type="text/javascript">
					let now=new Date();
					 function removemulti()
	  {
	   //   $('#manm').remove();
	      document.getElementById("manm").remove();
	  }
	let all = [];					
	var i =0;
function addds(){
	var val=$('#comment-message').val();
	var username=$('#username').val();
	$('#dynamic_field').append('<li id="manm"><p id="msg'+i+'">'+val+'</p><a id="firstname'+i+'" style="color:blue;font-size:10px">FirstName.</a> <a id="dated'+i+'" style="color:blue;font-size:10px"> </a><i id="clock'+i+'" style="color:pink" class="fa fa-clock-o" aria-hidden="true"></i></li>');	
	
	$.ajax({
		type:"GET",
		url:"pushmsg.php?msg="+val+'&username='+username,
		
		success: function(data){	
		
	document.getElementById("manm").remove();
	
	var result=$.parseJSON(data);
	$('#dynamic_field').append('<li><p id="msg'+i+'">'+val+'</p><a id="firstname'+i+'" style="color:blue;font-size:10px">'+result.sender+'</a> <a id="dated'+i+'" style="color:blue;font-size:10px">'+result.dated+'</a><i style="color:green" class="fa fa-check" aria-hidden="true"></i></li>');	
	$("#success").show();
		$("#check").show();
		all.push(i);
	//	i++;
		},
		
	
	error: function(data)
		{
			console.log("hi");
			$("#error").show();
		
		}
	});
	

}
</script>
	
    
    <script src="javascript/jquery.min.js"></script>
    <script src="javascript/rev-slider.js"></script>
    <script src="javascript/plugins.js"></script>
    <script src="javascript/jquery-countTo.js"></script>
    <script src="javascript/jquery-ui.js"></script>
    <script src="javascript/jquery-fancybox.js"></script>
    <script src="javascript/flex-slider.min.js"></script>
    <script src="javascript/scroll-img.js"></script>
    <script src="javascript/owl.carousel.min.js"></script>
    <script src="javascript/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="javascript/parallax.js"></script>
    <script src="javascript/jquery-isotope.js"></script>
    <script src="javascript/equalize.min.js"></script>
    <script src="javascript/main.js"></script>

    <!-- slider -->
    <script src="rev-slider/js/jquery.themepunch.tools.min.js"></script>
    <script src="rev-slider/js/jquery.themepunch.revolution.min.js"></script>

    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.actions.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.carousel.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.kenburn.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.layeranimation.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.migration.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.navigation.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.parallax.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.slideanims.min.js"></script>
    <script src="rev-slider/js/extensions/extensionsrevolution.extension.video.min.js"></script>
</body>
</html>