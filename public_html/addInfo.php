
<!DOCTYPE html>
<html>

	<!-- shared page top HTML -->
	
	<head>
		<title>YU Family Connects</title>
		
		<meta charset="utf-8" />
		
		<!-- instructor-provided CSS and JavaScript links; do not modify -->
		<link href="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/heart.gif" type="image/gif" rel="shortcut icon" />
		<link href="nerdluv.css" type="text/css" rel="stylesheet" />
		
		<script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
		<script src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/provided.js" type="text/javascript"></script>
	</head>

	<body onload="initialize()" bgcolor="#E6E6FA">
		<div id="bannerarea">
			<img src="header.png" alt="banner logo" height="90" width="510"/> <br />

		</div>
		
		<!-- your HTML output follows -->
		

<form name="input" action="addInfo-submit.php" method="post">
	<fieldset>
		<legend> New User Signup </legend>
		<strong> Your Name: </strong> <input type="text" name="yourname" maxlength="25" size="16" ><br>

		<strong>School Attending: </strong> <select name="school">
		<option value="Yeshiva College">Yeshiva College</option>
		<option value="Sy Syms - YU">Sy Syms - YU</option>
		<option value="Stern College">Stern College</option>
		<option value="Sy Syms - Stern">Sy Syms - Stern</option>
		<option value="RIETS">RIETS</option>
		<option value="YU Grad-School">YU Grad-School</option>
		<option value="YU Alumni">YU Alumni</option>
		<option value="YU Faculty/Admin">YU Faculty/Admin</option>
		<option value="Non YU-student">Non YU-student</option>
		
		</select><br>
		
		<strong> Email: </strong> <input type="text" name="email" maxlength="30" size="20" ><br>
		
		Enter surname for family wishing to be searched <br>
		<strong> Surname: </strong> <input type="text" name="name" maxlength="20" size="10" ><br>
		
		Where is that family originally from? <br>
		
		 <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
    <script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initialize() {
  // Create the autocomplete object, restricting the search
  // to geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
      { types: ['geocode'] });
  // When the user selects an address from the dropdown,
  // populate the address fields in the form.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
          geolocation));
    });
  }
}
// [END region_geolocation]
</script>

    <strong> Town: </strong> <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" name="town"></input> <br>
	<input type="submit" value="Sign Up:">

	</fieldset>
</form>

<?php include("bottom.html"); ?>