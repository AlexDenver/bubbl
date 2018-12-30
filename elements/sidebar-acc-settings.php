<?php
    include_once "../includes/probe.php";
    include_once "../includes/functions.php";

    if($usr = get_user_details($_SESSION['user'])){
?>
                <div class="user-profile">
                    <div class="profile">
                        <div class="user-icon">
                            <img src="<?php echo get_user_img($usr['username']);?>" alt="">
                        </div>
                        <div class="user-info">
                            <div class="name"><? echo $usr['name']; ?></div>
                            <div class="skill"><? echo $usr['skill']; ?></div>
                            <div class="other">
                                <div class="loc">
                                        <i class="fas fa-globe-asia"></i> <? echo $usr['city']; ?>
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
                        <div class="bio">
                        <? echo $usr['intro']; ?>
                        </div>
                        <div class="edit-profile">
                            <div class="edit">
                                <i class="fas fa-user-edit"></i>
                            </div>
                        </div>
                        <!-- <div class="chin">
                            <div class="add-friend"><i class="fas fa-user-plus"></i> Add Friend</div>
                            <div class="message"><i class="fas fa-comment-alt"></i> Message</div>
                        </div> -->
                    </div>
                    
                    <div class="edit">
                    
                    </div>

                   

                </div>

    <?php } ?>