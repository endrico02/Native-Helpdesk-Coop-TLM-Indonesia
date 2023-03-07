<html>
<head>
<script type="text/javascript" src="timeago/js/jquery.min.js"></script>
<script type="text/javascript" src="timeago/js/jquery.livequery.js"></script>
<script type="text/javascript" src="timeago/js/jquery.timeago.js"></script>
<script>
$(document).ready(function(){
$("a.timeago").livequery(function() 
{ 
	$(this).timeago(); 
});	
});
</script>
</head>
<body>
<?php
$time=time();
$mtime=date("c", $time);
?>	
<div>
<a class='timeago' title="<?php echo $mtime; ?>"></a>
</div>
</body>
</html>