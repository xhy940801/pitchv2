$(document).ready(function(){
	$(".recommendUserButton").click(function(){
		var href = $(this).attr('href');
		$(".recommendUser").load(href);
		return false;
	});
});