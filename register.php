<?php
    include_once "includes/probe.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bubbl</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="./css/home.css">
</head>
<body>
    <div class="wrap">
        <div class="main">
            <section class='register'>
                <header>
                    <div class="wrapper">

                        <div class="logo">
                            <span class="fa fa-circle"></span>
                            <span class="logo-text">Bubbl</span>
                        </div>
                        <div class="nav">
                            <ul>
                                <li>
                                    <a href="#" class="get-started blue">Login</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    </header>
                    <div class="reg-form">
                        <div class="wrap">                            
                            <form action="" class='left'>                     
                                <div>
                                    <input type="text" placeholder="First Name">
                                    <input type="text" placeholder="Last Name">
                                </div>       
                                <input type="email" placeholder="Email">
                                <input type="text" placeholder="Username">
                                <input type="pasword" placeholder="Password">
                                <input type="password" placeholder="Confrim Password">
                                <input type="date" >
                                <div class="sign-buttons">

                                    <button type="submit" class="register">Register</button>
                                    <button type="reset" class="clear">Clear</button>
                                </div>
                            </form>
                            <div class="right">
                                <div class="getting-started">
                                    <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjEyOHB4IiBoZWlnaHQ9IjEyOHB4Ij48cGF0aCBkPSJtNTA0LjUgMjQ4LjQ2MDkzOGMtNC4xNDQ1MzEgMC03LjUgMy4zNTU0NjgtNy41IDcuNSAwIDY0LjM1OTM3NC0yNS4wNjY0MDYgMTI0Ljg3MTA5My03MC41ODU5MzggMTcwLjM4MjgxMi00NS41MTk1MzEgNDUuNTExNzE5LTEwNi4wMzkwNjIgNzAuNTc0MjE5LTE3MC40MTQwNjIgNzAuNTc0MjE5cy0xMjQuODk0NTMxLTI1LjA2MjUtMTcwLjQxNDA2Mi03MC41NzQyMTljLTQ1LjUxNTYyNi00NS41MTU2MjUtNzAuNTg1OTM4LTEwNi4wMjM0MzgtNzAuNTg1OTM4LTE3MC4zODI4MTIgMC02NC4zNjMyODIgMjUuMDY2NDA2LTEyNC44NzUgNzAuNTg1OTM4LTE3MC4zODY3MTkgNDUuNTE5NTMxLTQ1LjUxMTcxOSAxMDYuMDM5MDYyLTcwLjU3NDIxOSAxNzAuNDE0MDYyLTcwLjU3NDIxOSA1OC41ODU5MzggMCAxMTUuMDU4NTk0IDIxLjI2OTUzMSAxNTkuMDExNzE5IDU5Ljg5MDYyNSA0My41NTg1OTMgMzguMjY5NTMxIDcxLjg3NSA5MC44MDQ2ODcgNzkuNzMwNDY5IDE0Ny45MzM1OTQuNTYyNSA0LjEwNTQ2OSA0LjM2MzI4MSA2Ljk2ODc1IDguNDQ5MjE4IDYuNDEwMTU2IDQuMTA1NDY5LS41NjI1IDYuOTcyNjU2LTQuMzQ3NjU2IDYuNDEwMTU2LTguNDUzMTI1LTguMzQ3NjU2LTYwLjY5NTMxMi0zOC40MjE4NzQtMTE2LjUxMTcxOS04NC42ODc1LTE1Ny4xNjAxNTYtNDYuNjk1MzEyLTQxLjAyNzM0NC0xMDYuNjgzNTkzLTYzLjYyMTA5NC0xNjguOTE0MDYyLTYzLjYyMTA5NC02OC4zNzg5MDYgMC0xMzIuNjY3OTY5IDI2LjYyNS0xODEuMDE5NTMxIDc0Ljk2ODc1LTQ4LjM1MTU2MyA0OC4zNDM3NS03NC45ODA0NjkgMTEyLjYyMTA5NC03NC45ODA0NjkgMTgwLjk5MjE4OCAwIDY4LjM2NzE4NyAyNi42Mjg5MDYgMTMyLjY0NDUzMSA3NC45ODA0NjkgMTgwLjk4ODI4MSA0OC4zNTE1NjIgNDguMzQzNzUgMTEyLjY0MDYyNSA3NC45Njg3NSAxODEuMDE5NTMxIDc0Ljk2ODc1czEzMi42Njc5NjktMjYuNjI1IDE4MS4wMTk1MzEtNzQuOTY4NzVjNDguMzUxNTYzLTQ4LjM0Mzc1IDc0Ljk4MDQ2OS0xMTIuNjIxMDk0IDc0Ljk4MDQ2OS0xODAuOTg4MjgxIDAtNC4xNDQ1MzItMy4zNTU0NjktNy41LTcuNS03LjV6bTAgMCIgZmlsbD0iIzAwMDAwMCIvPjxwYXRoIGQ9Im0yOTkuMzA4NTk0IDM1MS4wNTQ2ODhjLTIwLjAyNzM0NCAxMi42MzY3MTgtNDIuMDU4NTk0IDIwLjc5Mjk2OC02NS40NzY1NjMgMjQuMjQyMTg3LTQuMTAxNTYyLjYwNTQ2OS02LjkzMzU5MyA0LjQxNzk2OS02LjMyODEyNSA4LjUxNTYyNS42MDU0NjkgNC4wOTc2NTYgNC40MjE4NzUgNi45Mjk2ODggOC41MTE3MTkgNi4zMjQyMTkgMjUuNTAzOTA2LTMuNzUzOTA3IDQ5LjQ5MjE4Ny0xMi42MzY3MTkgNzEuMjk2ODc1LTI2LjM5ODQzOCA0Ljc3MzQzOC0zLjAxMTcxOSA4LjE2NDA2Mi03LjU2NjQwNiA5LjcyNjU2Mi0xMi44MTI1IDEuNTU4NTk0LjEyODkwNyAzLjEyMTA5NC4yMzgyODEgNC42NzE4NzYuMzE2NDA3IDIuMzU5Mzc0LjEyODkwNiA0LjcyNjU2Mi4xNzk2ODcgNy4wODk4NDMuMTc5Njg3IDI2LjUzOTA2MyAwIDUyLjM2MzI4MS03LjQ0MTQwNiA3NC42ODc1LTIxLjUyMzQzNyA1LjU2NjQwNy0zLjUxOTUzMiA4Ljg5MDYyNS05LjU2MjUgOC44OTA2MjUtMTYuMTU2MjUgMC0yMi4zMzk4NDQtOC42OTUzMTItNDMuMzIwMzEzLTI0LjQ3NjU2Mi01OS4wNzgxMjYtOC42NDA2MjUtOC42NDA2MjQtMTguODQ3NjU2LTE1LjE0MDYyNC0yOS45NzI2NTYtMTkuMjczNDM3IDExLjY3NTc4MS04LjgzNTkzNyAxOS4yMzgyODEtMjIuODM1OTM3IDE5LjIzODI4MS0zOC41NzQyMTkgMC0yNi42Njc5NjgtMjEuNjk5MjE5LTQ4LjM2MzI4MS00OC4zNzEwOTQtNDguMzYzMjgxcy00OC4zNzEwOTQgMjEuNjk1MzEzLTQ4LjM3MTA5NCA0OC4zNjMyODFjMCAxNS43NTM5MDYgNy41NzgxMjUgMjkuNzczNDM4IDE5LjI3NzM0NCAzOC42MDkzNzUtMTAuOTE0MDYzIDQuMDYyNS0yMC45Njg3NSAxMC4zOTQ1MzEtMjkuMzcxMDk0IDE4LjYyMTA5NC04LjY4MzU5My01Ljk0NTMxMy0xOC4xMjUtMTAuNTYyNS0yOC4wNzQyMTktMTMuNzUgMTcuMjM4MjgyLTExLjA1NDY4NyAyOC42OTkyMTktMzAuMzY3MTg3IDI4LjY5OTIxOS01Mi4zMjAzMTMgMC0zNC4yNTc4MTItMjcuODc1LTYyLjEyNS02Mi4xMzI4MTItNjIuMTI1LTM0LjI2MTcxOSAwLTYyLjEzNjcxOSAyNy44NjcxODgtNjIuMTM2NzE5IDYyLjEyNSAwIDIxLjk3MjY1NyAxMS40ODA0NjkgNDEuMzAwNzgyIDI4Ljc0NjA5NCA1Mi4zNDc2NTctNDMuOTI5Njg4IDE0LjE0MDYyNS03NS44MDQ2ODggNTUuMzkwNjI1LTc1LjgwNDY4OCAxMDMuOTUzMTI1IDAgNy45NTcwMzEgNCAxNS4yMzA0NjggMTAuNzAzMTI1IDE5LjQ2MDkzNyAyNi4yMzA0NjkgMTYuNTUwNzgxIDU2LjUwNzgxMyAyNi4yNTM5MDcgODcuNTU0Njg4IDI4LjA2NjQwNy4xNDg0MzcuMDA3ODEyLjI5Njg3NS4wMTE3MTguNDQxNDA2LjAxMTcxOCAzLjk0NTMxMyAwIDcuMjUtMy4wNzgxMjUgNy40ODA0NjktNy4wNjI1LjI0MjE4Ny00LjEzNjcxOC0yLjkxNDA2My03LjY4MzU5NC03LjA1MDc4Mi03LjkyNTc4MS0yOC41MTk1MzEtMS42NjAxNTYtNTYuMzMyMDMxLTEwLjU3NDIxOS04MC40MjE4NzQtMjUuNzczNDM3LTIuMzIwMzEzLTEuNDY4NzUtMy43MDcwMzItNC0zLjcwNzAzMi02Ljc3NzM0NCAwLTUxLjkyOTY4OCA0Mi4yNTM5MDYtOTQuMTc1NzgyIDk0LjE5MTQwNi05NC4xNzU3ODIgMjUuMTU2MjUgMCA0OC44MTY0MDcgOS44MDA3ODIgNjYuNjE3MTg4IDI3LjYwMTU2MyAxNy43ODUxNTYgMTcuNzU3ODEzIDI3LjU3ODEyNSA0MS40MDIzNDQgMjcuNTc4MTI1IDY2LjU3NDIxOSAwIDIuNzc3MzQ0LTEuMzg2NzE5IDUuMzA4NTk0LTMuNzA3MDMxIDYuNzc3MzQ0LTIwLjAyNzM0NCAxMi42MzY3MTggMi4zMjAzMTItMS40Njg3NSAwIDB6bS0xMzcuNjIxMDk0LTE2My4wNzgxMjZjMC0yNS45ODQzNzQgMjEuMTQ0NTMxLTQ3LjEyNSA0Ny4xMzI4MTItNDcuMTI1IDI1Ljk5MjE4OCAwIDQ3LjEzMjgxMyAyMS4xNDA2MjYgNDcuMTMyODEzIDQ3LjEyNSAwIDI1Ljk4NDM3Ni0yMS4xNDA2MjUgNDcuMTI1LTQ3LjEzMjgxMyA0Ny4xMjUtMjUuOTg4MjgxIDAtNDcuMTMyODEyLTIxLjE0MDYyNC00Ny4xMzI4MTItNDcuMTI1em0xNjcuMTA5Mzc1LTI0LjUyMzQzN2MxOC4zOTg0MzcgMCAzMy4zNzEwOTQgMTQuOTY0ODQ0IDMzLjM3MTA5NCAzMy4zNjMyODEgMCAxOC4zNzUtMTQuOTM3NSAzMy4zMjgxMjUtMzMuMzEyNSAzMy4zNTkzNzUtLjAxNTYyNSAwLS4wMzUxNTcgMC0uMDU0Njg4IDAtLjAyNzM0MyAwLS4wNTA3ODEgMC0uMDc4MTI1IDAtMTguMzY3MTg3LS4wMzkwNjItMzMuMjk2ODc1LTE0Ljk4ODI4MS0zMy4yOTY4NzUtMzMuMzU5Mzc1IDAtMTguMzk4NDM3IDE0Ljk2ODc1LTMzLjM2MzI4MSAzMy4zNzEwOTQtMzMuMzYzMjgxem0tOC4wODU5MzcgODIuMjA3MDMxYzIuNjk5MjE4LS4zMzU5MzcgNS40MjU3ODEtLjQ4MDQ2OCA4LjE0NDUzMS0uNDgwNDY4IDE4LjI5Mjk2OS4wMTE3MTggMzUuNDk2MDkzIDcuMTQ4NDM3IDQ4LjQ0OTIxOSAyMC4wOTc2NTYgMTIuOTQxNDA2IDEyLjkyNTc4MSAyMC4wNzQyMTggMzAuMTM2NzE4IDIwLjA3NDIxOCA0OC40NjQ4NDQgMCAxLjQyMTg3NC0uNzE0ODQ0IDIuNzI2NTYyLTEuOTAyMzQ0IDMuNDc2NTYyLTE5LjkxNDA2MiAxMi41NjI1LTQyLjk3MjY1NiAxOS4yMDcwMzEtNjYuNjc1NzgxIDE5LjIwNzAzMS0yLjEwNTQ2OSAwLTQuMjEwOTM3LS4wNDY4NzUtNi4zMTI1LS4xNjQwNjItMS41OTc2NTYtLjA3ODEyNS0zLjE5OTIxOS0uMTkxNDA3LTQuNzg1MTU2LS4zMzIwMzEtMS45NTMxMjUtMjYuMDMxMjUtMTMuMDIzNDM3LTUwLjIyMjY1Ny0zMS42NjQwNjMtNjguODM5ODQ0LTEuMjUtMS4yNS0yLjUzMTI1LTIuNDY4NzUtMy44MzIwMzEtMy42NTIzNDQgMTAuNjIxMDk0LTkuODI0MjE5IDI0LjE5MTQwNy0xNi4xMTMyODEgMzguNTAzOTA3LTE3Ljc3NzM0NHptMCAwIiBmaWxsPSIjMDAwMDAwIi8+PC9zdmc+Cg==" />
                                    <div class="text">
                                        <h4>Getting Started</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus vel repudiandae quisquam neque quaerat corporis, hic, libero, asperiores molestias animi minus maxime inventore! Aperiam porro veniam aspernatur molestias accusamus ipsam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>           
        </section>
        
        <footer>
            <div class="copyrights">&copy; 2018 - Bubbl</div>
        </footer>
        </div>
    </div>
    <!-- <script src="./js/"></script> -->
    <script src="./js/script.js"></script>

</body>
</html>