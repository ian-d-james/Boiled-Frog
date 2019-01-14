<!DOCTYPE HTML>
<!--
	Boiled Frog - Climate Change Awareness and Strategy
	Ian D James
-->
<html>
	<head>
 		<title>Boiled Frog</title>
		<meta name="description" content="Climate Change Criminality">
		<meta name="author" content="Ian James">
		<meta charset="utf-8" />
		<meta name="keywords" content="environment, climate, change, global, warming, greenhouse, enhanced, effect, accountability, criminality, cuplability, IPCC, NASA">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-58191121-2"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-58191121-2');
		</script>

	</head>
	
	<?php

	if (isset($_GET['pageno'])) {
		$pageno = $_GET['pageno'];
	} else {
		$pageno = 1;
	}
	$no_of_records_per_page = 5;
	$offset = ($pageno-1) * $no_of_records_per_page;

	define('DB_USER','ianja_admin');
	define('DB_PWD','Gabriola1957');
	define('DB_HOST','localhost:3306');
	define('DB_NAME','ianjames_0_boiledfrog');

	/* Connect to database */

	try {
		$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PWD);
	} catch(PDOExeption $e) {
	
		if(ENVIR == ENVIR_DEV) {
			echo '<p>',$e->getMessage(),'</p>';
		}
	
		echo '<p>Unable to connect to database<p>';
		exit;
	}

	/*
	* Template variables
	*/

	$tpl = array(
		'filter'=>array(
			'#action'		=> $_SERVER['SCRIPT_NAME']
			,'#method'  	=> 'get'
			,'category_name'	=> array(
				'#values'=>array(
					array('value'=>'','label'=>'All')
				)
			)
		)
		,'grid'=>array(
			'names'=>array()
		)
	);

	/*
	* Populate form filter last name options
	*/

	$stmt = $db->query('SELECT Category FROM names GROUP BY Category ORDER BY Category ASC');

	if($stmt === false) {
		echo '<p>Unable to populate required data to build page.</p>';
		exit;
	}

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		$tpl['filter']['category_name']['#values'][] = array(
			'label'		=> $row['Category']
			,'value'		=> $row['Category']
			,'selected'		=> isset($_GET['filter'],$_GET['filter']['category_name']) && $_GET['filter']['category_name'] == $row['Category']
		);
	}

	/*
	* Populate user grid
	*/

	$total = $db->query('SELECT COUNT(*) FROM names')->fetchColumn();;
	$pages = ceil($total / $no_of_records_per_page);

	$page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
        'options' => array(
            'default'   => 1,
            'min_range' => 1,
        ),
    )));

    // Calculate the offset for the query
    $offset = ($page - 1)  * $limit;

    // Some information to display to the user
    $start = $offset + 1;
    $end = min(($offset + $limit), $total);

	$stmt = $db->prepare(sprintf(
		'SELECT SiteName,SiteURL,Category FROM names %s'
		, isset($_GET['filter'],$_GET['filter']['category_name']) && !empty($_GET['filter']['category_name'])?'WHERE Category = :Category':''
	));

	if($stmt === false) {
		echo '<p>Unable to populate required data to build page.</p>';
		exit;
	}

	$stmt->execute(isset($_GET['filter'],$_GET['filter']['category_name']) && !empty($_GET['filter']['category_name'])?array(':Category'=>$_GET['filter']['category_name']):array());

	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
		$tpl['grid']['names'][] = $row;
	}

	?>

	<!-- One -->
	<section id="One" class="wrapper style3">
		<div class="inner">
			<header class="align-center">
				<p>Online References</p>
				<h2>Links to Climate Change Sites and Articles</h2>
			</header>
		</div>
	</section>

		<!-- Two -->
		<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p>Chinonye J. Chidolue</p>
								<h2>"The river of knowledge has no depth"</h2>
							</header>

								<!-- user filter template -->
								<form action="<?php echo $tpl['filter']['#action']; ?>" method="<?php echo $tpl['filter']['#method']; ?>">
									<fieldset>
										<legend style="color:black; margin-left:25px;">Filter links by article category</legend>
										<ul style="margin-top:10px; list-style:none;">
											<li>
												<select name="filter[category_name]" id="filter-last-name">
													<?php 
													foreach($tpl['filter']['category_name']['#values'] as &$option) {
														printf(
															'<option value="%s"%s>%s</option>'
															,htmlentities($option['value'])
															,$option['selected']?' selected':''
															,htmlentities($option['label'])
														);
													} 
													?>
												</select>
											</li>
											<li>
												<input style="margin-top:6px;" type="submit" name="filter[submit]" value="Filter"> 
											</li>
										</ul>
									</fieldset>
								</form>

								<!-- data grid template -->
								<table  style="color:black; font-size:14px;">
									<thead>
										<tr>
											<th>Site/Article Name</th>
											<th>Site URL</th>
											<th>Category</th>
										</tr>
									</thead>
									<tbody>
										<?php
											if(!empty($tpl['grid']['names'])) {
												foreach($tpl['grid']['names'] as &$name) {
													printf(
														'<tr>
															<td>%s</td>
															<td><a style="text-decoration:none;" target="_blank" href="%s">%s</a></td>
															<td>%s</td>
														</tr>'
														,htmlentities($name['SiteName'])
														,htmlentities($name['SiteURL'])
														,htmlentities($name['SiteURL'])
														,htmlentities($name['Category'])
													);
												}
											} else {
												echo '<tr><td colspan="2">No names available</td></tr>';
											}
										?>
									</tbody>
								</table>

						</div>
				</div>
			</div>
		</section>							

	<body class="subpage">

		<!-- Header -->
		<header id="header">
				<div class="logo"><a href="http://boiledfrog.ca">Boiled Frog</a>&nbsp;&nbsp;&nbsp;
					<span class="tagline">“global warming is not a future threat - it's a present reality” ― Bill McKibben</span></div>
				<a href="#menu">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
				<li><a href="index.html">Home</a></li>
						<li><a href="moving-on.html">Moving on</a></li>
						<li><a href="accountability.html">Accountability</a></li>
						<li><a href="wilful-ignorance.html">Wilful ignorance</a></li>
						<li><a href="negligence.html">Failure to act</a></li>
						<li><a href="government-policy.html">Government policy</a></li>
						<li><a href="capitalism.html">Capitalism</a></li>
						<li><a href="effect-change.html">Effecting change</a></li>
						<li><a href="references.php">References</a></li>
				</ul>
			</nav>

		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Knowledge is Power</p>
						<h2>Resources to Educate, Embolden and Empower</h2>
					</header>
				</div>
			</section>

		<!-- Footer -->
		<footer id="footer">
				<span class="logo"><a target="_blank" href="https://boiledfrog.ca"><img src="images/logo.png" /></a></span>
				<span class="security"><a target="_blank" href="https://www.rapidssl.com"><img src="images/RapidSSL.png" /></a></span>
				<div class="container">
					<ul style="margin-bottom:10px;" class="icons">
						<li><a href="http://boiledfrog.ca" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="http://boiledfrog.ca" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="http://boiledfrog.ca" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="mailto:admin@boiledfrog.ca?Subject=Boiled Frog" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
			
				<div class="copyright">
					Boiled Frog &copy;2019 All rights reserved
				</div>
				
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>