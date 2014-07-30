<?php
//kpr(get_defined_vars());
//kpr($theme_hook_suggestions);
//template naming
//page--[CONTENT TYPE].tpl.php
?>


<!---=======MOBILE MENU==========-->
<header role="banner" class = "show-for-small-only">
  <div class="siteinfo">
   
<nav class="top-bar" data-topbar>
    <ul class="title-area">
    <li class="name">
    <?php if($site_name OR $site_slogan ): ?>
    <hgroup>
      <?php if($site_name): ?>
        <h1><?php print $site_name; ?></h1>
      <?php endif; ?>
      <?php if ($site_slogan): ?>
        <h2><?php print $site_slogan; ?></h2>
      <?php endif; ?>
    </hgroup>
     <?php endif; ?>
      </li>
    <li class="toggle-topbar menu-icon">
      <a href="#">Menu</a>
    </li>
  </ul>
    
  <section class="top-bar-section">
  
     <nav id="mainMenu" class="navigation">
		<?php if ($main_menu): ?>
                
                    <?php print theme('links__system_main_menu', array(
                      'links' =>  $main_menu, 
                      'attributes' => array(
                        'id' => 'main-menu-links',
                        'class' => array('links', 'clearfix', 'right'),
                      ),
                     
                      'heading' => array(
                        'text' => t('Main menu'),
                        'level' => 'h2',
                        'class' => array('element-invisible'),
                      ),
                    )); ?>
                  <!-- /#main-menu -->
                <?php endif; ?>
              </nav>
                
    <!-- Left Nav Section -->

  </section>
</nav>
   
  </div>
</header>


<header role="banner">
  <div class="siteinfo fullWidth">
    <div class="row">
      <div class = "columns">
          <?php if ($logo): ?>
            <figure>
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
            </figure>
          <?php endif; ?>
      
          <?php if($site_name OR $site_slogan ): ?>
          <hgroup>
            <?php if($site_name): ?>
              <h1><?php print $site_name; ?></h1>
            <?php endif; ?>
            <?php if ($site_slogan): ?>
              <h2><?php print $site_slogan; ?></h2>
            <?php endif; ?>
          </hgroup>
          <?php endif; ?>
        </div>
      </div>
    </div>

  <?php if($page['header']): ?>
    <div class="header-region">
      <?php print render($page['header']); ?>
    </div>
  <?php endif; ?>

</header>

<div class="page">

  <div role="main" id="main-content">
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php print $breadcrumb; ?>

    <?php if ($action_links): ?>
      <ul class="action-links"><?php print render($action_links); ?></ul>
    <?php endif; ?>

    <?php if (isset($tabs['#primary'][0]) || isset($tabs['#secondary'][0])): ?>
      <nav class="tabs"><?php print render($tabs); ?></nav>
    <?php endif; ?>

    <?php if($page['highlighted'] OR $messages){ ?>
      <div class="drupal-messages">
      <?php print render($page['highlighted']); ?>
      <?php print $messages; ?>
      </div>
    <?php } ?>


    <?php print render($page['content_pre']); ?>

    <?php print render($page['content']); ?>

    <?php print render($page['content_post']); ?>

  </div><!-- /main -->

  <?php if ($page['sidebar_first']): ?>
    <div class="sidebar-first">
    <?php print render($page['sidebar_first']); ?>
    </div>
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <div class="sidebar-second">
      <?php print render($page['sidebar_second']); ?>
    </div>
  <?php endif; ?>
</div><!-- /page -->

<footer role="contentinfo">
  <?php print render($page['footer']); ?>
</footer>

