jQuery(function($){
	$(".facebook-events").each(function(){
		var url = $(this).data("url");
		var container = $(".data", this);

		$.getJSON(url,function(json){
			var html = "<ul>";
			$.each(json.data,function(){
				html += "<li>"+
					"<p><strong>" + this.name + "</strong></p><p>"+this.location
				"</p></li>";
			});
			html += "</ul>";
			container.html(html);
		});
	});
});