                <div class="search-feed">
                    <div class="search-wrap">
                        <div class="search-box">
                            <input type="text" placeholder="Find by Username/Email" id="search"> <button class="btn find-trigger">Find</button>
                        </div>

                        <div class="feed">
                            <div class="header user">
                                <div class="user-icon">
                                    <img src="https://s3.amazonaws.com/uifaces/faces/twitter/mlane/128.jpg" alt="">
                                </div>
                                
                                <div class="user-name">
                                    Ariana Schmidt
                                </div>
                                <div class="time">
                                    <button class="btn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <script>
                    $(".find-trigger").on('click', ()=>{
                        val = $("#search").val();
                        
                    })
                </script>