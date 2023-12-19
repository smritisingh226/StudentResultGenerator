
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./credits_stylesheet.css">
  <title>Credits</title>
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

  <h2>CREDITS</h2>
  <h1>Calculate the number of Credits left to get a degree in one easy step.</h1>
  <div class="credits-display">
    <form action="controller.php" method="post">
      <input type='hidden' name='page' value='CreditsPage'>
      <input type='hidden' name='command' value='CalculateCredits'>

      <label style='margin-top: 50px; text-align: center' for="CourseDone">Enter the number of courses done:</label>
      <input id="CourseDone" type="text" name="CourseDone" required><br>

      <label style='margin-top: 30px' for="Program">Select the program</label>
      <select id="Program" name = "Program" style='width: 30%' aria-label="Default select example">
        <option selected>Programs</option>
        <option value=120>Under Graduation</option>
        <option value=30>Post Graduation</option>
        <option value=60>Masters</option>
        <option value=90>Phd</option>
      </select>
      <div class="d-grid gap-2 col-6 mx-auto">
      <button style='margin: 10px' id="calculate-credits-btn" type="button" class="btn btn-success">Calculate</button>
      </div>
    </form>
  </div>

</body>

<script>
  //Calculate Credits
  $("#calculate-credits-btn").click(function() {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert("Number of credits left = " + this.responseText);
      }
    }

    xhttp.open("POST", "controller.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var query = "";
    query += "page=Credits";
    query += "&command=CalculateCredits";
    query += "&CourseDone=" + $('#CourseDone').val();
    query += "&Program=" + $('#Program').val();
    xhttp.send(query);
  });
</script>

</html>