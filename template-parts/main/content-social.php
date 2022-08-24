<?php
/**
 * Template part to show social feeds
 *
 * @package wpbrigade
 */

?>

<div class="social-container">
	<div class="twitter-feed">
		<h1 class="twitter-feed-title">
			Latest Tweets
		</h1>

		<div class="twitter-page-container">
			<?php
				$twitter_handle = esc_attr( get_option( 'twitter_handle' ) );
			?>
			<a class="twitter-timeline" data-width="363" data-height="363" href="<?php echo "https://twitter.com/$twitter_handle?ref_src=twsrc%5Etfw"; ?>">Tweets by <?php echo $twitter_handle; ?></a>
			<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
		</div>
	</div>

<div class="facebook-page">
	<h1 class="facebook-page-title">
		Facebook Page
	</h1>

	<div class="fb-page-container">
		<?php
				$fb_handle = esc_attr( get_option( 'facebook_handle' ) );
		?>

			<div class="fb-page" data-href="<?php echo "https://www.facebook.com/{$fb_handle}"; ?>" data-tabs="timeline" data-width="384" data-height="363" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
				<blockquote cite="<?php echo "https://www.facebook.com/{$fb_handle}"; ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo "https://www.facebook.com/{$fb_handle}"; ?>"><?php echo $fb_handle; ?></a></blockquote>
			</div>
		</div>
	</div>
</div>
