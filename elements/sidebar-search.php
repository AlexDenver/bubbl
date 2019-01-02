<?php
    include_once "/opt/lampp/htdocs/bubbl/includes/probe.php";
    include_once "/opt/lampp/htdocs/bubbl/includes/functions.php";
    // require_once(__DIR__."/../includes/probe.php");
    // require_once(__DIR__."/../includes/function.php");
?>


                
                <div class="search-feed">
                    <div class="search-wrap">
                        <div class="search-box">
                            <input type="text" placeholder="Find by Username/Email" id="search"> <button class="btn find-trigger">Find</button>
                        </div>
                        <div class="requests feed">
                            <? $requests = get_all_requests();
                                if($requests){
                            ?>
                            <h6>Requests</h6>

                            <? 
                                }
                            foreach($requests  as $req){
                                $sender = $req['sid']==$_SESSION['user']?$req['did']:$req['sid'];
                                ?>
                                <div class="header user" data-req-id=<? echo $req['id']; ?>>
                                    <div class="user-icon">
                                        <img src="<?php echo get_user_img($sender); ?>" alt="">
                                    </div>
                                    
                                    <div class="user-name">
                                        <? echo $sender; ?>
                                    </div>
                                    <div class="time">
                                        <button class="btn accept" data-req-id=<? echo $req['id']; ?>>Accept</button> <button class="btn reject" data-req-id=<? echo $req['id']; ?>>Reject</button>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                        <div class="feed" id="res">
                            
                        </div>



                    </div>
                </div>




                <script>

                    $('.accept').click((e)=>{
                        id = $(e.target).data('req-id');
                        el = $(e.target).closest('.header');
                        console.log(id)
                        $.post('./req/all.php', {req_type: 'req_accept', id: id})
                        .then((d)=>{
                            if(d.status==200){
                                el.fadeOut(()=>{
                                    el.remove();
                                    if($('.requests .header').length==0)
                                        $('.requests').html('');
                                });
                            }

                        })
                    })
                    
                    $(".find-trigger").on('click', ()=>{
                        val = $("#search").val();


                        $.post('./req/all.php', {req_type: 'search_friends', name: val})
                        .then((d)=>{
                            $('#res').html('')
                            if(d.length)
                                $('#res').html('<h6>Search Results</h6>');
                            
                            $(d).each((i, el)=>{
                                
                                html = `<div class="header user">
                                    <div class="user-icon">
                                        <img src="${el.img}" alt="">
                                    </div>
                                    
                                    <div class="user-name"  data-usnx=${el.username}>
                                        ${el.first_name} ${el.last_name}
                                    </div>
                                    <div class="time">
                                        <button class="btn" data-usn=${el.username}>Add</button>
                                    </div>
                                </div>`;

                                $('#res').append(html);

                                $('.user-name').click((e)=>{
                                    usn = $(e.target).data('usnx').trim();
                                    console.log(e.target, usn)

                                    $.get('./elements/sidebar-account-other.php', {user: usn})
                                        .then((html)=>{
                                            sideBarPopulation(html);
                                        })
                                })
                            })

                            $('[data-usn]').click((e)=>{
                                usn = $(e.target).data('usn');
                                $.post('./req/all.php' , {req_type: 'request_send', username: usn})
                                .then((d)=>{
                                    console.log(d);
                                })
                            })
                        })
                        
                    })
                </script>