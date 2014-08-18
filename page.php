<?php get_header(); ?>

<div class="section main">
	<div class="wrapper">
		<div class="col content left">

		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		  <?php the_content(); ?>
		<?php endwhile; wp_reset_query(); ?>

		<div class="col logo center">
			<object type="application/x-shockwave-flash" 
				data="flash/roxy-sign.swf" 
				width="215" 
				height="661" 
				id="roxy-sign" 
				style="visibility: visible;">
				<param name="quality" value="high">
				<param name="wmode" value="transparent">
				<img src="images/roxy-sign.jpg">
			</object>
		</div>

		<div class="col content right">
			<h2>DJ's</h2>
			<p>Dance the night away to tunes from top local and international DJs.</p>

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
                        $door_charge = "$" . $door_charge;
                    }

                    $event_time = get_post_meta($event->ID, '_event_time', true);
                    if ( $event_time != '' && $door_charge != '' ){
                        $event_time = $event_time . ", ";
                    }

                    setup_postdata($event);
                        printf('<div class="event">');
                        printf('    <h3>%s</h3>', get_post_meta($event->ID, '_event_date', true));
                        printf('    <h3>%s</h3>', $event->post_title);
						printf('    <div class="event-details">%s%s</div>', $event_time, $door_charge);
						printf('    %s',get_the_post_thumbnail($event->ID, array(298,424)));
						printf('    <div class="event-details">%s</div>', $event->post_content);
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

<script type="text/javascript">
$(document).ready(function(){
	$('h2').html(function(){
		var title = "<span>" + $(this).html() + "</span>";
		$(this).html(title);
	});
});
</script>

<?php get_footer(); ?>