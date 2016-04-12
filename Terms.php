<?php
if (isset($_POST['sign_up']))

{
    $username = htmlspecialchars($_POST['name']);
    $password = md5($_POST['pwd']);
    $text = $username . "||" . $password . "||";
    $fp = fopen('accounts.txt', 'a+');


    if (fwrite($fp, $text)) {
        echo 'Uw account is aangemaakt';

    }
    fclose ($fp);
}
?>

<?php
if (isset($_POST['sign_in']))
{
    $username = $_POST['name'];
    $password = md5($_POST['pwd']);

    $userData = file_get_contents('accounts.txt');

    $inputUser = $username . "||" . $password;

    $isItThere = strpos($userData, $inputUser);

    if ($isItThere === false){
        echo "Dit account bestaat nog niet<br>";
        session_start();
        $_SESSION['user'] = "";
        session_unset();
        session_destroy();
    }
    else {
        echo "U bent ingelogd als $username<br>";
        session_start();
        $_SESSION['user'] = $username;
    }
}
?>

<html>
<head>
    <title>EverydayCigs</title>
    <link rel="stylesheet" type="text/css" href="css/modaal.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/960_12_col.css">
    <link rel="icon" href="fotos/8852a.gif" type="image/x-icon">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <script src="js/modaalStart.js"></script>
    <script src="js/modaalVenster.js"></script>
