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
<link href="https://fonts.googleapis.com/css?family=Eczar:600|Raleway:400,400i|Bree+Serif" rel="stylesheet">
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
<image <?php echo MtHaml\Runtime::renderAttributes(array(array('id', 'logo'), array('src', '/images/logo.png'), array('title', ('MAGLab Logo'))), 'html5', 'UTF-8'); ?>></image>
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
</ul>
</div>
</div>
</nav>
<div class="container">
<ul class="social-icons">
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-discord'), array('href', ('https://discord.gg/rtzD3PA')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-facebook'), array('href', ('https://www.facebook.com/MAGLaboratory')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-instagram'), array('href', ('https://www.instagram.com/MAGLaboratory/')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
<li>
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'sprite-github'), array('href', ('https://github.com/MAGLaboratory')), array('target', ('_blank'))), 'html5', 'UTF-8'); ?>></a>
</li>
</ul>
</div>
</div>
<?php $pricing_title = 'Membership Info (the short version)'; ?>
<?php include('_pricing.php'); ?>
<div class="containment">
<div class="container">
<div class="row">
<h1 class="text-center">Membership Information (the long version)</h1>
<div class="col-xs-12">
<h2>
Guests / Visitors
<small>Free!</small>
</h2>
<p>
Anybody is free to visit the MAG Lab any time that the space is open. Many of our members are 
</p>
<p>
We reserve the right to refuse service and entry for whatever reason. If there's a chance that a visitor's behavior might jeopardize safety or pose a risk, we'll ask them to leave. There are adverse consequences to disregarding common sense, especially when the machines are active.
</p>
</div>
<div class="col-xs-12">
<h2>
General Members
<small>$60/month</small>
</h2>
<p>
Heavy machinery and other dangerous equipment like the welder require special permission to operate. There's a safety test and you must demonstrate that you can follow basic procedures to the section lead. This avoids potential accidents that harm yourself or damage the equipment.
</p>
<p>
Most of our members pay using the PayPal subscription link. Some members pay in cash, usually during one of the weekly Tuesday business meetings.
</p>
</div>
<div class="col-xs-12">
<h2>
Keyholders
<small>$120/month</small>
</h2>
<p>
Keyholders get a key to the space. That comes with additional responsibilities, the most important of which is
<strong>locking up the space when they leave. </strong>
</p>
<p>
Because of the additional responsibility, we ask that prospective keyholders try out the space for a month or two as a General Member before asking for keyed. 
Keyholders are vetted and 
<strong>must officially be accepted to be keyed during a Tuesday business meeting.</strong>
It comes to a vote and always passes (or should). As long as they're not disrespectful to other members or did something alarming, there's no reason why anyone would disagree.
</p>
<p>
You don't absolutely have to, but it would be nice if you kept the doors open while you're at the space so that General Members can use it.
</p>
</div>
<div class="col-xs-12">
<h2>
Officers
<small>Keyholder + extra work</small>
</h2>
<p>
This is the cream of the crop folks! Officers are Keyholder Members that have the 
<strong>responsibility to administrate and manage business affairs of Makers, Artists and Gadgeteers, Inc. </strong>
</p>
<p>
Officers work on a
<strong>volunteer</strong>
basis. They manage income, pay the bills and maintain the space. It's a tough job.
</p>
<p>
There are a limited number of officer positions that are
<strong>voted on during the Annual Meeting</strong>
(usually in or around September). Special positions are the President, Secretary and Treasurer. A few other officers help these three do their job.
</p>
<p>
As part of our by laws,
<strong>all officers must also be Keyholders</strong>
and
<strong>serve an annual term</strong>
until the next annual meeting. We try to maintain an odd number of officers for voting purposes.
</p>
</div>
<div class="col-xs-12">
<h3>
Curator
<small>General + extra work</small>
</h3>
<p>
There is a special General Member position called the Curator. It provides a key at General Member pricing in exchange for keeping the space open for extra hours in the week. 
</p>
<p>
The Curator changes every once in a while if a new General Member wants to take up the position. If interested, please attend a Tuesday business meeting and ask about it.
</p>
<p>
Sign ups and applications will be posted when a new selection round begins.
</p>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<h2>Members Section / Dashboard</h2>
<p>
All members will have an account created in our
<a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/members'))), 'html5', 'UTF-8'); ?>>Members Section</a>
to manage billing history and basic contact information.
</p>
</div>
<div class="col-xs-12">
<h2>Plans</h2>
<p>The following are plans for the future concerning membership. They may or may not be implemented:</p>
<ul>
<li>
Every member gets an rfid card. Key members use the same card to open the door. General and Keyed use the cards to activate/reserve a machine.
This ensures only members that pass the safety test and verified safe to use machines can be used.
Helps avoid dangerous situations like self-maiming and loss of limb from misuse of hardware.
</li>
</ul>
</div>
</div>
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
<img <?php echo MtHaml\Runtime::renderAttributes(array(array('src', ('/images/entrance-sign.png')), array('alt', 'Big Valley Industrial Park sign'), array('style', 'width:100%;height:auto;')), 'html5', 'UTF-8'); ?>>
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
<img src="/images/entrance-flags.png" alt="Big Valley Industrial Entrance flags" style="width:100%;height:auto;">
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
