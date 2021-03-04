<?php 

    get_header(); 

    $slider = [];

    if (get_field("slide_1")) $slider[] = get_field("slide_1");
    if (get_field("slide_2")) $slider[] = get_field("slide_2");
    if (get_field("slide_3")) $slider[] = get_field("slide_3");

    $card_1 = get_field("card_1");
    $card_2 = get_field("card_2");
    $card_3 = get_field("card_3");

?>

<main>

<!-- slider start -->

<div class="slider-wrapper position-relative ">

    <!-- search form -->

    <div class="search-form-container d-flex justify-content-center" style="opacity: 0.8;">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <form action="<?php echo get_home_url(); ?>">
                        <div class="form-group">
                            <h2 class="text-white font-weight-bold mb-3">Szukaj w ogłoszeniach:</h2>

                            <div class="input-group input-group-lg mb-3 px-md-5">
                                <input class="form-control form-control-lg" type="text" name="s" id="s" placeholder="wpisz czego szukasz..." class="form-control" aria-label="input" aria-describedby="button-addon2 inputGroup-sizing-lg">

                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-outline-white" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                                </div>
                            </div>

                            <a href="<?php the_field('ads_button'); ?>" class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary btn-lg btn-block" style="width: 300px;">
                                ...lub przeglądaj ogłoszenia</button>
                            </a>
                        </div> <!-- form-group end -->
                    </form>
                </div>
            </div>
        </div>
    </div>  <!-- search-form-container end -->

    <!-- slider  -->

    <?php if ($slider == get_field("slide_1")); ?> 
        <div id="slider" class="text-center">

            <div style="background-image: linear-gradient(0deg, rgb(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.55) 100%), url('<?php echo get_field("slide_1")['picture_1']; ?>');  background-repeat: no-repeat;
            background-position: center; background-size: cover;">    
                <img src="" alt="" title="<?php echo get_field("slide_1")['content_1'] ?>"> 
            </div>
            
           
        <?php if ($slider == get_field("slide_2")); ?> 
            <div style="background-image: linear-gradient(0deg, rgb(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.55) 100%), url('<?php echo get_field("slide_2")['picture_2']; ?>'); background-repeat: no-repeat;
            background-position: center; background-size: cover;">    
                <img src="" alt="" title="<?php echo get_field("slide_2")['content_2'] ?>">  
            </div> 
                
                
        <?php if ($slider == get_field("slide_3")); ?> 
            <div style="background-image: linear-gradient(0deg, rgb(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.55) 100%), url('<?php echo get_field("slide_3")['picture_3']; ?>'); background-repeat: no-repeat;
            background-position: center; background-size: cover;">    
                <img src="" alt="" title="<?php echo get_field("slide_3")['content_3'] ?>">
            </div> 

        </div>      

</div> <!-- slider-wrapper end -->



<!-- new add button  -->


<div class="jumbotron text-center">
  <h1 class="display-4"><?php echo get_field('sale')['sale_header'];?></h1>
    <p class="lead"><?php echo get_field('sale')['sale_content'];?></p>
    
    <hr class="my-4">
    
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-4 mb-5">
                <a href="<?php echo get_field('sale')['sale_button'];?> ">
                    <button type="button" class="btn btn-primary shadow btn-lg"> 
                    Dodaj nowe ogłoszenie</button>
                </a>
            </div>
        </div>
    </div>
</div> <!-- jumbotron end -->




<!-- last ads images -->

<div class="last-ads-wrapper">

    <div class="last-ads-menu container d-flex justify-content-between w-lg-50 mt-3">
        <h3>Ostatnio dodane:</h3>

        <a href="<?php the_field('ads_button'); ?>" class="d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary btn-sm">
            Pokaż wszystkie <i class="fas fa-caret-right"></i></button>
        </a>       
    </div>


    <?php
        $ads_items = new WP_Query(array(
            "post_type" => "advertisement",
            "posts_per_page" => 3,
        ));     
    ?>

    <div class="container mt-5">
        <div class="row">
            <?php if ($ads_items->have_posts()) : while ($ads_items->have_posts()) : $ads_items->the_post() ?>
                <div class="col-md-4 mb-5 animated animated-ads shadow-lg">
                    <a href="<?php the_permalink(); ?>">
                        <figure class="figure">
                            <img src="<?php echo get_field('dodaj_zdjecie');?>" class="figure-img img-thumbnail rounded" alt="<?php the_title(); ?>" style="height: 300px; width: 500px;">
                            
                            <figcaption class="figure-caption text-center"><?php the_title(); ?></figcaption>
                        </figure>
                    </a>
                </div>
            <?php endwhile; ?>
                <div class="pt-5 text-center"><p><?php posts_nav_link(); ?></p></div>
            <?php else : ?>    
                <p class="text-muted text-center my-5">Brak wyników</p>
            <?php endif; ?>
        </div>
    </div>

</div> <!-- last-ads-wrapper end  -->



<!-- cards  -->
    <div class="d-flex justify-content-center">
        <h2>ZnajdźToAuto:</h2>
    </div>
    
    <div id="cards">
        <div class="container">
            <div class="row py-5">
                <?php if ($card_1['title']) : ?>
                    <div class="col-lg-4 mb-3 mb-lg-0 pr-md-1 shadow px-0">
                        <div class="card border border-primary">
                            <div class="card-header">
                                <h2 class="text-center text-dark font-weight-normal mb-0"><?php echo $card_1['title']; ?><img src='<?php echo IMAGES . '/002-accreditation.png'; ?>' alt='about_icon' class="cards_icon" id="about_icon" /></h2>
                            </div>
                            <div class="card-body text-center">                                
                                <p><?php echo $card_1['content']; ?></p>
                                <a href="<?php echo $card_1['url']; ?>" class="btn btn-block btn-primary">Czytaj więcej</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($card_2['title']) : ?>
                    <div class="col-lg-4 mb-3 mb-lg-0 px-md-1 shadow px-0">
                        <div class="card border border-primary">
                            <div class="card-header">
                                <h2 class="text-center text-dark font-weight-normal mb-0"><?php echo $card_2['title']; ?><img src='<?php echo IMAGES . '/001-contact.png'; ?>' alt='contact_icon' class="cards_icon" /></h2>
                            </div>
                            <div class="card-body text-center">                                
                                <p><?php echo $card_2['content']; ?></p>
                                <a href="<?php echo $card_2['url']; ?>" class="btn btn-block btn-primary">Czytaj więcej</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($card_3['title']) : ?>
                    <div class="col-lg-4 mb-3 mb-lg-0 pl-md-1 shadow px-0">
                        <div class="card border border-primary">
                            <div class="card-header">
                                <h2 class="text-center text-dark font-weight-normal mb-0"><?php echo $card_3['title']; ?><img src='<?php echo IMAGES . '/003-ads.png'; ?>' alt='ads_icon' class="cards_icon" /></h2>
                            </div>
                            <div class="card-body text-center">                                
                                <p><?php echo $card_3['content']; ?></p>
                                <a href="<?php echo $card_3['url']; ?>" class="btn btn-block btn-primary">Czytaj więcej</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div> <!-- row end -->
        </div> <!-- container end -->
    </div> <!-- cards end -->

</main>

<?php get_footer(); ?>