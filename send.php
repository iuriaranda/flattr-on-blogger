<html>
<head>
<?php
$username = $_POST["username"];
if (empty($username)) {
	echo "ERROR";
}
$compact = $_POST["compact"];
if(empty($compact)) {
	$compact = "false"; 
} else {
	$compact = 'true'; 
}
$everywhere = $_POST["everywhere"];
if(empty($everywhere)) {
	$everywhere = "false"; 
} else {
	$everywhere = 'true'; 
}
$script =<<<EOT
<script type='text/javascript' src='http://api.flattr.com/js/0.6/load.js?uid=$username'> </script>
<div style="text-align:center;"><a id="main_flattr" class="FlattrButton" style="display:none;" href=""></a></div>
<script type='text/javascript' src='http://melpomene.github.com/Flattr-on-blogger/flattrbutton.js?compact=$compact&everywhere=$everywhere'></script>
EOT;
?>
</head>
<body>

	<form name="send" action="http://www.blogger.com/add-widget">
		<form method="POST" action="http://www.blogger.com/add-widget">
		<input type="hidden" name="widget.title" value="Flattr on Blogger"/>
		<input type="hidden" name="widget.content" value="
		<?php echo htmlspecialchars( str_replace('"', "'", $script)); ?>
		"/>
		<input type="hidden" name="widget.template" value="&lt;data:content/&gt;" />
		<!-- <input type="hidden" name="infoUrl" value="http://www.bloggingtips.com"/>
		<input type="hidden" name="logoUrl" value="http://www.bloggingtips.com/wp-content/uploads/2008/11/bt-icon.gif"/> -->
	</form>
	<script type="text/javascript" language="JavaScript">
		document.send.submit();
	</script>
</body>
</html>


