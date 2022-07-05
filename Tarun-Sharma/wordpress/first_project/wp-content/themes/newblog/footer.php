<?php wp_footer(); ?>
<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="<?php echo get_theme_mod("set_social_links_1")?>">Facebook</a></li>
              <li><a href="<?php echo get_theme_mod("set_social_links_2")?>">Twitter</a></li>
              <li><a href="<?php echo get_theme_mod("set_social_links_3")?>">Behance</a></li>
              <li><a href="<?php echo get_theme_mod("set_social_links_4")?>">Linkedin</a></li>
              <li><a href="<?php echo get_theme_mod("set_social_links_5")?>">Dribbble</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>Copyright @ <?php echo date("Y");; ?> New Blog.
                    
                  |  Design: <a href="<?php echo home_url(); ?>"><?php bloginfo("name"); ?></a></p>

                    <p><?php echo get_theme_mod("set_footer_copyright")?></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>