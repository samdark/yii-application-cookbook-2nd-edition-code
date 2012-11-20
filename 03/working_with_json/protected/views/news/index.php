<div class="news-list">
	Loading…
</div>

<?php Yii::app()->clientScript->registerCoreScript("jquery")?>
<script type="text/javascript">
	jQuery(function($) {
		var newsList = $('.news-list');

		function updateNews(){
			newsList.html("Loading…");
			$.ajax({
			   url: "<?php echo $this->createUrl('data')?>",
			   dataType: 'json',
			   cache: false,
			   success: function(data) {
				  var out = "<ol>";
				  $(data).each(function(){
					 out+="<li>"+this.title+"</li>";
				  });
				  out += "</ol>";
				  newsList.html(out);
			   }
			});
		}

		updateNews();

		setInterval(function(){
			updateNews()
		}, 2000);
	});
</script>