<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $course = $level = "";
$name_err = $course_err = $level_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate course
    $input_course = trim($_POST["course"]);
    if(empty($input_course)){
        $course_err = "Please enter a course.";     
    } else{
        $course = $input_course;
    }
    
    // Validate level
    $input_level = trim($_POST["level"]);
    if(empty($input_level)){
        $level_err = "Please enter your level.";     
    } elseif(!ctype_digit($input_level)){
        $level_err = "Please enter a positive integer value.";
    } else{
        $level = $input_level;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($course_err) && empty($level_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO students (name, course, level) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_course, $param_level);
            
            // Set parameters
            $param_name = $name;
            $param_course = $course;
            $param_level = $level;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add students record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Course</label>
                            <textarea name="course" class="form-control <?php echo (!empty($course_err)) ? 'is-invalid' : ''; ?>"><?php echo $course; ?></textarea>
                            <span class="invalid-feedback"><?php echo $course_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>level</label>
                            <input type="text" name="level" class="form-control <?php echo (!empty($level_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $level; ?>">
                            <span class="invalid-feedback"><?php echo $level_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
