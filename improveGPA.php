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
      // initialize necessary variables fix
      $nameErr = $emailErr = $agreeErr = $gpaErr = $creditsErr = $newErr = $increaseErr = "";
      $name = $agree = $credits = $new = $increase = "";
      $gpa = 1;

      // regex gladly taken from https://www.w3schools.com/php/php_form_url_email.asp
      // issues here. doesn't trigger error
      if   (!preg_match("/^[a-zA-Z ]*$/",$_POST['name'])) {
        $nameErr = "Your name must consist of letters and white space";
      }

      // Checks the email to validate it is a proper email
      // non-functional. doesn't err when improper email is inputted
      if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }

      // This needs to not trip on original view of the site.
      if (!isset($_POST['agree']) ) {
        $agreeErr = "You must agree to the terms and conditions";
      }

      // ensure that the inputted GPA falls between 0 and 4.0 inclusive
      if (floatval($_POST["currentGPA"]) < 0 || floatval($_POST["currentGPA"]) > 4.0) {
          $gpaErr = "Your current GPA must be a number between 0.0 and 4.0";
      }

      // current credits must be an integer and greater than or equal to 0. Needs an extra or statement for the edge case 0
      // found on https://www.w3schools.com/php/filter_validate_int.asp
      if ($_POST["currentCredits"] < 0 || (!$_POST["currentCredits"] == 0 && !filter_var($_POST["currentCredits"], FILTER_VALIDATE_INT))) {
        $creditsErr = "Your current number of credits must be a positive integer";
      }

      // You have to take more than 0 credits a semester
      // triggers on original load. need a fix
      if ($_POST["newCredits"] < 0 || !filter_var($_POST["newCredits"], FILTER_VALIDATE_INT)) {
        $newErr = "(the number of credits this semester an integer greater than 0)";
      }

      if ($_POST["GPAincrease"] < 0) {
        $increaseErr = "(your desired GPA increase must be a positive value)";
      }

    ?>
    <p><span class="error">All form fields must be completed for the GPA calculator to function.</span></p>
    <form method="post" action="improveGPA.php">

        Name: <input type="text" size="35" name="name" value="<?php $name?>">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>

        E-mail: <input type="text" size="35" name="email" value="<?php $email?>">
        <span class="error"><?php echo $emailErr;?></span>
        <br><br>

        <input type="checkbox" name="agree">
        I agree to the terms and conditions of this website.
        <span class="error"><?php echo $agreeErr;?></span>
        <br><br>

        Current GPA: <input type="text" size="4" name="currentGPA" value="<?php $gpa?>">
        <span class="error"><?php echo $gpaErr;?></span>
        <br><br>

        Current Total Credits: <input type="text" size="3" name="currentCredits" value="">
        <span class="error"><?php echo $creditsErr;?></span>
        <br><br>

        I am taking <input type="text" size="3" name="newCredits" value="">
        <span class="error"><?php echo $newErr;?></span> credits this semester.

        If I want to raise my GPA
        <input type="text" size="4" name="GPAincrease" value="">
        <span class="error"><?php echo $increaseErr;?></span> points,
        I need a <span style="font-weight: bold;">????</span> GPA on my courses this semester.
        <br><br>

        <input type="submit" name="submit" value="Calculate">

    </form>

</body>

</html>
