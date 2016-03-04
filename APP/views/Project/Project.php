<div id="technology"></div>
<div id="image"></div>
<div class="projects">
                        <h2 class="title"> <?= $GLOBALS['title']; ?> </h2>
                        <h4 class="subtitle"> <?= $GLOBALS['subtitle']; ?> </h4>
                        <ul id="ProjectDetails" type="circle">
                            <li><span>Description:</span> <?= $GLOBALS['description']; ?> </li>
                            <li><span>Written by me:</span> <?= $GLOBALS['WbM'];  ?> </li>
                            <li><span>Link of the code:</span> <?= $GLOBALS['link']; ?> </li>
                            <li><h3 style="margin-bottom: 50px">Technologies used (click on them for zoom and additional info - May not work in Internet Explorer):</h3> 
                            <? 
                                $technologies = preg_split( "/[; ,]/", $GLOBALS['technologies'], -1, PREG_SPLIT_NO_EMPTY); 
                                $lenght = count($technologies); 
                                if ($lenght == 0) {
                                    $technologyCarousel = "<div> There are no selected technologies for this project </div>";
                                } 
                                else {
                                    $carouselTechElements = '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
                                    $carouselTechImages = '<div class="item active" style="text-align: center">' . '<img class="techItem" title="'. trim($technologies[0]) .'" src="/Bootstrap/Images/'. trim($technologies[0]) .'.png"/></div>';
                                    for ($i = 1; $i < $lenght; $i++) {
                                        $carouselTechElements = $carouselTechElements.'<li data-target="#myCarousel" data-slide-to="'.(string)($i + 1).'"></li>';
                                        $carouselTechImages = $carouselTechImages.'<div class="item">' . '<img class="techItem" title="'. trim($technologies[$i]) .'" src="/Bootstrap/Images/'. trim($technologies[$i]) .'.png"/></div>';
                                    }
                                    $technologyCarousel = file_get_contents('http://ivanit.netne.net/APP/views/HTMLComponents/Templates/ImageGalleryTemplate.php');
                                    $technologyCarousel = str_replace('{elements}', $carouselTechElements, $technologyCarousel);
                                    $technologyCarousel = str_replace('{images}', $carouselTechImages, $technologyCarousel);
                                    $technologyCarousel = str_replace('myCarousel', "techCarousel", $technologyCarousel);
                                } 
                            ?> 
                            <div id="test">
                                <?= $technologyCarousel; ?>
                            </div>
                            </li>
                        </ul>
                        <div> <?= $GLOBALS['article']; ?> </div>
                    </div>
                    <? if ($GLOBALS['images'] == NULL) {
                            $gallery = "<div> There are no images for this project </div>";
                        } 
                        else {
                            $carouselElements = '<li data-target="#myCarousel" data-slide-to="0" class="active"></li>';
                            $images = '<div class="item active gallery">' . '<img src="data:image/jpeg;base64,'.base64_encode( $GLOBALS['images'][0] ).'"/></div>';
                            for ($i = 1; $i < count($GLOBALS['images']); $i++) {
                                $carouselElements = $carouselElements.'<li data-target="#myCarousel" data-slide-to="'.(string)($i + 1).'"></li>';
                                $images = $images.'<div class="item gallery">' . '<img src="data:image/jpeg;base64,'.base64_encode( $GLOBALS['images'][$i] ).'"/></div>';
                            }
                            $gallery = '<div style="color: white" >Click on them for zoom (May not work in Internet Explorer)</div>'.file_get_contents('http://ivanit.netne.net/APP/views/HTMLComponents/Templates/ImageGalleryTemplate.php');
                            $gallery = str_replace('{elements}', $carouselElements, $gallery);
                            $gallery = str_replace('{images}', $images, $gallery);
                            $gallery = str_replace('myCarousel', "imageCarousel", $gallery);
                        }    ?>
                        <?= $gallery; ?>
                    <div class="fb-like" data-href="" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                    <div id="commentSection"> 
                    <h4 style="margin: 0px; padding: 0px; margin-bottom: 1%;">You must be logged in to comment.</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea name="comment" rows="5" cols="300" class="form-control" id="comment" style="width: 100% !important;">Insert your comment here</textarea>
                            <button  type="button" id="writeComment">Write</button>
                        </div>
                    </form> 
                    </div>
                    <div id="allComments" style="background: rgba(182, 209, 219, 1); padding: 1%;"></div>
                </section>
                </div>
                <div class="col-md-3">
                <script type="text/javascript" src="/Bootstrap/js/CommentJS.js"></script>