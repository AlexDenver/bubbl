<?php
    include_once "../includes/probe.php";
    include_once "../includes/functions.php";

    if($usr = get_user_details($_SESSION['user'])){
?>
                <div class="user-profile">
                    <div class="profile edit">
                        <div class="user-icon">
                            <label for="imgup" title="click to update"><img src="<?php echo get_user_img($usr['username']); ?>" alt=""></label>
                            <form id="user"><input type="file" id="imgup" name="imgup" accept="image/*" class="hidden" onchange="preview()"></form>
                        </div>
                        <div class="user-info">
                            <div class="name" contenteditable><? echo $usr['name']; ?></div>
                            <div class="skill" contenteditable><? echo $usr['skill']; ?></div>
                            <div class="other">
                                <div class="loc">
                                        <i class="fas fa-globe-asia"></i> <span contenteditable><? echo $usr['city']; ?></span>
                                </div>
                                <div class="bday">
                                        <i class="fas fa-birthday-cake"></i> 16/Sep
                                </div>
                                <div class="friends">
                                    <i class="fas fa-user-friends"></i> 133 Friends
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="bio" contenteditable>
                        <? echo $usr['intro']; ?>
                        </div>
                        <div class="edit-profile cancel" title="cancel">
                            <div class="edit">
                                <i class="fas fa-times-circle"></i>
                            </div>
                        </div>
                        <div class="save-profile" title="save">
                            <div class="save">
                            <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <!-- <div class="chin">
                            <div class="add-friend"><i class="fas fa-user-plus"></i> Add Friend</div>
                            <div class="message"><i class="fas fa-comment-alt"></i> Message</div>
                        </div> -->
                    </div>
                    <div class="divider"></div>
                    <div class="newsfeed">
                        <div class="new-status">
                            <textarea name="status" id="status" ></textarea>
                            <div class="options">
                                
                                <button>Post</button>
                            </div>
                        </div>
                        <?php
                            if($hasFeed = get_all_my_posts($_SESSION['user'], 0)){
                                $more = false;
                                if(sizeof($hasFeed) == ($GLOBALS['limit']+1)){
                                    $hasFeed = array_slice($hasFeed, $GLOBALS['limit']);
                                    $more = true;
                                }
                                foreach ($hasFeed as $post){
                        ?>
                            <div class="feed">
                                <div class="header">
                                    <div class="user-icon">
                                        <img src="<?php echo get_user_img($post['author']); ?>" alt="">
                                    </div>

                                    <div class="user-name">
                                        <? echo $post['author']; ?>
                                    </div>
                                    <div class="time">
                                        10 min ago.
                                    </div>
                                </div>
                                <div class="post">
                                    <? echo $post['text']; ?>
                                </div>
                                <div class="chin">
                                    <div class="react">

                                    </div>
                                    <div class="comment-button">
                                        <i class="fas fa-comment-dots"></i> Comment
                                    </div>
                                </div>
                            </div>
                        <?php 
                                }
                            } ?>

                    </div>

                    <?php
                        if($more){
                            ?>
                            <button class='btn load-more std'>Load more</button>
                            <?php
                        }
                    ?>

                </div>

    <?php } ?>


    <script>
    
        $(".cancel").click(()=>{
            loadSidebar("./elements/sidebar-account.php");
        })


        $(".save-profile").click(()=>{
            data = {
                name : $('.profile .name').text().trim(),
                skill : $('.profile .skill').text().trim(),
                loc : $('.profile .loc').text().trim(),
                bio : $('.profile .bio').text().trim(),
                req_type: "update_bio"
            }
            if(imgUpdate){
                idata = new FormData($('form#user')[0]);
                idata.append("req_type", "update_dp");
                $.ajax({
                    // Your server script to process the upload
                    url: './req/all.php',
                    type: 'POST',

                    // Form data
                    data: idata,

                    // Tell jQuery not to process data or worry about content-type
                    // You *must* include these options!
                    cache: false,
                    contentType: false,
                    processData: false,

                    // Custom XMLHttpRequest
                    xhr: function() {
                        var myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload) {
                            // For handling the progress of the upload
                            myXhr.upload.addEventListener('progress', function(e) {
                                if (e.lengthComputable) {
                                    $('progress').attr({
                                        value: e.loaded,
                                        max: e.total,
                                    });
                                }
                            } , false);
                        }
                        return myXhr;
                    }
                });
            }

            console.log(data);
            $.post("./req/all.php", data)
            .done((res)=>{
                if(res.status==200){
                    loadSidebar("./elements/sidebar-account.php");
                }
            })

            
        })

        imgUpdate = false;
        function preview() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("imgup").files[0]);
            
            oFReader.onload = function (oFREvent) {                
                imgUpdate = true;
                $(".edit .user-icon img").attr('src', oFREvent.target.result);
            };
        };


    </script>