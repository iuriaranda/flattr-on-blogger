var scripts = document.getElementsByTagName("script");
var tag = scripts[scripts.length-1];
var src = tag.getAttribute('src');	
var pos = src.indexOf('?');
if (pos) {
	var qs = src.substring(++pos);
	var params = qs.split("&");
	for (var i = 0; i < params.length; i++) {
		var pair = params[i].split("=");
		if(pair[0] == "compact") {
			var compact = pair[1];
		}else if(pair[0] == "everywhere") {
			var everywhere = pair[1];
		}
		
	}
}

var main_button = document.getElementById("main_flattr");
main_button.className = "FlattrButton";
main_button.href = window.location.hostname;
if(document.querySelectorAll){
	var entries = document.querySelectorAll('.hentry');
	if (entries.length == 1 ) { // Single post page. 
		var footer = entries[0].querySelectorAll('.post-share-buttons');
		var url = window.location.href;
		var button =  document.createElement("a");
		button.className = "FlattrButton goog-inline-block dummy-container";
		button.style = "display:none";
		button.href= url;
		if(compact == "true") {
			button.rev="flattr;button:compact;";
		}
		var footer = entries[0].querySelectorAll(".post-footer")[0];
		footer.appendChild(button);
	}else if(everywhere=="true"){
		for (var i = 0; i < entries.length; i ++) {
			var url = entries[i].querySelectorAll(".entry-title>a[href]")[0].href;
			var button =  document.createElement("a");
			button.className = "FlattrButton goog-inline-block dummy-container";
			button.style = "display:none";
			button.href= url;
			if(compact == "true") {
				button.rev="flattr;button:compact;";
			}
			var footer = entries[i].querySelectorAll(".post-share-buttons")[0];
			footer.appendChild(button);
		}
	}
}
FlattrLoader.setup();

// Now change the flattr buttons class to align with the other share buttons
if (document.querySelectorAll) {
    var entries = document.querySelectorAll('.hentry');
    if (entries.length == 1 ) { // Single post page. 
        var button = entries[0].querySelectorAll(".FlattrButton")[0];
        button.className += " goog-inline-block dummy-container";
    } else if (everywhere == "true") {
        for (var i = 0; i < entries.length; i ++) {
            var button = entries[i].querySelectorAll(".FlattrButton")[0];
            button.className += " goog-inline-block dummy-container";
        }
    }
}
