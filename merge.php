<div class="header">
			<?php  
			include 'head.php'; 
			include 'header.php';?>
</div>
<?php

session_start();
if(!isset($_SESSION['username'])) { //if not yet logged in
			header("Location: log/login.php");// send to login page
			exit;
			}
		
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$dom1 = new DOMDocument();
	$j=1;
		$dom1->encoding = 'utf-8';

		$dom1->xmlVersion = '1.0';

		$dom1->formatOutput = true;
		
		$dom1->preserveWhiteSpace = false;
		$dom1->formatOutput = true;
		
		$xslt = $dom1->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="xsl.xsl"');
		
		$dom1->appendChild($xslt);

	$xml_file_name = $_SESSION['username'] . '_infoall_list.xml';

		$root = $dom1->createElement('Persons');

		$person_node = $dom1->createElement('Person');

		$attr_person_id = new DOMAttr('person_id', $j);

		$person_node->setAttributeNode($attr_person_id);
		
		$name_node_title = $dom1->createElement('Name', $_SESSION['name']);

		$person_node->appendChild($name_node_title);
		
		$child_node_title = $dom1->createElement('Gender', $_SESSION['gender']);

		$person_node->appendChild($child_node_title);

		$child_node_year = $dom1->createElement('Website', $_SESSION['website']);

		$person_node->appendChild($child_node_year);
		
		$child_node_ratings = $dom1->createElement('Email', $_SESSION['username']);

		$person_node->appendChild($child_node_ratings);
		
		$child_node_birth = $dom1->createElement('DateOfBirth', $_SESSION['birth']);

		$person_node->appendChild($child_node_birth);

		$education_node = $dom1->createElement('Education');
		
		for ( $i = 0; $i< count($_SESSION['unis']); $i++){
			
			$education_node_uni = $dom1->createElement('FormStudy');
			
			$education_node->appendChild($education_node_uni);
			
			$attr_education_id = new DOMAttr('education_id', $i);

			$education_node_uni->setAttributeNode($attr_education_id);
			
			$child_node_unis = $dom1->createElement('Name', $_SESSION['unis'][$i]);
			

			$education_node_uni->appendChild($child_node_unis);
			
			$child_node_unis_city = $dom1->createElement('City', $_SESSION['unis_city'][$i]);
			

			$education_node_uni->appendChild($child_node_unis_city);
			
			$child_node_unis_year = $dom1->createElement('GraduationYear', $_SESSION['unis_year'][$i]);
			

			$education_node_uni->appendChild($child_node_unis_year);
			
			$subject_node = $dom1->createElement('Subjects');
			
			$education_node_uni->appendChild($subject_node);
			
			for($j=0;$j<count($_SESSION['unis_subjects'][$i]);$j++){
			$subject = $dom1->createElement('Subject');
			
			$subject_node->appendChild($subject);
				
			$child_node_unis_subject = $dom1->createElement('Name', $_SESSION['unis_subjects'][$i][$j]);
			

			$subject->appendChild($child_node_unis_subject);
			
			$child_node_unis_grades = $dom1->createElement('FinalGrade', $_SESSION['unis_subjects_grades'][$i][$j]);
			

			$subject->appendChild($child_node_unis_grades);
			
			$child_node_unis_keywords = $dom1->createElement('Keyword', $_SESSION['unis_subjects_keywords'][$i][$j]);
			

			$subject->appendChild($child_node_unis_keywords);
			
			$child_node_unis_years = $dom1->createElement('Year', $_SESSION['unis_subjects_years'][$i][$j]);
			

			$subject->appendChild($child_node_unis_years);
			
			$child_node_unis_type = $dom1->createElement('SubjectType', $_SESSION['unis_subjects_type'][$i][$j]);
			

			$subject->appendChild($child_node_unis_type);
			}
			
		}
		
		$informal_education_node = $dom1->createElement('InformalEducation');
		
		for ( $i = 0; $i< count($_SESSION['extra_courses']); $i++){
			
			$course = $dom1->createElement('Course');
			
			$informal_education_node->appendChild($course);
			
			$child_node_course = $dom1->createElement('Name', $_SESSION['extra_courses'][$i]);
		
			$course->appendChild($child_node_course);
			
			$child_node_course_year = $dom1->createElement('YearGraduation', $_SESSION['year_graduation'][$i]);
		
			$course->appendChild($child_node_course_year);
			
		}
		
		$job_node = $dom1->createElement('Jobs');
		
		for ( $i = 0; $i< count($_SESSION['job_title']); $i++){
			
			$job = $dom1->createElement('Job');
			
			$job_node->appendChild($job);
			
			$child_node_job = $dom1->createElement('Title', $_SESSION['job_title'][$i]);
		
			$job->appendChild($child_node_job);
			
			$child_node_job_description = $dom1->createElement('JobDescription', $_SESSION['job_description'][$i]);
		
			$job->appendChild($child_node_job_description);
			
			$child_node_job_period = $dom1->createElement('JobPeriod', $_SESSION['job_period'][$i]);
		
			$job->appendChild($child_node_job_period);
			
		}
		
		$awards_node = $dom1->createElement('Awards');
		
		for ( $i = 0; $i< count($_SESSION['awards']); $i++){
			
			$award = $dom1->createElement('Award');
			
			$awards_node->appendChild($award);
			
			$child_node_awards = $dom1->createElement('Name', $_SESSION['awards'][$i]);
		
			$award->appendChild($child_node_awards);
			
			$child_node_award_title = $dom1->createElement('TitleAward', $_SESSION['title_award'][$i]);
		
			$award->appendChild($child_node_award_title);
			
			$child_node_award_year = $dom1->createElement('YearAward', $_SESSION['year_award'][$i]);
		
			$award->appendChild($child_node_award_year);
			
		}
		
		$membership_node = $dom1->createElement('Memberships');
		
		for ( $i = 0; $i< count($_SESSION['membership_title']); $i++){
			
			$membership = $dom1->createElement('Membership');
			
			$membership_node->appendChild($membership);
			
			$child_node_membership = $dom1->createElement('Title', $_SESSION['membership_title'][$i]);
		
			$membership->appendChild($child_node_membership);
			
			$child_node_membership_description = $dom1->createElement('MembershipDescription', $_SESSION['membership_description'][$i]);
		
			$membership->appendChild($child_node_membership_description);
			
			$child_node_membership_period = $dom1->createElement('MembershipPeriod', $_SESSION['membership_period'][$i]);
		
			$membership->appendChild($child_node_membership_period);
			
		}
		
		$interests_node = $dom1->createElement('Interests');
		
		foreach( $_SESSION['interests'] as $i ){
			$child_node_interests = $dom1->createElement('Interest', $i);

			$interests_node->appendChild($child_node_interests);
		}
		
		$person_node->appendChild($education_node);
		
		$person_node->appendChild($informal_education_node);
		
		$person_node->appendChild($job_node);
		
		$person_node->appendChild($awards_node);
		
		$person_node->appendChild($membership_node);
		
		$person_node->appendChild($interests_node);

		$root->appendChild($person_node);

		$dom1->appendChild($root);

	$dom1->save($xml_file_name);
	$_SESSION[ 'home' ] = 'yes';
   
	
		header("location: plan.php");
}

?>
<!DOCTYPE HTML>  
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>
<body>  



<h2>Create your XML profiles!</h2>
<style>
p{padding:0;margin:0;font-family:"Times New Roman", serif;
letter-spacing: 1px;background-color:#f1f1f1;margin-bottom:5px;margin-top:5px;}
legend{margin-top:10px;border:1px solid #444;padding:5px;margin-bottom:15px;background-color:#6A5ACD;}
fieldset{width:300px;margin-left:20px;border:1px solid #444;padding:5px;}
body{margin-left:400px;margin-right:400px;background-color:#FFE4C4;}
</style>
<legend>
<h2>XMLs succsessfully created!</h2>
</legend>

<h4>Click below to create an integrated XML profile</h4>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<?php if(file_exists($_SESSION['username'] . '_facebook.xml')) { ?>

						<button class="btn btn-success">
							Create
						</button>
					<?php } else { ?>
						<button class="btn btn-success" disabled>
							Create
						</button>
						<p style="background-color:transparent;">You first need to complete the form</p>
					<?php } ?>
</form>
</body>
</html>