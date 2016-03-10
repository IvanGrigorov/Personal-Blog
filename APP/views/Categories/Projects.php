 <div id="projects">
 <? 
 	if (count($GLOBALS['projects']) == 0) {
 		echo '<div style=color:white>There are currently no projects for this category</div>';
 	} 
 	else {
 		foreach ($GLOBALS['projects'] as $value) {
	 		echo '<fieldset class="project" class="scheduler-border">';
	 		echo '<legend class="scheduler-border"><a href="/Project/Project/'.$value['Title'].'">'.$value['Title'].'</a></legend>';
	 		//echo '<div class="imageContainerProject"><img class="img-responsive" src="Images/FirstProject.png" alt="Last Project Image"></div>';
	 		echo '<p>'.$value['Article'].'</p>';
	 		echo '</fieldset>';
 		}
 	}
 echo '</div>';
 echo '</section>';
 ?>