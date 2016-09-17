<?php
$language = get_bloginfo('language');
$charset = get_bloginfo('charset');
$name = get_bloginfo('name');
$url = get_bloginfo('url');
$link_text = sprintf(wp_kses(__('<a title="%s" href="%s">%s</a> is currently undergoing scheduled maintenance.', 'simple-maintenance'), array('a' => array('href' => array(), 'title' => array()))), $name, esc_url($url), $name);
?>
<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="<?php echo $charset; ?>" />
    <meta name="viewport" content="width=device-width">
    <title><?php echo $name; ?> &#8250; Simple Maintenance</title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="stylesheet" href="<?php echo SIMPLE_MAINTENANCE_URL.'/sm-style.css' ?>" type="text/css" media="all" />	
<script>
  window.imgUrl = '<?php echo SIMPLE_MAINTENANCE_URL ?>';
</script>
</head>
<body>
  <div id="slideshow"></div>
  <div class="logo-mask"></div>
  <ul class="social-links">
    <li>
      <a href="https://twitter.com/picksmagazine">
        <img alt="Picks Twitter Handle" src="<?php echo SIMPLE_MAINTENANCE_URL ?>/img/twitter.png"/>
      </a>
    </li>
    <li>
      <a href="https://www.facebook.com/picksmagazine/">
        <img alt="Picks Facebook Page" src="<?php echo SIMPLE_MAINTENANCE_URL ?>/img/facebook.png"/>
      </a>
    </li>
    <li>
      <a href="https://www.youtube.com/channel/UCgzQ9k0gWWpAguYcT39rP0Q">
        <img alt="Picks Youtube Channel" src="<?php echo SIMPLE_MAINTENANCE_URL ?>/img/youtube.png"/>
      </a>
    </li>
  </ul>
  <script src="<?php echo SIMPLE_MAINTENANCE_URL.'/sm-script.js' ?>"></script>
</body>
</html>