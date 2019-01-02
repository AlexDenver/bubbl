<?php
    header('Content-type: application/json');
    include_once "../includes/functions.php";
    $response = array();

    // Public Requests
    if($_POST && isset($_POST['public']) && isset($_POST['req_type'])){        
        switch($_POST['req_type']){
            case 'register':
                $response = create_user($_POST['username'], $_POST['password'], $_POST['email'], $_POST['fname'], $_POST['lname']);
                break;
            case 'valid_email':          
                $response = array("exists" => email_exisits($_POST['email']));
                break;
            case 'valid_usn': 
                $response = array("exists" => user_exisits($_POST['usn']));
                break;
            case 'login':
                $response = user_login($_POST['usn'], $_POST['pwd']);
                break;
        }
    }else


    // Authorized Requests 
    if(is_logged_in()){
        if($_POST && isset($_POST['req_type'])){
            switch($_POST['req_type']){

                

                case 'logout':
                    $response = bye_bye();
                    break;

                case 'message_send':
                    $response = send_message($_POST['message'], $_POST['username']);
                    break;

                case 'request_send':
                    $response = make_friend($_POST['username']);
                    break;

                case 'req_accept': 
                    $response = set_req_status($_POST['id'], 'friend');
                    break;
                case 'req_reject': 
                    $response = set_req_status($_POST['id'], 'blocked');
                    break;
                case 'unfriend':
                    $response = unfriend($_POST['id'], 'blocked');
                    break;
                case 'friend':
                    $response = friend($_POST['id'], 'blocked');
                    break;
                case 'request_block':
                    $response = make_foe($_POST['username']);
                    break;

                case 'new_post':
                    $response = make_post($_POST['content']);
                    break;

                case 'new_comment':
                    $response = what_i_think($_POST['comment'],$_POST['post_id']);
                    break;

                case 'thumb_up':
                    $response = yayyy($_POST['post_id']);
                    break;

                case 'thumb_down':
                    $response = nayyy($_POST['post_id']);
                    break;

                case 'load_feed':
                    $response = get_feed();
                    break;

                case 'update_bio':
                    $response = update_profile($_POST['skill'], $_POST['loc'], $_POST['bio']);
                    break;

                case 'update_dp':
                    $response = upload_update_dp();
                    break;

                case 'json_thread':
                    $response = get_thread_json($_POST['usn']);
                    break;
                
                case 'load_friends':
                    $response = where_my_friends_at();
                    break;
                case 'search_friends':
                    $response = search_users($_POST['name']);
                    break;
                
                default:
                    $response = array("status"=>-1, "msg"=>"Invalid Request");
                
            }
        }
    }else{
        $response['status'] = -1;
        $response['msg'] = "Unauthorized Access";
    }
    die(json_encode($response));
?>