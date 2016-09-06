<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if($meta_description) { ?>
      <meta <?php echo MtHaml\Runtime::renderAttributes(array(array('name', 'description'), array('content', $meta_description)), 'html5', 'UTF-8'); ?>>
    <?php } ?>
    <title>
      MAG Laboratory -
      <?php echo htmlspecialchars($title,ENT_QUOTES,'UTF-8'); ?>
    </title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="/css/maglab.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Eczar:600|Raleway:400,400i|Bree+Serif" rel="stylesheet">
    <!--[if IE]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/js/jquery-2.2.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
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
          <div class="col-xs-12 col-sm-8 col-sm-offset-2">
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
              <?php if($layout_show_entrances) { ?>
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
                <a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('https://groups.google.com/forum/?fromgroups#!forum/maglaboratory'))), 'html5', 'UTF-8'); ?>>Forum / Mailing list</a>
              </li>
              <li>
                <a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/hal'))), 'html5', 'UTF-8'); ?>>HAL</a>
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
      <h1 class="text-center">ABOUT US</h1>
      <div class="col-xs-12 col-md-4">
        <h2 class="text-center">Who</h2>
        <p>
          We are a non-profit
          <a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('http://en.wikipedia.org/wiki/Hackerspace'))), 'html5', 'UTF-8'); ?>>hackerspace / makerspace</a>
          and collaborative workspace based in Pomona, CA.
        </p>
        <p>
          People come to our space to 
          <strong>work</strong>
          on projects,
          <strong>explore</strong>
          their inner artists,
          <strong>make</strong>
          cool gadgets, and
          <strong>interact</strong>
          with a community of like-minded individuals.
        </p>
        <p>
          We are makers, artists, DIYers, hobbyists, combat robot creators, ham radio amateurs, tech enthusiasts and...well...
          <strong>just normal people, doing stuff regular people do.</strong>
          (except MAG Cat, he has cat duties.)
        </p>
        <p>
          Join us and work on your projects here.
          <strong>Share it. Inspire others! Get inspired.</strong>
          They might share some tips and tricks or even be interested in joining your project. There's a lot of expertise in our members and many are happy to share their knowledge.
        </p>
        <p>
          And if you don't like us enough to join in holy makermony, you're still welcome visit anytime.
          <strong>Check the calendar, Facebook and Meetup page</strong>
          to see what MAGLab is doing.
        </p>
      </div>
      <div class="col-xs-12 col-md-4">
        <h2 class="text-center">What</h2>
        <p>
          We have 
          <strong>a wall full of general-purpose tools and supplies</strong>
          like screw drivers, tape measures, drills, hammers, saws, and much more
        </p>
        <p>
          The (partially) sound-insulated
          <strong>presentation room with AC,</strong>
          a projector and whiteboard services our meetings.
          <strong>The electronics room</strong>
          has a lazer cutter, 3d printers, variable power supplies, oscilloscopes, a logic analyzer, soldering iron and other electro-doodads.
        </p>
        <p>
          <strong>The workshop</strong>
          houses a mill, lathe, drill press, grinder, jig saw, forge and other destructive machines. If you're
          <strong>woodworking or metalworking,</strong>
          chances are we have a machine for your needs.
        </p>
        <p>
          And for a limited time, we have
          <strong>a large CNC machine.</strong>
        </p>
        <p>
          Oh almost forgot, we have
          <strong>a restroom with working toilet, and sink,</strong>
          and running water. (But please don't drink it.)
        </p>
      </div>
      <div class="col-xs-12 col-md-4">
        <h2 class="text-center">When</h2>
        <p>You're welcome to come and check us out! See the calendar for events and open hours.</p>
        <p>
          The space is open whenever a key member or officer is at the space.
          <strong>Our doors are always open Tuesday and Friday evenings</strong>
          for our business meetings and open project night respectively. There's a 
          <strong>public monthly Open House on the last Saturday</strong>
          of every month.
        </p>
        <p>
          To see if we're open right now, please check with our resident
          <strong>deliberately-not-very-sentient sensor system,</strong>
          codenamed
          <strong>
            <a <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'text-danger'), array('href', ('/hal'))), 'html5', 'UTF-8'); ?>>HAL.</a>
          </strong>
          <a <?php echo MtHaml\Runtime::renderAttributes(array(array('href', ('/hal'))), 'html5', 'UTF-8'); ?>>Click to see HAL.</a>
        </p>
        <p>
          If the date is not on the calendar, it's always safe (and advised) to 
          <strong>give us a call</strong>
          to check if--and for how long--the space will be open by the time you arrive.
        </p>
      </div>
    </div>
  </div>
</div>
<div id="google-calendar" class="containment">
  <iframe src="https://www.google.com/calendar/embed?src=bjpkvaeg1rjq9u3c6utecq1jos%40group.calendar.google.com&amp;amp;ctz=America/Los_Angeles" style="border: 0" width="100%" height="650" frameborder="0" scrolling="no"></iframe>
