<html>
<head>
  <title>Wedding Info</title>
  <link rel="stylesheet" href="buttons.css" />
  <style>
    @font-face {
      font-family: tool;
      src: url("/CARIB___.otf") format("opentype");
    }
    @font-face {
      font-family: virginia;
      src: url("/Virginia.ttf") format("truetype");
    }
    html, body, div, p, input {
      font-family: virginia;
      font-size: 24pt;
      margin: 0px;
      padding: 0px;
    }
    .illuminate {
      font-family: tool;
    }
    .bigfont {
      font-size: 38pt;
    }
    .smallfont {
      font-size: 16pt;
    }
    .pink {
      background-color:#ff9080;
    }
    .green {
      background-color:#63f6a5;
    }
    div {
      width: 100%;
      margin: 0px;
      border: 0px;
    }
    .clear {
      clear: both;
    }
    .centered {
      text-align: center;
    }
    #Sun {
      top: -90px;
      height: 90px;
      width: 180px;
      border-radius: 180px 180px 0 0;
      -moz-border-radius: 180px 180px 0 0;
      -webkit-border-radius: 180px 180px 0 0;
      background-color:#ff7250;
    }
    #Moon {
      top: 0em;
      height: 250px;
      width: 250px;
      border-radius: 250px 250px 250px 250px;
      -moz-border-radius: 250px 250px 250px 250px;
      -webkit-border-radius: 250px 250px 250px 250px;
      background-color:#f8d5a5;
    }
    .startText {
      position: relative;
    }
    .nameText {
      position: relative;
    }
    .hide {
      display: none;
    }
    .skyContainer {
      float: right;
      width: 25%;
      height: 0px;
      overflow: visible !important;
    }
    .celestial {
      margin: 0px auto;
      position: relative;
    }
    #content {
      font-size: 24pt;
      position: absolute;
      left: -25%;
      top: 0px;
      width: 110%;
      left: 110%;
      margin-top: 20px;
    }
    #pageContent {
      float: left;
      width: 80%;
      border: 0px;
      margin: 0px;
      padding: 0px;
      margin-bottom: 20px;
      text-align: left;
    }
    #nav {
      float: left;
      width: 20%;
      border: 0px;
      margin: 0px;
      padding: 0px;
    }
    #RSVP div {
      margin-top: 30px;
      margin-left: auto;
      margin-right: auto;
    }
    #RSVP img {
      display: block;
      float: left;
    }
    #RSVP form {
      width: 17em;
      display: block;
      float: left;
      margin-left: 20px;
    }
    #RSVP .justified {
      display: block;
      float: right;
      clear: both;
    }
    #RSVP .justified input {
      font-size: 24pt;
      width: 8em;
    }
    #RSVP .btn {
      height: 40px;
      margin-top: 20px;
    }
    #nav ul {
      list-style-type: none;
    }
    #nav li {
      display: block;
      margin-bottom: 10px;
    }
  </style>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#code").bind("propertychange keyup input paste", function() {
        if ($(this).val() == $(this).data()) {
          return false;
        }
        $(this).data($(this).val());
        var frm = $("#query");
        $.get(
          frm.attr("action") + "?" + frm.serialize(),
          "",
          function(data, stat) {
            if (data['name'] != null) {
              enterCode(data);
            }
          },
          "json"
        );
      });
      $("#code").focus();
      $("#nav a").click(function() {
        showPage($(this).attr("href").substring(1));
        return false;
      });
    });
    function enterCode(data) {
      $(".startText").animate({
        left: '-75%',
      }, 2000, slideSun(data));
    }
    var firstSemaphore = false;
    function slideSun(data) {
      return function() {
        if (!firstSemaphore) {
          firstSemaphore = true;
          $("#sunContainer").animate({
            width: '100%',
          }, 1000, sunDown(data));
        }
      };
    }
    function sunDown(data) {
      return function() {
        $(".pink").css("overflow", "hidden");
        $("#sunContainer").css("position", "relative");
        $("#sunContainer").animate({
          top: '90px',
        }, 2000, moonRise(data));
      };
    }
    function moonRise(data) {
      return function() {
        $("#Moon").animate({
          top: '-280px',
        }, 2000, showName(data));
      }
    }
    function showName(data) {
      return function() {
        $("#nameHere").html(data['name']);
        $(".nameText").removeClass('hide');
        $(".nameText").animate({
          left: '85%',
        }, 2000, function() {showPage("RSVP");});
      }
    }
    var semaphoreTwo = false;
    function showPage(id) {
      if (semaphoreTwo) {
        return;
      }
      semaphoreTwo = true;
      function fadeInNewContent() {
        content = $("#" + id);
        content.fadeIn(400, function() {
          semaphoreTwo = false;
        });
      }
      existing = $("#pageContent > :not(:hidden)");
      if (existing.length) {
        existing.fadeOut(400, function() {
          existing.addClass("hide");
          fadeInNewContent();
        });
      }
      else {
        $("#content").removeClass("hide");
        fadeInNewContent();
      }
    }
  </script>
