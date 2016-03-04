var Url = "/Project/GetComments/" + $('.title').text().trim();

$(document).ready(function() {

	// Download the current comments and show them n the view 
	AddData();

	// Called action after writing a comment
	$('#writeComment').on("click" , function() { 

		// Check if client is logged 
		if (docCookies.getItem("User") == null) {
			$('#commentSection').append("<h5>You are not logged !<h5>");
		}
		else {

			// Used Q - library for promises and callbacks 
			// First send comment to server then reprint the comments 
			SendComment().then(AddData());
		}
	});
});

// Add all the comments for the topic to the view (HTML files) 
function AddData() {
	var deferred = Q.defer();
	$('#comment').val("");
	$.getJSON(Url, function(data) {
		for (var value in data) {
			var comment = '<div style= "width: 80%; display: inline-block;" >'+ data[value]["Comment"] +'</div>';
			var user = '<div style= "width: 20%; float: right; display: inline-block;"><h5 style="margin: 0px; padding: 1px;">' + data[value]["User"] + '</h5></div>';
			$("#allComments").append('<div class="comment" style=" margin: auto; margin-bottom: 1%; background: rgba(227, 234, 237, 1); padding: 2%; display: table; width: 90%;">' + comment + user +  '</div>');
		}
	});
	deferred.resolve();
	return deferred.promise;
}

// Send new comment 
function SendComment() {
	var deferred = Q.defer();
	$('#allComments').html("");
	var UrlforSending = "/Project/AddComment";
	var Comment = {
		title: $('.title').text().trim(),
		user: docCookies.getItem("User").replace("+", " "),
		comment: $("#comment").val()
	}
	$.ajax({
			url: UrlforSending,
			type: 'POST',
			data: JSON.stringify(Comment),
			contentType: "application/json",
			success: function() {
				deferred.resolve();
			}
		});
	return deferred.promise;
}