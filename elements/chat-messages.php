            <?
                include_once "/opt/lampp/htdocs/bubbl/includes/probe.php";
                include_once "/opt/lampp/htdocs/bubbl/includes/functions.php";
            ?>
                        <script class="dyn-cont">
                            msgs=[];
                        </script>                
            <?php
                if(!isset($_GET['usn'])){
                    $thread = get_last_thread();
                    $usn = $thread[0]["mto"];
                    if($usn==$_SESSION['user'])
                        $usn = $thread[0]["mfrom"];
                }else{ 
                    $usn = $_GET['usn'];
                    $thread = get_thread($usn);
                }
            ?>
                <div class="header dyn-cont">
                    <div class="user-icon">
                        <img title="<?php echo $usn;?>" src="<?php echo get_user_img($usn);?>" alt="">
                    </div>
                    <div class="user-name">
                        <?php echo $usn; ?>
                    </div>
                    <div class="options" onclick="toggleSidebar()">
                        <i class="fas fa-ellipsis-v"></i>
                    </div>
                </div>
                <div class="box dyn-cont">
                    <?php
                        foreach($thread as $msg){
                            if($msg['mfrom']==$_SESSION['user'])
                                $usn = $msg['mto'];                                
                    ?>
                        <script>
                            msgs.push(<?php echo json_encode($msg) ?>)
                        </script>
                        <div class="message <?php echo (($msg['mfrom']==$_SESSION['user']))? 'right' : ''; ?>">
                            <div class="user-icon" title="<?php echo $msg['mfrom'];?>">
                                <img src="<?php  echo get_user_img($msg['mfrom']); ?>" alt="">
                            </div>
                            <div class="speech-bubble">
                                <? echo $msg['text'] ?>
                            </div>
                        </div>


                    <?php
                        }
                    ?>
                </div>
                    <script class="dyn-cont">
                        $RECEPIENT = '<?php echo $usn;?>'; 
                        img = {};
                        img['<? echo $usn ?>'] = "<? echo get_user_img($usn);?>";
                        img['<? echo $_SESSION['user'] ?>'] = "<? echo get_user_img($_SESSION['user']);?>";
                        $(".it-area .box").animate({
                            scrollTop: ($('.message:last').offset().top) 
                        }, 0);

                        $CHAT_INT = setInterval(() => {
                            $.post("./req/all.php", {usn: $RECEPIENT, req_type: 'json_thread'})
                            .then((data)=>{
                                data = JSON.parse(data);
                                if(data.length > msgs.length)
                                    for(i=msgs.length; i < data.length; i++){
                                        msg = data[i];
                                        msgs.push(msg)

                                        html = msgMaker(msg['text'], msg['mfrom'], img[msg['mfrom']])
                                        
                                        $('.it-area .box').append(html);
                                    }
                                console.log(data.length, msgs.length)
                            })
                        }, 500);
                        
                    </script>