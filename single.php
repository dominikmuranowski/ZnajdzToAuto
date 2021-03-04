<?php   
  the_post();
  get_header(); 
?>

<main>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-12">

        <div class="text-muted text-center py-1 border-top border-bottom mb-3">
          <strong><?php the_title();?></strong> | Opublikowano: <?php the_date("d.m.Y"); ?> | Sprzedawca: <?php echo get_field('nazwa_sprzedajacego');?>
        </div>

        <div class="text-center">
          <img src="<?php echo get_field('dodaj_zdjecie');?>" alt="<?php the_title(); ?>" class="img-thumbnail mb-4" style="height: 300px; width: 500px;">
        </div>

        <div class="text-center">
          <?php the_content(); ?>
        </div>

        <hr>

      </div>
    </div>
  </div>



<!-- formularz kontaktowy do zamieszczajacego ogloszenie -->

<!-- pobieranie z ogłoszenia odpowiednich danych, czyli adresu email i nazwy ogłoszenia  -->
<div id="userEmail" class="d-none">
  <?php echo get_field( "podaj_email" ); ?>
</div>

<div id="adName" class="d-none">
  <?php the_title(); ?>
</div>


<!-- Przyciski kontaktowe  -->

<div class="button-container d-flex justify-content-center mb-3">

  <!-- Telefon do sprzedawcy -->
  <button id="phone-button" type="button" class="btn btn-primary mx-1" onclick="this.innerHTML=<?php echo get_field('podaj_telefon');?>"><i class="fas fa-phone"></i> Wyświetl numer</button>
  



  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#exampleModal"><i class="far fa-comment"></i> Napisz wiadomość do sprzedawcy</button>    

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Utwórz wiadomość</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <?php echo do_shortcode('[contact-form-7 id="116" title="Formularz do ogłoszenia"]'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Zamknij</button>
      </div>
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

<?php get_footer(); ?>