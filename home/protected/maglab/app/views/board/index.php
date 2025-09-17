<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php if(isset($meta_description)) { ?>
<meta <?php echo MtHaml\Runtime::renderAttributes(array(array('name', 'description'), array('content', $meta_description)), 'html5', 'UTF-8'); ?>>
<?php } ?>
<title>
MAG Laboratory -
<?php echo htmlspecialchars($title,ENT_QUOTES,'UTF-8'); ?>
</title>
<link href="/css/bootstrap-5a0f735.css" rel="stylesheet">
<link href="/css/bootstrap-theme-ae00592.css" rel="stylesheet">
<link href="/css/maglab.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link <?php echo MtHaml\Runtime::renderAttributes(array(array('rel', 'preconnect'), array('href', 'https://fonts.gstatic.com'), array('crossorigin', TRUE)), 'html5', 'UTF-8'); ?>>
<link href="https://fonts.googleapis.com/css2?family=Eczar:600|Raleway:400,400i|Bree+Serif&amp;display=swap" rel="stylesheet">
<!--[if IE]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="/js/jquery-2.2.4.min.js"></script>
<script src="/js/bootstrap-471c05a.js"></script>
</head>
<body>
<script type="text/javascript">
//<![CDATA[
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-83590106-1', 'auto');
ga('send', 'pageview');
//'
//]]>
</script>
<div id="header">
<div class="container text-center">
<div class="row">
<div class="col-xs-12 col-sm-6 col-sm-offset-3">
<a href="/">
<image <?php echo MtHaml\Runtime::renderAttributes(array(array('id', 'logo'), array('src', '/images/logo.webp'), array('title', ('MAGLab Logo'))), 'html5', 'UTF-8'); ?>></image>
</a>
<address>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('https://www.google.com/maps/place/MAG+Laboratory/@34.0384934,-117.8235897,17z/data=!4m8!1m2!3m1!2sMAG+Laboratory!3m4!1s0x0:0x56f9a6e0034a854!8m2!3d34.038489!4d-117.8214008')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>>
<span class="glyphicon glyphicon-road"></span>
view on Google Maps
</a>
<br>
3960 E Valley Blvd. Unit G,
<br>
Walnut, CA 91789
<br>
<?php if(isset($layout_show_entrances) and $layout_show_entrances) { ?>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('#')), array('data-toggle', 'modal'), array('data-target', '#sign-entrance')), 'html5', 'UTF-8'); ?>>
<span class="glyphicon glyphicon-picture"></span>
[north entrance]
</a>
*
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('#')), array('data-toggle', 'modal'), array('data-target', '#flag-entrance')), 'html5', 'UTF-8'); ?>>
[south entrance]
<span class="glyphicon glyphicon-flag"></span>
</a>
<br>
<?php } ?>
<span <?php echo MtHaml\Runtime::renderAttributes(array(array('title', ('Remember it easily as NaN-2-MAGLAB'))), 'html5', 'UTF-8'); ?>>
<span class="glyphicon glyphicon-earphone"></span>
(626) 262 - 4522
</span>
<br>
<span <?php echo MtHaml\Runtime::renderAttributes(array(array('title', ('No spam please'))), 'html5', 'UTF-8'); ?>>
<span class="glyphicon glyphicon-envelope"></span>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('mailto:contact@maglaboratory.org'))), 'html5', 'UTF-8'); ?>>
contact@maglaboratory.org
</a>
</span>
</address>
</div>
</div>
</div>
<nav class="navbar navbar-default">
<div class="container">
<div class="navbar-header">
<button <?php echo MtHaml\Runtime::renderAttributes(array(array('class', ('navbar-toggle' . ' ' . 'collapsed')), array('type', ('button')), array('data-toggle', ('collapse')), array('data-target', ('#main-nav'))), 'html5', 'UTF-8'); ?>>
Menu
<span class="glyphicon glyphicon-menu-hamburger"></span>
</button>
</div>
<div id="main-nav" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/membership'))), 'html5', 'UTF-8'); ?>>Membership</a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/wiki'))), 'html5', 'UTF-8'); ?>>Wiki</a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('https://groups.google.com/forum/?fromgroups#!forum/maglaboratory'))), 'html5', 'UTF-8'); ?>>Forum/Google Group</a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/hal'))), 'html5', 'UTF-8'); ?>>Are We Open?</a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/members/procurement'))), 'html5', 'UTF-8'); ?>>Shopping List</a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/members'))), 'html5', 'UTF-8'); ?>>Members Dashboard</a>
</li>
</ul>
</div>
</div>
</nav>
<div class="container">
<ul class="social-icons">
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-mail'), array('href', ('mailto:contact@maglaboratory.org')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-facebook'), array('href', ('https://www.facebook.com/MAGLaboratory')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-twitter'), array('href', ('https://www.twitter.com/MAGLaboratory')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-instagram'), array('href', ('https://www.instagram.com/MAGLaboratory/')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-youtube'), array('href', ('https://www.youtube.com/channel/UCxkmJiwGmDQnIvLe2gDKbpg')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-yelp'), array('href', ('https://www.yelp.com/biz/mag-lab-walnut')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-github'), array('href', ('https://github.com/MAGLaboratory')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
</ul>
</div>
</div>
<div class="containment">
<div class="container">
<div class="row">
<h1>Jobs / Gigs / Postings</h1>
<a href="/jobs/new">Add Entry</a>
</div>
<?php if(empty($listings) or $listings->num_rows == 0) { ?>
<div class="row">
No entries found.
</div>
<?php } else { ?>
<?php $Parsedown = new Parsedown(); ?>
<?php $i = 0; ?>
<?php $colors = array('#cefbbd', '#f0f9c3', '#beedee', '#ffdcb8'); ?>
<?php while($listing = $listings->fetch_object()) { ?>
<div <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'row'), array('style', ('background-color: ' . ($colors[$i%4]) . ';'))), 'html5', 'UTF-8'); ?>>
<?php $i++; ?>
<div class="container">
<div class="row">
<div class="col-sm-8 col-xs-12">
<h1><?php echo htmlspecialchars($listing->title ,ENT_QUOTES,'UTF-8'); ?></h1>
<?php if(!empty($listing->more_info_link)) { ?>
<?php $more_info = filter_var($listing->more_info_link, FILTER_SANITIZE_URL); ?>
<?php if($more_info) { ?>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ($listing->more_info_link)), array('target', '_blank')), 'html5', 'UTF-8'); ?>>more info / apply</a>
<?php } ?>
<?php } ?>
</div>
<div class="col-sm-4 col-xs-12">
<span <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'label'), array('class', ($listing->type == 'Business' ? 'label-primary' : 'label-info'))), 'html5', 'UTF-8'); ?>><?php echo htmlspecialchars($listing->type,ENT_QUOTES,'UTF-8'); ?></span>
<?php echo htmlspecialchars($listing->company,ENT_QUOTES,'UTF-8'); ?>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<?php if(!empty($listing->description)) { ?>
<?php echo $purifier->purify($Parsedown->text($listing->description)); ?>
<?php } ?>
</div>
</div>
<div class="row">
<div class="col-sm-8 col-xs-12">
<?php echo htmlspecialchars($listing->location,ENT_QUOTES,'UTF-8'); ?>
</div>
<div class="col-sm-4 col-xs-12">
<?php echo htmlspecialchars($listing->pay,ENT_QUOTES,'UTF-8'); ?>
</div>
</div>
</div>
</div>
<?php } ?>
<?php } ?>
</div>
</div>

