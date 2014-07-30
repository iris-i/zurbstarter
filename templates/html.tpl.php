<?php

/**
 * @file
 * Overridden from html5_tools module implementation to display the basic html structure of a single
 * Drupal page.
 * Added Mobile meta and moved scripts to bottom of page.
 *
*/
?><!doctype html<?php print $rdf_header; ?>>
<html class="no-js lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?><?php print $html_attributes; ?>>
<head<?php print $rdf_profile?>>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  
<!--============MOBILE META==========-->
<meta name="MobileOptimized" content="width">
<meta name="HandheldFriendly" content="true">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!--=============STYLESHEETS=========-->
 <?php print $styles; ?>
 <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative|Muli|Quattrocento+Sans' rel='stylesheet' type='text/css'>
     

  
</head>
<body class=" <?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  
<!--============SCRIPTS===============-->
  <?php print $scripts; ?>
  <script>
    (function ($, Drupal, window, document, undefined) {
      $(document).foundation();
    })(jQuery, Drupal, this, this.document);
  </script>
</body>
</html>