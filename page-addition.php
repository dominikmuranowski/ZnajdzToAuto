<?php  

/* Template Name: Addition */

get_header();
    // input variables
    $tytul = $_POST['tytul'];
    $zdjecie = $_POST['zdjecie'];
    $opis = $_POST['opis'];
    $email = $_POST['email'];
    $telefon = $_POST['telefon'];
    $nazwa = $_POST['nazwa'];
    $kategoria = $_POST['kategoria'];
    $my_file = $_FILES['fileToUpload'];

    if($tytul){
        $image = save_file($my_file);
        add_post($tytul, $opis, $nazwa, $email, $telefon, $kategoria, $image);
    };

?>

<script src="jquery.js"></script>
<script src="jquery.validate.js"></script>
<script>
    $("form").validate();
</script>

    <main>
            <div id="form-container" class="container mt-5">
              <strong><p style="font-size: 18px">Zaczynamy!</p></strong>
              <hr>
     
                <form name ="additionForm" id="additionForm" action="<?php echo get_permalink(get_the_ID()); ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div id="tytul2" class="form-group row my-1 justify-content-center align-items-center">
                    <label class="col-sm-2 control-label"> 
                       <strong>Wpisz tytuł</strong><span style='color: red'>*</span>
                        </label>
                    <div class="col-sm-3 text-center">
                        <input class="form-control shadow rounded" id="tytul" type="text" name="tytul">
                    </div>
                    </div>

                    <div id="kategoria2" class="form-group row mt-3 justify-content-center align-items-center">
                    <label class="col-sm-2 control-label">
                      <strong>Wybierz kategorie</strong><span style='color: red'>*</span>
                      </label>
                    <div class="col-sm-3">
                        <!-- pobranie kategorii z ogłoszeń -->
                        <?php
                            $taxonomies = get_terms( array(
                                'taxonomy' => 'addition_cats',
                                'hide_empty' => false
                            ) );
                        ?>
                        
                        <select class="shadow rounded" name="kategoria">
                        <?php foreach($taxonomies as $taxonomie) : ?>
                            <option value="<?php echo $taxonomie->term_id; ?>"><?php echo $taxonomie->name; ?></option>
                        <?php endforeach; ?>
                        </select>                       

                    </div>
                    </div>
                    <hr>
                    <div class="form-group row mt-4 justify-content-center align-items-center">
                    <label class="col-sm-2 control-label"> 
                        <strong>Podaj opis</strong><span style='color: red'>*</span>
                        </label>
                    <div class="col-sm-3">
                        <textarea class="form-control shadow rounded" rows="5" id="opis" type="text" name="opis" required></textarea>
                    </div>
                    </div>

                    <div class="form-group row justify-content-center align-items-center">
                    <label class="col-sm-2 control-label"> 
                        <strong>Dodaj zdjęcie</strong><span style='color: red'>*</span>
                        </label>
                    <div class="col-sm-3">
                        <input class="form-control shadow rounded" id="fileToUpload" type="file" name="fileToUpload">
                    </div>
                    </div>
                  <p style="font-size: 18px"><strong>Twoje dane kontaktowe</strong><p>
                  <hr>
                  <div class="form-group row mt-4 justify-content-center align-items-center">
                    <label class="col-sm-2 control-label"> 
                        <strong>Nazwa sprzedawcy</strong><span style='color: red'>*</span>
                        </label>
                    <div class="col-sm-3">
                        <input class="form-control shadow rounded" id="nazwa" type="text" name="nazwa" required>
                    </div>
                    </div>

                    <div class="form-group row mt-0 justify-content-center align-items-center">
                    <label class="col-sm-2 control-label"> 
                        <strong>Podaj email</strong><span style='color: red'>*</span>
                        </label>
                    <div class="col-sm-3">
                        <input class="form-control shadow rounded" id="email" type="email" name="email" required>
                    </div>
                    </div>
                    <div class="form-group row justify-content-center align-items-center">
                    <label class="col-sm-2 control-label"> 
                        <strong>Podaj telefon</strong>
                    </label>
                    <div class="col-sm-3">
                        <input class="form-control shadow rounded" id="telefon" type="number" name="telefon">
                    </div>
                    </div>
                    
                    </div>
                    <div id="form-terms" class="col-sm-8 text-right">
                        <input class="rounded" type="checkbox" id="warunki" value="" required> <label  id="terms" data-toggle="modal" data-target="#checkModal"><strong> Czy akceptujesz warunki regulaminu ?</strong><span style='color: red'>*</span></label>
                    </div>
                        
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-8 text-right">
                    <button type="submit" id="submit-form" class="btn btn-primary mb-5 shadow rounded" data-toggle="modal">Potwierdź</button>
                    </div>
                    </div>
                </form>
                
              <div id="thanks-container" class="thanks-container text-center my-5" style='visibility: hidden'>
                <label class="col-sm-8 control-label">
                <span style='font-size: 22px'><strong style='color: green'>Brawo, ogłoszenie wypełnione pomyślnie !<br> Wysyłamy dane do serwera
                  <div class="spinner-border text-success" role="status">
                  <span class="sr-only">Loading...</span>
                  </div>
                </strong></span>
              </div>

        </div>
            
               <!-- Modal -->
<div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Regulamin</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                            <textarea id="termsarea" rows="5" cols="55";>
1. Regulamin określa zasady świadczenia przez spółkę Grupa SprawdzToAuto na rzecz Użytkowników usług polegających na umożliwieniu zamieszczania ogłoszeń w Serwisie SprawdzToAuto.

2. Warunkiem uzyskania dostępu do funkcjonalności Serwisu SprawdzToAuto jest skorzystanie z urządzenia komunikującego się z Internetem i wyposażonego w powszechnie używaną przeglądarkę internetową.
                            </textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="submitModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Ogłoszenie wypełnione pomyślnie, prosimy czekać na publikację ;)</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button id="closeModal" type="button" class="btn btn-primary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>

              

    </main>

  

<?php get_footer(); ?>