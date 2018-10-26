<?php
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '407361163037320');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=407361163037320&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->

    <script> 
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-75483172-1', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- Yandex.Metrika counter -->
    <script async type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39838230 = new Ya.Metrika({ id:39838230, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39838230" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
<?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
	<header>

        <div class="burger-nav">
            <div class="center">
                <div class="search-item">
                    <form role="search" method="get" id="searchform"">
                        <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="поиск">
                        <input type="submit" id="searchsubmit" value="">
                    </form>
                </div>
                <div class="burger-menu">
                    <div class="burger"></div>
                </div>
                <div class="clear"></div>
                <nav class="navig">
                    <?php wp_nav_menu( array('menu' => 'main_menu' )); ?>
                </nav>
            </div>
        </div>
		<div class="top-line">
			<div class="center">
				<div class="phone-item"><a href="tel:+380577556336">+38 057 755 63 36</a></div>
				<div class="phone-item"><a href="tel:+380577556336">+38 050 446 63 36</a></div>
                    <div class="search-item">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
                            <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="поиск">
                            <input type="submit" id="searchsubmit" value="">
                        </form>
                    </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="middle-line">
			<div class="center">
                <a href="<?php echo get_home_url(); ?>">
                    <div class="logo"></div>
                </a>
            </div>
		</div>
		<div class="bottom-line">
			<div class="center">
                <nav>
                    <?php wp_nav_menu( array('menu' => 'main_menu' )); ?>
                </nav>
            </div>
		</div>
	</header>


