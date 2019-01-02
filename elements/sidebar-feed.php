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
                            
                            <button id="post" title="Needs to have 10 Char to Post" disabled>Post</button>
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
                                    <div class="comment-button" data-pid="<? echo $post['id']; ?>">
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
                    $('#status').on('input', (e)=>{
                        txt = $(e.target).val()
                        console.log(txt)
                        if(txt.length < 10)
                            $('#post').attr('disabled', true);
                        else
                            $('#post').removeAttr('disabled');
                    })
                    $('#post').on('click', ()=>{
                        text = $('#status').val();
                        if(text.length < 10)
                            return;
                        else{
                            $.post('./req/all.php', {req_type: 'new_post', content: text})
                            .then(()=>{
                                loadSidebar('./elements/sidebar-feed.php')
                            })
                        }
                        console.log("S")
                    })

                    $("[data-pid]").click((e)=>{
                        pid = $(e.target).data('pid');

                        loadSidebar('./elements/sidebar-single-post.php', {id: pid})
                        
                    })
                </script>


