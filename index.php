<?php
/**
* @package     Joomla.Site
* @subpackage  Templates.CrossMediaCreations
* @author      Remco Janssen - remco@remcojanssen.nl - www.crossmediacreations.nl
* @copyright   Copyright (C) 2015 Remco Janssen. All rights reserved.
* @license     GNU General Public License version 2 or later.
*/


defined( '_JEXEC' ) or die; 
$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$config = JFactory::getConfig();
$params = $app->getTemplate(true)->params;

// To unset Javascript call it first, this prevents other components/modules to reload it after it is unset.
JHtml::_('behavior.framework');
JHtml::_('bootstrap.framework');
JHtml::_('jquery.framework');
JHtml::_('bootstrap.tooltip');

// Unset unwanted JavaScript
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-core.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/mootools-more.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/caption.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/core.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-noconflict.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/jquery-migrate.min.js']);
unset($this->_scripts[$this->baseurl .'/media/jui/js/bootstrap.min.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/tabs-state.js']);
unset($this->_scripts[$this->baseurl .'/media/system/js/validate.js']);
unset($this->_scripts[$this->baseurl .'/media/com_finder/js/autocompleter.js']);

if (isset($this->_script['text/javascript'])) {
    $this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\'\,\s*function\(\)\s*\{\s*new\s*JCaption\(\'img.caption\'\);\s*}\s*\);\s*%', '', $this->_script['text/javascript']);
    $this->_script['text/javascript'] = preg_replace("%\s*jQuery\(document\)\.ready\(function\(\)\{\s*jQuery\('\.hasTooltip'\)\.tooltip\(\{\"html\":\s*true,\"container\":\s*\"body\"\}\);\s*\}\);\s*%", '', $this->_script['text/javascript']);
    if (empty($this->_script['text/javascript'])) {
        unset($this->_script['text/javascript']);
    }
}

// defer = true, so placed at the end of the document so the pages load faster
$doc->addScript('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', 'text/javascript', false);

/*    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/what-input/what-input.js"></script>
    <script src="bower_components/foundation-sites/dist/foundation.js"></script>*/
    $doc->addScript($this->baseurl . '/templates/' . $this->template . '/bower_components/foundation-sites/dist/foundation.js', 'text/javascript',true);

if ($params['developer_mode']) {
// Load expanded css and js files NOT IMPLEMENTED IN THIS VERSION BUT HERE'S HOW IT'S DONE
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/min/app-min.js', 'text/javascript', true);
// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/app.css');

} else {
// Load minified versions of css and js files
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/min/app-min.js', 'text/javascript', true);
// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/app.css');
}

// Set MetaData
$doc->setMetaData('X-UA-Compatible', 'IE=edge', true );
$doc->setMetaData('viewport', 'width=device-width, initial-scale=1' );
$doc->setMetaData('content-type', 'text/html', true );
$doc->setGenerator($params['generator_tag']);

// Add Ultimate Favicon links
$favicon = '<link rel="apple-touch-icon-precomposed" sizes="57x57" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon-precomposed" sizes="60x60" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-60x60.png" />
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon-precomposed" sizes="76x76" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/apple-touch-icon-152x152.png" />
<link rel="icon" type="image/png" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/favicon-196x196.png" sizes="196x196" />
<link rel="icon" type="image/png" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/favicon-96x96.png" sizes="96x96" />
<link rel="icon" type="image/png" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/favicon-32x32.png" sizes="32x32" />
<link rel="icon" type="image/png" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/favicon-16x16.png" sizes="16x16" />
<link rel="icon" type="image/png" href="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/favicon-128.png" sizes="128x128" />
<meta name="application-name" content=""/>
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="msapplication-TileImage" content="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/mstile-144x144.png" />
<meta name="msapplication-square70x70logo" content="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/mstile-70x70.png" />
<meta name="msapplication-square150x150logo" content="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/mstile-150x150.png" />
<meta name="msapplication-wide310x150logo" content="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/mstile-310x150.png" />
<meta name="msapplication-square310x310logo" content="' . $this->baseurl . '/templates/' . $this->template . '/media/ico/mstile-310x310.png" />';
$this->addCustomTag($favicon);
?>
<!doctype html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />


</head>

<body >
<?php 
if ($params['developer_mode']) {

  ?>

  <div class="alert-box success">
    Website is in <span data-tooltip aria-haspopup="true" class="has-tip" title="Your IP is <?php echo $_SERVER['REMOTE_ADDR']; ?> <br>Your are using <?php echo $_SERVER['HTTP_USER_AGENT']; ?>">developer mode</span>
    <strong class="show-for-small-only">SMALL</strong><strong class="show-for-medium-only">MEDIUM</strong><strong class="show-for-large-only">LARGE</strong><strong class="show-for-xlarge-only">XLARGE</strong><strong class="show-for-xxlarge-only">XXLARGE</strong>
  </div>
  <?php
}
?>
<!-- ////////////////////////////////////////////// -->
<!-- // (c) 2015 Remco Janssen                   // -->
<!-- // Joomla Website by crossmediacreations.nl // -->
<!-- ////////////////////////////////////////////// -->

<div class="toprow">
  <div class="row">
    <div class="large-12">
    </div>
    <div class="large-12 columns region1menu">
    <!-- Nav Bar -->

<div class="top-bar">
  <div class="top-bar-left">
        <jdoc:include type="modules" name="Logo" />

  </div>

  <div class="top-bar-right">
    <jdoc:include type="modules" name="Menu" />
  </div>
</div>



     
    <!-- End Nav -->   
    </div>
  </div>
</div>

    <div class="large-12">
    <jdoc:include type="modules" name="slideshow" />
    </div>

<div class="fullwidth_r2">
  <div class="row content region1">
    <?php 
    $largewidth = 12;
    $mediumwidth = 12;
    if ($this->countModules( 'left-sh' )) :
    ?>
  <div class="large-2 medium-3 hide-for-small columns sidebar">
  <jdoc:include type="modules" name="left-sh" />
  </div>
    <?php 
    $largewidth -= 2;
    $mediumwidth -= 3;
    endif; 
    if ($this->countModules( 'right' )) :
    $largewidth -= 3;

    endif;
    ?>
  <div class="<?php echo "large-".$largewidth." medium-".$mediumwidth; ?>  columns">
    <jdoc:include type="modules" name="maintop" />
    <jdoc:include type="component" />
    <jdoc:include type="modules" name="jbelowcontent" />
    <jdoc:include type="modules" name="contentbottom" />
  </div>
  <?php
  if ($this->countModules( 'right' )) :
  ?>
  <div class="large-3 columns sidebar">
    <jdoc:include type="modules" name="right" />
  </div>
    <?php 
    $largewidth -= 3;
    endif; ?>
  </div>
</div>

<?php
if ($params['enable_analytics']) : ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', '<?php echo $params['analytics_code']; ?>', 'auto');
ga('send', 'pageview');

</script>
<?php

endif;
if ($params['enable_clicky']) : ?>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(<?php echo $params['clicky'];?>); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/<?php echo $params['clicky']; ?>ns.gif" /></p></noscript>
<?php
endif;
?>

</body>
</html>