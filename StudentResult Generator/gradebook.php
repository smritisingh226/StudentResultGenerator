
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="./gradebook_stylesheet.css">
  <title>GradeBook</title>
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

  <h2>GRADEBOOK</h2>
  <h1>Calculate Your GPA And Grade</h1>

  <div class="grade-content" id ="grade-display">
    <h4>Click On the Calculate GPA botton to know your overall GPA or Click on the Calculate Grade Button to know your grade in each subject.<h4>
  </div>

  <div id="grade_buttons">
    <button id="calculate-gpa-btn" type="button" class="btn btn-success btn-lg">Calculate GPA</button>
    <button id="calculate-grade-btn" type="button" class="btn btn-success btn-lg">Calculate Grade</button>
  </div>

</body>


<script>
  //Calculate GPA
  $("#calculate-gpa-btn").click(function() {
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
          let totalMarks = 0;
          let totalSubjects = 0;
          for (let i = 0; i < rows.length; i++) {
            let marks = Number(rows[i]["Course_Marks"]);
            totalMarks += marks;
            totalSubjects ++;
            str += "<tr>";
            for (let j in rows[i]) {
              str += "<td>" + rows[i][j] + "</td>";
            }
            str += "</tr>";
          }
          let percentage = (totalMarks/totalSubjects) * 100;
          let gpa = "";
          if(percentage >= 90){
            gpa = "4.5";
          }else if(percentage >= 80){
            gpa = "4";
          }else if(percentage >= 70){
            gpa = "3.5";
          }else if(percentage >= 60){
            gpa = "3";
          }else if(percentage >= 50){
            gpa = "2.5";
          }else if(percentage >= 40){
            gpa = "2";
          }else{
            gpa = "0";
          }
          str += "</table>";
          document.getElementById("grade-display").innerHTML = str + '<br>' + "<h2>Your GPA is: " + gpa + "</h2>";
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=Gradebook";
    query += "&command=CalculateGpa";
    xhttp.send(query);
  });


    //Calculate Grade
    $("#calculate-grade-btn").click(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        let rows = JSON.parse(this.responseText)
        str = "<table class = 'table'>";
        str += "<tr>";
        for (let i in rows[0]) {
          str += "<th scope = 'col'>" + i + "</th>";
        }
        str += "<th scope = 'col'> Grade </th>";
        str += "</tr>";
        for (let i = 0; i < rows.length; i++) {
          let marks = Number(rows[i]["Course_Marks"]);
          let grade = "";
          if(marks >= 90){
            grade = "A+";
          }else if(marks >= 80){
            grade = "A";
          }else if(marks >= 70){
            grade = "B+";
          }else if(marks >= 60){
            grade = "B";
          }else if(marks >= 50){
            grade = "C+";
          }else if(marks >= 40){
            grade = "C";
          }else{
            grade = "F";
          }
          str += "<tr>";
          for (let j in rows[i]) {
            str += "<td>" + rows[i][j] + "</td>";
          }
          str += "<td>" + grade + "</td>";
          str += "</tr>";
        }

        str += "</table>";
        document.getElementById("grade-display").innerHTML = str;
      }
    }

    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=Gradebook";
    query += "&command=CalculateGrade";
    xhttp.send(query);
  });
</script>

</html>