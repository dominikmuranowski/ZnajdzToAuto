<footer>
    <div class="container p-0">
        <div class="row footer-row m-0 ml-sm-n3 mr-sm-n3 d-flex justify-content-md-around">

 

            <!-- sociale  -->
            <div class="col-12 col-lg-2 mt-3 p-0 mt-1">
                <div id="socialSites" class="d-flex flex-column justify-content-left align-items-center">
                    <h4>Odwiedź nas:</h4>

                    <ul class="fa-ul">
                        <li><a href="https://www.facebook.com/"><span class="fa-li"><i class="fab fa-facebook-square"></i></span>Facebook</a></li>

                        <li><a href="https://www.instagram.com/?hl=pl"><span class="fa-li"><i class="fab fa-instagram"></i></span>Instagram</a></li>
                    </ul>
                </div>
            </div>


            

            <!-- our pages  -->
            <div id="ourSites" class="col-12 col-lg-3 mt-3 p-0">
                <div class=" d-flex flex-column justify-content-center align-items-center">
                    <h4>ZnajdźToAuto:</h4>

                    <?php 
                        wp_nav_menu([
                            'theme_location' => 'footer-menu',
                            'container' => 'ul',
                            'menu_class' => 'list-unstyled text-center mb-1'
                        ]); 
                    ?>
                </div>
            </div>

        </div>  <!-- row end -->     
 
    </div> <!-- container end  -->


    <div class="text-center text-dark py-2">&copy;
        <a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?> <?php echo date("Y"); ?></a> 
    </div>
        
</footer>
    
    <?php wp_footer(); ?>
</body>
</html>