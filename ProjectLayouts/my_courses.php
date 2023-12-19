<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./my_courses_stylesheet.css">
  <title>My Courses</title>
</head>

<body>
  <!-- <h1>Hello, world!</h1> -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  <h2><span>MY COURSES</span></h2>

  <div class="course_table" id="course-list">
    Courses Displayed here.
  </div>

  <div id="mycourse_buttons">
    <button id="add-course-btn" type="submit" class="btn btn-success btn-lg">Add Course</button>
    <button id="update-course-btn" type="submit" class="btn btn-success btn-lg">Update Course</button>
    <button id="delete-course-btn" type="submit" class="btn btn-success btn-lg">Delete Course</button>
  </div>



  <!-- Add Course Modal -->
  <div class="modal fade" id="addCourseModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addCourseModalLabel">Add A Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="controller.php" method="POST">
          <div class="modal-body">
            Course Code: <input type="text" name="send-term" id="course-code"><br>
            Course Name: <input type="text" name="send-term" id="course-name"><br>
            Course Mark: <input type="text" name="send-term" id="course-marks">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="add-btn" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--Update Course Modal -->
  <div class="modal fade" id="updateCourseModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateCourseModalLabel">Update A Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="controller.php" method="POST">
          <div class="modal-body">
            Enter Course Code: <input type="text" name="send-term" id="update-course-code"><br>
            Update Course Name: <input type="text" name="send-term" id="update-course-name"><br>
            Update Course Mark: <input type="text" name="send-term" id="update-course-marks">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="update-btn" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!--Delete Course Modal -->
  <div class="modal fade" id="deleteCourseModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteCourseModalLabel">Delete A Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="controller.php" method="POST">
          <div class="modal-body">
            Enter Course Code: <input type="text" name="send-term" id="delete-course-code"><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="delete-btn" class="btn btn-primary">Delete</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script>
  window.addEventListener("load", function(){
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
          let rows = JSON.parse(this.responseText)
          str = "<table class = 'table'>";
          str += "<tr>";
          for (let i in rows[0]) {
            str += "<th scope = 'col'>" + i + "</th>";
          }
          str += "</tr>";
          for (let i = 0; i < rows.length; i++) {
            str += "<tr>";
            for (let j in rows[i]) {
              str += "<td>" + rows[i][j] + "</td>";
            }
            str += "</tr>";
          }

          str += "</table>";
          document.getElementById("course-list").innerHTML = str;
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=MyCourses";
    query += "&command=ViewCourses";
    xhttp.send(query);
  });

  //Add course
  $("#add-course-btn").click(function() {
    $("#addCourseModal").modal('show');
  });

  $("#add-btn").click(function() {
    $("#addCourseModal").modal('hide');
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "Course already exists. Try updating the course") {
          alert(this.responseText);
        } else {
          let rows = JSON.parse(this.responseText)
          str = "<table class = 'table'>";
          str += "<tr>";
          for (let i in rows[0]) {
            str += "<th scope = 'col'>" + i + "</th>";
          }
          str += "</tr>";
          for (let i = 0; i < rows.length; i++) {
            str += "<tr>";
            for (let j in rows[i]) {
              str += "<td>" + rows[i][j] + "</td>";
            }
            str += "</tr>";
          }

          str += "</table>";
          document.getElementById("course-list").innerHTML = str;
        }
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=MyCourses";
    query += "&command=AddCourses";
    query += "&course-code=" + $('#course-code').val();
    query += "&course-name=" + $('#course-name').val();
    query += "&course-marks=" + $('#course-marks').val();
    xhttp.send(query);
  });


  //Update Course
  $("#update-course-btn").click(function() {
    $("#updateCourseModal").modal('show');
  });

  $("#update-btn").click(function() {
    $("#updateCourseModal").modal('hide');
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "Course Code not found") {
          alert(this.responseText);
        } else {
        let rows = JSON.parse(this.responseText)
        str = "<table class = 'table'>";
        str += "<tr>";
        for (let i in rows[0]) {
          str += "<th scope = 'col'>" + i + "</th>";
        }
        str += "</tr>";
        for (let i = 0; i < rows.length; i++) {
          str += "<tr>";
          for (let j in rows[i]) {
            str += "<td>" + rows[i][j] + "</td>";
          }
          str += "</tr>";
        }

        str += "</table>";
        document.getElementById("course-list").innerHTML = str;
      }
    }
    }

    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=MyCourses";
    query += "&command=UpdateCourses";
    query += "&update-course-code=" + $('#update-course-code').val();
    query += "&update-course-name=" + $('#update-course-name').val();
    query += "&update-course-marks=" + $('#update-course-marks').val();
    xhttp.send(query);
  });


  //Delete Course
  $("#delete-course-btn").click(function() {
    $("#deleteCourseModal").modal('show');
  });

  $("#delete-btn").click(function() {
    $("#deleteCourseModal").modal('hide');
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        let rows = JSON.parse(this.responseText)
        str = "<table class = 'table'>";
        str += "<tr>";
        for (let i in rows[0]) {
          str += "<th scope = 'col'>" + i + "</th>";
        }
        str += "</tr>";
        for (let i = 0; i < rows.length; i++) {
          str += "<tr>";
          for (let j in rows[i]) {
            str += "<td>" + rows[i][j] + "</td>";
          }
          str += "</tr>";
        }

        str += "</table>";
        document.getElementById("course-list").innerHTML = str;
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=MyCourses";
    query += "&command=DeleteCourses";
    query += "&delete-course-code=" + $('#delete-course-code').val();
    xhttp.send(query);
  });
</script>

</html>