<?php
include "model.php";

$page = $_POST["page"];
if (empty($page)) {  
        include ('start_page.php'); 
        exit();
}
else if($page == "StartPage"){
    $command = $_POST["command"];
        switch($command) {
            case 'SignUp':
                if(!username_exists($_POST['Username'])){
                    signup_a_new_user($_POST['FullName'],$_POST['Username']
                                        , $_POST['Password'],$_POST['Email']
                                        ,$_POST['Degree'],$_POST['Year']
                                        ,$_POST['Program'],$_POST['University']);
                    $error_msg_username = '';
                    $error_msg_password = '';
                    $display_modal_window = 'signin';
                    include('start_page.php'); 
                    exit();
                }else{
                    $error_msg_username = '*username, Exists';
                    $display_modal_window = 'signup';
                    include('start_page.php');
                    exit();
                }

            case 'Login': 
                    if (username_password_valid($_POST['Username'], $_POST['Password'])){
                        session_start();
                        $_SESSION['loggedIn'] = "YES";
                        $_SESSION["username"] = $_POST['Username'];
                        include ('main_page.php');
                        exit(); 
                    }else{
                        $error_msg_username = '* Wrong username, or';
                        $error_msg_password = '* Wrong password'; // Set an error message into a variable.
                                                              // This variable will used in the form in 'view_startpage.php'.
                        $display_modal_window = 'signin';  // It will display the start page with the SignIn box.
                                                       // This variable will be used in 'view_startpage.php'.
                        include('start_page.php');  // The user will see StartPage.     
                    }
                    break;
            }
}

else if($page == "MainPage"){
    $command = $_POST["command"];
    session_start();
        switch($command) {
            case 'Logout': 
                include ('start_page.php'); 
                exit();
            
            case 'DeleteProfile':
                deleteprofile($_SESSION['username']);
                include ('start_page.php');
                exit();
            case 'ViewDetails':
                $list = userdetails($_SESSION['username']);
                echo json_encode($list);
                exit();
            case 'UpdateProfile':
                if(updateuserdetails($_SESSION['username'], $_POST['update-name'], $_POST['update-degree'], $_POST['update-year'], $_POST['update-program'], $_POST['update-university'])){
                    $list = userdetails($_SESSION['username']);
                    echo json_encode($list);
                    exit();
                }
        }
}


else if($page == "MyCourses"){
    $command = $_POST["command"];
    session_start();
        switch($command) { 
            case 'ViewCourses':
                $list = viewcourse($_SESSION['username']);
                echo json_encode($list);
                exit();
                
            case 'AddCourses': 
                if(!coursecode($_SESSION['username'], $_POST['course-code'])){
                    addcourses($_SESSION['username'],$_POST['course-code'], $_POST['course-name'], $_POST['course-marks']);
                    $list = viewcourse($_SESSION['username']);
                    echo json_encode($list);
                }
                else{
                    echo "Course already exists. Try updating the course";
                }
                    exit();
             
            case 'UpdateCourses':
                if(coursecode($_SESSION['username'], $_POST['update-course-code'])){
                    updatecourses($_SESSION['username'], $_POST['update-course-code'], $_POST['update-course-name'], $_POST['update-course-marks']);
                    $list = viewcourse($_SESSION['username']);
                    echo json_encode($list);
                }
                else{
                    echo "Course Code not found";
                }
                exit();
            
            case 'DeleteCourses':
                if(coursecode($_SESSION['username'], $_POST['delete-course-code'])){
                    deletecourses($_SESSION['username'], $_POST['delete-course-code']);
                    $list = viewcourse($_SESSION['username']);
                    echo json_encode($list);
                }
                else{
                    echo "Course Code not found!";
                }
                exit();
        }
}


else if($page == "SearchQuestion"){
    $command = $_POST["command"];
    session_start();
        switch($command) {
            case 'Search': 
                $list = searchquestions($_POST['search-keyword']);
                // var_dump($list);
                // echo "Search Success!";
                echo json_encode($list);
                exit();
            
        }
}


else if($page == "Gradebook"){
    $command = $_POST["command"];
    session_start();
        switch($command) {
            case 'CalculateGrade': 
                $list = viewcourse($_SESSION['username']);
                echo json_encode($list);
                exit();

            case 'CalculateGpa':
                $list = viewcourse($_SESSION['username']);
                echo json_encode($list);
                exit();
        }
}


else if($page == "Credits"){
    $command = $_POST["command"];
    session_start();
        switch($command) {
            case 'CalculateCredits': 
                $num_credits_completed = ((int)$_POST["CourseDone"]) * 3;
                $course_credits = $_POST["Program"];
                echo $course_credits - $num_credits_completed;
                exit();
        }
}


?>