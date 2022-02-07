<?php
include  'config.php';

class API_Call
{
    private $deskid = '';
    private function db_connect()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "db_al_adeed_fb";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }
    public function login()
    {
        include 'config.php';
        if (isset($_GET['desk_id']))
        {
            unset($_GET['desk_id']);
        }
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $sql = "SELECT * from desks where username='".$_POST['username']."' and '".md5($_POST['password'])."'";
            $result = mysqli_query($this->db_connect(),$sql);
            if (mysqli_num_rows($result)>0)
            {
                while ($row =mysqli_fetch_array($result))
                {
                    $user[]=$row;
                }
                $_SESSION['desk_id']=$user[0]['id'];
                include 'config.php';
                header("Location:".$base_url."feedback.php?desk_id=".$user[0]['id']);
            }
            else {
                header("Location:".$base_url);
            }
        }
    }
    public function save_feedback()
    {
        $feed_back_id = ($_POST['id']) ? $_POST['id']:'';
        $time_stamp = date('Y-m-d');
        $desk_id = ($_POST['desk_id']) ? $_POST['desk_id']:'';
        try {
            $sql = "INSERT INTO 
                    feedbacks (
                        ans,
                        date_of_added,
                        desk_id
                    )
                    VALUES(
                           '".$feed_back_id."',
                           '".$time_stamp."',
                           '".$desk_id."'
                    )
                            ";
            $result = mysqli_query($this->db_connect(),$sql);
            echo json_encode(['status'=>'OK']);
        }catch (Exception $e)
        {
            echo json_encode(['status'=>'ERR']);
        }

    }
}