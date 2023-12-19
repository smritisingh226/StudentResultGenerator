
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="./search_question_stylesheet.css">
  <title>SearchAQuestion</title>
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

  <h2>SEARCH A QUESTION?</h2>
  <h1>Have a Question? Serach Our Databases for any Doubts?<br>Just type in a key word.</h1>
  <div class="search-question" id="searchQuestions">
    <form action="controller.php" method="POST">
      <div class="modal-body">
        Type in a keyword here <input type="text" name="send-term" id="search-keyword"><br>
      </div>
      <div class="modal-footer">
        <button type="button" id="search-btn" class="btn btn-primary">Search</button>
      </div>
    </form>
  </div>


  <div class="question-display" id="question-list">
    Questions displayed here
  </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
  //Search Questions
  $("#search-btn").click(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        let rows = JSON.parse(this.responseText)
        str = "<table class = 'table'>";
        str += "<tr>";
        for(let i in rows[0]){
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
        document.getElementById("question-list").innerHTML = str;
      }
    }
    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=SearchQuestion";
    query += "&command=Search";
    query += "&search-keyword=" + $('#search-keyword').val();
    xhttp.send(query);
  });
</script>

</html>