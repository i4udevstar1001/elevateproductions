<?php 

add_shortcode('get_slide', 'get_slide');
function get_slide(){
    $wp_query = new WP_Query(array(
        'post_type'      => 'slide',
        'orderby'        => 'date',
        'posts_per_page' =>  -1
    ));
    ob_start();
    if ($wp_query->have_posts()) :
        echo '<div class="wrap-slide">';
        while ($wp_query->have_posts()) : $wp_query->the_post();
        ?> 
        <div class="item-slide"  style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) no-repeat center center / cover;">
        	<div class="slick-slide-inner-wrapper">
	        	<div class="superimpose">
	        		<h1><?php the_title(); ?></h1>
	        		<p><?php the_content(); ?></p>
	        		<div class="button-slide">
	        			<a href="<?php echo get_field('view_capabilities'); ?>" title="" class="view-slide">View capabilities</a>
	        			<a href="<?php echo get_field('get_in_touch'); ?>" title="" class="get-slide">Get in touch</a>
	        		</div>
	        	</div>
        	</div>
    	</div>
        <?php
        endwhile;
        wp_reset_query();
        echo '</div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}

add_shortcode('get_img', 'get_img');
function get_img(){
    $wp_query = new WP_Query(array(
        'post_type'      => 'images',
        'order'          => 'ASC',
        'posts_per_page' =>  -1
    ));
    ob_start();
    if ($wp_query->have_posts()) :
        echo '<div class="wrap-images">';
        while ($wp_query->have_posts()) : $wp_query->the_post();
        ?> 
        <div class="item-slide">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        </div>
        <?php
        endwhile;
        wp_reset_query();
        echo '</div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}

add_shortcode('get_porfolio', 'get_porfolio');
function get_porfolio(){
    $wp_query = new WP_Query(array(
		'post_type'      => 'portfolios',
		'order'          => 'ASC',
		'posts_per_page' =>  3
    ));
    ob_start();
    if ($wp_query->have_posts()) :
        echo '<div class="wrap-portfolio">';
        echo '<div class="row">';
        while ($wp_query->have_posts()) : $wp_query->the_post();
            $icon_font = get_field('icon_font');
        ?> 
        <div class="item-portfolio col-md-4">
            <div class="wrap-item">
                <div class="img-portfolio">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                </div>
            	<div class="icon-portfolio">
                    <?php echo $icon_font; ?>
                </div>
                <div class="content-portfolio">
                    <h4><?php the_title(); ?></h4>
                    <div><?php echo get_the_excerpt(); ?></div>
                    <a href="/portfolio-1/">Learn More →</a>
                </div>
            </div>
    	</div>
        <?php
        endwhile;
        wp_reset_query();
        echo '</div></div>';
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}

add_shortcode('page_porfolio', 'page_porfolio');
function page_porfolio($atts,$content = null){
    extract(shortcode_atts(array(
        'number'=> -1,
        'catid' => ''
    ), $atts));
    $wp_query = new WP_Query(array(
        'post_type'      => 'portfolios',
        'order'        => 'ASC',
        'posts_per_page' =>  $number,
        'tax_query' => array(
            array(
                'taxonomy' => 'tax_porfolio',
                'field'    => 'id',
                'terms'    => $catid,
            ),
        ),
    ));
    ob_start();
    if ($wp_query->have_posts()) :
        echo '<div class="wrap-page-por">';
        while ($wp_query->have_posts()) : $wp_query->the_post();
            $sub_title = get_field('sub_title');
            $icon      = get_field('icon');
            $photos_by = get_field('photos_by');
            $images    = get_field('gallery');
            $size = 'full'; 
        ?>
            <div class="item-page-por por_<?php echo $catid; ?>">
                <div class="container">
                    <div class="por-left">
                        <div class="icon-por"><img src="<?php echo $icon; ?>" alt=""></div>
                        <h3><?php echo $sub_title; ?></h3>
                        <div class="cnt-por"><?php the_content(); ?></div>
                    </div>
                    <div class="por-right">
                    <?php   if( $images ): ?>
                            <ul>
                                <?php foreach( $images as $image ): ?>
                                    <li>
                                        <a href="<?php echo $image['url']; ?>" class="html5lightbox" data-group="mygroup_<?php echo get_the_ID();?>" data-thumbnail="<?php echo $image['url']; ?>" title=""><?php echo wp_get_attachment_image( $image['ID'], $size ); ?></a>
                                        
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                    <?php endif; ?>
                    <p><?php echo $photos_by; ?></p>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_query();
        echo "</div>";
    endif;
    $list_post = ob_get_contents();
    ob_end_clean();
    return $list_post;
}