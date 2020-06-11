<?php
// Template Name: Tour Our Models
/**
 * The template for displaying the Tour Our Models page.
 *
 * @package understrap
 */
echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">';

get_header();

$container   = get_theme_mod('understrap_container_type');

?>

<style>
    .model-tile {
        width: 100%;
        display: flex;
        border: 1px solid #757575;
        background-color: white;
        margin: 10px auto;
        border-radius: 5px;
        overflow: hidden;
    }
    .model-tile-image {
        background-color: wheat;
        background: center / cover no-repeat;
        height: auto;
        width: 50%;
    }
    .model-tile-info {
        width: 50%;
        padding: 40px;
    }
    @media screen and (max-width:1024px) {
        .model-tile {
            flex-direction: column;
        }
        .model-tile-image {
            width: 100%;
            min-height: 50vh;
        }
        .model-tile-info {
            width: 100%;
        }
    }
</style>

<img class="full-width-header" src="<?php the_post_thumbnail_url( "full" ); ?>"></div>

<div style="max-width: 1400px; margin: auto;">
    <h1 style="text-align: center; margin-top: 50px; text-transform: none;"><span style="font-weight: 700;">Our Homes:</span> How to Visit</h1>
    <p style="text-align: center; margin: 30px auto 80px; max-width: 1024px; text-transform: none; font-size: calc(.2vw + 1rem);">Whether you'd like to take a guided tour with an agent or explore on your own, we're providing more ways than ever to make your home search as easy and convenient as possible.</p>
    <h2 style="text-align: center; text-decoration: underline; text-decoration-color: #e8bf53; text-transform: none; font-weight: 700; font-size: calc(.4vw + 1.7rem);">Model Centers:</h2>
    <div id="model-centers" style="max-width: 1400px; margin: 40px auto 60px; display: block;">
        <div id="copper-river" class="model-tile">
            <a href="/communities/copper-river-ranch/" class="model-tile-image" style="background-image: url('/wp-content/uploads/2018/08/aria_FI_2_1600x900.jpg');"></a>
            <div class="model-tile-info">
                <h3><a href="/communities/copper-river-ranch/" >Copper River Ranch</a></h3>
                <p><span style="font-style: italic;">Near Copper Ave. & Friant Ave.</span>
                <br>11301 N. Alicante Dr.
                <br>Fresno, CA 93730
                <br><a href="https://www.google.com/maps/place/Granville+at+Copper+River+Ranch+Model+Center/@36.9000707,-119.7630454,17z/data=!4m13!1m7!3m6!1s0x80944240b7cac419:0x4fb8faba68d9d069!2s11301+N+Alicante+Dr,+Fresno,+CA+93730!3b1!8m2!3d36.9000664!4d-119.7608567!3m4!1s0x80944237c3b58167:0x1e1b8211e5afebe3!8m2!3d36.9001027!4d-119.7605229" style="text-decoration: underline; font-style: italic;">View on Google Maps</a></p>
                <p>Phone: (559) 440-8370</p>
                <p style="font-weight: bold;">Due to public health concerns related to COVID-19, the Copper River Model Center will be open <a href="https://granvillehomes.activehosted.com/f/34" target="_blank" style="text-decoration: underline;">by appointment only</a> until further notice.</p>
                <p>Models Available to Tour:
                    <a href="/floorplans/aria/">Aria</a>, <a href="/floorplans/avery/">Avery</a>, <a href="/floorplans/bella/">Bella</a>, <a href="/floorplans/cali/">Cali</a>, <a href="/floorplans/pasatiempo">Pasatiempo</a>
                </p>
            </div>
        </div>
        <div id="belterra" class="model-tile">
            <a href="/communities/belterra/" class="model-tile-image" style="background-image: url('/wp-content/uploads/2019/07/1600x900_0000_PasatiempoTuscanBelterra.jpg');"></a>
            <div class="model-tile-info">
                <h3><a href="/communities/belterra/" >Belterra</a></h3>
                <p><span style="font-style: italic;">Near Fowler Ave. & Shields Ave.</span>
                <br>6076 E. Brown Ave.
                <br>Fresno, CA 93727
                <br><a href="https://www.google.com/maps/place/Belterra+by+Granville+Homes/@36.774892,-119.6829621,17z/data=!4m13!1m7!3m6!1s0x80945944c4393125:0xe217e3950cb440d0!2s6076+E+Brown+Ave,+Fresno,+CA+93727!3b1!8m2!3d36.774892!4d-119.6807734!3m4!1s0x80945944e1969771:0xbc05411aae5f462c!8m2!3d36.774892!4d-119.680773" style="text-decoration: underline; font-style: italic;">View on Google Maps</a></p>
                <p>Phone: (559) 440-8398</p>
                <p style="font-weight: bold;">Due to public health concerns related to COVID-19, the Belterra Model Center will be open <a href="https://granvillehomes.activehosted.com/f/34" target="_blank" style="text-decoration: underline;">by appointment only</a> until further notice.</p>
                <p>Models Available to Tour:
                    <a href="/floorplans/bella/">Bella</a>, <a href="/floorplans/bijou/">Bijou</a>, <a href="/floorplans/canvas-2/">Canvas 2</a>, <a href="/floorplans/canvas-3/">Canvas 3</a>, <a href="/floorplans/canvas-4/">Canvas 4</a>, <a href="/floorplans/pasatiempo/">Pasatiempo</a>, <a href="/floorplans/tresor/">Tresor</a>, <a href="/floorplans/zoie/">Zoie</a>
                </p>
            </div>
        </div>
        <div id="estates-showcase" class="model-tile">
            <a href="/communities/the-links/" class="model-tile-image" style="background-image: url('/wp-content/uploads/2013/04/residence_5_formal_italian_new_sky_1600x900.jpg');"></a>
            <div class="model-tile-info">
                <h3><a href="/communities/the-links/" >The Links</a></h3>
                <p><span style="font-style: italic;">Near Copper Ave. & Friant Ave.</span>
                <br>11377 N Balmoral Ave.
                <br>Fresno, CA 93730
                <br><a href="https://www.google.com/maps/place/The+Links+by+Granville+Estates/@36.9015384,-119.7547158,17z/data=!4m13!1m7!3m6!1s0x809442485cdd8e91:0xd826a306b4dfbefa!2s11377+N+Balmoral+Way,+Fresno,+CA+93730!3b1!8m2!3d36.9015384!4d-119.7525271!3m4!1s0x8094424847b0ee35:0xd46df8d58a71871e!8m2!3d36.9015509!4d-119.7524895" style="text-decoration: underline; font-style: italic;">View on Google Maps</a></p>
                <p>Phone: (559) 977-2032</p>
                <p style="font-weight: bold;">The Granville Estates Showcase Home is now open Saturday & Sunday, 11 a.m. - 5 p.m. - no appointment needed.<br>Other days and times available <a href="/estates/#showcase-home" style="text-decoration: underline;">by appointment</a>.</p>
                <p>Models Available to Tour:
                    <a href="/floorplans/residence-5/">Residence 5</a>
                </p>
            </div>
        </div>
    </div><!-- #model-centers -->
    <h2 style="text-align: center; text-decoration: underline; text-decoration-color: #e8bf53; text-transform: none; font-weight: 700; font-size: calc(.4vw + 1.7rem);">Other Ways to Visit:</h2>
    <div style="text-align: center; max-width: 1024px; margin: 30px auto 70px;">
        <div style="width: 100%; text-align: center;">
        <img src="/wp-content/uploads/2019/12/nternow_logo.jpg" style="max-width: 100%; padding: 30px; margin: auto;" alt="" />
        </div>
        <h3 style="text-align: center; margin: 20px;font-weight: 700; text-transform: none; font-size: calc(.2vw + 1.3rem);">See the homes you want when you want.</h3>
        <p style="margin: 25px 40px 40px; text-align: center;">Want even more flexibility in exploring our available homes? We've partnered with NterNow to provide <strong>on-demand access</strong> at select move-in ready homes throughout some of our most popular communities. Explore on your own schedule without the need to stop by our offices or make an appointment. Grab your phone, download the app (or call in), and unlock a whole new walkthrough experience.</p>
        <a class="subtle-button" style="text-align: center; background-color:#dc611d;" href="/nternow/">LEARN HOW</a>
        <p style="margin: 40px; text-align: center; font-style: italic; color: #dc611d;">Available from sun-up to sun-down at any home with an orange "NterNow" sign.</p>
    </div>

</div>

<?php get_footer(); ?>
