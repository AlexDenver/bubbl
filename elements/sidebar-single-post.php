<?php
    include_once "/opt/lampp/htdocs/bubbl/includes/probe.php";
    include_once "/opt/lampp/htdocs/bubbl/includes/functions.php";
    // require_once(__DIR__."/../includes/probe.php");
    // require_once(__DIR__."/../includes/function.php");
?>
                <div class="news-feed">
                    <div class="newsfeed">
                    <?php
                        $more = false;
                        // print_r($_GET);
                        if($_GET && isset($_GET['id']) && $post = get_post_by_id($_GET['id'])){            
                            // print_r($post);                
                            $post = $post[0];
                        ?>
                            <div class="feed">
                                <div class="header vertical">
                                    <div class="user-icon">
                                        <img src="<?php echo get_user_img($post['author']);?>" alt="">
                                    </div>

                                    <div class="user-name">
                                        <? echo $post['author']; ?>
                                    </div>
                                    <div class="time" data-time="<? echo $post['time']; ?>">
                                        
                                    </div>
                                </div>
                                <div class="post vertical">
                                    <? echo $post['text']; ?>
                                </div>
                                <div class="chin dyn-height">
                                    <div class="react comment comment-in">
                                        <textarea id="comment" placeholder="Enter Comment Here..."></textarea>
                                    </div>
                                    <div class="comment-button comment-sub">
                                        <button class="btn" id="cmnt-sub" disabled><i class="fas fa-chevron-circle-right"></i></button>
                                    </div>
                                </div>
                                <div class="comments-feed">
                                    <? foreach (what_others_think_about($_GET['id']) as $cmnt){ ?>
                                        <div class="an-comment">
                                            <div class="header">
                                                <div class="user-icon">
                                                    <img src="<?php echo get_user_img($cmnt['author']);?>" alt="">
                                                    
                                                </div>                                                
                                                <div class="auth"><? echo $cmnt['author']; ?></div>
                                                <div class="time" data-time="<? echo $cmnt['time']; ?>">
                                                    
                                                </div>
                                                <div class="text">
                                                    <? echo $cmnt['text']; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    <?}?>
                                </div>
                            </div>
                        <?php 
                        }
                        ?>

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

                    pid = <? echo $_GET['id'];?>;

                    $('#comment').on('input', (e)=>{
                        txt = $(e.target).val()
                        console.log(txt)
                        if(txt.length < 1)
                            $('#cmnt-sub').attr('disabled', true);
                        else
                            $('#cmnt-sub').removeAttr('disabled');

                        
                    })


                    $('#cmnt-sub').on('click', ()=>{
                        text = $('#comment').val();
                        if(text.length < 1)
                            return;
                        else{
                            $.post('./req/all.php', {req_type: 'new_comment', comment: text, post_id: pid})
                            .then(()=>{
                                loadSidebar('./elements/sidebar-single-post.php', {id: pid})
                            })
                        }
                        console.log("S")
                    })
                </script>


