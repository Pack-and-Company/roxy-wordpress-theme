<?php get_header(); ?>

<div class="small-logo"></div>

<div class="section main">
	<div class="wrapper">
		<div class="col content left">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			  <?php the_content(); ?>
			<?php endwhile; wp_reset_query(); ?>
		</div>

		<div class="col logo center">
			<object type="application/x-shockwave-flash" 
				data="<?=get_template_directory_uri();?>/flash/roxy-sign.swf" 
				width="215" 
				height="661" 
				id="roxy-sign" 
				style="visibility: visible;">
				<param name="quality" value="high">
				<param name="wmode" value="transparent">
				<img src="<?=get_template_directory_uri();?>/images/roxy-sign.jpg">
			</object>
		</div>

		<div class="col content right events">
			<h2>DJ's</h2>
			<p>Dance the night away to tunes from top local and international DJ's.</p>

			<?php
                $args = array(
                    'post_type'   => 'events',
                    'post_status' => 'publish',
                    'orderby'     => 'menu_order',
                    'order'       => 'ASC',
                );
                $events = get_posts( $args );

                foreach ( $events as $event ) {
                    $door_charge = get_post_meta($event->ID, '_event_price', true);
                    if ( $door_charge != '') {
                    	if ( substr($door_charge, 0, 1) != "$" ) {
	                        $door_charge = "$" . $door_charge;
	                    }
                    }

                    $event_time = get_post_meta($event->ID, '_event_time', true);
                    if ( $event_time != '' && $door_charge != '' ){
                        $event_time = $event_time . ", ";
                    }

                    setup_postdata($event);
                        printf('<div class="event">');
                        printf('    <h3>%s</h3>', get_post_meta($event->ID, '_event_date', true));
                        printf('    <h4>%s</h4>', $event->post_title);
						printf('    <div class="event-details">%s%s</div>', $event_time, $door_charge);
						if (has_post_thumbnail($event->ID)) {
							printf('    <a href="%s">%s</a>', wp_get_attachment_url(get_post_thumbnail_id($event->ID)), get_the_post_thumbnail($event->ID, array(298,424)));
						}
						$post_content = $event->post_content;
						$post_content = apply_filters('the_content', $post_content);
						$post_content = str_replace(']]>', ']]&gt;', $post_content);
						printf('    <div class="event-details">%s</div>', $post_content);
                        printf('</div>');			
                }

                wp_reset_postdata();
            ?>
		</div>
	</div>
</div>

<div class="section footer">
	<div class="wrapper">
		<div class="col content right">
			<p>
			7 Fort Lane or 44 Queen St, Auckland<br>
			PO BOX 2183, Shortland St, Auckland CBD 1140<br>
			_phone: +64 (9) 929 2701 _email: <a href="mailto:info@roxy.co.nz">info@roxy.co.nz</a>
			</p>
		</div>
		<div class="col center">&nbsp;</div>
		<div class="col content left">
			<p>Open Wednesday - Saturday 4.30pm 'til late</p>
		</div>
	</div>
</div>

<?php get_footer(); ?>