<!-- jQuery (necessary JavaScript plugins) -->
<script src="<?php echo URL_JS; ?>jquery-1.11.1.min.js" type='text/javascript'></script>
<!-- megamenu -->
<script src="<?php echo URL_JS; ?>megamenu.js" type='text/javascript'></script>
<!-- menu_jquery -->
<script src="<?php echo URL_JS; ?>menu_jquery.js" type='text/javascript'></script>
<!-- simpleCart -->
<script src="<?php echo URL_JS; ?>simpleCart.min.js" type='text/javascript'></script>
<!-- responsiveslides -->
<script src="<?php echo URL_JS; ?>responsiveslides.min.js" type='text/javascript'></script>

<script src="<?php echo URL_JS; ?>jquery.flexisel.js" type="text/javascript"></script>

<script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);
    function hideURLbar(){
        window.scrollTo(0,1);
    }
</script>
<script>
    $(document).ready(function(){
        $(".megamenu").megamenu();
    });
</script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 1
        $("#slider1").responsiveSlides({
            auto: true,
            nav: true,
            speed: 500,
            namespace: "callbacks",
        });
    });
</script>
<script type="text/javascript">
 $(window).load(function() {
  $("#flexiselDemo1").flexisel({
    visibleItems: 5,
    animationSpeed: 1000,
    autoPlay: true,
    autoPlaySpeed: 3000,
    pauseOnHover:true,
    enableResponsiveBreakpoints: true,
    responsiveBreakpoints: {
        portrait: {
            changePoint:480,
            visibleItems: 1
        },
        landscape: {
            changePoint:640,
            visibleItems: 2
        },
        tablet: {
            changePoint:768,
            visibleItems: 3
        }
    }
});
});

simpleCart({
	checkout: {
		type: "PayPal" ,
		email: "you@yours.com"
	},
	tax: 		0.075,
	currency: 	"BRL"
});
</script>
