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
      $name = $_POST['name']/*  ? $_POST['name'] : "a"*/;
      $email = $_POST['email']/* ? $_POST['email'] : "aaa@aaa.aaa"*/;
      $agree = $_POST['agree']/* ? $_POST['agree'] : true*/;
      $currentGPA = $_POST["currentGPA"]/* ? $_POST["currentGPA"] : NULL*/;
      $currentCredits = $_POST["currentCredits"] /*? $_POST["currentCredits"] : NULL */;
      $newCredits = $_POST['newCredits']/* ? $_POST['newCredits'] : 1*/;
      $GPAincrease = $_POST["GPAincrease"];
      $err = false;

      function calculateGPA() {
        $currentGPAhours = $currentGPA + $currentCredits;
        $desiredGPA = $currentGPA + $GPAincrease;
        $desiredGPAhours = $desiredGPA * ($currentCredits + $newCredits);
        $GPAhoursIncrease = $desiredGPAhours - $currentGPAhours;
        $newGPA = $GPAhoursIncrease / $newCredits;
        return $newGPA;
      }

      if(isset($_POST["submitted"])) {
        // regex gladly taken from https://www.w3schools.com/php/php_form_url_email.asp
        if   (!preg_match("/^[a-zA-Z ]*$/",$name) || $name == "") {
          $nameErr = "Your name must consist of letters and white space";
          $err = true;
        }

        // Checks the email to validate it is a proper email
        // non-functional. doesn't err when improper email is inputted
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
          $err = true;
        }

        // This needs to not trip on original view of the site.
        if (!$agree) {
          $agreeErr = "You must agree to the terms and conditions";
          $err = true;
        }

        // ensure that the inputted GPA falls between 0 and 4.0 inclusive
        if (floatval($currentGPA) < 0 || floatval($currentGPA) > 4.0 || $currentGPA == "") {
            $gpaErr = "Your current GPA must be a number between 0.0 and 4.0";
            $err = true;
        }

        // current credits must be an integer and greater than or equal to 0. Needs an extra or statement for the edge case 0
        // found on https://www.w3schools.com/php/filter_validate_int.asp
        if ($currentCredits < 0 || (!$currentCredits == 0 && !filter_var($currentCredits, FILTER_VALIDATE_INT) || $currentCredits == "")) {
          $creditsErr = "Your current number of credits must be a positive integer";
          $err = true;
        }

        // You have to take more than 0 credits a semester
        // triggers on original load. need a fix
        if ($newCredits < 0 || !filter_var($newCredits, FILTER_VALIDATE_INT)) {
          $newErr = "(the number of credits this semester an integer greater than 0)";
          $err = true;
        }

        if ($GPAincrease < 0 || $GPAincrease == "") {
          $increaseErr = "(your desired GPA increase must be a positive value)";
          $err = true;
        }
      }


      if($err && isset($_POST["submitted"])) {
        echo "<p><span class=\"error\">All form fields must be completed for the GPA calculator to function.</span></p>";
      }
    ?>
    <form method="post" action="improveGPA.php">

        Name: <input type="text" size="35" name="name" value="<?php echo $name;?>">
        <span class="error"><?php echo $nameErr;?></span>
        <br><br>

        E-mail: <input type="text" size="35" name="email" value="<?php echo $email;?>">
        <span class="error"><?php echo $emailErr;?></span>
        <br><br>

        <input type="checkbox" name="agree", value="<?php true;?>">
        I agree to the terms and conditions of this website.
        <span class="error"><?php echo $agreeErr;?></span>
        <br><br>

        Current GPA: <input type="text" size="4" name="currentGPA" value="<?php echo $currentGPA;?>">
        <span class="error"><?php echo $gpaErr;?></span>
        <br><br>

        Current Total Credits: <input type="text" size="3" name="currentCredits" value="<?php echo $currentCredits;?>">
        <span class="error"><?php echo $creditsErr;?></span>
        <br><br>

        I am taking <input type="text" size="3" name="newCredits" value="<?php echo $newCredits;?>">
        <span class="error"><?php echo $newErr;?></span> credits this semester.

        If I want to raise my GPA
        <input type="text" size="4" name="GPAincrease" value="<?php echo $GPAincrease;?>">
        <span class="error"><?php echo $increaseErr;?></span> points,
        I need a <span style="font-weight: bold;"><?php !$err ? $val = calculateGPA($newCredits, $currentCredits, $GPAincrease) : $val = "????"; echo "$val";?></span> GPA on my courses this semester.
        <br><br>

        <input type="submit" name="submitted" value="Calculate">

    </form>

</body>

</html>
