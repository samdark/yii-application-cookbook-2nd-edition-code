jQuery(function($){
	$(".results").each(function(){
		var url = $(this).data("url");
		var container = $(".data", this);

		$.getJSON(url,function(json){
			var html = "<ul>";
			$.each(json,function(){
				html += "<li>";
				html += '<a href="'+this.url+'">'+this.name+'</a>';
				if(this.author) {
					html += '<br />by '+this.author;
				}
				html += "</li>";
			});
			html += "</ul>";
			container.html(html);
		});
	});
});