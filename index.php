<html>
<head>
  <title>Wedding Info</title>
<?php
$browser = get_browser(null, True);
if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) {
?>
  </head>
  <body>
    <h2>This site really only works in <a href="www.google.com/chrome">chrome</a></h2>
    <p>It's pretty cool, and we made it for you!</p>
    <p>If you'd prefer to RSVP over the phone, I would be happy to hear from you: 253-778-6061</p>
  </body>
</html>
<?php
  return;
}
echo($browser['browser']);
print_r($browser);
?>
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
    .btn {
      font-family: tool;
      text-decoration: none;
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
      /*background-color:#ff9080;*/
      background-color:#FDB6B8;
      /*background-color:#FFCCCC;*/
    }
    .green {
      /*background-color:#63f6a5;*/
      /*background-color:#A2F7E4;*.
      /*background-color:#40E0D0;*/
      background: url(GreenBackground.png) repeat;
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
    .HeartPic {
      width: 800px;
      height: 800px;
      background-image: url(heart3.png);
      margin: auto;
    }
    #BigHello {
      width: 900px;
      height: 480px;
      background-image: url(HelloSplash.png);
      margin: auto;
    }
    #Sun {
      top: -90px;
      height: 90px;
      width: 180px;
      border-radius: 180px 180px 0 0;
      -moz-border-radius: 180px 180px 0 0;
      -webkit-border-radius: 180px 180px 0 0;
      /*background-color:#ff7250;*/
      background-color:#F9AF63;
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
      width: 1024px;
      left: 105%;
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
    #nav a {
      width: 6em;
    }
    #RSVP {
      margin: auto;
    }
    #RSVP div {
      margin-left: auto;
      margin-right: auto;
    }
    #RSVP img {
      display: block;
      float: left;
    }
    #RSVP form {
      display: block;
      width: 18em;
      margin: auto;
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
    #Wedding_Party h3 {
      text-decoration: underline;
    }
    .Headshot {
      width: 256px;
      height: 256px;
      background: url(http://placehold.it/256x256);
      float: left;
      margin-right: 30px;
    }
    .couple {
      background: url(coupleHeadshot.png);
    }
    .bethany {
      background: url(bethany.png);
    }
    .becca {
      background: url(becca.png);
    }
    .bruce {
      background: url(Bruce.jpg);
    }
    .rachel {
      background: url(rachel.png);
    }
    .reuben {
      background: url(reuben.png);
    }
    .emma {
      background: url(Emma.png);
    }
    .mike {
      background: url(mike.png);
    }
    .dillon {
      background: url(dillon.png);
    }
    .momanddad {
      background: url(momanddad.png);
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
              $('input').each(function() {
                if ($(this).attr('name').indexOf('attending') == 0) {
                  $(this).prop('checked', data[$(this).attr('name')] == '1');
                } 
                else {
                  $(this).attr('value', data[$(this).attr('name')]);
                }
              });
              enterCode(data);
            }
          },
          "json"
        );
      });
      $("#code").focus();
      $("#nav a").click(function(event) {
        showPage($(this).attr("href").substring(1));
        event.preventDefault();
      });
      $("form").submit(function() {
        return false;
      });
      $("#saveData").click(function(event) {
        event.preventDefault();
        var form = $("#RSVPForm");
        var data = form.serialize();
        $.post(form.attr('action'), form.serialize());
        if ($("#attendingYes").attr('checked') == 'checked') {
          showPage("Coming");
        } else {
          showPage("NotComing");
        }
      });
      $("#attendingYes").change(function() {
        $("#attendingNo").prop('checked', !$(this).is(':checked'));
      });
      $("#attendingNo").change(function() {
        $("#attendingYes").prop('checked', !$(this).is(':checked'));
      });
    });
    function enterCode(data) {
      $(".startText").animate({
        left: '-75%'
      }, 2000, slideSun(data));
    }
    var firstSemaphore = false;
    function slideSun(data) {
      return function() {
        if (!firstSemaphore) {
          firstSemaphore = true;
          $("#sunContainer").animate({
            width: '100%'
          }, 1000, sunDown(data));
        }
      };
    }
    function sunDown(data) {
      return function() {
        $(".pink").css("overflow", "hidden");
        $("#sunContainer").css("position", "relative");
        $("#sunContainer").animate({
          top: '90px'
        }, 2000, moonRise(data));
      };
    }
    function moonRise(data) {
      return function() {
        $("#Moon").animate({
          top: '-280px'
        }, 2000, showName(data));
      }
    }
    function showName(data) {
      return function() {
        $("#nameHere").html(data['name'] + ',');
        $(".nameText").removeClass('hide');
        $(".nameText").animate({
          left: '100%'
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
          <p class="nameText bigfont centered hide" style="z-index: 10">DEAR <span id="nameHere" class="illuminate"></span></p>
        </div>
        <p class="centered bigfont" style="margin-bottom: 0.5em"><em><span class="illuminate">Jessica Grace Horton-barker</span></em></p>
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
<div class="holder">
  <div style="width: 75%" class="startText">
    <div class="centered hide" id="content">
      <div id="pageContent">

        <div id="RSVP" class="hide">
          <div>
            <form action="/update.php" method="POST" id="RSVPForm">
              <p style="display: block" class="centered">WILL YOU BE ABLE TO ATTEND:</p>
              <p style="display: block" class="centered">
                <label>YES <input type="checkbox" name="attendingYes" value="checked" id="attendingYes" /></label>
                <label>NO <input type="checkbox" name="attendingNo" value="checked" id="attendingNo"/></label>
              </p>
              <div class="clear" style="margin: 10px"></div>
              <label class="justified">ADULTS IN YOUR PARTY: <input type="number" name="adults" value="1" min="1" max="5" /></label>
              <label class="justified">CHILDREN IN YOUR PARTY: <input type="number" name="children" value="0" min="0" max="5" /></label>
              <label class="justified">YOUR EMAIL: <input type="email" name="email" /></label>
              <input type="hidden" name="code" />
              <div class="clear" style="margin: 10px"></div>
              <input id="saveData" type="submit" name="submit" value="Save" class="btn btn-block btn-success" style="font-size: 26pt" />
            </form>
          </div>
        </div>

        <div id="Welcome" class="hide">
          <p>&nbsp;&nbsp;&nbsp;&nbsp;WE WOULD BE DELIGHTED TO HAVE YOU AT OUR WEDDING CEREMONY, DINNER, AND RECEPTION ON THE BEACH.  WE ARE EXCITED TO CELEBRATE OUR BIG DAY WITH EVERYONE!</p>
          <p>&nbsp;&nbsp;&nbsp;&nbsp;IN THESE PAGES YOU WILL LEARN MORE DETAILS ABOUT OUR WEDDING.  IF YOU'RE TRAVELING FROM OUT OF STATE THERE ARE RESOURCES FOR YOU - FROM WHERE TO SLEEP TO WHAT TO DO WHEN YOU GET HERE.  PLEASE LET US KNOW HOW MANY PEOPLE WE CAN EXPECT IN YOUR PARTY<span id="parentheticalInstruction"></span>.</p>
          <div>
            <img src="welcomepic.png" alt="The happy couple" />
            <div class="clear"></div>
          </div>
        </div>

        <div id="Coming" class="hide">
          <h2>YAY!  WE'LL SEE YOU IN SEPTEMBER!</h2>
          <p>NOW THAT WE'VE GOT YOUR RSVP, TAKE A LOOK AT THAT HEART-SHAPED PIECE OF PINK PAPER WITH YOUR CODE ON IT.  IT IS SEED PAPER, MADE BY JESSICA.  FOLLOW THESE DIRECTIONS:</p>
          <ol>
            <li>WRITE DOWN YOUR CODE AND THE WEBSITE, IN CASE YOU NEED TO CHANGE YOUR RSVP</li>
            <li>RIP THE SEED PAPER INTO PIECES</li>
            <li>PLANT THE PIECES UNDER &frac12; AN INCH OF SOIL</li>
            <li>WATER OCCASIONALLY</li>
          </ol>
          <p>TO GROW CAlIFORNIA NATIVE WILDFLOWERS!</p>
          <div class="HeartPic"></div>
        </div>

        <div id="NotComing" class="hide">
          <h2>SORRY TO HEAR YOU CAN'T MAKE IT</h2>
          <p>NOW THAT WE'VE GOT YOUR RSVP, TAKE A LOOK AT THAT HEART-SHAPED PIECE OF PINK PAPER WITH YOUR CODE ON IT.  IT IS SEED PAPER, MADE BY JESSICA.  FOLLOW THESE DIRECTIONS:</p>
          <ol>
            <li>WRITE DOWN YOUR CODE AND THE WEBSITE, IN CASE YOU NEED TO CHANGE YOUR RSVP</li>
            <li>RIP THE SEED PAPER INTO PIECES</li>
            <li>PLANT THE PIECES UNDER &frac12; AN INCH OF SOIL</li>
            <li>WATER OCCASIONALLY</li>
          </ol>
          <p>TO GROW CAlIFORNIA NATIVE WILDFLOWERS!</p>
          <div class="HeartPic"></div>
        </div>

        <div id="Getting_There" class="hide">
          <p>WE'VE PROVIDED SOME LINKS BELLOW TO HELP YOU ROUTE YOUR TRIP</p>
          <br />
          <p style="margin-top: 20px">LOCAL AIRPORT WITH UNITED AND U.S. AIRWAYS: <a class="btn" href="http://sloairport.com/airlines.html" target="_blank">SLO Airport</a></p>
          <br />
          <p>FREE PARKING AT PARKING LOT AT THE END OF W. GRAND AVENUE IN GROVER BEACH,CA.</p>
          <br />
          <p>FOR $5 YOU CAN DRIVE YOUR CAR ONTO THE BEACH AND PARK IT NEAR THE CEREMONY.</p>
          <br />
          <p>PUBlIC TRANSPORTATION, PLAN YOUR TRIP:  <a class="btn" href="http://www.slorta.org/" target="_blank">Here</a></p>
          <br />
          <p>AMTRAK IN GROVER BEACH, CA IS RIGHT ACROSS THE STREET FROM THE BEACH. <a class="btn" href="http://www.amtrak.com/servlet/ContentServer?pagename=am%2Fam2Station%2FStation_Page&code=GVB" target="_blank">Amtrak link</a></p>
          <div class="clear" style="margin-top: 30px"></div>
          <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=&amp;daddr=35.12219,-120.634239&amp;hl=en&amp;geocode=&amp;sll=35.122159,-120.632951&amp;sspn=0.003668,0.008256&amp;mra=mift&amp;mrsp=1&amp;sz=18&amp;ie=UTF8&amp;t=m&amp;ll=35.124796,-120.64044&amp;spn=0.005265,0.012864&amp;z=17&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=d&amp;source=embed&amp;saddr=&amp;daddr=35.12219,-120.634239&amp;hl=en&amp;geocode=&amp;sll=35.122159,-120.632951&amp;sspn=0.003668,0.008256&amp;mra=mift&amp;mrsp=1&amp;sz=18&amp;ie=UTF8&amp;t=m&amp;ll=35.124796,-120.64044&amp;spn=0.005265,0.012864&amp;z=17" style="color:#0000FF;text-align:left">View Larger Map</a></small>
        </div>

        <div id="Accommodations" class="hide">
          <p>THERE ARE MANY DIFFERENT OPTIONS FOR LODGING IN THE AREA, HERE IS A BIT ABOUT THEM</p>
          <br />
          <h3>CAMPGROUNDS</h3><p>NORTH BEACH CAMPGROUNDS IS THE ONE NEAREST TO OUR SITE.  IT IS VERY NICE AND YOU CAN WALK OVER THE DUNES TO THE BEACH.   SVRA IS FOR CARS AND RVS CAMPING DIRECTLY ON THE BEACH (NO BATHROOM, RUNNING WATER, ETC).  RESERVE YOUR CAMPGROUND EARLY BEFORE THEY GET BOOKED, THIS CAMPGROUND IS VERY POPULAR IN SEPTEMBER! <a class="btn" href="http://www.reserveamerica.com/camping/Pismo_Sb/r/campgroundBookingWindow.do?contractCode=CA&parkId=120070" target="_blank">Book Here</a></p>
          <br />
          <h3>HOTELS</h3><p>THERE ARE MANY HOTELS IN THE AREA.  IN PISMO BEACH SEAVENTURE IS VERY NICE PLACE OR EDGEWATER IS CLOSER TO DOWNTOWN.  SAN LUIS OBISPO IS ALSO A VERY NICE TO STAY AND HAS A MORE VIBRANT DOWNTOWN IF THATS WHAT YOU'RE MORE INTERESTED IN.</p>
          <br />
          <h3>VACATION HOMES</h3><p> FlIPKEY.COM AND VRBO.COM HAVE A LOT OF LISTINGS FOR VACATION HOMES IN PISMO BEACH AND GROVER BEACH.  THIS MAY BE MORE ECONOMICAL IF YOU'D LIKE TO STAY IN A GROUP OF 10+ PEOPLE.</p>
        </div>

        <div id="Event" class="hide">
          <p>HERE ARE THE DETAILS ABOUT OUR EVENT<p>
          <br />
          <p><b>WHEN</b>: 5PM ON SEPTEMBER 7TH, 2013</p>
          <br />
          <p><b>WHERE</b>: CEREMONY AND RECEPTION TO BE HELD AT THE W. GRAND AVENUE ENTRANCE TO THE OCEANO DUNES STATE PARK.</p>
          <br />
          <p>YES, IT'S ON A BEACH!</p>
          <br />
          <p>BECAUSE WE'RE ON THE BEACH THE EVENT ATTIRE IS DRESSY CASUAL.  A TEA LENGTH DRESS OR A NICE SHIRT AND SLACKS WOULD BE FINE.  THE WEATHER CAN BE QUITE CHANGEABLE ON THE COAST, WE SUGGEST LAYERED CLOTHING.  HOWEVER, IT'S USUALLY WARM IN SEPTEMBER AND WE OFTEN GET AN INDIAN SUMMER THEN, SO IT MAY BE VERY HOT.</p>
          <br />
          <h2>SCHEDULE OF EVENTS</h2>
          <p>5:00 PM GAMES</p>
          <br />
          <p>6:00 WINE & HORS D'OEUVRES</p>
          <br />
          <p>7:15 CEREMONY</p>
          <br />
          <p>7:30 DINNER</p>
          <br />
          <p>9:00 CAKE AND CHAMPAGNE</p>
          <br />
          <p>10:00 BEACH CLOSES</p>
          <br />
          <div id="menu">
            <h2>MENU</h2>
            <ul>
              <li>APPETIZERS
                <ul>
                  <li>GOURMET CHEESE AND FRUIT PLATTER WITH MULTI-GRAIN CRACKERS</li>
                  <li>BRUSCHETTA - SUN-DRIED TOMATOES, MARINATED ARTICHOKES AND MELTED MOZZARELLA ATOP A CRUNCHY CROSTINI</li>
                  <li>GRILLED PESTO PRAWNS</li>
                  <li>TUNA TARTAR - SUSHI GRADE AHI TUNA WITH CAPERS, OLIVE OIL, SESAME SEEDS SERVED ON A FRESH WON TON CRISP</li>
                </ul>
              </li>
              <li>ENTR&eacute;E
                <ul>
                  <li>SANTA MARIA STYLE BBQ TRI-TIP W/ PEPPERCORN SAUCE</li>
                  <li>LEMON HERB SALMON W/CAPER DILL SAUCE</li>
                </ul>
              </li>
              <li>SIDES
                <ul>
                  <li>ASSORTED MIXED ITALIAN GRILLED VEGETABLES</li>
                  <li>GARLIC WHIPPED POTATOES</li>
                  <li>PEAR GORGONZOLA SALAD, WALNUTS, AGED GORGONZOLA, THINLY SLICED PEARS, WITH HOUSE VINAIGRETTE</li>
                  <li>GARLIC BREAD</li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <div id="Wedding_Party" class="hide">
          <p>WE INTRODUCE TO YOU, THE WEDDING PARTY!</p>
          <br />

          <h3>JESSICA AND ISAAC</h3>
          <div class="couple Headshot"></div>
          <p>WHEN WE FIRST MET ISAAC WAS A SOFTWARE ENGINEER MAKING VIDEO GAMES IN SAN FRANCISCO AND JESSICA WAS STUDYING ARCHITECTURE IN BERKELEY.  OUR FIRST DATE WAS IN ROCKRIDGE (DURING THE GIANT'S PURSUIT OF THE WORLD SERIES) AND WE WERE INSTANTLY SMITTEN.  FOR A YEAR WE MADE THE TREK BACK AND FORTH ACROSS THE BAY FOR EACH OTHER. IN SF WE WOULD GO TO GHIRADELLI SQUARE, ACROSS THE STREET FROM ISAAC'S STUDIO, AND HANG OUT WITH HIS AWESOME CO-WORKERS AT LOLAPPS.  SOMETIMES WE WOULD JUST WALK AROUND THE CITY ALL DAY EXPLORING.  EVENTUALLY WE COULD STAND NO MORE TIME APART AND WE GOT OUR OWN PLACE IN BERKELEY.  COCONUT, OUR CAT, WAS PLEASED.  SINCE THEN A LOT HAS CHANGED.  ISAAC MOVED ON TO A BIGGER VIDEO GAME COMPANY.  HOWEVER, WHEN JESSICA WAS ACCEPTED TO ALL THREE OF THE COLLEGES SHE APPLIED TO WE FACED A DECISION: WHETHER WE SHOULD MOVE OR NOT.  TOGETHER, WE DECIDED TO PURSUE OUR DREAMS IN SAN LUIS OBISPO AND THE REST IS HISTORY!</p>
          <div class="clear"></div>

          <h3>BETHANY REYNOLDS, MAID OF HONOR</h3>
          <div class="bethany Headshot"></div>
          <p>BETHANY AND JESSICA MET AT THE AGE OF 3 AND 2, RESPECTIVELY, AT THE LOCAL PLAYGROUND IN POINT RICHMOND, CA.  THEY BONDED OVER A SHARED PENCHANT FOR THE SWINGS AND BUNNY RABBITS.  THE TIMES WERE GOOD AND THE JUICE BOXES NEVER SEEMED TO RUN OUT, WHICH MAY HAVE BEEN WHY DAD REFERRED TO THEM AS "LITTLE SQUIRRELS."  THEY GREW UP TOGETHER GOING TO THE BEACH AND SINGING IN THE CHILDREN'S CHOIR AT THE PT. RICHMOND METHODIST CHURCH.  THEY EVEN DECLARED EACH OTHER SISTERS.  THEIR STORY TOOK A PAUSE WHEN JESSICA MOVED TO LAFAYETTE,CA AT THE AGE OF 14... AND NEITHER OF THEM COULD DRIVE YET.  BETHANY WENT ON TO GET A DEGREE IN ENTOMOLOGY (ASK HER ABOUT BEES!)  AND HAS THE SKILL OF BEING ABLE TO KNIT A BEAUTIFUL WEDDING DRESS FOR HER BEST FRIEND!</p>
          <div class="clear"></div>
          
          <h3>DILLON, BEST MAN</h3>
          <div class="dillon Headshot"></div>
          <p>DILLON AND ISAAC MET WHEN THEY BOTH ATTENDED FREE STATE DURING WHENEVER THAT HAPPENED.  BACK THEN, NEITHER ONE COULD PROGRAM THEIR WAY OUT OF A WET PAPER BAG, BUT LOOK AT THEM NOW!  BOTH ENTIERLY ENCASED IN DRY PAPER BAGS, BECAUSE PROGRAMMING BARELY REQUIRES ANY MOVEMENT.  ONE TIME, DILLON BOUGHT MY ENTIRE MAGIC CARD COLLECTION FOR 80 BUCKS.  DILLON AND I STAYED IN CONTACT WHEN WE WENT OFF TO COLLEGE, AND WE STILL HANG OUT WHENEVER WE'RE BOTH IN THE SAME ZIP CODE.</p>
          <div class="clear"></div>
          
          <h3>BECCA SHAMBAUGH, BRIDESMAID</h3>
          <div class="becca Headshot"></div>
          <p>BECCA AND JESSICA 'WENT UP THE LINE TOGETHER'.  THAT IS, THEY BOTH  TOOK ON LEADERSHIP ROLES AT THE SAME TIME IN THE YOUTH GROUP JOB'S DAUGHTERS.  EVENTS INCLUDED STAGING A 'KIDNAP BREAKFAST', WAKING UP THE UNSUSPECTING VICTIM, ANOTHER GIRL IN THEIR CHAPTER, AT THE CRACK OF 8 OR 9 AM ON A SATURDAY MORNING AND WHISKING THEM OFF TO A LOCAL PURVEYOR OF PANCAKES.  BECCA AND JESSICA ALWAYS COMPETED IN THE ART COMPETITIONS AT THE ANNUAL JOB'S DAUGHTERS CONVENTION.  BECCA WON AWARDS FOR THE BEAUTIFUL DRESSES SHE WOULD SEW AND JESSICA FOR HER PAINTINGS AND PRINTS. AFTER HIGH SCHOOL BECCA WENT ON THE GET A NURSING DEGREE AND LIVES A COUPLE HOURS AWAY FROM JESSICA.</p>
          <div class="clear"></div>

          <h3>MIKE O'MALLEY, GROOMSMAN</h3>
          <div class="mike Headshot"></div>
          <p>MIKE AND I ONCE FORMED THE CORE OF A GROUP OF NEIGHBORHOOD RAGAMUFFINS KNOWN BY ALL AS: THE NEIGHBORHOOD KIDS.  THE GROUP SPLINTERED AS ALL CHILDRENS GROUPS MUST: SOME MOVED AWAY, SOME WERE DISCOVERED TO HAVE BEEN GIRLS ALL ALONG, BUT MIKE AND I WERE ALWAYS FRIENDS.  WE USED TO SPEND HOURS OUTSIDE FLYING PAPER AIRPLANES OR SHOOTING SQUIRT GUNS AT EACH OTHER.  THERE WERE SOME DISTANT PERIODS, LIKE WHEN MIKE WENT TO IRELAND, OR THAT ONE TIME I HIT HIM WITH A STICK (MY BAD) BUT WE STILL PLAY VIDEO GAMES TOGETHER.</p>
          <div class="clear"></div>

          <h3>RACHEL MCCARTHY JAMES, BRIDESMAID</h3>
          <div class="rachel Headshot"></div>
          <p>JESSICA MET RACHEL, ISAAC'S SISTER, AT HER WEDDING IN 2011 IN VIRGINIA.  THEY HAVEN'T KNOWN EACH OTHER FOR LONG, BUT RACHEL'S FRIENDLY AND OPEN MINDED DEMEANOR HAS MADE JESSICA FEEL RIGHT AT HOME.  RACHEL IS A WRITER WHO ALSO LOVES TO PLAY SETTLERS OF CATAN (THAT'S WHAT WE GOT HER FOR CHRISTMAS).</p>
          <div class="clear"></div>
         
          <h3>REUBEN JAMES, GROOMSMAN, BROTHER</h3>
          <div class="reuben Headshot"></div>
          <p>REUBEN IS ISAAC'S LITTLE BROTHER.  THEY SHARED THE MANY ADVENTURES OF THEIR OVERLAPPING YOUTHS.  REUBEN IS ALL GROWN UP SINCE THEN, BUT THE BOND THEY SHARE REMAINS STRONG.  REUBEN RECENTLY STARTED ATTENDING KU.  DESPITE THEIR BUSY LIVES AND THE DISTANCE BETWEEN THEM, THEY STILL FIND TIME TO PLAY VIDEO GAMES REGULARLY.  AS A PAIR, THEY HAVE SPENT INCALCULABLE HOURS PRETENDING TO BE SOLDIERS OR AIRPLANE PILOTS.</p>
          <div class="clear"></div>

          <h3>EMMA METZLER, FLOWER GIRL</h3>
          <div class="emma Headshot"></div>
          <p>EMMA LIVES IN VERMONT WITH HER MOMMY AND DADDY (CHRIS AND MEGHAN METZLER).  SHE ENJOYS PRINCESSES AND PRINCESS THEMED ACCESSORIES.  AWW!  ISN'T SHE CUTE!</p>
          <div class="clear"></div>

          <h3>BRUCE HORTON, FATHER OF THE BRIDE</h3>
          <div class="bruce Headshot"></div>
          <p>BRUCE GREW UP IN LAFAYETTE, CA AND STILL LIVES IN THE BAY AREA.  AFTER GETTING HIS MASTERS DEGREE IN FINE ART FROM CAL HE OPENED UP AN ART GALLERY AND ARTIST LIVE/WORK SPACE.  THIS IS WHERE JESSICA GREW UP AND LIVED THERE UNTIL SHE WAS 14 YEARS OLD.  HE IS NOW A TEACHER AND CREATES ART IN HIS SPARE TIME.  THE FAMILY CAT, COCONUT, MAKES REGULAR TRIPS UP FROM SAN LUIS OBISPO TO VISIT HIM.</p>
          <div class="clear"></div>

          <h3>SUSAN AND BILL, PARENTS OF THE GROOM</h3>
          <div class="momanddad Headshot"></div>
          <p>SUSAN AND BILL MET AT THE OLD STOAKLY PORK AND BEANS FACTORY.  THEY HAVE HAD A LONG AND LOVING MARRIAGE; AN INSPIRATION FOR JESSICA AND ISAAC.  BILL IS A FAMEISH AUTHOR, FOCUSING ON BASEBALL AND RECENTLY TRUE CRIME.  SUSAN IS AN ACCOMPLISHED ARTIST IN MANY MEDIA TYPES AND AN ACADEMIC.  THEY PROVIDED LOVELY HOME ENVIRONMENTS IN LAWRENCE, KS AND BOSTON, MA.  THEY'VE TAKEN MANY INTERESTING TRIPS.  THEY ALSO HELPED A LOT IN MAKING THIS WEDDING HAPPEN.  THANKS GUYS!</p>
          <div class="clear"></div>
        </div>

      </div>
      <div id="nav">
        <ul>
          <li><a class="btn btn-large" href="#Welcome">Welcome</a></li>
          <li><a class="btn btn-large" href="#RSVP">RSVP</a></li>
          <li><a class="btn btn-large" href="#Event">Event</a></li>
          <li><a class="btn btn-large" href="#Getting_There">Getting There</a></li>
          <li><a class="btn btn-large" href="#Accommodations">Lodging</a></li>
          <li><a class="btn btn-large" href="#Wedding_Party">Wedding Party</a></li>
        </ul>
      </div>
      <div class-"clear"></div>
    </div>
    <p class="centered smallfont" style="position: relative; top: -0.5em">to</p>
    <p class="centered" ><em class="bigfont"><span class="illuminate">Isaac Lincoln McCarthy James</span></em></p>
    <div class="centered smallfont" style="margin-top: 20px"><label for="code">ENTER THE CODE FROM YOUR INVITATION:</label>&nbsp;&nbsp;<form id="query" action="query.php" method="GET" autocomplete="off"><input id="code" name="code" style="font-size: 16pt"></form></div>
    <div class="centered" id="BigHello"></div>
  </div>
  <div class-"clear"></div>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39669967-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
