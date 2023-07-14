<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<main class="main" id="top">
      <div class="container" data-layout="container">
      <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        
<nav id="menu" class="navbar navbar-light navbar-vertical navbar-expand-xl">
            <script>
                var navbarStyle = localStorage.getItem("navbarStyle");
                if (navbarStyle && navbarStyle !== 'transparent') {
                document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                }
            </script>
            <!-- logo -->
        <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">

                    <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

                   </div>
                     <a class="navbar-brand" href="/">
                    <div class="d-flex align-items-center py-3">
                        <img class="me-2" src="<?= base_url('assets/falcon/img/zikraicon.png')?>" alt="" width="40" /><span class="font-sans-serif"></span>
                    </div>
                    </a>
        </div>
        <!-- logo end -->
               
          
         <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
         <div class="navbar-vertical-content scrollbar">


         <ul class="navbar-nav flex-column mb-3 mt-5" id="navbarVerticalNav">
    <?php
    hooks()->do_action('before_render_aside_menu');
    foreach ($sidebar_menu as $key => $item) {
        if ((isset($item['collapse']) && $item['collapse']) && count($item['children']) === 0) {
            continue;
        }
    ?>
    <li class="text-nav-item menu-item-<?php echo $item['slug']; ?>" <?php echo _attributes_to_string(isset($item['li_attributes']) ? $item['li_attributes'] : []); ?>>
        <a class="<?php echo count($item['children']) > 0 ? 'nav-link dropdown-indicator' : 'nav-link'; ?>" href="<?php echo count($item['children']) > 0 ? '#' . $item['slug'] : $item['href']; ?>" role="button" <?php echo count($item['children']) > 0 ? 'data-bs-toggle="collapse"' : ''; ?> aria-expanded="true" aria-controls="<?php echo $item['slug']; ?>" <?php echo _attributes_to_string(isset($item['href_attributes']) ? $item['href_attributes'] : []); ?>>
            <div class="d-flex align-items-center">
                <span class="nav-link-icon"><i class="<?php echo $item['icon']; ?> menu-icon"></i></span>
                <span class="nav-link-text ps-1"><?php echo _l($item['name'], '', false); ?></span>
            </div>
        </a>
        <?php if (count($item['children']) > 0) { ?>
        <ul class="nav collapse" id="<?php echo $item['slug']; ?>">
            <?php foreach ($item['children'] as $submenu) { ?>
            <li class="nav-item sub-menu-item-<?php echo $submenu['slug']; ?>" <?php echo _attributes_to_string(isset($submenu['li_attributes']) ? $submenu['li_attributes'] : []); ?>>
                <a class="nav-link" href="<?php echo $submenu['href']; ?>" <?php echo _attributes_to_string(isset($submenu['href_attributes']) ? $submenu['href_attributes'] : []); ?>>
                    <div class="d-flex align-items-center">
                        <?php if (!empty($submenu['icon'])) { ?>
                        <span class="nav-link-icon"><i class="<?php echo $submenu['icon']; ?> menu-icon"></i></span>
                        <?php } ?>
                        <span class="nav-link-text ps-1"><?php echo _l($submenu['name'], '', false); ?></span>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
        <?php } ?>
    </li>
    <?php 
        hooks()->do_action('after_render_single_aside_menu', $item); 
    }
    if ($this->app->show_setup_menu() == true && (is_staff_member() || is_admin())) {
        ?>
        <li id="setup-menu-item" <?php if (get_option('show_setup_menu_item_only_on_hover') == 1) echo ' style="display:none;"'; ?>>
            <a href="#" class="nav-link open-customizer">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><i class="fa fa-cog menu-icon"></i></span>
                    <span class="nav-link-text ps-1"><?php echo _l('setting_bar_heading'); ?></span>
                </div>
            </a>
        </li>
        <?php 
        } 
        hooks()->do_action('after_render_aside_menu'); 
        $this->load->view('admin/projects/pinned');
    ?>
</ul>  

             </div>
         </div>
            
        </nav>
    
        <div class="content">
