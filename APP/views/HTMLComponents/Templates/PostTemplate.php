                    <?= $loginFail;?>
                    <?= $fillRequired;?>
                    <form method="post" enctype="multipart/form-data" action="/Project/Upload" >
                        <h2 class="title">Title: <input type="text" class="form-control" name="title" placeholder="Required" class="req"></h2>
                        <h4 class="subtitle">Subtitle(optional): <input type="text" name="subtitle"></h4>
                        <span>Written by me:</span> <input type="text"  name="WbM" placeholder="Required" class="req">
                        <h5>Article: </h5>
                        <textarea  name="project" placeholder="Required" style="width: 100%; height: 700px;" class="req"></textarea>
                        Upload up to five pictures for the article (maximum size of picture is 2 MB):
                        <input name="FirstPicture" id="image-file" type="file" />
                        <input name="SecondPicture" id="image-file" type="file" />
                        <input name="ThirdPicture" id="image-file" type="file" />
                        <input name="FourthPicture" id="image-file" type="file" />
                        <input name="FifthPicture" id="image-file" type="file" />
                        <button type="submit" class="btn btn-default">Ready, upload and go</button>
                        </form>