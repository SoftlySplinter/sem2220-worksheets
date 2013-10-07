<?php require_once('device.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Fluid Grids With WURFL</title>
    <!-- See http://code.google.com/p/html5shiv/ 
    HTML5shiv is a library to enable all new HTML5 elements and sectioning in IE 8 and earlier -->
    <!--[if lt IE 9]>
    <script src="html5shiv.js" type="text/javascript" ></script>   
    <![endif]-->
    <!-- Include basic structural CSS first, that is mobile focused -->
    <link rel="stylesheet" type="text/css" href="conference-mobile-first.css"/>
    <link rel="stylesheet" type="text/css" href="conference-mid-size-screens.css"
          media="all and (min-width: 527px) and (max-width: 684px)"/>
    <link rel="stylesheet" type="text/css" href="conference-large-screens.css"
          media="all and (min-width: 685px)"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Deal with IE 8 and earlier, which don't support media queries. Unfortunately,
         there is nothing in these IE conditionals that allow us to also test for
         browser window size so we just bring in support for large screens. We
         could get round this with some Javascript, BUT the JS could be turned off too. -->
    <!--[if (lt IE 9)&(!IEMobile)]>
    <link rel="stylesheet" type="text/css" href="conference-large-screens.css" media="all"/>
    <![endif]-->
</head>

<body>

<article id="home_page" role="document">

    <header class="page_header" role="banner">
        <div class="logo">
            <img src="logo.jpg" alt="The conference home page logo"/>
        </div>

        <h1>The Future of the Web Conference</h1>

        <nav>
            <ul>
                <li><a href="/">Latest Posts</a></li>
                <li><a href="talks">Talks</a></li>
                <li><a href="speakers">Speakers</a></li>
                <li><a href="contact">Contact Us</a></li>
            </ul>
        </nav>

    </header>
    <section id="main_text" role="main">
        <header>
            <h2>Fluid Grids: Now with fluidity and media queries</h2>
        </header>


        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </p>

        <aside>
            <p>
                &quot;Lorem Ipsum dolor sit amet,
                consectetur adipisicing elit, sed do
                eiusmod tempor incididunt ut labore
                et dolore magna aliqua....&quot;
            </p>
        </aside>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </p>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
            dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </p>

    </section>

    <section id="register" role="complementary">
        <h2>To register:</h2>
        <?php if ($is_phone): ?>
        <div id="register_button">
           <a href="<?php print $phone_string; ?>+441970622422"><img src="register_button.jpg" alt="Register button"/></a>
        </div>
        <?php else: ?>
        <div id="big_number">
           +44 (0)1970 622422
        </div>
        <?php endif; ?>
    </section>


    <section id="twitter_output" role="complementary">

        <h4>Twitter News</h4>
        <a href="">@FutureWeb</a>

        <p>Registration starts on June 9th</p>

        <p>Don't forget to bring your
            toothbrush</p>

        <p>This is a better but not perfect way to
            design a web site</p>

    </section>

</article>

</body>
</html>
