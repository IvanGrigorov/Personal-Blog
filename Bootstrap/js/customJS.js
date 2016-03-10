var dropped = false,
    $loader = $('#loader'),
    isMobile = false,
    isLogged = false,
    idOfCurrentElementInSlider = 0;


$(document).ready(function() {
    $loader.fadeOut(2000);
    addAnchorToTopSideOfThePageWhenScroll();
    checkForLoggedUser();
    //slideTechnologyImages();
    getInfoAboutTech();
    makeSlidermobileFriendly();
    updateUsedTechnologiesAfterChoosingOne();
    $(".dropdown-toggle").dropdown();
    zoomImage();
    undoTech();
    logInAndSignIn();
});

$('.navbar .dropdown').click(function(event) {
  event.stopPropagation();
  dropped = !dropped;
  $(this).find('.dropdown-menu').slideToggle(600);
  if (dropped) {
    $('.navbar .dropdown').addClass('open');
  }
  else {
        setTimeout(function() {
        $('.navbar .dropdown').removeClass('open');
    }, 600);
  }
}); 

$(document).click(function() {
    dropped = false;
   // $('.dropdown-menu').slideUp(600);
    $("#technology").fadeOut(1600);
    $("#image").fadeOut(1600);
});

function addAnchorToTopSideOfThePageWhenScroll() {

  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    isMobile = true;
  }
  $(window).scroll(function() {
    if (!isMobile && ($(window).scrollTop() != 0)) {
      $('#navigationArrow').fadeIn(500);
      $("aside").css("top", "10px");
    }
    else {
      $("aside").css("top", "inherit");
      $('#navigationArrow').fadeOut(500);
    }
  });

  $('#navigationArrow').on('click', function() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
  });
};  

function checkForLoggedUser() {
  if (docCookies.getItem("User") != null) {
    isLogged = true;
  }
  else {
    isLogged = false;
  }

  $(document).ready( function() {
    if (isLogged) {
      $userName = docCookies.getItem("User");
      $('.User').text($userName.replace('+',' '));
      $('.User').attr("href", "ivanit.netne.net/Profiles/"+$userName);
      $('h6').fadeIn(1500);
      $('#extras').fadeIn(2000);
      $('#LogOut').show();
      $('#signInMenu').hide();
      }
  });

  if (!isLogged) {
    $('#logIn, .logIn').fadeIn(2000);
  }
  else {
    $('#logIn, .logIn').hide();
  }
};  

function logInAndSignIn() {
  $("#logIn").on("click", function() {
    if ($(".error").length) {
      $(".error").remove();
    }
    if (checkIfAllRequiredFieldsAreFilled(".req .login")) {
      var User = {
        username: $(".username.login").val().toString(),
        passHash: CryptoJS.SHA3($(".password.login").val()).toString()
      };
      data.users.logIn(User);
    }
    else {
      $("section").append('<div class="error" style="color: red">' + constants.FILLALLFIELDS + "</div>");
    }
  });

  $("#signIn").on("click", function() {
    if ($(".error").length) {
      $(".error").remove();
    }
    if (checkIfAllRequiredFieldsAreFilled(".req:not(.login)")) {
      var User = {
        username: $(".username:not(.login)").val().toString(),
        passHash: CryptoJS.SHA3($(".password:not(.login)").val()).toString()
      };
      data.users.register(User);
    } 
    else {
       $("section").append('<div class="error" style="color: red">' + constants.FILLALLFIELDS + "</div>");
    }
  });
}

function checkIfAllRequiredFieldsAreFilled(ElementClass) {
  var $allRequiredInputs = $(ElementClass);
  var lenght = $allRequiredInputs.length;
  var control = 0;
  for (var i = 0; i < lenght; i += 1) {
    var element = $($allRequiredInputs[i]);
    if (element.val() == ""){
      element.css("border", "2px solid red");
      control += 1;
    }
  }
  if (control == 0) {
    return true;
  }
  else {
    return false;
  }
}



function getInfoAboutTech() {
  $(".techItem").on("click", function(ev) {
    ev.stopPropagation();
    var tech = $(this).prop("title");
    var url = "/Project/GetTech/" + tech;
    $("#technology > img").attr("src", "/Bootstrap/Images" + tech +".png");
    $.getJSON(url, function(data) {
      var imgUrl = "/Bootstrap/Images/" + tech; 
      var img = '<img src="' + imgUrl + '.png">';
      var header = '<h4>' + tech + '</h4>';
      $("#technology").append('<div style="color: white;"></div>');
      $("#technology > div").text(data.description);
      $("#technology > div").prepend(header + img);
      $("#technology > div").append('<br/><br/><div style="color: white;">Source: Wikipedia</div>');
    }) 
    $("#technology").fadeIn(1600);
  })
}

function makeSlidermobileFriendly() {
  if (isMobile) {
    $(".tech").parent().css("width", "100px");
    $(".tech").css("left", -(idOfCurrentElementInSlider-1)*100);
  }
}

function updateUsedTechnologiesAfterChoosingOne() {
	$("#TechnologySelection a").on("click", function(e) { 
    e.preventDefault();
		var text = $(this).text().trim();
		var currentText = $("#TechnologyField").val();
		$("#TechnologyField").val(currentText + text + "; ");
	});
};

function zoomImage() {
  $(".gallery").on("click", function(ev) {
    ev.stopPropagation();
    var tech = "<div>" + $(this).html() + "</div>"; 
      $("#image").append(tech);  
    $("#image").fadeIn(1600);
  })
}

function undoTech() {
  $(".undo").on("click", function() {
    var techInput = $("#TechnologyField").val().split("; ").filter(Boolean);
    if (techInput.length > 1) {
      var newTechInputAfterUndo = techInput[0] + "; ";
      for (var i = 1; i < techInput.length - 1; i += 1) {
        newTechInputAfterUndo = newTechInputAfterUndo + techInput[i].trim() + "; ";
      }
      $("#TechnologyField").val(newTechInputAfterUndo);
    }
    else {
      $("#TechnologyField").val("");
    }
  });
}