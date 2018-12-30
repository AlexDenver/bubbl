<?php
    error_reporting(E_ALL);
    if(!isset($_SESSION))
    session_start(); 
    $GLOBALS['conn'] = new mysqli("localhost", "root", "", "bubbl");
    $GLOBALS['limit'] = 10;
    if($GLOBALS['conn']->connect_errno)
        print($GLOBALS['conn']->connect_error);
     
    function get_display_picture($usn){

        return "";
    }

    function is_logged_in(){
        return (isset($_SESSION['user']) && ($_SESSION['user'] != ''));
    }
    function user_exisits($usn){        
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s", $usn);
        $stmt->execute();      
        $res =  $stmt->get_result();
        if($res->num_rows > 0)
            return true;     
    }
    function email_exisits($mail){        
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE email=?");
        $stmt->bind_param("s", $mail);
        $stmt->execute();
        $res =  $stmt->get_result();
        if($res->num_rows > 0)
            return true;        
    }

    function get_user_details($usn){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s", $usn);
        $stmt->execute();      
        $res =  $stmt->get_result();
        if($res->num_rows > 0){
            $data = $res->fetch_array();
            $data['name'] = $data['first_name'] . ' ' . $data['last_name'];
            $stmt = $GLOBALS['conn']->prepare("SELECT * FROM bio WHERE username=?");
            $stmt->bind_param("s", $usn);
            $stmt->execute();      
            $res =  $stmt->get_result();
            if($res->num_rows > 0){
                $data = array_merge($data, $res->fetch_array());
            }

            return $data;
        }else
            return false;
    }

    function update_profile($skill, $city, $bio){
        $resp = array();
        $stmt = $GLOBALS['conn']->prepare("UPDATE bio SET skill=?, city=?, intro=? WHERE username=?");
        $stmt->bind_param("ssss", $skill, $city, $bio, $_SESSION['user']);
        if($stmt->execute()){      
            $resp['status'] = 200;
            $resp['msg'] = "Updated";                
        }else{
            $resp['status'] = -1;
            $resp['msg'] = "Table Error!";
        }
        return $resp;
    }


    function update_dp($img){
        $resp = array();
        $stmt = $GLOBALS['conn']->prepare("UPDATE bio SET display=? WHERE username=?");
        $stmt->bind_param("ss", $img, $_SESSION['user']);
        $stmt->execute();
    }

    function get_user_img($usn){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM bio WHERE username=?");
        $stmt->bind_param("s", $usn);
        $stmt->execute();      
        $res =  $stmt->get_result();
        if($res->num_rows > 0){
            $res = $res->fetch_array();
            return "res/uploads/" . $res['display'];
        }
    }

    function get_all_my_posts($usn, $offset){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM post WHERE author=? ORDER BY time DESC LIMIT ? OFFSET ?");
        $limit = $GLOBALS['limit'] + 1;
        $stmt->bind_param("sii", $usn, $limit, $offset);
        $stmt->execute();
        $res =  $stmt->get_result();
        if($res->num_rows > 0){
            $data = mysqli_fetch_all ($res, MYSQLI_ASSOC);
            // $data = $res->fetch_array();
            return $data;
        }else
            return false;
    }

    function get_all_posts($usn, $offset){
        $limit = $GLOBALS['limit'] + 1;
        $authors = get_all_friends($usn);
        array_push($authors, $usn);
        $authors = "'" . implode("' , '" ,$authors)."'";   
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM post WHERE author IN($authors) ORDER BY time DESC LIMIT ? OFFSET ?");
        $stmt->bind_param("ss", $limit, $offset);
        $stmt->execute();
        $res =  $stmt->get_result();
        if($res->num_rows > 0){
            $data = mysqli_fetch_all ($res, MYSQLI_ASSOC);
            return $data;
        }else
            return false;
    }

    function get_all_convo_users($usn, $offset){
        $limit = $GLOBALS['limit'] + 1;        
        $stmt = $GLOBALS['conn']->prepare("SELECT mfrom,mto FROM conversations WHERE (mfrom = ? OR mto=?) ORDER BY time DESC LIMIT ? OFFSET ?");
        $stmt->bind_param("ssss", $usn, $usn, $limit, $offset);
        $stmt->execute();
        $res =  $stmt->get_result();
        $data = array();
        if($res->num_rows > 0){
            $temp = mysqli_fetch_all ($res, MYSQLI_ASSOC);
            foreach($temp as $name){
                if($name['mto']==$usn)
                    array_push($data,$name['mfrom']);
                else
                    array_push($data,$name['mto']);
            }
            return $data;
        }else
            return false;
    }

    

    function get_all_friends($usn){
        $stmt = $GLOBALS['conn']->prepare("SELECT sid,did FROM friends WHERE ( sid=? OR did=? )  AND status=?");
        $limit = $GLOBALS['limit'] + 1;
        $state = "friend";
        $stmt->bind_param("sss", $usn, $usn, $state);
        $stmt->execute();
        $res =  $stmt->get_result();
        $data = array();
        if($res->num_rows > 0){
            $temp = mysqli_fetch_all ($res, MYSQLI_ASSOC);
            
            foreach($temp as $name){
                if($name['sid']==$usn)
                    array_push($data,$name['did']);
                else
                    array_push($data,$name['sid']);
            }
            return $data;
        }else
            return $data;
    }

    function add_some_hash($pass){
        return sha1($pass);
    }    
    function create_user($usn, $pass, $email, $fname, $lname){
        $resp = array();
        if(!user_exisits($usn) && !email_exisits($email)){
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO users VALUES(?, ?, ?, ?, ?)");
            $hashedPass =add_some_hash($pass);
            $stmt->bind_param("sssss", $usn, $fname, $lname, $email, $hashedPass);       
            if($stmt->execute()){
                $stmt = $GLOBALS['conn']->prepare("INSERT INTO bio VALUES(?, ?, ?, ?, ?, ?)");  
                $space = " ";
                $stmt->bind_param("ssssss", $usn, $space, $space, $space, $space, $space);        
                $stmt->execute();
                $resp['status'] = 200;
                $resp['msg'] = "User Registration Successful.";
            }else{
                $resp['status'] = -1;
                $resp['msg'] = "User Registration Failed.";
            }
        }else{
            $resp['status'] = -1;
            $resp['msg'] = "Username/Email Exists.";
        }
        return $resp;
    }


    function user_login($usn, $pass){
        $resp = array();
        $pass = add_some_hash($pass);
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $usn, $pass);
        $stmt->execute();
        $res =  $stmt->get_result();
        if($res->num_rows == 1){
            $_SESSION['user'] = $usn;
            $resp['status'] = 200;            
        }else{
            $resp['status'] = -1;
            $resp['msg'] = "Invalid Username or Password Combination";
        }
        return $resp;
    }

    function bye_bye(){
        session_destroy();
        return array('status'=>200, 'msg'=>'Logout Successful');
    }

    function thread_exists($usn){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM conversations WHERE (mfrom=? AND mto=?) OR (mfrom=? AND mto=?)");
        $stmt->bind_param("ssss", $usn, $_SESSION['user'], $_SESSION['user'], $usn);
        $stmt->execute();      
        $res =  $stmt->get_result();
        if($res->num_rows > 0)
            return $res->fetch_assoc();
        else
            return false;
    }

    function update_convo($msg, $usn){
        if($thread=thread_exists($usn)){
            $stmt = $GLOBALS['conn']->prepare("UPDATE conversations SET last=?, time=now() WHERE id=?");
            $stmt->bind_param("si", $msg, $thread['id']);
            $stmt->execute();
            return $thread['id'];
        }else{
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO conversations(mto,mfrom,last) VALUES(?,?,?)");
            $stmt->bind_param("sss",$usn, $_SESSION['user'], $msg);
            $stmt->execute();
            return $stmt->insert_id;
        }
    }

    function send_message($msg, $usn){
        $resp = array();
        if(user_exisits($usn)){
            $id = update_convo($msg, $usn);
            echo $id;
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO messages(text, mfrom, mto, tid) VALUES(?, ?, ?, ?)");
            $stmt->bind_param("sssi", $msg, $_SESSION['user'], $usn, $id);
            if($stmt->execute()){      
                $resp['status'] = 200;
                $resp['msg'] = "Sent!";                
            }else{
                $resp['status'] = -1;
                $resp['msg'] = "Table Error!";
            }
            
        }else{
            $resp = -1;
            $resp = "User Does Not Exists.";
        }
        return $resp;
    }

    function get_thread_by_id($id){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM messages WHERE tid=? ORDER BY time");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $thread = mysqli_fetch_all ($res, MYSQLI_ASSOC);
        return $thread;
    }

    function get_last_thread(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM conversations WHERE (mfrom=? OR mto=?) ORDER BY time DESC");
        $stmt->bind_param("ss", $_SESSION['user'], $_SESSION['user']);
        if($stmt->execute()){     
            $temp = $stmt->get_result();
            $row = $temp->fetch_assoc();
            return get_thread_by_id($row['id']);              
        }else{
            return false;
        }
    }

    function get_thread($usn){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM conversations WHERE (mfrom=? AND mto=?) OR ((mfrom=? AND mto=?)) ORDER BY time DESC");
        $stmt->bind_param("ssss", $usn, $_SESSION['user'], $_SESSION['user'], $usn);
        if($stmt->execute()){     
            $temp = $stmt->get_result();
            $row = $temp->fetch_assoc();
            return get_thread_by_id($row['id']);              
        }else{
            return false;
        }
    }
    function get_all_threads(){
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM conversations WHERE (mfrom=? OR mto=?) ORDER BY time DESC");
        $stmt->bind_param("ss", $_SESSION['user'], $_SESSION['user']);
        if($stmt->execute()){     
            $res = $stmt->get_result();
            $temp = mysqli_fetch_all ($res, MYSQLI_ASSOC);
            return $temp;              
        }else{
            return false;
        }
    }

    function get_thread_json($usn){
        return json_encode(get_thread($usn));
    }
    // print_r(get_thread('Joan'));
    function make_friend($usn){
        $resp = array();
        if(user_exisits($usn)){
            $stmt = $GLOBALS['conn']->prepare("INSERT INTO friends(sid, did, status) VALUES(?, ?, ?)");
            $stmt->prepare("sss", $_SESSION['username'], $usn, 'requested');
            if($stmt->execute()){
                $resp['status'] = 200;
                $resp['msg'] = "Sent!";                
            }
        }else{
            $resp = -1;
            $resp = "User Does Not Exists.";
        }
        return $resp;
    }

    function is_connection_state($usn, $state){

        $me = $_SESSION['username'];        
        $stmt = $GLOBALS['conn']->prepare("SELECT * FROM friends WHERE (((sid=? AND did=?) OR (did=? AND sid=?)) AND status=?)");
        $stmt->bind_param("sssss", $usn, $me, $me, $usn, $state);
        $stmt->execute();
        $res =  $stmt->get_result();
        if($res->num_rows == 1)
            return true;                
        
    }

    function make_foe($usn){
        $resp = array();
        $me = $_SESSION['username'];
        if(user_exisits($usn)){
            if(is_connection_state($usn, 'friend')){
                $stmt = $GLOBALS['conn']->prepare("UPDATE friends SET status = ? WHERE ((sid=? AND did=?) OR (did=? AND sid=?))");
                $stmt->prepare("sssss", 'stranger', $usn, $me, $me, $usn);
                if($stmt->execute()){
                    $resp['status'] = 200;
                    $resp['msg'] = "Unfriended";                
                }
            }
        }else{
            $resp = -1;
            $resp = "User Does Not Exists.";
        }
        return $resp;
    }

    function make_post($cont){
        $resp = array();
        
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO posts(text, author) VALUES(?, ?)");
        $stmt->prepare("ss", $msg, $_SESSION['username'], $cont);
        if($stmt->execute()){
            $resp['status'] = 200;
            $resp['msg'] = "Posted";                
        }else{
            $resp['status'] = -1;
            $resp['msg'] = "Table Error!";
        }
        return $resp;
    }









    function upload_update_dp(){
        $target_dir = "../res/uploads/";
        $target_file = $target_dir . basename($_FILES["imgup"]["name"]);
        // $target_file = $target_dir . $_SESSION['user'];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imgup"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            unlink($target_file);            
        }

        // Check file size
        if ($_FILES["imgup"]["size"] > 500000) {
            $res["status"]  = -1;
            $res['msg'] = "File Size Error";
            $uploadOk = 0;
        }
        echo "'".$imageFileType . "'";
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $res["status"]  = -1;
            $res['msg'] = "File Type Error";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $res["status"]  = -1;
            $res['msg'] = "Sorry, your file was not uploaded.";
        } else {
            $target_file = $target_dir . $_SESSION['user'] .".". $imageFileType;
            if (move_uploaded_file($_FILES["imgup"]["tmp_name"], $target_file)) {
                update_dp($_SESSION['user'] .".". $imageFileType);
                $res["status"]  = 200;
            } else {
                $res["status"]  = -1;
                $res["msg"] = "Sorry, there was an error uploading your file.";
            }
        }
    }


    // uploadPhoto();


?>  