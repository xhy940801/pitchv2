$(document).ready(
	function()
	{
		$(".check_group").each(
			function()
			{
				if($(this).attr("value") == "6")
				{
					$(this).prop("checked", true);
					$(this).addClass("groupIsCheck");
				}
			});
		$(".recommendUserButton").click(
			function()
			{
				var json = $("#loadingImg").attr("group-json");
				var href = $(this).attr("href") + "/" + json;
				var imgPath = webroot + "img/loading.gif";
				var curHeight = $("#recommendUser").height();
				$("#loadingImg").html("<img src=\"" + imgPath + "\"  alt=\"Loading\" />");
				var oldHtml = $("#recommendBody").html();
				$("#recommendBody").html("");
				$("#recommendUser").css("height", "auto");
				var newHeight = $("#recommendUser").height();
				$("#recommendBody").html(oldHtml);
				$("#recommendUser").height(curHeight).animate({ height: newHeight }, "8000").children("#recommendBody").html("");
				curHeight = $("#recommendUser").height();
				$.getJSON(href, 
					function(response, statusTXT)
					{
						var tableBody = "";
						for (var i = 0; i < response['user_count']; ++i)
						{
							tableBody += "<tr><td>" + response[i]["name"] + "</td>";
							tableBody += "<td>" + response[i]["num"] + "</td>";
							tableBody += "<td>" + response[i]["sex"] + "</td>";
							tableBody += "<td>" + response[i]["department_name"] + "</td>";
							tableBody += "<td>" + response[i]["mobile"] + "</td>";
							tableBody += "<td>" + response[i]["short_mobile"] + "</td>";
							tableBody += "<td>" + response[i]["pitch_times"] + "</td>";
							tableBody += "<td>" + response[i]["operator"] + "</td></tr>";
						};
						tableBody += "<tr><th>总计人数：</th><th colspan=\"6\">" + response["user_count"] + 
							"</th><th>" + response["all_users"] + "</th></tr>";
						$("#recommendBody").html(tableBody);
						$("#recommendBody").css("height", "auto");
						var reHeight = $("#recommendUser").height();
						$("#recommendBody").height(curHeight).animate({ height: reHeight }, "1000");
						$("#loadingImg").html("");
					});
				return false;
			});

		$(".check_group").click(
			function()
			{
				if($(this).prop("checked"))
					$(this).addClass("groupIsCheck");
				else
					$(this).removeClass("groupIsCheck");
				var groups = new Array();
				$(".groupIsCheck").each(function(index)
				{
					groups[index] = $(this).attr("value");
				});
				var groupJson = $.toJSON(groups);
				$("#loadingImg").attr("group-json", groupJson);
			});
	});