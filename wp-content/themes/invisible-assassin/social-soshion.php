
<?php
global $option_setting; ?>
<?php if ($option_setting['facebook']) : ?>
<a href="<?php echo $option_setting['facebook'] ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/social/facebook.png"; ?>"></a>
<?php endif; ?>
<?php if ($option_setting['google']) : ?>
<a href="<?php echo $option_setting['google'] ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/social/google.png"; ?>"></a>
<?php endif; ?>
<?php if ($option_setting['twitter']) : ?>
<a href="<?php echo $option_setting['twitter'] ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/social/twitter.png"; ?>"></a>
<?php endif; ?>
<?php if ($option_setting['rss-feed']) : ?>
<a href="<?php echo $option_setting['rss-feed'] ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/social/feed.png"; ?>"></a>
<?php endif; ?>
<?php if ($option_setting['instagram']) : ?>
<a href="<?php echo $option_setting['instagram'] ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/social/instagram.png"; ?>"></a>
<?php endif; ?>
<?php if ($option_setting['flickr']) : ?>
<a href="<?php echo $option_setting['flickr'] ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/social/flickr.png"; ?>"></a>
<?php endif; ?>