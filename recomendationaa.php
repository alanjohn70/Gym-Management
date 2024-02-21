<?php
session_start();
error_reporting(0);
include 'include/config.php';
$uid=$_SESSION['uid'];

if(isset($_POST['submit']))
{ 
$pid=$_POST['pid'];


$sql="INSERT INTO tblbooking (package_id,userid) Values(:pid,:uid)";

$query = $dbh -> prepare($sql);
$query->bindParam(':pid',$pid,PDO::PARAM_STR);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Package has been booked.');</script>";
echo "<script>window.location.href='booking-history.php'</script>";
}

// Function to calculate BMI
function calculateBMI($height, $weight) {
    return $weight / (($height / 100) * ($height / 100));
}

// Function to get diet recommendation based on BMI
function getDietRecommendation($bmi) {
    if ($bmi < 18.5) {
        return "You are underweight. It's important to focus on a balanced diet that includes an adequate amount of proteins, healthy fats, and carbohydrates to support weight gain.";
    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
        return "Your BMI is within the normal range. Maintain a balanced diet with a variety of nutrients, including proteins, carbohydrates, and healthy fats.";
    } elseif ($bmi >= 25 && $bmi < 29.9) {
        return "You are overweight. Consider adopting a calorie-controlled diet with a focus on whole foods, and incorporate regular physical activity into your routine to support weight loss.";
    } else {
        return "You are in the obese range. It's crucial to consult with a healthcare professional to develop a personalized diet plan that addresses your specific needs and health goals.";
    }
}

// Function to get workout recommendation based on age
function getWorkoutRecommendation($age) {
    if ($age < 18) {
        return "For individuals under 18, it's important to engage in age-appropriate physical activities and sports to support overall growth and development.";
    } elseif ($age >= 18 && $age < 30) {
        return "Consider incorporating a well-rounded fitness routine that includes cardiovascular exercises, strength training, and flexibility exercises to promote overall health and fitness.";
    } elseif ($age >= 30 && $age < 50) {
        return "As you enter adulthood, focus on a mix of aerobic exercises and strength training to maintain cardiovascular health, muscle strength, and flexibility.";
    } else {
        return "As you age, it becomes crucial to prioritize exercises that are gentle on the joints. Include low-impact activities like swimming, walking, and yoga to maintain mobility and flexibility. Consult with a fitness professional for personalized guidance.";
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $age = $_POST["age"];

    // Calculate BMI
    $bmi = calculateBMI($height, $weight);

    // Get recommendations
    $dietRecommendation = getDietRecommendation($bmi);
    $workoutRecommendation = getWorkoutRecommendation($age);
}
?>



<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Gym Management System</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ahana Yoga HTML Template">
	<meta name="keywords" content="yoga, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>

</head>
<body>
	<!-- Page Preloder -->
	

	<!-- Header Section -->
	<?php include 'include/header.php';?>
	<!-- Header Section end -->

	

	                                                                              
	<!-- Page top Section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 m-auto text-white">
					<h2>Health Recommendations</h2>
				</div>
			</div>
		</div>
	</section>



	<!-- Pricing Section -->
	<section class="pricing-section spad">
		<div class="container">
			<div class="section-title text-center">
				<img src="img/icons/logo-icon.png" alt="">
				<h2>Recommendations For You</h2>
			</div>
			<div class="row">

            <?php
    // Display recommendations if available
    if (isset($dietRecommendation) && isset($workoutRecommendation)) {
        echo "<strong>Diet Recommendation:</strong><br>";
        echo $dietRecommendation . "<br><br>";

        echo "<strong>Workout Recommendation:</strong><br>";
        echo $workoutRecommendation;
    } else {
        // Prompt user to submit the form
        echo "Please submit the form to get recommendations.";
    }
    ?>
			</div>
		</div>
	</section>
	

	<!-- Footer Section -->
	<?php include 'include/footer.php'; ?>
	<!-- Footer Section end -->

	<div class="back-to-top"><img src="img/icons/up-arrow.png" alt=""></div>

	<!-- Search model end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>