<?php if(!isset($layout_no_footer)) { ?>
<div id="footer" class="containment">
<div class="container">
<div class="row">
<span class="text-center">Copyright &copy; 2011-2025 Makers, Artists, and Gadgeteers Laboratory, Inc</span>
</div>
</div>
</div>
<?php } ?>
<?php if(isset($layout_show_entrances) and $layout_show_entrances) { ?>
<div id="sign-entrance" class="modal fade" role="dialog" aria-labeledby="signEntranceLabel">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title">Big Valley Industrial Park sign</h4>
</div>
<div class="modal-body">
<img <?php echo MtHaml\Runtime::renderAttributes(array(array('src', ('/images/entrance-sign.webp')), array('alt', 'Big Valley Industrial Park sign'), array('style', 'width:100%;height:auto;')), 'html5', 'UTF-8'); ?>>
<p>This is the middle entrance. If you take this entrance, go all the way down, and then take a slight right until you see a triangular parking island with some palm trees. The space is right across from where parking island starts.</p>
</div>
<div class="modal-footer">
<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<div id="flag-entrance" class="modal fade" role="dialog" aria-labelledby="flagEntranceLabel">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button class="close" type="button" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title">Big Valley Industrial Entrance with Flags</h4>
</div>
<div class="modal-body">
<img src="/images/entrance-flags.webp" alt="Big Valley Industrial Entrance flags" style="width:100%;height:auto;">
<p>This is the only entrance where you can turn left to get in. So if you're heading south (I-10 behind you), then turn into here. You'll see the triangular parking island with palm trees. We're right across from where the long point of the island stops.</p>
</div>
<div class="modal-footer">
<button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<?php } ?>
</body>
</html>
