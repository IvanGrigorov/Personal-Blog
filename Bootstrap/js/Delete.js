// Loads Projects for Delete Page

// Redefine Append Function 
$append = $.fn.append;

$.fn.append = function() {
	return $append.apply(this, arguments).trigger("append");
}

$(document).ready(function() {
	loadDataFromJSON();
});

$('#CategoryToDelete').on('change', function() {
	$("#selectedCategory").html(" ");
	loadDataFromJSON();
});

$(document).on("append", function() {
	$('.delete').on("click", function() {
		var url = "/Project/DeleteProject/" + $(this).next().text();
		$(this).parent().fadeOut(1000);
		console.log($(this).parent());
		$.get(url);
	});	
});

// Initialize the data from server about the projects 
function loadDataFromJSON() {
	var url = "/Categories/GetTopicsForDelete/" + $('#CategoryToDelete').val();
	$.getJSON(url, function(data) {
		if (!data.length) {
			$("#selectedCategory").append('<div style="color:white">There are no projects for this category</div>');
		}
		else {
			for (var value in data) {
				var button = '<button class="delete" style="float: right; margin: 1%;"><img src="http://ivanit.netne.net/Bootstrap/Images/Additional/gnome_edit_delete.png"></button>';
				var legend = '<legend class="scheduler-border"><a href="/Project/Project/'+ data[value]["Title"]  +'">'+ data[value]["Title"]  +'</a></legend>';
				var article = '<p>'+ data[value]["Article"] +'</p>';
				$("#selectedCategory").append('<fieldset class="project" class="scheduler-border">' + button + legend + article + '</fieldset>');
			}
		}
	});
}