</head>
<body>
<div class="container_12">
    <div id="Banner" class="grid_12">
        <img src="navLogo.png" class="grid_4" alt="noImg">
        <div id="loginfo" class="grid_4">

        </div>
        <div id="LogReg" class="grid_4 omega">
            <?php
            // door Jordy Sadjari
            if(!isset($_SESSION))
            {
                session_start();
            }
            if (isset($_SESSION['user'])) { ?>
                <form action="endSession.php" method="post">
                    <form action="endSession.php" method="post">
                        <input type="submit" value="Sign out" class="Login" id="O">
                    </form>
                </form>
                <?php
                $sessie = $_SESSION['user'];
                echo "Welkom $sessie";
                ?>

            <?php }else{ ?>
                <input type="button" value="Sign in" class="Login" id="L">
                <input type="button" value="Sign up" class="Login" id="R">
                <?php
                echo "not logged in";
            }

            ?>



        </div>

    </div>

    <div id="Log">
        <form method="post" action="#">
            <h1>Sign In</h1>
            <p><label>Login Name:</label><input type="text" name="name" id="name" /></p>
            <p><label>Password:</label><input type="password" name="pwd" id="pwd"/>
            <p><input type="submit" id="sign_in" name="sign_in" value="Sign in" /></p>
        </form>
    </div>

    <div id="Reg">
        <form method="post" action="#">
            <h1>Sign up</h1>
            <p><label>Login Name:</label><input type="text" name="name" id="name" /></p>
            <p><label>Password:</label><input type="password" name="pwd" id="pwd"/>
            <p><input type="submit" id="sign up" name="sign up" value="Sign up" /></p>
        </form>
    </div>

    <div id="nav" class="grid_12">
        <ul>
            <li><a href="index.php" class="sliding-middle-out active">Home</a></li>
            <li><a href="Marlboro.php" class="sliding-middle-out">Marlboro</a></li>
            <li><a href="King.php" class="sliding-middle-out">King</a></li>
            <li><a href="Gauloises.php" class="sliding-middle-out">Gauloises</a></li>
            <li><a href="Camel.php" class="sliding-middle-out">Camel</a></li>
            <li><a href="contact.php" class="sliding-middle-out">Contact</a></li>
            <a href="winkelwagen.php"><img src="Fotos/winkelmandje.png" style="padding-left:2.3%; border-left: solid white 1px;" alt="noImg"></a>
        </ul>
    </div>

    <section style="margin-left: 10px; background-color: silver">
        <div style="margin-left: 10px ; margin-right: 10px; margin-bottom: 10px; margin-top: 10px;">
        <h1>Terms of Service</h1>
        <h2>OVERVIEW</h2>
        <p>This website is operated by EverydayCigs. Throughout the site, the terms “we”, “us” and “our” refer to EverydayCigs. EverydayCigs offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here.</p>
        <p>By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply  to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content.</p>
        <p>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.</p>
        <p>Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes.</p>
        <p>Our store is hosted on Shopify Inc. They provide us with the online e-commerce platform that allows us to sell our products and services to you.</p>
        <h2>SECTION 1 - ONLINE STORE TERMS</h2>
        <p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site.</p>
        <p>You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws).</p>
        <p>You must not transmit any worms or viruses or any code of a destructive nature.</p>
        <p>A breach or violation of any of the Terms will result in an immediate termination of your Services.</p>
        <h2>SECTION 2 - GENERAL CONDITIONS</h2>
        <p>We reserve the right to refuse service to anyone for any reason at any time.</p>
        <p>You understand that your content (not including credit card information), may be transferred unencrypted and involve (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. Credit card information is always encrypted during transfer over networks.</p>
        <p>You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.</p>
        <p>The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>
        <h2>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</h2>
        <p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk.</p>
        <p>This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. You agree that it is your responsibility to monitor changes to our site.</p>
        <h2>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</h2>
        <p>Prices for our products are subject to change without notice.</p>
        <p>We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.</p>
        <p>We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the Service.</p>
        <h2>SECTION 5 - PRODUCTS OR SERVICES</h2>
        <p>Certain products or services may be available exclusively online through the website. These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy.</p>
        <p>We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. We cannot guarantee that your computer monitor's display of any color will be accurate.</p>
        <p>We reserve the right, but are not obligated, to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited.</p>
        <p>We do not warrant that the quality of any products, services, information, or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>
        <h2>SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</h2>
        <p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. These restrictions may include orders placed by or under the same customer account, the same credit card, and/or orders that use the same billing and/or shipping address. In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address/phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.</p>
        <p>You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. You agree to promptly update your account and other information, including your email address and credit card numbers and expiration dates, so that we can complete your transactions and contact you as needed.</p>
        <p>For more detail, please review our Returns Policy.</p>
        <h2>SECTION 7 - OPTIONAL TOOLS</h2>
        <p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input.</p>
        <p>You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.</p>
        <p>Any use by you of optional tools offered through the site is entirely at your own risk and discretion and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s).</p>
        <p>We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). Such new features and/or services shall also be subject to these Terms of Service.</p>
        <h2>SECTION 8 - THIRD-PARTY LINKS</h2>
        <p>Certain content, products and services available via our Service may include materials from third-parties.</p>
        <p>Third-party links on this site may direct you to third-party websites that are not affiliated with us. We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties.</p>
        <p>We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party's policies and practices and make sure you understand them before you engage in any transaction. Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>
        <h2>SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</h2>
        <p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, by email, by postal mail, or otherwise (collectively, 'comments'), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments.</p>
        <p>We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service.</p>
        <p>You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e-mail address, pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. We take no responsibility and assume no liability for any comments posted by you or any third-party.</p>
        <h2>SECTION 10 - ERRORS, INACCURACIES AND OMISSIONS</h2>
        <p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate at any time without prior notice (including after you have submitted your order).</p>
        <p>We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law. No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>
        <h2>SECTION 11 - PROHIBITED USES</h2>
        <p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>
        <h2>SECTION 12 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</h2>
        <p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free.</p>
        <p>We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable.</p>
        <p>You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you.</p>
        <p>You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products and services delivered to you through the service are (except as expressly stated by us) provided 'as is' and 'as available' for your use, without any representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.</p>
        <p>In no case shall EverydayCigs, our directors, officers, employees, affiliates, agents, contractors, interns, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>
        <h2>SECTION 13 - INDEMNIFICATION</h2>
        <p>You agree to indemnify, defend and hold harmless EverydayCigs and our parent, subsidiaries, affiliates, partners, officers, directors, agents, contractors, licensors, service providers, subcontractors, suppliers, interns and employees, harmless from any claim or demand, including reasonable attorneys’ fees, made by any third-party due to or arising out of your breach of these Terms of Service or the documents they incorporate by reference, or your violation of any law or the rights of a third-party.</p>
        <h2>SECTION 14 - SEVERABILITY</h2>
        <p>In the event that any provision of these Terms of Service is determined to be unlawful, void or unenforceable, such provision shall nonetheless be enforceable to the fullest extent permitted by applicable law, and the unenforceable portion shall be deemed to be severed from these Terms of Service, such determination shall not affect the validity and enforceability of any other remaining provisions.</p>
        <h2>SECTION 15 - TERMINATION</h2>
        <p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes.</p>
        <p>These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, or when you cease using our site.</p>
        <p>If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>
        <h2>SECTION 16 - ENTIRE AGREEMENT</h2>
        <p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision.</p>
        <p>These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, superseding any prior or contemporaneous agreements, communications </p>
        <p>and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service).</p>
        <p>Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>
        <h2>SECTION 17 - GOVERNING LAW</h2>
        <p>These Terms of Service and any separate agreements whereby we provide you Services shall be governed by and construed in accordance with the laws of contactweg36, Amsterdam, NH, 1060 JA, Netherlands.</p>
        <h2>SECTION 18 - CHANGES TO TERMS OF SERVICE</h2>
        <p>You can review the most current version of the Terms of Service at any time at this page.</p>
        <p>We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>
        <h2>SECTION 19 - CONTACT INFORMATION</h2>
        <p>Questions about the Terms of Service should be sent to us at everydaycigs@cigs.com</p>
        </div>
    </section>

    <div id="footer" class="grid_12">
        <div id="Products" class="grid_2">
            <ul>
                <h3>Products</h3>
                <li>Marlboro</li>
                <li>King</li>
                <li>Gaouloises</li>
                <li>Camel</li>
            </ul>
        </div>
        <div id="EverydayCigs" class="grid_2">
            <ul>
                <h3>EverydayCigs</h3>
                <li>About us</li>
                <a href="terms.php"><li>Terms and Con.</li></a>
                <li>Contact</li>
                <li>Cookies</li>
            </ul>
        </div>
        <div id="Support" class="grid_2">
            <ul>
                <h3>Support</h3>
                <li>Security</li>
                <li>Payment</li>
                <li>Refund</li>
                <li>FAQ</li>
            </ul>
        </div>
        <div id="Newsletter" class="grid_5">
            <h3>Newsletter</h3>
            <p>Sign up now to receive free coupons and exclusive deals</p>
            <form>
                <input type="email" id="Newsletterinput" placeholder="email">
                <button id="Newsbutton"><span>Subscribe</span></button>
            </form>
        </div>
        <div class="clear"></div>
        <div id="social" class="grid_5">
            <img src="Fotos/social/Facebook.png" id="facebook" alt="facebook" />
            <img src="Fotos/social/Twitter.png" id="twitter" alt="twitter" />
            <img src="Fotos/social/Tumblr.png" id="tumblr" alt="tumblr" />
            <img src="Fotos/social/Google+.png" id="google+" alt="google" />
            <img src="Fotos/social/Feed.png" id="feed" alt="feed" />
            <img src="Fotos/social/Pinterest.png" id="pinterest" alt="pinterest" />
        </div>
    </div>
</div>
</body>
</html>