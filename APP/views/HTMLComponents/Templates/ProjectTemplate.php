
                    <?= $loginFail;?>
                    <?= $fillRequired;?>
                    <form method="post" enctype="multipart/form-data" action="/Project/Upload" >
                        <h2 class="title">Title: <input type="text" class="form-control" name="title" placeholder="Required" class="req"></h2>
                        <h4 class="subtitle">Subtitle(optional): <input type="text" name="subtitle"></h4>
                        <ul id="ProjectDetails" type="circle">
                            <li><span>Description:</span> <input type="text"  name="description" placeholder="Required" class="req"></li>
                            <li><span>Written by me:</span> <input type="text"  name="WbM" placeholder="Required" class="req"></li>
                            <li><span>Link of the code:</span> <input type="text"  name="LoC" placeholder="Required" class="req"></li>
                            <li><span>Technologies used:</span> <input id="TechnologyField" type="text"  name="TechnUsed" placeholder="Required" class="req" readonly="readonly"></li>
                            <button class="undo" type="button" style="display: inline-block; margin: 1%;"><img src="http://ivanit.netne.net/Bootstrap/Images/Additional/FirstProject.png"></button>
                            <!-- Split button -->
                           	<div id="TechnologySelection">
							<div class="dropdown">
								<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Java
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#">JAVA EE</a></li>
								    <li><a href="#">OOP</a></li>
								    <li><a href="#">Swing</a></li>
								    <li><a href="#">Java language</a></li>
								  </ul>
								</div>
												<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">C#
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#">ASP.NET</a></li>
								    <li><a href="#">ASP.NET MVC</a></li>
								    <li><a href="#">LINQ</a></li>
								    <li><a href="#">OOP</a></li>
								    <li><a href="#">WPF</a></li>
								    <li><a href="#">WinForms</a></li>
								    <li><a href="#">CSharp language</a></li>
								  </ul>
								</div>
								
								<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Web
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#">HTML</a></li>
								    <li><a href="#">CSS</a></li>
								    <li><a href="#">Bootstrap</a></li>
								  </ul>
								</div>
								
								<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Javascript
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#">JQuery</a></li>
								    <li><a href="#">AJAX</a></li>
								    <li><a href="#">Angular JS</a></li>
								    <li><a href="#">React JS</a></li>
								    <li><a href="#">Knockout JS</a></li>
								    <li><a href="#">Node JS</a></li>
								    <li><a href="#">Javascript language</a></li>
								  </ul>
								</div>
								
								<div class="dropdown">
						  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">PHP
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#">Drupal</a></li>
								    <li><a href="#">Laravael</a></li>
								    <li><a href="#">PHP language</a></li>
								  </ul>
								</div>																  

								<div class="dropdown">
							 <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Databases
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu">
								    <li><a href="#">SQL</a></li>
								    <li><a href="#">SQLServer</a></li>
								    <li><a href="#">MySQL</a></li>
								  </ul>
								</div>																  
							</div>
																																						
                        </ul>
                        <h5>Article: </h5>
                        <textarea  name="project" placeholder="Required" style="width: 100%; height: 700px;" class="req"></textarea>
                        Upload up to five pictures (maximum size of picture is 2 MB):
                        <input name="FirstPicture" id="image-file" type="file" />
                        <input name="SecondPicture" id="image-file" type="file" />
                        <input name="ThirdPicture" id="image-file" type="file" />
                        <input name="FourthPicture" id="image-file" type="file" />
                        <input name="FifthPicture" id="image-file" type="file" />
                        <div class="category">Category: 
                          <select name="category">
                            <option value="CSharp">C#</option>
                            <option>Java</option>
                            <option>Websites</option>
                            <option>Web Apps</option>
                            <option>Unity 3D</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-default">Ready, upload and go</button>
                        </form>