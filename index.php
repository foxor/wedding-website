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
      font-size: 35pt;
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
      height: 4.6em;
      width: 4.6em;
      border-radius: 4.6em 4.6em 4.6em 4.6em;
      -moz-border-radius: 4.6em 4.6em 4.6em 4.6em;
      -webkit-border-radius: 4.6em 4.6em 4.6em 4.6em;
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
    #pageContent {
      position: absolute;
      left: -25%;
      top: 0px;
      width: 110%;
      left: 110%;
      margin-top: 20px;
    }
    #RSVPForm div {
      margin-top: 30px;
      margin-left: auto;
      margin-right: auto;
    }
    #RSVPForm img {
      display: block;
      float: left;
    }
    #RSVPForm form {
      width: 15em;
      display: block;
      float: left;
      margin-left: 20px;
    }
    #RSVPForm .justified {
      display: block;
      float: right;
      clear: both;
    }
    #RSVPForm .justified input {
      width: 8em;
    }
    #RSVPForm .btn {
      height: 40px;
      margin-top: 20px;
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
          top: '-4.6em',
        }, 2000, showName(data));
      }
    }
    function showName(data) {
      return function() {
        $("#nameHere").html(data['name']);
        $(".nameText").removeClass('hide');
        $(".nameText").animate({
          left: '85%',
        }, 2000, function() {showPage("RSVPForm");});
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
        //content.css({ opacity: 0 });
        //content.removeClass("hide");
        content.fadeIn(2000, function() {
          semaphoreTwo = true;
        });
      }
      existing = $("#pageContent > :not(:hidden)");
      if (existing.length) {
        existing.fadeOut(2000, function() {
          existing.addClass("hide");
          fadeInNewContent();
        });
      }
      else {
        $("#pageContent").removeClass("hide");
        fadeInNewContent();
      }
    }
  </script>
</head>
<body>
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
<div class="green holder" style="height: 100%">
  <div style="width: 75%" class="startText">
    <div class="centered hide" id="pageContent">

        <div id="RSVPForm" class="hide">
          <p>WE WOULD BE DELIGHTED TO HAVE YOU AT OUR WEDDING CEREMONY, DINNER, AND RECEPTION ON THE BEACH.  PLEASE LET US KNOW HOW MANY PEOPLE WE CAN EXPECT IN YOUR PARTY.<span id="parentheticalInstruction"></span>  FEEL FREE TO BROWSE THE WEBSITE FOR MORE INFORMATION.</p>
          <div>
            <img src="http://placehold.it/500x300" alt="The happy couple" />
            <form action="/update.php" method="POST">
              <label class="centered">Are you coming: <input type="checkbox" name="attending" value="checked" /></label>
              <div class="clear" style="margin: 10px"></div>
              <label class="justified">How many adults: <input type="number" name="adults" value="1" min="1" max="5" /></label>
              <label class="justified">How many children: <input type="number" name="children" value="0" min="0" max="5" /></label>
              <label class="justified">Your email: <input type="email" name="email" /></label>
              <div class="clear" style="margin: 10px"></div>
              <input type="submit" value="Save" class="btn btn-block btn-success" />
            </form>
            <div class="clear"></div>
          </div>
        </div>

    </div>
    <p class="centered smallfont" style="position: relative; top: -0.5em">to</p>
    <p class="centered" ><em class="bigfont"><span class="illuminate">Isaac Lincoln McCarthy James</span></em></p>
  </div>
  <div class="centered smallfont startText" style="margin-top: 20px"><label for="code">ENTER THE CODE FROM YOUR INVITATION:</label>&nbsp;&nbsp;<form id="query" action="query.php" method="GET" autocomplete="off"><input id="code" name="code" style="font-size: 16pt"></form></div>
</div>
</body>
</html>
