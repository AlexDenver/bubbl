<div class="overlay-wrap">
    <div class="form register">
        <h4>Register</h4>
        <form action id="sign-up" method="POST">
            <div class="rel name">
                <input type="text" class="txt-only" placeholder="First Name" name="fname" required>
                <input type="text" class="txt-only" placeholder="Last Name" name="lname" required>
            </div>
            <div class="rel mail-wrap">
                <input type="email" class="mailin" placeholder="Email" name="email"required>
            </div>
            <div class="rel usn-wrap">
                <input type="text" class="usnin" placeholder="Username" name="username" required>
            </div>
            <div class="rel pwd-wrap">
            <input type="password" class="pwd" placeholder="Password" name="password" required>
            <input type="password" class="pwd" placeholder="Confrim Password" required>
            </div>
            <div class="rel dob-wrap">
                <input type="date" name="dob">
            </div>
            <div class="sign-buttons">
                <button class="btn btn-okay">Create Account</button>
                <button type="reset" class="btn btn-cancel close-ovl-trigger">Cancel</button>
            </div>
            <div>
                <small>
                    already have an account? -
                    <a href="" class="sign-in-trigger">Sign-in</a>
                </small>
            </div>
        </form>
    </div>
</div>

<script>
    $('.sign-in-trigger').click((ev) => {
        ev.preventDefault();
        $('.overlay-wrap').remove();;
        showLoginForm();
    })
    $('.close-ovl-trigger').click(closeOverlay)
    $('.pwd').on('input', ()=>{
        pw1 = $('.pwd').eq(0).val();
        pw2 = $('.pwd').eq(1).val();
        msg = $('.pwd').closest(".rel");
        if((pw1 != pw2) && (pw1!='' && pw2 != ''))
            msg.addClass("error-target").data("err", "Password Mismatch").attr('data-err',"Password Mismatch");
        else
            msg.removeClass("error-target");
    })

    $('.usnin').change(()=>{
        msg = $(".usnin").closest(".rel");
        usn = $('.usnin').val();
        $.post('./req/all.php', {public: true, req_type: 'valid_usn', usn: usn})
        .then((res)=>{
            if(res.exists)
                msg.addClass("error-target").data("err", "Username Already Taken").attr('data-err',"Username Already Taken");
            else
                msg.removeClass("error-target");
        })
    })

    $('.mailin').change(()=>{
        mail = $('.mailin').val();
        msg = $(".mailin").closest(".rel");
        if(validateEmail(mail)){
            msg.removeClass("error-target");
            $.post('./req/all.php', {public: true, req_type: 'valid_email', email: mail})
            .then((res)=>{
                
                if(res.exists)
                    msg.addClass("error-target").data("err", "Email Already Exists").attr('data-err',"Email Already Exists");
                else
                    msg.removeClass("error-target");
            })
        }else{
            msg.addClass("error-target").data("err", "Invalid Email").attr('data-err',"Invalid Email");
        }
    })

    $('.txt-only').change((ev)=>{
        isAlpha = /^[A-Za-z]+$/.test($(ev.target).val());
        msg = $(".txt-only").closest(".rel");        
        if(!isAlpha){
            msg.addClass("error-target").data("err", "Name can only contain Alphabets").attr('data-err',"Name can only contain Alphabets");
        }else{
            msg.removeClass("error-target");
        }
    })

    $('#sign-up').on('submit', register_user);
</script>