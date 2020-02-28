<!DOCTYPE html>
<html lang="en">

<head>
    <title>GPA Improvement Calculator</title>
    <style>
        .error {
          color: #FF0000;
        }
    </style>
</head>

<body>
    <h1>GPA Improvement Calculator</h1>
    <?php
      //initialize necessary variables fix
      $nameErr = $emailErr = $agreeErr = $gpaErr = $creditsErr = $newErr = $increaseErr = "";
      $name = $email = $agree = $gpa = $credits = $new = $increase = "";

      if (empty($_POST["name"])) {
      $nameErr = "Name is required";
      } else {
      $name = test_input($_POST["name"]);
      }
    ?>
    <p><span class="error">All form fields must be completed for the GPA calculator to function.</span></p>
    <form method="post" action="improveGPA.php">

        Name: <input type="text" size="35" name="name" value="">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>

        E-mail: <input type="text" size="35" name="email" value="">
        <span class="error"></span>
        <br><br>

        <input type="checkbox" name="agree"  >
        I agree to the terms and conditions of this website.
        <span class="error"></span>
        <br><br>

        Current GPA: <input type="text" size="4" name="currentGPA" value="">
        <span class="error"></span>
        <br><br>

        Current Total Credits: <input type="text" size="3" name="currentCredits" value="">
        <span class="error"></span>
        <br><br>

        I am taking <input type="text" size="3" name="newCredits" value="">
        <span class="error"></span> credits this semester.

        If I want to raise my GPA
        <input type="text" size="4" name="GPAincrease" value="">
        <span class="error"></span> points,
        I need a <span style="font-weight: bold;">????</span> GPA on my courses this semester.
        <br><br>

        <input type="submit" name="submit" value="Calculate">

    </form>

</body>

</html>
