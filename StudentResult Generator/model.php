<?php

$conn = mysqli_connect('localhost', 'w3ssingh', 'w3ssingh136', 'C354_w3ssingh');
//start_page
function username_password_valid($u, $p){
    global $conn;
    $sql = "SELECT * FROM Persons WHERE (Username = '$u' and Password = '$p')";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0){
        while($sql_row = mysqli_fetch_assoc($result)){
		return $u == $sql_row['Username'] and $p == $sql_row['Password'];
        }
    }
    
}

function signup_a_new_user($name, $username, $password, $email, $degree, $year, $program, $university){
    global $conn;
    $sql = "INSERT INTO Persons Values(NULL, '$name', '$username', '$password', '$email', '$degree', '$year', '$program', '$university')";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function username_exists($u){
    global $conn;
    $sql = "SELECT * FROM Persons WHERE(Username = '$u')";
    $res = mysqli_query($conn, $sql);
    return mysqli_num_rows($res) > 0;
}

// MainPage
function userdetails($username){
    global $conn;
    $sql = "SELECT * FROM Persons Where username = '$username'";
    $res = mysqli_query($conn, $sql);
    $sql_questions_array=[];
    $i=0;
    while($row = mysqli_fetch_assoc($res)){
        $sql_questions_array[$i] = $row;
        $i++;
    }
    return $sql_questions_array;
}

function deleteprofile($u){
    global $conn;
    $sql = "DELETE FROM Persons WHERE (Username = '$u')";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function updateuserdetails($username, $update_name, $update_degree, $update_year, $update_program, $update_university){
    global $conn;
    $sql = "UPDATE Persons SET FullName = '$update_name', Degree = '$update_degree', Year = '$update_year', Program = '$update_program', University = '$update_university' WHERE Username = '$username'";
    $res = mysqli_query($conn, $sql);
    return $res;
}

// MyCourses
function coursecode($username, $course_code){
    global $conn;
    $sql = "SELECT Course_Code FROM Courses WHERE (username = '$username' AND Course_Code = '$course_code')";
    $res = mysqli_query($conn, $sql);
        return mysqli_num_rows($res) > 0;
}

function viewcourse($username){
    global $conn;
    $sql = "SELECT Course_Code, Course_Name, Course_Marks FROM Courses Where username = '$username'";
    $res = mysqli_query($conn,$sql);
    $sql_course_array=[];
    $i=0;
    while($row = mysqli_fetch_assoc($res)){
        $sql_course_array[$i] = $row;
        $i++;
    }
    return $sql_course_array;
}

function addcourses($username, $course_code, $course_name, $course_marks){
    global $conn;
    $sql = "INSERT INTO Courses Values(NULL, '$username', '$course_code', '$course_name', '$course_marks')";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function updatecourses($username, $update_course_code, $update_course_name, $update_course_marks){
    global $conn;
    $sql = "UPDATE Courses SET Course_Name = '$update_course_name', Course_Marks = '$update_course_marks' WHERE (Course_Code = '$update_course_code' AND username = '$username')";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function deletecourses($username, $delete_course_code){
    global $conn;
    $sql = "DELETE FROM Courses WHERE (username = '$username' AND Course_Code = '$delete_course_code')";
    $res = mysqli_query($conn, $sql);
    return $res;
}


// SearchQuestions
function searchquestions($search_keyword) {
    global $conn;
    $sql = "SELECT Question, Answer FROM QuestionsTable Where (Question like '%$search_keyword%')";
    $res = mysqli_query($conn, $sql);
    $sql_questions_array=[];
    $i=0;
    while($row = mysqli_fetch_assoc($res)){
        $sql_questions_array[$i] = $row;
        $i++;
    }
    return $sql_questions_array;
}
?>