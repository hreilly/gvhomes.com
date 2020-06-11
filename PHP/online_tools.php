<?php
// Template Name: Online Tools
/**
 * The template to display our online/virtual sales tools.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<style>
    #matterport {
        background-color: #ff3158;
        background: linear-gradient(#ff3158, #cc2950);
        color: #ffffff;
    }
    #nternow {
        background-color: #ffffff;
        color: #000000;
    }
    #docusign {
        background-color: #006ff9;
        background: linear-gradient(#006ff9, #0055b2);
        color: #ffffff;
    }
    #onlinechat {
        background-color: #ffffff;
        color: #084675;
    }
    #digitalmaterial, #familymessage {
        background-color: #084675;
        color: #ffffff;
    }
    .service-banner {
        margin: auto;
    }
    .service-banner>div {
        max-width: 1024px;
        margin: auto;
        padding: 100px 40px;
    }
    .service-banner img {
        max-width: 400px;
        width: 100%;
    }
    .service-banner p {
        margin: 40px 0;
        line-height: 2rem;
    }
    .service-banner a {
        padding: 10px 20px;
        margin-bottom: 50px;
        border-radius: 2px;
    }
    .service-banner a:hover {
        text-decoration: none;
        box-shadow: 1px 1px 5px rgba(0,0,0,.3);
    }
    #_form_5E73A82A433DD_ ._submit {
        font-family: 'Montserrat', sans-serif;
    }
</style>

<div style="margin: auto;">
    <h1 style="text-transform: none; font-weight: 900; padding: 60px 40px 0px; text-align: center;">Virtual Services & Online Tools</h1>
    <picture style="margin: auto; padding: 20px; text-align: center; display: block;">
        <img src="/wp-content/uploads/2020/03/online_sales_tools-01.jpg" alt="">
    </picture>
    <h2 style="margin: auto; text-align: center; text-transform: none; font-size: 1.3rem; padding: 0px 40px 40px; max-width: 1024px;">At Granville, we're doing everything we can to bring our services straight to you, right where you are.</h2>
    <div style="width: 100%; text-align: center;padding-bottom:40px;">
      <a class="subtle-button" style="text-align: center; background-color:#084675;" href="https://player.vimeo.com/video/402738205?&transparent=0"
                data-featherlight="iframe"
                data-featherlight-iframe-frameborder="0"
                data-featherlight-iframe-allowfullscreen="true"
                data-featherlight-iframe-style="display:block;height:70vh;width:90vw;max-width:1280px;max-height:720px;">WATCH&nbsp;the&nbsp;VIDEO</a>
</div>
    <div id="matterport" class="service-banner">
        <div>
            <img src="/wp-content/uploads/2020/03/MP-logoTM_H_lock-RGB_white.png" alt="Matterport">
            <p>You can walk through all of our models any time, right from the comfort of your own home. Using any PC, laptop, tablet, or phone, you can explore Matterport virtual tours that feature extra information and hotspots throughout the experience.</p>
            <a style="background-color: white; color:#cc2950;" href="/floorplans/">EXPLORE PLANS</a>
        </div>
    </div>
    <div id="nternow" class="service-banner">
        <div>
            <img src="/wp-content/uploads/2020/03/nternow_logo.jpg" alt="NterNow">
            <p>We're always working to make your home search easier - that's why we've partnered with NterNow to provide on-demand access at select move-in ready homes. Explore on your own schedule without the need to stop by our offices or make an appointment. Grab your phone, download the app (or call in), and unlock a whole new walkthrough experience.</p>
            <a style="background-color: #c64005; color:#ffffff;" href="/nternow/">LEARN MORE</a>
        </div>
    </div>
    <div id="digitalmaterial" class="service-banner">
        <div style="margin: auto;">
            <h2 style="text-transform: none; font-weight: 900; color: white;">Digital Materials</h2>
            <p>If you'd like to take a deeper dive into what exclusive features our communities and floor plans have to offer, you can access or download a wide variety of digital materials. Access some of our most popular downloads below, or submit a request to our sales team for even more options.</p>
            <div style="display: flex; flex-wrap: wrap; margin-bottom: 50px;">
                <a style="background-color: white; color: #084675; margin: 0px 0px 5px 5px;" href="https://gvhomes.s3.amazonaws.com/digital_materials/allcommunity_floorplan_booklet_digital.pdf" target="_blank">All Floor Plans</a>
                <a style="background-color: white; color: #084675; margin: 0px 0px 5px 5px;" href="https://gvhomes.s3.amazonaws.com/digital_materials/BT_CommunityBook.pdf" target="_blank">Belterra Community Book</a>
                <a style="background-color: white; color: #084675; margin: 0px 0px 5px 5px;" href="https://gvhomes.s3.amazonaws.com/files/CopperRiverRanch_brochure_web.pdf" target="_blank">Copper River Community Book</a>
                <a style="background-color: white; color: #084675; margin: 0px 0px 5px 5px;" href="https://gvhomes.s3.amazonaws.com/digital_materials/DE_CommunityBook.pdf" target="_blank">Deauville East Community Book</a>
            </div>
        </div>
    </div>
    <div id="onlinechat" class="service-banner">
        <div>
            <h2 style="text-transform: none; font-weight: 900; color: #084675;">Online Chat</h2>
            <p>Have a quick question for our sales team? Use our online chat service during normal business hours to connect with an agent in minutes. Available from 8:30 a.m. to 5:30 p.m., 7 days a week. <strong>Just interact with the chat bar at the bottom of your screen!</strong> <span style="font-style: italic;">Please note that a higher volume of online chat requests may result in a longer response time from our team.</span></p>
        </div>
    </div>
    <div id="docusign" class="service-banner">
        <div>
            <img src="/wp-content/uploads/2020/03/1280px-DocuSign_Logo_white.png" alt="DocuSign">
            <p>Once you've decided you want to join the Granville family, you can take care of all your paperwork using digital signatures on DocuSign. Take your time and read through all your documents and disclosures from the comfort of your couch. Plus, our team is always there to answer your questions throughout the process.</p>
            <a style="background-color: white; color:#0055b2;" href="/contact/">CONTACT SALES</a>
        </div>
    </div>
    <div style="margin-bottom: 60px;">
        <h2 style="text-transform: none; font-weight: 900; padding: 60px 40px 0px; max-width: 1024px; margin: auto;">Request a Virtual Appointment or Digital Materials</h2>
        <div class="_form_34"></div><script src="https://granvillehomes.activehosted.com/f/embed.php?id=34" type="text/javascript" charset="utf-8"></script>
    </div>
    <div id="familymessage" class="service-banner">
        <div style="margin: auto;">
            <h2 style="text-transform: none; font-weight: 900; color: white;">A Message to the Granville Family</h2>
            <p>At Granville Homes, we have always believed in the power of community. We know we must all work together in the face of uncertainty, and there is no higher priority to us than the wellbeing of our homeowners and our staff. That's why we're striving to create systems that still provide services to you while protecting one another and minimizing in-person interaction. Wherever possible, our staff are working from home so they can be with their families and we can all do our part to keep each other safe. We hope that you won't hesitate to reach out to us with any question or concerns. Now, as always, we continue to serve by our motto: "Built with love and passion."</p>
            <picture style="margin: auto; padding: 20px; text-align: center; display: block;">
                <img src="/wp-content/uploads/2020/03/stay_at_home_graphic-01.png" style="max-width: 100%;" alt="# Stay At Home">
            </picture>
        </div>
    </div>
    <div class="footer-cta-background">
        <div class="footer-cta-content" style="padding: 60px 30px;">
            <div class="footer-cta-text">Looking for more insight and information?</div>
            <div class="footer-cta-button"><a href="/buyers-tools/" class="subtle-button" style="background-color: #084675;">Buyer's Tools</a></div>
        </div>
    </div>

</div>

<?php get_footer(); ?>