</div>
<?php include '_pricing.php'; ?>
<div id="join-newsletter" class="containment">
  <div class="container">
    <h1 class="text-center">Did you know?</h1>
    <h2 class="text-center">We have weekly newsletter that doesn't go out?</h2>
    <p class="text-center">
      Why doesn't it go out?
      <br>
      Well...because there's not a lot of people signed up...
      <br>
      Register now and we'll start planning updates for the newsletter
      <br>
      (once we have enough interested members)
    </p>
    <form class="form-horizontal" action="//maglaboratory.us12.list-manage.com/subscribe/post" method="post" target="_blank">
      <div class="form-group">
        <label <?php echo MtHaml\Runtime::renderAttributes(array(array('class', ('col-xs-4' . ' ' . 'control-label')), array('for', ('MERGE1'))), 'html5', 'UTF-8'); ?>>First Name (optional)</label>
        <div class="col-xs-8 col-md-4">
          <input <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'form-control'), array('type', ('text')), array('value', ('')), array('name', ('MERGE1')), array('placeholder', ('Berry'))), 'html5', 'UTF-8'); ?>>
        </div>
      </div>
      <div class="form-group">
        <label <?php echo MtHaml\Runtime::renderAttributes(array(array('class', ('col-xs-4' . ' ' . 'control-label')), array('for', ('MERGE2'))), 'html5', 'UTF-8'); ?>>Last Name (optional)</label>
        <div class="col-xs-8 col-md-4">
          <input <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'form-control'), array('type', ('text')), array('value', ('')), array('name', ('MERGE2')), array('placeholder', ('Cunning'))), 'html5', 'UTF-8'); ?>>
        </div>
      </div>
      <div class="form-group">
        <label <?php echo MtHaml\Runtime::renderAttributes(array(array('class', ('col-xs-4' . ' ' . 'control-label')), array('for', ('MERGE0'))), 'html5', 'UTF-8'); ?>>Email (required)</label>
        <div class="col-xs-8 col-md-4">
          <input <?php echo MtHaml\Runtime::renderAttributes(array(array('class', 'form-control'), array('type', ('email')), array('value', ('')), array('name', ('MERGE0')), array('placeholder', ('diy.workalot@example.com'))), 'html5', 'UTF-8'); ?>>
        </div>
      </div>
      <div class="form-group">
        <label <?php echo MtHaml\Runtime::renderAttributes(array(array('class', ('col-xs-4' . ' ' . 'control-label')), array('for', ('EMAILTYPE'))), 'html5', 'UTF-8'); ?>>Preferred Format</label>
        <div class="col-xs-8 col-md-4">
          <label class="radio-inline">
            <input <?php echo MtHaml\Runtime::renderAttributes(array(array('type', ('radio')), array('name', ('EMAILTYPE')), array('value', ('html'))), 'html5', 'UTF-8'); ?>>HTML</input>
          </label>
          <label class="radio-inline">
            <input <?php echo MtHaml\Runtime::renderAttributes(array(array('type', ('radio')), array('name', ('EMAILTYPE')), array('value', ('text'))), 'html5', 'UTF-8'); ?>>TEXT</input>
          </label>
        </div>
      </div>
      <div class="form-group">
        <div style="position: absolute; left: -5000px;" aria-hidden="true">
          <input type="text" name="b_c5f2672775054e0a1b3f98dac_4a9f6654cf" tabindex="-1" value="">
        </div>
        <div class="col-xs-8 col-md-4 col-xs-offset-4">
          <input <?php echo MtHaml\Runtime::renderAttributes(array(array('type', ('hidden')), array('name', ('u')), array('value', ('c5f2672775054e0a1b3f98dac'))), 'html5', 'UTF-8'); ?>>
          <input <?php echo MtHaml\Runtime::renderAttributes(array(array('type', ('hidden')), array('name', ('id')), array('value', ('4a9f6654cf'))), 'html5', 'UTF-8'); ?>>
          <input <?php echo MtHaml\Runtime::renderAttributes(array(array('class', ('btn' . ' ' . 'btn-primary')), array('type', ('submit')), array('value', ('Subscribe')), array('name', ('subscribe'))), 'html5', 'UTF-8'); ?>>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="footer" class="bg-maglab_map containment">
  <div <?php echo MtHaml\Runtime::renderAttributes(array(array('style', ('background-color: #fcd89e;'))), 'html5', 'UTF-8'); ?>>
    <div class="container">
      <div class="row">
        <span class="text-center">Copyright &copy; 2011-2016 Makers, Artists, and Gadgeteers Laboratory, Inc</span>
      </div>
    </div>
  </div>
</div>

    <?php if($layout_show_entrances) { ?>
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
