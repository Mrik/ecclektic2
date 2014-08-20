<?php global $option_setting;
$count = 0;
if( $option_setting['slider-enable-on-home'] && (is_front_page() || is_home() )) : 
	if ( count($option_setting['slider-main']) > 0 ) : ?>

    <div id="slider-wrapper">
    <ul class="bxslider">
    	<?php
		  		foreach ( $option_setting['slider-main'] as $slider ) {
		  				if ($count > 5) {
		  					break;
		  				}
						echo "<li><a href='".esc_url($slider['url'])."'><img src='".$slider['image']."' title='".$slider['title'].(($slider['description'])?" - ":"").$slider['description']."'></a></li>";
						$count++;    
				}
           ?>
     </ul>   
	</div>
    
<?php endif;
endif; ?>