<?php 
    /* Template Name: Contact */
    the_post();
    get_header();
?>

<main>
        <div class="container py-5">
            <div class="row justify-content-around">
                <div class="col-lg-4">
                    <?php the_content(); ?>
                </div>

                <div class="col-lg-6 mt-4 mt-lg-0">
                    <h3 class="text-primary font-weight-normal mb-4">Formularz kontaktowy</h3>

                    <?php echo do_shortcode('[contact-form-7 id="78" title="Formularz 1"]'); ?>
                </div>
            </div>
        </div>


<!-- back to main page button -->

    <div class="button-container d-flex justify-content-center mt-5 mb-3">
        <a href="<?php echo get_home_url(); ?>">
            <button type="button" class="btn btn-outline-primary btn-lg">
            Powrót na stronę główną</button>
        </a>    
    </div>


</main>

<?php 
    get_footer();
?>