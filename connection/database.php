<?php 
class Database{
    public  $host = "localhost";
    public  $username = "root";
    public  $password = "";
    public  $dbname = "project_move";
    public $db;

    public function __construct()
    {
        $this->dbconnection();
        date_default_timezone_set('Asia/Bangkok');

    }

    public function dbconnection(){
     $this->db = new mysqli($this->host, $this->username, $this->password, $this->dbname);
     if(!$this->db){
        print($this->db->num_error);
        exit();
     }
    }
    public function date()
    {
        return date('Y-m-d H-i-s');
    }

    public function save($table, $fields)
    {
        $sql = "INSERT INTO " . $table . "(" . implode(",", array_keys($fields)) . ")
        VALUES('" . implode("','", array_values($fields)) . "') ";
        // print_r($sql);
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function view($table)
    {
        $sql = "SELECT * FROM " . $table . " ";
        $result = $this->db->query($sql);
        $list = array();
        while ($data = $result->fetch_assoc()) {
            $list[] = $data;
        }
        return  $list;
    }

    public function selectwhere($table, $where)
    {
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "SELECT * FROM " . $table . " WHERE " . $condition . " ";
        // var_dump($sql);
        $result = $this->db->query($sql);
        $list = array();
        while ($data = $result->fetch_assoc()) {
            $list[] = $data;
        }
        return $list;
    }
    public function update($table, $fields, $where)
    {
        $condition = "";
        $query = "";
        foreach ($fields as $key => $value) {
            $query .= $key . " = '" . $value . "' , ";
        }
        $query = substr($query, 0, -2);
        foreach ($where as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = " UPDATE " . $table . " SET " . $query . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }

    public function delete($table, $where)
    {
        $condition = "";
        foreach ($where as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $sql = "DELETE FROM " . $table . " WHERE " . $condition . " ";
        $result = $this->db->query($sql);
        if ($result) {
            return true;
        }
        return false;
    }
   
    public function login($email, $password)
    {
         $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
        $result = $this->db->query($sql);
        $row = mysqli_fetch_array($result);
        if ($row > 0) {
            $user = $row['user_type'];
            $status = $row['status'];
            if ($status == 1) {
                switch ($user) {
                    case "admin":
                        $_SESSION['email'] = $email;
                        js_redirect("{$user}/{$user}_edit.php");
                        break;
                    case "user":
                        $_SESSION['email'] = $row['email'];
                        js_redirect("{$user}/{$user}_edit.php");
                        break;
                   
                }
            } else {
                js_alert('รอการยืนยัน');
            }
        } else {
            js_alert('อีเมลหรือรหัสผ่านไม่ถูกต้อง');
           
        }
    }

    public function upload($file, $path = "/assets/img")
    {
        if (empty($file['name'])) {
            return false;
        }

        $file_name = $file['name'];
        $tmp_name = $file['tmp_name'];


        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $name = uniqid();
        $rename = $name . '.' . $ext;
        $file_upload = $path . '/' . $rename;

        $upload = move_uploaded_file($tmp_name, __DIR__ . '/../' . $file_upload);
        if ($upload) {
            return $file_upload;
        }
        return false;
    }

}
?>