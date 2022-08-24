<?php
/**
 * Template part to show tabs custom post type
 *
 * @package wpbrigade
 */

?>
<!-- tabs -->
<div class="tabs-container">

	<div class="tabs_heading">

		<ul class="tab-heading-list">
			<li class="active" data-tab-target="#first">
				<h2 class="tab-heading"><?php echo get_the_title( 106 ); ?></h2>
			</li>

			<li data-tab-target="#second">
				<h2 class="tab-heading"><?php echo get_the_title( 146 ); ?></h2>
			</li>

			<li data-tab-target="#third">
			<h2 class="tab-heading"><?php echo get_the_title( 147 ); ?></h2>
		</li>
	</ul>

</div>

	<div class="tabs_content">
		<div id="first" class="active" data-tab-content>
			<p class="tab-description">
				<?php echo get_the_content( null, false, 106 ); ?>
			</p>
		</div>

		<div id="second" data-tab-content>
			<p class="tab-description">
				<?php echo get_the_content( null, false, 146 ); ?>
			</p>
		</div>

		<div id="third" data-tab-content>
			<p class="tab-description">
				<?php echo get_the_content( null, false, 147 ); ?>
			</p>
		</div>

	</div>

</div>
