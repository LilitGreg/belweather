
<footer>
    <div class="clearfix  wrap_foot">
        <div class="col-md-6 col-sm-3">
            <div class="row">
             <?php
             if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
                   <ul id="sidebar">
                       <?php dynamic_sidebar( 'sidebar-footer' ); ?>
                   </ul>
           <?php endif; ?>
         </div>
       </div>
      <div class="col-md-6 col-sm-9">
          <div class="row">
             <div  class="navbar foot_menu">
                <?php  bellwethercare_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => '')); ?>
             </div>

             <div class="dropdown collap_menu">
                 <a class="dropdown-toggle" id="menutog"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <span>
                              <i  class="fa fa-bars"></i>
                       </span>
                 </a>
                 <div class="dropdown-menu dd_menu" aria-labelledby="dropdownMenuButton">
                   <?php  bellwethercare_nav(array('header-menu' => 'menu', 'container' => '', 'menu_class'  => '')); ?>
                 </div>
           </div>
       </div>
      </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
