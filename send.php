<html>
<head>
<?php
$username = $_POST["username"];
if (empty($username)) {
	echo "ERROR";
}
$compact = $_POST["compact"];
if(empty($compact)) {
	$compact = ""; 
} else {
	$compact = 'button.rev="flattr;button:compact;";'; 
}
$script =<<<EOT
<script type='text/javascript' src='http://api.flattr.com/js/0.6/load.js?uid=$username'> </script>
<div style="text-align:center;"><a id="main_flattr" class="FlattrButton" style="display:none;" href=""></a></div>
<script>
var main_button=document.getElementById("main_flattr");main_button.className="FlattrButton";main_button.href=window.location.hostname;if(document.querySelectorAll){var entries=document.querySelectorAll(".hentry");if(entries.length==1){var footer=entries[0].querySelectorAll(".post-footer");var url=window.location.href;var button=document.createElement("a");button.className="FlattrButton";button.style="display:none";button.href=url;$compact;var footer=entries[0].querySelectorAll(".post-footer")[0];footer.appendChild(button);}else{for(var i=0;i<entries.length;i++){var url=entries[i].querySelectorAll(".entry-title>a[href]")[0].href;var button=document.createElement("a");button.className="FlattrButton";button.style="display:none";button.href=url;$compact;var footer=entries[i].querySelectorAll(".post-footer")[0];footer.appendChild(button);}}}FlattrLoader.setup();
</script>
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