</head>
<body class="green">
<div class="pink holder" style="overflow: hidden">
  <div style="width: 75%; float: left" class="startText">
    <div style="width: 40%">
      <p class="centered bigfont" style="padding-top: 20px; margin-bottom: 20px">WEDDING</p>
      <p class="centered smallfont" style="margin-bottom: 10px">OF</p>
    </div>
    <div>
      <div style="position: relative">
        <div style="position: absolute; left: 0px; top: 0px; width: 100%">
          <p class="nameText bigfont centered hide" style="z-index: 10">DEAR <span id="nameHere" class="illuminate"></span>,</p>
        </div>
        <p class="centered bigfont" style="margin-bottom: 0.5em"><span class="illuminate">Jessica Grace Horton-barker</span></p>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div id="sunContainer" class="skyContainer">
    <div style="margin: 0px auto; position: relative; top: -90px" id="Sun">
    </div>
  </div>
  <div id="moonContainer" class="skyContainer" style="float: left">
    <div style="margin: 0px auto; position: relative" id="Moon">
    </div>
  </div>
</div>
<div class="green holder">
  <div style="width: 75%" class="startText">
    <div class="centered hide" id="content">
      <div id="pageContent">

        <div id="RSVP" class="hide">
          <p>WE WOULD BE DELIGHTED TO HAVE YOU AT OUR WEDDING CEREMONY, DINNER, AND RECEPTION ON THE BEACH.  WE ARE EXCITED TO CELEBRATE OUR BIG DAY WITH EVERYONE THAT MATTERS TO US!  IN THESE PAGES YOU MIGHT LEARN A LITTLE MORE ABOUT US AS A COUPLE AND SOME MORE DETAILS ABOUT OUR WEDDING.  IF YOU'RE TRAVELING FROM OUT OF STATE THERE ARE RESOURCES FOR YOU - FROM WHERE TO SLEEP TO WHAT TO DO WHEN YOU GET HERE.  PLEASE LET US KNOW HOW MANY PEOPLE WE CAN EXPECT IN YOUR PARTY<span id="parentheticalInstruction"></span>.</p>
          <div>
            <img src="http://placehold.it/500x300" alt="The happy couple" />
            <form action="/update.php" method="POST">
              <label style="display: block" class="centered">ARE YOU COMING: <input type="checkbox" name="attending" value="checked" /></label>
              <p class="centered">(CHECKED: YES, UNCHECKED: NO)</p>
              <div class="clear" style="margin: 10px"></div>
              <label class="justified">HOW MANY ADULTS: <input type="number" name="adults" value="1" min="1" max="5" /></label>
              <label class="justified">HOW MANY CHILDREN: <input type="number" name="children" value="0" min="0" max="5" /></label>
              <label class="justified">YOUR EMAIL: <input type="email" name="email" /></label>
              <div class="clear" style="margin: 10px"></div>
              <input type="submit" value="Save" class="btn btn-block btn-success" style="font-size: 26pt" />
            </form>
            <div class="clear"></div>
          </div>
        </div>

        <div id="Getting_There" class="hide">
          <iframe width="1200" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=&amp;daddr=35.12219,-120.634239&amp;hl=en&amp;geocode=&amp;sll=35.122159,-120.632951&amp;sspn=0.003668,0.008256&amp;mra=mift&amp;mrsp=1&amp;sz=18&amp;ie=UTF8&amp;t=m&amp;ll=35.124796,-120.64044&amp;spn=0.005265,0.012864&amp;z=17&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=d&amp;source=embed&amp;saddr=&amp;daddr=35.12219,-120.634239&amp;hl=en&amp;geocode=&amp;sll=35.122159,-120.632951&amp;sspn=0.003668,0.008256&amp;mra=mift&amp;mrsp=1&amp;sz=18&amp;ie=UTF8&amp;t=m&amp;ll=35.124796,-120.64044&amp;spn=0.005265,0.012864&amp;z=17" style="color:#0000FF;text-align:left">View Larger Map</a></small>

          <p style="margin-top: 20px">LOCAL AIRPORT WITH UNITED AND U.S. AIRWAYS: <a href="http://sloairport.com/airlines.html">http://sloairport.com/airlines.html</a>

          <p>FREE PARKING AT PARKING LOT AT THE END OF W. GRAND AVENUE IN GROVER BEACH,CA.
          FOR $5 YOU CAN DRIVE YOUR CAR ONTO THE BEACH AND PARK IT NEAR THE CEREMONY.
          PUBLIC TRANSPORTATION, PLAN YOUR TRIP AT:  <a href="http://www.slorta.org/">http://www.slorta.org/</a></p>
        </div>

        <div id="Accommodations" class="hide">
          <p>Campgrounds: North Beach campgrounds is the one nearest to our site.  It.s very nice and you can walk over the dunes to the beach.   SVRA is for cars and Rvs camping directly on the beach (no bathroom, running water, etc).  Reserve your campground early before they get booked, this campground is very popular in September! http://www.reserveamerica.com/camping/Pismo_Sb/r/campgroundBookingWindow.do?contractCode=CA&parkId=120070
          
          Hotels: there are many hotels in the area, Seaventure and edge water and in downtown Pismo Beach.  There are some that are more inland, near the freeway, but you may enjoy being downtown near the restaurants more.  
          
          Vacation homes:  flipkey.com and vrbo.com have a lot of listings for vacation homes in Pismo beach and Grover beach.  This may be more economical if you.d like to stay in a group of 10+ people.</p>
        </div>

        <div id="Event" class="hide">
          <p>4pm on September 7th, 2013
          
          Ceremony and Reception to be held at the W. Grand Avenue entrance to the Oceano Dunes State Park.  
          
          Yes, it.s on a beach!  
          
          Dress code is semi-formal.  See the photo below if you need some ideas.  The weather is typically warm this time of year.  We usually get an indian summer around mid to late September for be prepared for hot weather.  Of course be prepared for windy weather too.  We.ll know what to expect closer to the event.</p>
        </div>

        <div id="Wedding_Party" class="hide">
          <p>About wedding party:
          
          bios:
          
          Jessica
          
          Isaac
          
          Bethany
          
          Dillon
          
          Rebecca
          
          Mike
          
          Rachel
          
          Ruben
          
          Caitlyn
          
          Bruce
          
          Brad
          
          Susan & Bill
          
          Officiant- Dana Jones</p>
        </div>

      </div>
      <div id="nav">
        <ul>
          <li><a class="btn btn-large" href="#RSVP">RSVP</a></li>
          <li><a class="btn btn-large" href="#Getting_There">Getting There</a></li>
          <li><a class="btn btn-large" href="#Accommodations">Accommodations</a></li>
          <li><a class="btn btn-large" href="#Event">Event</a></li>
          <li><a class="btn btn-large" href="#Wedding_Party">Wedding Party</a></li>
        </ul>
      </div>
      <div class-"clear"></div>
    </div>
    <p class="centered smallfont" style="position: relative; top: -0.5em">to</p>
    <p class="centered" ><em class="bigfont"><span class="illuminate">Isaac Lincoln McCarthy James</span></em></p>
  </div>
  <div class="centered smallfont startText" style="margin-top: 20px"><label for="code">ENTER THE CODE FROM YOUR INVITATION:</label>&nbsp;&nbsp;<form id="query" action="query.php" method="GET" autocomplete="off"><input id="code" name="code" style="font-size: 16pt"></form></div>
  <div class-"clear"></div>
</div>
</body>
</html>
