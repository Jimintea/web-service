<html>
<head>
<title>Soccer Teams Alphabetical</title>
<style>
body {font-family:georgia;}

  .team{
    border:1px solid #E77DC2;
    border-radius: 5px;
    padding: 5px;
    margin-bottom:5px;
    position:relative;   
  }
 
  .pic{
    position:absolute;
    right:10px;
    top:10px;
  }

  
</style>
<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>

<script type="text/javascript">

function soccerTemplate(team){
  return `<div class="team">
  <b>Location: </b> ${team.Location}<br />
  <b>Team: </b> ${team.Team}<br />
  <b>Arena: </b> ${team.Arena}<br />
  <b>Founded: </b> ${team.Founded}<br />
  <b>Founder: </b> ${team.Founder}<br />
  <div class="pic"><img src="thumbnails/${team.Image}" /></div>
</div>`;
}

  
$(document).ready(function() {  

	$('.category').click(function(e){
        e.preventDefault(); //stop default action of the link
		cat = $(this).attr("href");  //get category from URL
		
  var request = $.ajax({
    url: "api.php?cat=" + cat,
    method: "GET",
    dataType: "json"
  });
  request.done(function( data) {
    console.log(data);

    //Place the title of the webservice on page
    $("#teamtitle").html(data.title);

    //clear previous films
    $("#team").html("")

    //load each film via template into div
    $.each(data.team,function(key,value){
      let str = soccerTemplate(value);
      $("<div></div>").html(str).appendTo("#team");
    });
    
    //load data on page so we can see it
    //$("#output").text(JSON.stringify(data));
    /*
    let myData = JSON.stringify(data,null,4);

    myData = "<pre>" + myData + "</pre>";
    $("#output").html(myData);
    */
    
  });
  request.fail(function(xhr, status, error) {
               //Ajax request failed.
               var errorMessage = xhr.status + ': ' + xhr.statusText
               alert('Error - ' + errorMessage);
    });
	});
});	

</script>
</head>
	<body>
	<h1>Soccer Teams Alphabetical</h1>
		<a href="team" class="category">Soccer Teams Alphabetical</a><br />
		<h3 id="teamtitle">Name Will Go Here</h3>
		<div id="team">
			<p>Teams will go here</p>
		</div>
    
<!--
<div class="film">
  <b>Film: </b> 1<br />
  <b>Title: </b> Dr. Yes<br />
  <b>Year: </b> 1962<br />
  <b>Director: </b> Terence Young<br />
  <b>Producers: </b> Harry Saltzman and Albert R. Broccoli<br />
  <b>Writers: </b> Richard Maibaum, Johanna Harwood and Berkely Mather<br />
  <b>Composer: </b> Monty Norman<br />
  <b>Bond: </b> Sean Connery<br />
  <b>Budget: </b> $1,000,000.00<br />
  <b>BoxOffice: </b> $59,567,035.00<br />
  <div class="pic"><img src="thumbnails/dr-no.jpg" /></div>
</div>
    -->
    
		<div id="output">Results go here</div>
	</body>
</html>