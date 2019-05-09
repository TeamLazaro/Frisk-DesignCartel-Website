<?php

/*
 * Get all the links on the site
 */
$defaultLinks = require __DIR__ . '/default-nav-links.php';
$links = getContent( $defaultLinks, 'pages' );

/*
 * Figure out the base URL
 */
$urlFragments = preg_split( '/\//', $_SERVER[ 'REQUEST_URI' ] );
	// Pull out the first non-empty fragment
$calculatedBaseSlug = '';
$inferredBaseSlug = $_GET[ '_slug' ] ?? '';
foreach ( $urlFragments as $fragment ) {
	if ( ! empty( $fragment ) ) {
		$calculatedBaseSlug = $fragment;
		break;
	}
}
if ( $inferredBaseSlug == $calculatedBaseSlug )
	$baseURL = null;
else
	$baseURL = '/' . $calculatedBaseSlug . '/';

/*
 * Get the title and URL of the website and current page
 */
$siteTitle = getContent( 'Design Cartel', 'site_title' );
$pageUrl = $siteUrl . $_SERVER[ 'REQUEST_URI' ];
$pageTitle = getCurrentPageTitle( $links, $baseURL, $siteTitle );

?>

<head>

	<!-- Do NOT place anything above this -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title><?php echo $pageTitle ?></title>


	<?php if ( ! empty( $baseURL ) ) : ?>
		<base href="<?php echo $baseURL ?>">
	<?php endif; ?>

	<!--
	*
	*	Metadata
	*
	- -->
	<!-- Short description of the document (limit to 150 characters) -->
	<!-- This content *may* be used as a part of search engine results. -->
	<meta name="description" content="<?php echo getContent( '', 'description' ); ?>">
	<!-- Short description of your document's subject -->
	<meta name="subject" content="<?php echo getContent( '', 'subject' ); ?>">


	<!--
	*
	*	Authors
	*
	- -->
	<!-- Links to information about the author(s) of the document -->
	<meta name="author" content="Lazaro Advertising">
	<link rel="author" href="humans.txt">


	<!--
	*
	*	SEO
	*
	- -->
	<!-- Control the behavior of search engine crawling and indexing -->
	<meta name="robots" content="index,follow"><!-- All Search Engines -->
	<meta name="googlebot" content="index,follow"><!-- Google Specific -->
	<!-- Verify website ownership -->
	<meta name="google-site-verification" content="<?php echo getContent( '', 'google_site_verification_token' ); ?>"><!-- Google Search Console -->


	<!--
	*
	*	UI / Chrome
	*
	- -->
	<!-- Theme Color for Chrome, Firefox OS and Opera -->
	<meta name="theme-color" content="<?php echo getContent( '#f9f9f9', 'theme_color' ); ?>">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
	<link rel="manifest" href="favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#444444">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">


	<!-- ~ iOS ~ -->
	<!-- Disable automatic detection and formatting of possible phone numbers -->
	<meta name="format-detection" content="telephone=no">
	<!-- Launch Screen Image -->
	<!-- <link rel="apple-touch-startup-image" href="/path/to/launch.png"> -->
	<!-- Launch Icon Title -->
	<meta name="apple-mobile-web-app-title" content="<?php echo getContent( 'Brown.ie', 'apple -> ios_app_title' ); ?>">
	<!-- Enable standalone (full-screen) mode -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Status bar appearance (has no effect unless standalone mode is enabled) -->
	<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo getContent( 'default', 'apple -> ios_status_bar_style' ); ?>">

	<!-- ~ Android ~ -->
	<!-- Add to home screen -->
	<meta name="mobile-web-app-capable" content="yes">
	<!-- More info: https://developer.chrome.com/multidevice/android/installtohomescreen -->


	<!--
	*
	*	Social
	*
	- -->
	<!-- Facebook Open Graph -->
	<meta property="og:url" content="<?php echo $pageUrl ?>">
	<meta property="og:type" content="website">
	<meta property="og:title" content="<?php echo $pageTitle ?>">
	<meta property="og:image" content="<?php echo getContent( '', 'og -> image' ) ?>">
	<meta property="og:description" content="<?php echo getContent( '', 'og -> description' ) ?>">
	<meta property="og:site_name" content="<?php echo getContent( '', 'site_title' ) ?>">


	<!-- Schema.org / Google+ -->
	<meta itemprop="name" content="<?php echo $pageTitle ?>">
	<meta itemprop="description" content="<?php echo getContent( 'This is a website', 'schema -> description' ) ?>">
	<meta itemprop="image" content="<?php echo getContent( '', 'schema -> image' ) ?>">


	<!--
	*
	*	Arbitrary Code
	*
	- -->
	<?php echo getContent( <<<ARB
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,700" rel="stylesheet">
	<!-- Icons -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
ARB
, 'arbitrary_code' ) ?>


	<!--
	*
	*	Enqueue Files
	*
	- -->
	<!-- Stylesheet -->
	<?php require __DIR__ . '/../style.php'; ?>
	<!-- jQuery 3 -->
	<script type="text/javascript" src="plugins/jquery/jquery-3.0.0.min.js<?php echo $ver ?>"></script>
	<!-- Slick Carousel -->
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick.css<?php echo $ver ?>"/>
	<link rel="stylesheet" type="text/css" href="plugins/slick/slick-theme.css<?php echo $ver ?>"/>

</head>
