$(document).ready(
	function()
	{
		$(".recommendUserButton").click(
			function()
			{
			var href = $(this).attr("href");
			var imgPath = webroot + "img/loading.gif";
			var curHeight = $(this).next(".recommendUser").height();
			$(this).next(".recommendUser").html("<img src=\"" + imgPath + "\"  alt=\"Loading\" />").css("height", "auto")
			.height(
				function(i,o)
				{
					$(this).height(curHeight).animate({ height: o }, "80");
					curHeight = o;
					return o;
				}).load(href,
				function()
				{
					$(this).css("height", "auto");
					var reHeight = $(this).height();
					$(this).height(curHeight).animate({ height: reHeight }, "80");
				});
			return false;
			});
	});