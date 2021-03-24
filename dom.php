<?php
session_start();


$_SESSION['job_title'] = $_POST['job_title'];

$_SESSION['job_description'] = $_POST['job_description'];

$_SESSION['job_period'] = $_POST['job_period'];

$_SESSION['interests'] = $_POST['interests'];

$dom = new DOMDocument();
$j=1;
		$dom->encoding = 'utf-8';

		$dom->xmlVersion = '1.0';

		$dom->formatOutput = true;

	$xml_file_name = $_SESSION['username'] . '_facebook.xml';

		$root = $dom->createElement('Persons');

		$person_node = $dom->createElement('Person');

		$attr_person_id = new DOMAttr('person_id', $j);

		$person_node->setAttributeNode($attr_person_id);
		
		$name_node_title = $dom->createElement('Name', $_SESSION['name']);

		$person_node->appendChild($name_node_title);

		$child_node_title = $dom->createElement('Gender', $_SESSION['gender']);

		$person_node->appendChild($child_node_title);

		$child_node_year = $dom->createElement('Website', $_SESSION['website']);

		$person_node->appendChild($child_node_year);
		
		$child_node_ratings = $dom->createElement('Email', $_SESSION['username']);

		$person_node->appendChild($child_node_ratings);
		
		$child_node_birth = $dom->createElement('DateOfBirth', $_SESSION['birth']);

		$person_node->appendChild($child_node_birth);
		
		$education_node = $dom->createElement('Education');
		
		foreach( $_SESSION['unis'] as $i ){
			$child_node_unis = $dom->createElement('Name', $i);

			$education_node->appendChild($child_node_unis);
		}
		
		$job_node = $dom->createElement('Jobs');
		
		foreach( $_SESSION['job_title'] as $i ){
			$child_node_jobs = $dom->createElement('Name', $i);

			$job_node->appendChild($child_node_jobs);
		}
		
		$membership_node = $dom->createElement('Memberships');
		
		for ( $i = 0; $i< count($_SESSION['membership_title']); $i++){
			
			$membership = $dom->createElement('Membership');
			
			$membership_node->appendChild($membership);
			
			$child_node_membership = $dom->createElement('Title', $_SESSION['membership_title'][$i]);
		
			$membership->appendChild($child_node_membership);
			
			$child_node_membership_description = $dom->createElement('MembershipDescription', $_SESSION['membership_description'][$i]);
		
			$membership->appendChild($child_node_membership_description);
			
			$child_node_membership_period = $dom->createElement('MembershipPeriod', $_SESSION['membership_period'][$i]);
		
			$membership->appendChild($child_node_membership_period);
			
		}
		
		$interests_node = $dom->createElement('Interests');
		
		foreach( $_POST['interests'] as $i ){
			$child_node_interests = $dom->createElement('Interest', $i);

			$interests_node->appendChild($child_node_interests);
		}
		
		$person_node->appendChild($education_node);
		
		$person_node->appendChild($job_node);
		
		$person_node->appendChild($membership_node);
		
		$person_node->appendChild($interests_node);

		$root->appendChild($person_node);

		$dom->appendChild($root);

	$dom->save($xml_file_name);
	


	//echo "$xml_file_name has been successfully created";
	
	////////////////////////////////////////////////////////////////////
	
	$dom1 = new DOMDocument();
	$j=1;
		$dom1->encoding = 'utf-8';

		$dom1->xmlVersion = '1.0';

		$dom1->formatOutput = true;

	$xml_file_name = $_SESSION['username'] . '_records.xml';

		$root = $dom1->createElement('Students');

		$person_node = $dom1->createElement('Student');

		$attr_person_id = new DOMAttr('student_id', $j);

		$person_node->setAttributeNode($attr_person_id);
		
		$name_node_title = $dom1->createElement('Name', $_SESSION['name']);

		$person_node->appendChild($name_node_title);

		
		
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
			
			$child_node_unis_year = $dom1->createElement('Year', $_SESSION['unis_year'][$i]);
			

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
		
		$person_node->appendChild($education_node);
		
		$person_node->appendChild($informal_education_node);

		$root->appendChild($person_node);

		$dom1->appendChild($root);

	$dom1->save($xml_file_name);
	
	


	//echo "$xml_file_name has been successfully created";
	
	
	//////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	$dom2 = new DOMDocument();
	$j=1;
		$dom2->encoding = 'utf-8';

		$dom2->xmlVersion = '1.0';

		$dom2->formatOutput = true;

	$xml_file_name = $_SESSION['username'] . '_europass.xml';

		$root = $dom2->createElement('Students');

		$person_node = $dom2->createElement('Student');

		$attr_person_id = new DOMAttr('student_id', $j);

		$person_node->setAttributeNode($attr_person_id);
		
		$name_node_title = $dom2->createElement('Name', $_SESSION['name']);

		$person_node->appendChild($name_node_title);
		
		
		
		$child_node_title = $dom2->createElement('Gender', $_SESSION['gender']);

		$person_node->appendChild($child_node_title);

		$child_node_year = $dom2->createElement('Website', $_SESSION['website']);

		$person_node->appendChild($child_node_year);

	$child_node_genre = $dom2->createElement('Address', $_SESSION['address']);

		$person_node->appendChild($child_node_genre);

		$child_node_ratings = $dom2->createElement('Telephone', $_SESSION['telephone']);

		$person_node->appendChild($child_node_ratings);
		
		$child_node_ratings = $dom2->createElement('Email', $_SESSION['username']);

		$person_node->appendChild($child_node_ratings);

		
		
		$education_node = $dom2->createElement('Education');
		
		for ( $i = 0; $i< count($_SESSION['unis']); $i++){
			
			$education_node_uni = $dom2->createElement('FormStudy');
			
			$education_node->appendChild($education_node_uni);
			
			$attr_education_id = new DOMAttr('education_id', $i);

			$education_node_uni->setAttributeNode($attr_education_id);
			
			$child_node_unis = $dom2->createElement('Name', $_SESSION['unis'][$i]);
			

			$education_node_uni->appendChild($child_node_unis);
			
			$child_node_unis_city = $dom2->createElement('City', $_SESSION['unis_city'][$i]);
			

			$education_node_uni->appendChild($child_node_unis_city);
			
			$child_node_unis_year = $dom2->createElement('Year', $_SESSION['unis_year'][$i]);
			

			$education_node_uni->appendChild($child_node_unis_year);
			
			$subject_node = $dom2->createElement('Subjects');
			
			$education_node_uni->appendChild($subject_node);
			
			for($j=0;$j<count($_SESSION['unis_subjects'][$i]);$j++){
			$subject = $dom2->createElement('Subject');
			
			$subject_node->appendChild($subject);
				
			$child_node_unis_subject = $dom2->createElement('Name', $_SESSION['unis_subjects'][$i][$j]);
			

			$subject->appendChild($child_node_unis_subject);
			
			$child_node_unis_grades = $dom2->createElement('FinalGrade', $_SESSION['unis_subjects_grades'][$i][$j]);
			

			$subject->appendChild($child_node_unis_grades);
			
			$child_node_unis_keywords = $dom2->createElement('FinalGrade', $_SESSION['unis_subjects_keywords'][$i][$j]);
			

			$subject->appendChild($child_node_unis_keywords);
			
			$child_node_unis_years = $dom2->createElement('FinalGrade', $_SESSION['unis_subjects_years'][$i][$j]);
			

			$subject->appendChild($child_node_unis_years);
			
			$child_node_unis_type = $dom2->createElement('SubjectType', $_SESSION['unis_subjects_type'][$i][$j]);
			

			$subject->appendChild($child_node_unis_type);
			}
			
		}
		
		$informal_education_node = $dom2->createElement('InformalEducation');
		
		for ( $i = 0; $i< count($_SESSION['extra_courses']); $i++){
			
			$course = $dom2->createElement('Course');
			
			$informal_education_node->appendChild($course);
			
			$child_node_course = $dom2->createElement('Name', $_SESSION['extra_courses'][$i]);
		
			$course->appendChild($child_node_course);
			
			$child_node_course_year = $dom2->createElement('YearGraduation', $_SESSION['year_graduation'][$i]);
		
			$course->appendChild($child_node_course_year);
			
		}
		
		$awards_node = $dom2->createElement('Awards');
		
		for ( $i = 0; $i< count($_SESSION['awards']); $i++){
			
			$award = $dom2->createElement('Award');
			
			$awards_node->appendChild($award);
			
			$child_node_awards = $dom2->createElement('Name', $_SESSION['awards'][$i]);
		
			$award->appendChild($child_node_awards);
			
			$child_node_award_title = $dom2->createElement('TitleAward', $_SESSION['title_award'][$i]);
		
			$award->appendChild($child_node_award_title);
			
			$child_node_award_year = $dom2->createElement('YearAward', $_SESSION['year_award'][$i]);
		
			$award->appendChild($child_node_award_year);
			
		}
		
		$membership_node = $dom2->createElement('Memberships');
		
		for ( $i = 0; $i< count($_SESSION['membership_title']); $i++){
			
			$membership = $dom2->createElement('Membership');
			
			$membership_node->appendChild($membership);
			
			$child_node_membership = $dom2->createElement('Title', $_SESSION['membership_title'][$i]);
		
			$membership->appendChild($child_node_membership);
			
			$child_node_membership_description = $dom2->createElement('MembershipDescription', $_SESSION['membership_description'][$i]);
		
			$membership->appendChild($child_node_membership_description);
			
			$child_node_membership_period = $dom2->createElement('MembershipPeriod', $_SESSION['membership_period'][$i]);
		
			$membership->appendChild($child_node_membership_period);
			
		}
		
		$job_node = $dom2->createElement('Jobs');
		
		for ( $i = 0; $i< count($_POST['job_title']); $i++){
			
			$job = $dom2->createElement('Job');
			
			$job_node->appendChild($job);
			
			$child_node_job = $dom2->createElement('Title', $_POST['job_title'][$i]);
		
			$job->appendChild($child_node_job);
			
			$child_node_job_description = $dom2->createElement('JobDescription', $_POST['job_description'][$i]);
		
			$job->appendChild($child_node_job_description);
			
			$child_node_job_period = $dom2->createElement('JobPeriod', $_POST['job_period'][$i]);
		
			$job->appendChild($child_node_job_period);
			
		}
		
		$person_node->appendChild($education_node);
		
		$person_node->appendChild($informal_education_node);
		
		$person_node->appendChild($job_node);
		
		$person_node->appendChild($awards_node);
		
		$person_node->appendChild($membership_node);

		$root->appendChild($person_node);

		$dom2->appendChild($root);

	$dom2->save($xml_file_name);
	
	$_SESSION[ 'home' ] = 'merge';

	//echo "$xml_file_name has been successfully created";

	header("location: upload.php");


?>



