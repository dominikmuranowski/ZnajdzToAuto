<?php 
    /* Template Name: Ads */
    
    $ads_items = new WP_Query(array(
        "post_type" => "advertisement"
    ));

    $ads_kombi = new WP_Query(array(
        "post_type" => "advertisement",
        'tax_query' => array(
            array(
            'taxonomy' => 'addition_cats',
            'field' => 'slug',
            'terms' => array('kombi'))
        )
    ));

    $ads_sedan = new WP_Query(array(
        "post_type" => "advertisement",
        'tax_query' => array(
            array(
            'taxonomy' => 'addition_cats',
            'field' => 'slug',
            'terms' => array('sedan'))
        )
    ));

    $ads_suv = new WP_Query(array(
        "post_type" => "advertisement",
        'tax_query' => array(
            array(
            'taxonomy' => 'addition_cats',
            'field' => 'slug',
            'terms' => array('suv'))
        )
    ));

    get_header(); 
?>

<main>


<div class="container mt-5 ">
    <div class="row justify-content-center">
        <h4>Wybierz typ samochodu:</h4>
    </div>
    <div class="row justify-content-center">
        <button id="category_all-button" type="button" class="btn btn-outline-primary mr-1 btn-lg">Wszystkie</button>

        <button id="kombi-button" type="button" class="btn btn-outline-primary mr-1 btn-lg">Kombi</button>

        <button id="sedan-button" type="button" class="btn btn-outline-primary mr-1 btn-lg">Sedan</button>

        <button id="suv-button" type="button" class="btn btn-outline-primary btn-lg">SUV</button>
    </div>

    <div id='all_category' class="row justify-content-center">
        <?php if ($ads_items->have_posts()) : while ($ads_items->have_posts()) : $ads_items->the_post() ?>
            <div class="row mt-5 ml-md-3">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('dodaj_zdjecie');?>" alt="<?php the_title(); ?>" class="img-fluid img-thumbnail" style="height: 300px; width: 500px;"></a>
                </div>

                <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                    <div class="text-muted py-1 my-3 border-top border-bottom">
                        Opublikowano: <?php echo get_the_date("d.m.Y"); ?> | Autor: <?php echo get_field('nazwa_sprzedajacego');?>
                    </div>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Czytaj więcej</a>
                </div>
            </div>

        <?php endwhile; ?>
            <div class="pt-5 text-center"><p><?php posts_nav_link(); ?></p></div>
        <?php else : ?>    
            <p class="text-muted text-center my-5">Brak wyników</p>
        <?php endif; ?>
    </div>

    <div id='kombi_category' class="row justify-content-center" style="display: none;">
        <?php if ($ads_kombi->have_posts()) : while ($ads_kombi->have_posts()) : $ads_kombi->the_post() ?>
            <div class="row mt-5 ml-md-3">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('dodaj_zdjecie');?>" alt="<?php the_title(); ?>" class="img-fluid img-thumbnail" style="height: 300px; width: 500px;"></a>
                </div>

                <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                    <div class="text-muted py-1 my-3 border-top border-bottom">
                        Opublikowano: <?php echo get_the_date("d.m.Y"); ?> | Autor: <?php echo get_field('nazwa_sprzedajacego');?>
                    </div>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Czytaj więcej</a>
                </div>

            </div>
        <?php endwhile; ?>
            <div class="pt-5 text-center"><p><?php posts_nav_link(); ?></p></div>
         <?php else : ?>    
            <p class="text-muted text-center my-5">Brak wyników</p>
        <?php endif; ?>
    </div>

    <div id='sedan_category' class="row justify-content-center"  style="display: none;">
        <?php if ($ads_sedan->have_posts()) : while ($ads_sedan->have_posts()) : $ads_sedan->the_post() ?>
            <div class="row mt-5 ml-md-3">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('dodaj_zdjecie');?>" alt="<?php the_title(); ?>" class="img-fluid img-thumbnail" style="height: 300px; width: 500px;"></a>
                </div>

                <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                    <div class="text-muted py-1 my-3 border-top border-bottom">
                         Opublikowano: <?php echo get_the_date("d.m.Y"); ?> | Autor: <?php echo get_field('nazwa_sprzedajacego');?>
                    </div>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Czytaj więcej</a>
                </div>

            </div>
        <?php endwhile; ?>
            <div class="pt-5 text-center"><p><?php posts_nav_link(); ?></p></div>
        <?php else : ?>    
            <p class="text-muted text-center my-5">Brak wyników</p>
        <?php endif; ?>
    </div>

    <div id='suv_category' class="row justify-content-center" style="display: none;">
        <?php if ($ads_suv->have_posts()) : while ($ads_suv->have_posts()) : $ads_suv->the_post() ?>
            <div class="row mt-5 ml-md-3">
                <div class="col-lg-4 mb-3 mb-lg-0">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_field('dodaj_zdjecie');?>" alt="<?php the_title(); ?>" class="img-fluid img-thumbnail" style="height: 300px; width: 500px;"></a>
                </div>

                <div class="col-lg-6">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

                    <div class="text-muted py-1 my-3 border-top border-bottom">
                        Opublikowano: <?php echo get_the_date("d.m.Y"); ?> | Autor: <?php echo get_field('nazwa_sprzedajacego');?>
                    </div>

                    <?php the_excerpt(); ?>

                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Czytaj więcej</a>
                </div>

            </div>
        <?php endwhile; ?>
            <div class="pt-5 text-center"><p><?php posts_nav_link(); ?></p></div>
        <?php else : ?>    
            <p class="text-muted text-center my-5">Brak wyników</p>
        <?php endif; ?>
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

<?php get_footer(); ?>