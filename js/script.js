let showLoginForm = () => {
    $.get('./elements/form-sign-in.php')
        .then((data) => {
            $('body').append(data)
        })
}

let isMobile = $(document).width()<768?true:false;

let loginUser = (ev) => {
    ev.preventDefault();
    data = $(ev.target).serializeArray();
    jdata = {};
    $(data).each((i, d) => {
        jdata[d['name']] = d['value'];
    })
    jdata['public'] = true;
    jdata['req_type'] = 'login';
    $.post('./req/all.php', jdata)
        .then((res) => {

            console.log(res);
            if (res.status == 200)
                window.location.href = "./"
            else
                $('#sign-in .error').html(res.msg);
        })

}
let validateEmail = (email) => {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}


let closeOverlay = () => {
    $('.overlay-wrap').remove();
}


let showRegisterForm = () => {
    $.get('./elements/form-register.php')
        .then((data) => {
            $('body').append(data)
        })
}

let register_user = (ev) => {
    ev.preventDefault();
    data = $(ev.target).serializeArray();
    jdata = {};
    $(data).each((i, d) => {
        jdata[d['name']] = d['value'];
    })
    jdata['public'] = true;
    jdata['req_type'] = 'register';
    $.post('./req/all.php', jdata)
        .then((res) => {
            if (res.status == 200) {
                goModal('Registration Successful', `Yippeee! Your account has been created, you can sign in now by using the details you provided.`, '<i class="fas fa-check-circle"></i>');

            }
        })

}
let goModal = (title, body, icon) => {
    closeOverlay();
    html = `<div class="overlay-wrap">
                <div class="modal">
                    <h4><span>${icon}</span> ${title}</h4>
                    <div class='text'>
                        ${body}
                    </div>
                    <button class='btn btn-cancel'>Close</button>
                </div>
            </div>`;

    $('body').append(html);
    $('.modal .btn-cancel').click(() => {
        closeOverlay();
    })

}


let sideBarPopulation = (html) => {
    $('.info-area').html(html);

    $('.user-name').click((e)=>{
        usn = $(e.target).text().trim();
        console.log(e.target, usn)

        $.get('./elements/sidebar-account-other.php', {user: usn})
            .then((html)=>{
                sideBarPopulation(html);
            })
    })
}
$('.user-name').click((e)=>{
    usn = $(e.target).text().trim();
    console.log(e.target, usn)

    $.get('./elements/sidebar-account-other.php', {user: usn})
        .then((html)=>{
            sideBarPopulation(html);
        })
})
let loadSidebar = (page, payload) => {
    console.log(payload)
    $.get(page, payload)
        .then((res) => {
            sideBarPopulation(res)
        })
}
let scrollTo = (ele) => {
    $([document.documentElement, document.body]).animate({
        scrollTop: ($(ele).offset().top) - 100
    }, 800);
}
$NO_NOTIF = false;
let init = () => {
    $('.login-trigger').click(showLoginForm);
    $('.register-trigger').click(showRegisterForm);
    $('#chatin').on("submit", (e) => {
        e.preventDefault();
        jdata = {
            username: $RECEPIENT,
            message: $("#msg-box").val()
        }        
        jdata['req_type'] = 'message_send';
        $.post('./req/all.php', jdata)
        .always((res) => {
            console.log(res)
            if (res.status == 200) {
                // $(".it-area .box").append(msgMaker(jdata.message, $ME, $(".right").find('img').attr('src')));
                // $(".it-area .box").animate({
                //     scrollTop: ($('.message:last').offset().top) 
                // }, 0);
                $("#msg-box").val('')
                $NO_NOTIF = true;
            }
        })

        .fail((e)=>{
            console.log(e);
        })
    })


    $('.logout').click((e)=>{
        $.post('./req/all.php', {req_type: 'logout'})
            .then((d)=>{
                if(d.status == 200)
                    window.location.href="/bubbl/"
            })
    })
}

let msgMaker = (msg, usr, pic) => {
    // console.log(msg,usr,pic)
    return `
        <div class="message ${usr!=$RECEPIENT?'right':''}" title="${usr}">
            <div class="user-icon" title="${usr}">
                <img src="${pic}" alt="">
            </div>
            <div class="speech-bubble">
                ${msg}
            </div>
        </div>
    `
}

let populateMain = (html)=>{
    $('.dyn-cont').remove();
    if(typeof $CHAT_INT != 'undefined')
    clearInterval($CHAT_INT);
    $(".it-area").prepend(html);
}

let startChat = (usr)=>{
    if(isMobile){
        toggleSidebar();
    }
    $.get("./elements/chat-messages.php", {usn: usr})
    .done((res)=>{
        nc_err = $('.no-chat-err')
        if(nc_err.length>0){
            nc_err.remove();
        }
        populateMain(res);
    })
}

let toggleSidebar = ()=>{
    $(".info-area").fadeToggle(()=>{
        $(".main").toggleClass("no-sidebar")
    });
}

$ = jQuery;
$(document).ready(init)


$('[data-aside]').click((ev) => {
    console.log("hello")
    page = $(ev.target).closest('[data-aside]').data('aside');

    loadSidebar("./elements/"+page);
    
})


let playSound = ()=>{
    var audio = new Audio('./res/notify.mp3');
    audio.play();
}

