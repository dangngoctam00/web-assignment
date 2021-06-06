<?php
    $action = isset($_POST['action']) ? $_POST['action'] : "";;

    require_once "../../../data/config.php";

    if ($action == "edit_employee"){
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $work = $_POST['work'];
        $avatar = $_POST['avatar'];
        $face = $_POST['face'];
        $twitter = $_POST['twitter'];
        $insta = $_POST['insta'];
        echo editEmployee($mysql_db,$id,$fname,$work,$avatar,$face,$twitter,$insta);
    }

    function editEmployee($mysql_db,$id,$fname,$work,$avatar,$face,$twitter,$insta){
        $sql = "UPDATE employee SET full_name='$fname', work_as='$work', link_image='$avatar', link_facebook = '$face',
                link_twitter='$twitter', link_instagram='$insta' WHERE id = $id ";
        $res = $mysql_db -> query($sql);
        if ($res) echo "Change employee information successfully!";
        else "Change employee information unsuccessfully!";
    }

    if ($action == "delete_employee"){
        $id = $_POST['id'];
        echo deleteEmployee($mysql_db,$id);
    }

    function deleteEmployee($mysql_db,$id){

        $sql = "DELETE FROM employee WHERE id = $id";
        $res = $mysql_db -> query($sql);
        if ($res) echo "Delete employee information successfully!";
        else "Delete employee information unsuccessfully!";
    }

    if ($action == "add_employee"){
        $fname = $_POST['fname'];
        $work = $_POST['work'];
        $avatar = $_POST['avatar'];
        $face = $_POST['face'];
        $twitter = $_POST['twitter'];
        $insta = $_POST['insta'];
        echo addEmployee($mysql_db,$fname,$work,$avatar,$face,$twitter,$insta);
    }

    function addEmployee($mysql_db,$fname,$work,$avatar,$face,$twitter,$insta){
        $sql = "INSERT INTO employee(full_name,work_as,link_image,link_facebook,link_twitter,link_instagram) 
                VALUES ('$fname', '$work', '$avatar','$face','$twitter', '$insta') ";
        $res = $mysql_db -> query($sql);
        if ($res) echo "Add employee information successfully!";
        else "ADD employee information unsuccessfully!";
    }


?>