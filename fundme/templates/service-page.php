<?php

/**
 * This template displays services above footer section.
 *
 * Template Name: Service Page
 */

	get_header();

	$thumb = get_the_post_thumbnail_url();
	
	# excluding Finance Application Page
	if (!is_page('Finance Application'))
	{
		echo '<script>console.log("Other Page");</script>'; ?>

		<div class="page-header">
			<div class="container">
				<div class="page-title h-main">
					<?php
						$custom_title = get_field('custom_title');
					?>
				<h1>
					<?php
						if($custom_title){ 
								echo $custom_title;
						} else {
								the_title();
						}
					?>
				</h1>
				</div>
				<div class="feature-img">
					<?php if(has_post_thumbnail()) { ?>
					<img src="<?php echo $thumb; ?>" alt="<?php the_title(); ?>"/>
					<?php } else { ?>
					<img src="/wp-content/uploads/2023/08/hero.png" alt="<?php the_title(); ?>"/>
					<?php } ?>
				</div>
			</div>
		</div>
<?php }?>

	<div class="ContentWrap">
		<div class="container">
			<?php the_content(); ?>
		</div>
	</div>

	<div class="container">
		<div class="service-heading h-secondary text-center">
			<h2>Other Services</h2>
		</div>
		<div class="service-list">
				<div class="service-item" name="Tax Funding">
					<a href="/funding-solutions/tax-funding/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/tax-funding.svg" alt="Tax Funding"/>
						<h3>Tax Funding</h3>
					</a>
				</div>
				<div class="service-item" name="Invoice Finance">
					<a href="/funding-solutions/invoice-finance/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/invoice-finance.svg" alt="Invoice Finance"/>
						<h3>Invoice Finance</h3>
					</a>
				</div>
				<div class="service-item" name="Asset Finance">
					<a href="/funding-solutions/asset-finance/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/asset-finance.svg" alt="Asset Finance"/>
						<h3>Asset Finance</h3>
					</a>
				</div>
				<div class="service-item" name="Property Finance">
					<a href="/funding-solutions/property-finance/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/property-finance.svg" alt="Property Finance"/>
						<h3>Property Finance</h3>
					</a>
				</div>
				<div class="service-item" name="Term Loans">
					<a href="/funding-solutions/term-loans/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/term-loans.svg" alt="Term Loans"/>
						<h3>Term Loans</h3>
					</a>
				</div>
				<div class="service-item" name="Revolving Credit Lines">
					<a href="/funding-solutions/revolving-credit-lines/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/revolving-credit.svg" alt="Revolving Credit Lines"/>
						<h3>Revolving Credit Lines</h3>
					</a>
				</div>
				<div class="service-item" name="Trade Finance">
					<a href="/funding-solutions/trade-finance/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/trade-finance.svg" alt="Trade Finance"/>
						<h3>Trade Finance</h3>
					</a>
				</div>
				<div class="service-item" name="Merchant Cash Advance">
					<a href="/funding-solutions/merchant-cash-advance/">
						<img src="/wp-content/themes/fundme/img/service-icons-svg/merchant-cash.svg" alt="Merchant Cash Advance"/>
						<h3>Merchant Cash Advance</h3>
					</a>
				</div>
			</div>
		</div>

<?php get_footer(); ?>