<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://ivanit.netne.net/Bootstrap/js/jquery-1.12.1.min.js"></script>
            <script src="http://ivanit.netne.net/Bootstrap/carhartl-jquery-cookie-92b7715/jquery.cookie.js"></script>
            <script src="http://ivanit.netne.net/Bootstrap/js/cookie.js"></script>
            <script src="/Bootstrap/js/q-1/q.js"></script>
            <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/sha3.js"></script>
            <title>Ivan Grigorov - Blog</title>
            <link rel="shortcut icon" href="http://ivanit.netne.net/Bootstrap/Images/Letter-I-blue-icon.png">
            <link rel="stylesheet" type="text/css" href="http://ivanit.netne.net/Bootstrap/CSS Codes/MainPageCSSStyle.css">
            <link rel="stylesheet" href="http://ivanit.netne.net/Bootstrap/css/bootstrap.min.css"> 
            <script src="http://ivanit.netne.net/Bootstrap/js/bootstrap.min.js"></script> 
            <meta name="description" content="The oficial website of Ivan Grigorov - Programmer Student">
            <meta name="author" content="Ivan Grigorov">
            <meta name="keywords" content="Ivan, Grigorov, student, programmer, Иван, Григоров, програмист, студент, C#, JAVA, Website, software development">
            <meta name="viewport" content="width=device-width, user-scalable=no">
         </head>
         <body>
         <div id="fb-root"></div>
       <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
       $(document).ready(function() {
          $('.fb-comments').attr("data-href", document.URL);
       });
      </script>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <header>
                        <span>Welcome to my site</span>
                        <h6><a  class="User"></a></h6>
                        <div id="extras">
                        <span id="AddTopic"><a href="/Project/UploadView"><img src="http://ivanit.netne.net/Bootstrap/Images/Additional/Folder-New-icon.png"></a></span> <span id="DeleteTopic"><a href="/Delete"><img src="http://ivanit.netne.net/Bootstrap/Images/Additional/Awicons-Vista-Artistic-Delete.png"></a></span>  
                        </div> 
                        <!-- TODO: Add with JavaScript link for user! -->   
                        <div id="languageContainer">
                           <div id="Bulgaria">
                              <a href="PersonalSite-MainPageBG.php"><img src="http://ivanit.netne.net/Bootstrap/Images/Flag_of_Bulgaria.svg.png" class="img-responsive
                                 " alt="Bulgaria"></a>
                           </div>
                           <div id="England">
                              <a href="index.php"><img src="http://ivanit.netne.net/Bootstrap/Images/uk-great-britain1.jpg" class="img-responsive" alt="England"></a>
                           </div>
                        </div>
                     </header>
                  </div>
               </div>
                <div class="row">
                  <div class="col-md-9">
                     <section>
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" id="Button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                              <a class="navbar-brand" href="/Home">HOME</a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav navbar-right">
                              <li class="dropdown">
                                  <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Projects <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="/Categories/Projects/CSharp">C#</a></li>
                                    <hr> 
                                    <li><a href="/Categories/Projects/Java">Java</a></li>
                                    <hr> 
                                    <li><a href="/Categories/Projects/Web Apps">Web Apps</a></li>
                                    <hr> 
                                    <li><a href="/Categories/Projects/Websites">Websites</a></li>
                                    <hr>
                                    <li><a href="/Categories/Projects/Unity 3D">Unity 3D</a></li>
                                    <hr>
                                  </ul>
                                </li>
                                <li><a href="/AboutMe">About Me(CV)</a></li>
                                <li><a href="/Telerik">Telerik</a></li>
                              <li id="LogOut"><a href="/Controller/logOut">Log Out</li>
                              <li id ="signInMenu"><a href="/Registration">Sign In</a></li>
                                  <div class="form-group logIn navbar-right" >
                                    <input type="text" class="form-control req username login" name="un" placeholder="Username" >
                                    <input type="password" class="form-control req password login" name="pass" placeholder="Password">
                                  </div>
                                  <button class="btn btn-default" id = "logIn">Log In</button>
                              </ul>
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav> 