<div class="overlay-wrap">
    <div class="sign-in form">
        <h4>Login</h4>
    	<form action id="sign-in" method="POST">
            <div class="rel error"></div>
            <input type="text" class="usnin" name="usn" placeholder="Username">
            <input type="password" class="pwd" name="pwd" placeholder="Password">
            <div class="buttons">
            <button class="btn btn-okay">Login</button> 
            <button class="btn btn-cancel close-ovl-trigger">Cancel</button>
            </div>
            <div>
                <small>
                    dont have an account yet? - 
                    <a href="" class="register-trigger">Register</a>
                </small>
            </div>
        </form>
    </div>
</div>

<script >
    $('.register-trigger').click((ev) => {
        ev.preventDefault();
        $('.overlay-wrap').remove();;
        showRegisterForm();
    })





    $('#sign-in').on('submit', loginUser);

</script>