
			<!-- ~/~/~/~/~/~/~/~/~/~/~/~/~/~/~/~/ -->
			<!-- Page-specific content goes here. -->
			<!-- ~/~/~/~/~/~/~/~/~/~/~/~/~/~/~/~/ -->

		</div> <!-- END : Page Content -->


		<?php
		/* -- Design Cartel Footer -- */
			require_once __DIR__ . '/dc-footer.php';
		?>

		<?php
		/* -- Signature -- */
			require_once __DIR__ . '/signature.php';
		?>

	</div><!-- END : Page Wrapper -->

	<?php require_once 'modals.php' ?>

	<!--  ☠  MARKUP ENDS HERE  ☠  -->

	<?php //lazaro_disclaimer(); ?>









	<!-- JS Modules -->
	<script type="text/javascript" src="/js/modules/utils.js"></script>
	<!-- <script type="text/javascript" src="/js/modules/device-charge.js"></script> -->
	<script type="text/javascript" src="/js/modules/navigation.js"></script>
	<script type="text/javascript" src="/js/modules/video_embed.js"></script>
	<script type="text/javascript" src="/js/modules/carousel.js"></script>
	<script type="text/javascript" src="/js/modules/accordions.js"></script>
	<script type="text/javascript" src="/js/modules/modal_box.js"></script>
	<script type="text/javascript" src="/js/modules/smoothscroll.js"></script>
	<script type="text/javascript" src="/js/modules/form.js"></script>
	<!-- <script type="text/javascript" src="/js/modules/disclaimer.js"></script> -->

	<script type="text/javascript">

		$( function () {
			//
		} );

	</script>

	<!-- Other Modules -->
	<?php // require __DIR__ . '/inc/can-user-hover.php' ?>

	<?php
		/*
		 * Arbitrary Code ( Bottom of Body )
		 */
		echo getContent( '', 'arbitrary_code_body_bottom' );
	?>

</body>

</html>
