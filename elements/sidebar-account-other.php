<?php
    include_once "../includes/probe.php";
    include_once "../includes/functions.php";

    if($usr = get_user_details($_GET['user'])){
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
                                    <i class="fas fa-user-friends"></i> <? echo count(get_all_friends($_GET['user'])); ?> Friends
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="bio">
                        <? echo $usr['intro']; ?>
                        </div>
                        <? if($_GET['user']!==$_SESSION['user']){ ?>
                        <div class="chin">
                            <? if(is_connection_state($_GET['user'], "friend")){?>
                            <div class="remove-friend"><i class="fas fa-user-minus"></i> Unfriend</div>
                            <? }else if(is_connection_state($_GET['user'], "requested")){?>
                            <div class="req-friend"><i class="fas fa-hourglass"></i>  &nbsp;Sent Request</div>
                            <? }else{ ?>
                            <div class="add-friend"><i class="fas fa-user-plus"></i> Add Friend</div>
                            <? } ?>
                            <div class="message"><i class="fas fa-comment-alt"></i> Message</div>
                        </div>
                        <?} ?>
                    </div>
                    <div class="divider"></div>
                    <div class="newsfeed">
                        <?php
                            if($hasFeed = get_all_my_posts($_GET['user'], 0)){
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
                                        <img src="<?php echo get_user_img($post['author']);?>" alt="">
                                    </div>

                                    <div class="user-name">
                                        <? echo $post['author']; ?>
                                    </div>
                                    <div class="time" data-time="<? echo $post['time']; ?>">
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
                        if(isset($more) && $more){
                            ?>
                            <button class='btn load-more std'>Load more</button>
                            <?php
                        }
                    ?>

                </div>

    <?php } ?>



    <script>
        var user = '<?echo $_GET['user'];?>';
        $(".edit-profile").click(()=>{
            loadSidebar("./elements/sidebar-account-edit.php");
        })

        $('[data-time]').each((i, el)=>{
            timeStr = moment($(el).data('time'), "YYYY-MM-DD LTS").fromNow();
            $(el).html(timeStr);
        })

        $('.friends').click((e)=>{
            loadSidebar('./elements/sidebar-sub-chat-start.php')
        })


        $('.remove-friend').click((e)=>{
            $.post('./req/all.php', {id: user,req_type: 'unfriend'})
            .then((d)=>{
                loadSidebar('./elements/sidebar-account-other.php', {user: user});
            })
        })


        $('.add-friend').click((e)=>{
            $.post('./req/all.php', {id: user,req_type: 'friend'})
            .then((d)=>{
                loadSidebar('./elements/sidebar-account-other.php', {user: user});
            })
        })
    </script>