<?php 
if(!isset($_SESSION['loggedIn'])){
  include ("start_page.php");
  exit();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel = "stylesheet" href = "./main_page_stylesheet.css">
    <title>DashBoard</title>
  </head>
  <body>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->


  <div class="container-fluid p-4">
    <div class="row p-4">
        <div class="col-3 sidebar p-4">
          <img src="user.png">
          <div id="user_info">
            Name: <br>
            <br>Degree: <br>
            <br>Degree Year: <br>
            <br>Program: <br>
            <br>University: <br>
          </div> <!--user_info ends--> 
          
          
          <div id="main_page_buttons">
           
          <form id = "logout-profile" action="controller.php" method="post">
              <input type="hidden" name="page" value="MainPage">
              <input type="hidden" name="command" value="Logout">
              <button id="logout-profile-btn" type="submit" class="btn btn-success" style="margin-top: 20px;">Logout Profile</button>
            </form>
            <form id = "update-profile-form" action="controller.php" method="post">
              <input type="hidden" name="page" value="MainPage">
              <input type="hidden" name="command" value="UpdateProfile">
              <button id="update-profile-btn" type="button" class="btn btn-success" style="margin-top: 20px;">Update Profile</button>
            </form>
          </div>
            <form id = "delete-profile-form" action="controller.php" method="post">
              <input type="hidden" name="page" value="MainPage">
              <input type="hidden" name="command" value="DeleteProfile">
              <button id="delete-profile-btn" type="submit" class="btn btn-success" style="margin-top: 20px;">Delete Profile</button>
            </form>


        <!--Update Profile Modal -->
        <div class="modal fade" id="updateProfileModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="controller.php" method="POST">
                <div class="modal-body">
                  Updated Full Name: <input type="text" name="send-term" id="update-name"><br>
                  Updated Degree: <input type="text" name="send-term" id="update-degree"><br>
                  Updated Degree Year: <input type="text" name="send-term" id="update-year"><br>
                  Updated Program: <input type="text" name="send-term" id="update-program"><br>
                  Updated University: <input type="text" name="send-term" id="update-university"><br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" id="updateprofile-btn" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        </div> <!--sidebar ends-->


        <div class="col-9 main_content">
            <h2><span>DASHBOARD</span></h2>
            <div class="row">
              <div class="col-sm-12 col-md-4 pb-4 m-5">
                <div class="card">
                  <div class="card-body text-center">
                    <h5 class="card-title">MY COURSES</h5>
                    <p class="card-text">See what Courses you have and along with marks with one easy click.</p>
                    <a href="./my_courses.php" target= blank class="btn btn-success">Click Me</a>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 pb-4 m-5">
                <div class="card">
                  <div class="card-body text-center">
                    <h5 class="card-title">GRADEBOOK</h5>
                    <p class="card-text">Calculate your grade or GPA with one easy click.</p>
                    <a href="./gradebook.php" target= blank class="btn btn-success">Click Me</a>
                  </div>
                </div>
              </div>
            </div>
    
            <div class="row">
              <div class="col-sm-12 col-md-4 pb-4 m-5">
                <div class="card">
                  <div class="card-body text-center">
                    <h5 class="card-title">SEARCH A QUESTION</h5>
                    <p class="card-text">Have a Question? Search our database with one easy click.</p>
                    <a href="./search_question.php" target= blank class="btn btn-success">Click Me</a>
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-md-4 pb-4 m-5">
                <div class="card">
                  <div class="card-body text-center">
                    <h5 class="card-title">CREDITS</h5>
                    <p class="card-text">Calcuate the number of credits left to complete your degree with one easy click.</p>
                    <a href="./credits.php" target= blank class="btn btn-success">Click Me</a>
                  </div>
                </div>
              </div>
            </div>
        </div>  <!--col-9 ends-->     
    </div> <!--row ends-->
  </div>   <!--container-fluid ends-->
  </body>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


  <script>
  //Table display on loading of the page
  window.addEventListener("load", function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
          let data = JSON.parse(this.responseText)
          str = `Name: ${data[0]["FullName"]}<br>
            <br>Degree: ${data[0]["Degree"]}<br>
            <br>Degree Year: ${data[0]["Year"]}<br>
            <br>Program: ${data[0]["Program"]}<br>
            <br>University: ${data[0]["University"]}<br>`
          document.getElementById("user_info").innerHTML = str;
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=MainPage";
    query += "&command=ViewDetails";
    xhttp.send(query);
  });


   //Update Profile
   $("#update-profile-btn").click(function() {
    $("#updateProfileModal").modal('show');
  });

  $("#updateprofile-btn").click(function() {
    $("#updateProfileModal").modal('hide');
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        let data = JSON.parse(this.responseText)
          str = `Name: ${data[0]["FullName"]}<br>
            <br>Degree: ${data[0]["Degree"]}<br>
            <br>Degree Year: ${data[0]["Year"]}<br>
            <br>Program: ${data[0]["Program"]}<br>
            <br>University: ${data[0]["University"]}<br>`
          document.getElementById("user_info").innerHTML = str;
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=MainPage";
    query += "&command=UpdateProfile";
    query += "&update-name=" + $('#update-name').val();
    query += "&update-degree=" + $('#update-degree').val();
    query += "&update-year=" + $('#update-year').val();
    query += "&update-program=" + $('#update-program').val();
    query += "&update-university=" + $('#update-university').val();
    xhttp.send(query);
  });
</script>

</html>