<?php
    include_once "/opt/lampp/htdocs/bubbl/includes/probe.php";
    include_once "/opt/lampp/htdocs/bubbl/includes/functions.php";
    // require_once(__DIR__."/../includes/probe.php");
    // require_once(__DIR__."/../includes/function.php");
?>
                <div class="news-feed">
                    <div class="new-status">
                        <h3>Post Status</h3>
                        <textarea name="status" id="status" ></textarea>
                        <div class="options">
                            
                            <button>Post</button>
                        </div>
                    </div>
                    <div class="newsfeed">
                    <?php
                        $more = false;
                        if($hasFeed = get_all_posts($_SESSION['user'], false, 0)){
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
                        if($more){
                            ?>
                            <button class='btn load-more std'>Load more</button>
                            <?php
                        }
                    ?>
                    </div>

                </div>


                <script>
                    $('[data-time]').each((i, el)=>{
                        timeStr = moment($(el).data('time'), "YYYY-MM-DD LTS").fromNow();
                        $(el).html(timeStr);
                    })
                </script>