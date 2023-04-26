<?php

// php user class
class User
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into user table
    public  function insertIntoUser($params = null, $table = "user")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                // "Insert into user(user_id) values (0)"
                // get table columns
                $username = $params['user_name'];
                $email = $params['email'];
                $password = $params['pswd'];

                //check that the username is taken or not
                $sql = "SELECT user_name FROM $table WHERE user_name=?;";                                //sql query for get same user in db
                $stmt = mysqli_stmt_init($this->db->con);                                             //initialize the statement
                //prepare the statement
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:" . $_SERVER['PHP_SELF'] . "?errors=sqlerror");
                }
                mysqli_stmt_bind_param($stmt, "s", $username);                            //bind the parameters for avoiding sql injection
                mysqli_stmt_execute($stmt);                                               //execute the query
                mysqli_stmt_store_result($stmt);                                          //store the result in $stmt
                $result = mysqli_stmt_num_rows($stmt);                                    //get the number of row in $result
                //check that there is user exist or not
                if ($result > 0) {
                    header("Location: " . $_SERVER['PHP_SELF'] . "?error=usertaken");
                } else {
                    $sql = "INSERT INTO $table(user_name, email, pswd) values (?, ?, ?);";         //sql query for create new user
                    //prepare the statement
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: " . $_SERVER['PHP_SELF'] . "?error=sqlerror");
                    }
                    //create new user
                    else {
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);    //bind the parameters for avoiding sql injection
                        mysqli_stmt_execute($stmt);                                           //execute the query                                  
                        header("Location: " . $_SERVER['PHP_SELF'] . "?signup=success");
                    }
                }
            } else return false;
        } else return false;
    }

    // to get user_id and item_id and insert into cart table
    public  function addToUser($username, $email, $password)
    {

        $params = array(
            "user_name" => $username,
            "email" => $email,
            "pswd" => $password

        );

        // insert data into cart
        $this->insertIntoUser($params);
    }

    // get user using user name
    public function login($user_name, $password, $table = 'user')
    {
        if (isset($user_name)) {
            //initialize the signup data
            $emailuid = $user_name;
            //error handlers
            if (empty($emailuid) || empty($password)) {
                header("Location:" . $_SERVER['PHP_SELF'] . "?error=emptyfields");
                exit();
            } else {
                $sql = "SELECT * FROM $table WHERE user_name=? OR email=?";                         //sql query for fetch the user info of the mail or uid
                $stmt = mysqli_stmt_init($this->db->con);                                              //initialize the statement
                //prepare statement
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location:" . $_SERVER['PHP_SELF'] . "?error=sqlerror1");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $emailuid, $emailuid);                 //bind the parameters for avoiding sql injection
                    mysqli_stmt_execute($stmt);                                                //execute the query
                    $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        $pwdcheck = strcmp($password, $row['pswd']);                     //verify the password it store true or false
                        if ($pwdcheck != 0) {
                            header("Location:" . $_SERVER['PHP_SELF'] . "?error=wrongpassword");
                            exit();
                        } elseif ($pwdcheck == 0) {
                            session_start();                                                        //start the session
                            //session variables
                            $_SESSION['userId'] = $row['user_id'];                                      //session variable of user id                               
                            header("Location:" . $_SERVER['PHP_SELF'] . "?login=success");
                            exit();
                        } else {
                            header("Location: ..index.php?error=worngpwd");
                            exit();
                        }
                    }
                }
            }
        }
    }
    public function  getUser($userId)
    {
        if (isset($userId)) {
            $sql = "SELECT * FROM user WHERE user_id=?";                         //sql query for fetch the user info of the mail or uid
            $stmt = mysqli_stmt_init($this->db->con);                                              //initialize the statement
            //prepare statement
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location:" . $_SERVER['PHP_SELF'] . "?error=sqlerror1");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $userId);                 //bind the parameters for avoiding sql injection
                mysqli_stmt_execute($stmt);                                                //execute the quarry
                $result = mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($result)) {                //verify the password it store true or false
                    return $row;
                } else {
                    header("Location: /");
                }
            }
        }
    }
}
