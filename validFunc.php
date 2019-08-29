<?php 

//presence присутствие
function hasPresence($value) {
	return isset($value) && $value !== "";	
}

//string length max 
function hasMaxLength($value, $max) {
	return strlen($value) <= $max;
}

//string length min
function hasMinLength() {
	return strlen($value) >= $min;
}

//type
function hasType($value) {
	return is_string($value);
}

//inclusion in a set
function hasInclusionsIn($value, $set) {
	return in_array($value, $set);
}

//uniqueness in db

//format
function hasFormatEmail($value) {
	return preg_match("/@/", $value);
}

function validateEmail ($email) {
	global $errors;
	$value = trim($email);
	if(!hasFormatEmail($email)) {
	$errors["email"] = " Email is not exist @";
	}
}

function validatePresence ($fieldsRequiredArray) {
	global $errors;
	foreach($fieldsRequiredArray as $field) {
		$value = trim($_POST[$field]);
		if(!hasPresence($value)) {
		$errors[$field] = ucfirst($field) . " cant be blank";
		}
	}
}	

function validateMaxLength ($fieldsWithMaxLengthArray) {
	global $errors;	
	foreach($fieldsWithMaxLengthArray as $field => $max) {
		$value = trim($_POST[$field]);
		if(!hasMaxLength($value, $max)) {
		$errors[$field] = ucfirst($field) . " is too long";
		}
	}
}	

function formErrors($errors = array()) {
	$output = "";
	if(!empty($errors)) {
		$output = "<div class=\"error\">";
		$output .=  "Please fix errors:";
		$output .= "<ul>";
		foreach ($errors as $key => $error) {
			$output .=  "<li>{$error}</li>";
		}
		$output .=  "</ul>";
		$output .=  "</div>";			
	}		
	return $output;
}

 ?>
