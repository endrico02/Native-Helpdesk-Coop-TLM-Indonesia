
<html>
<head>
<script src="js/jquery-latest.js"></script>
<script>
 $(document).ready(function() {
 	 $("#responsecontainer").load("alert_sumjasa.php");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('alert_sumjasa.php');
   }, 3000);
   $.ajaxSetup({ cache: false });
});
</script>

</head>
<body>

 <strong><font color="black" size="6"></font></strong><h1><div id="responsecontainer">
</div><h1>
</body>

   

<!--
var refreshId = setInterval(function() {
$("#responsecontainer").fadeOut("slow", function () {
$(this).load('response.php').fadeIn("slow");
});
}, 10000);

***
var refreshId = setInterval(function() {
      $("#responsecontainer").load('alert_sumjasa.php?randval='+ Math.random());
   }, 3000);
-->