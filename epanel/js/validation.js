function Validations() {
		var ErrorMsg = "Following fields needs to be filled.. \n\n";
		var Error = 0;
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var address = document.getElementById('email').value;
		//check shootday
		if(reg.test(address) == false) {
			ErrorMsg = ErrorMsg + "Enter Valid Email \n\n";
			Error = 1;
		}
		if(document.getElementById('group_id').value == "" ){
				ErrorMsg = ErrorMsg + "Please Provide Your Email \n\n";
				Error = 1;
		}
		if(document.getElementById('pass').value == "" ){
				ErrorMsg = ErrorMsg + "Please Provide Your Password \n\n";
				Error = 1;
		}if(document.getElementById('loginID').value == "" ){
				ErrorMsg = ErrorMsg + "Please Provide Your Login ID \n\n";
				Error = 1;
		}
		if(document.getElementById('fname').value == "" ){
			ErrorMsg = ErrorMsg + "Please Provide Your First Name \n\n";
			Error = 1;
		}
		if(document.getElementById('lname').value == "" ){
			ErrorMsg = ErrorMsg + "Please Provide Your Last Name \n\n";
			Error = 1;
		}
		
		if(Error == 1){	
			alert(ErrorMsg);
			return false;
		}
		else{
			return true;
		}
	}
function permissionvalidation(){
	var ErrorMsg = "Following fields needs to be filled.. \n\n";
	var Error = 0;
	if(document.getElementById('group_id').value == "" ){
		ErrorMsg = ErrorMsg + "Please Select Group \n\n";
		Error = 1;
	}
	if(document.getElementById('module').value == "" ){
		ErrorMsg = ErrorMsg + "Please Select Module \n\n";
		Error = 1;
	}
	if(Error == 1){	
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}
	
function newsvalidation(){
	var ErrorMsg = "Following fields needs to be filled.. \n\n";
	var Error = 0;
	if(document.getElementById('news_title').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide News Title \n\n";
		Error = 1;
	}
	if(document.getElementById('news_desc').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide News Description \n\n";
		Error = 1;
	}if(document.getElementById('eve_date').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide News Date \n\n";
		Error = 1;
	}
	if(Error == 1){	
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}	
function eventvalidation(){
	var ErrorMsg = "Following fields needs to be filled.. \n\n";
	var Error = 0;
	if(document.getElementById('event_title').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Header \n\n";
		Error = 1;
	}
	if(document.getElementById('event_desc').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Description \n\n";
		Error = 1;
	}if(document.getElementById('eve_date').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Date \n\n";
		Error = 1;
	}
	if(Error == 1){	
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}	
function pressvalidation(){
	var ErrorMsg = "Following fields needs to be filled.. \n\n";
	var Error = 0;
	if(document.getElementById('n_name').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide News Paper Name \n\n";
		Error = 1;
	}
	if(document.getElementById('press_title').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Header \n\n";
		Error = 1;
	}if(document.getElementById('eve_date').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Release Date \n\n";
		Error = 1;
	}
	if(Error == 1){	
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}	
function event_typevalidation(){
	var ErrorMsg = "Following fields needs to be filled.. \n\n";
	var Error = 0;
	if(document.getElementById('event_type_title').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Event Type Title \n\n";
		Error = 1;
	}
	if(Error == 1){	
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}	
function checkPassword(){
pwd = document.getElementById('newpwd').value;
cpwd = document.getElementById('cpwd').value;
var ErrorMsg = "Following fields must be completed.. \n\n";
	var Error = 0;
		if(document.getElementById('currentpwd').value == "" ){
			ErrorMsg = ErrorMsg + "Please Provide Current Password\n\n";
			Error = 1;
		}if(pwd == "" ){
			ErrorMsg = ErrorMsg + "Please Provide Password\n\n";
			Error = 1;
		}
		if(pwd != cpwd ){
			ErrorMsg = ErrorMsg + "Please Confirm Your Password\n\n";
			Error = 1;
		}
				
	if(Error == 1){
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}
function galleryvalidation(){
	var ErrorMsg = "Following fields needs to be filled.. \n\n";
	var Error = 0;
	var re_text = /\.jpg|\.JPG|\.gif|\.GIF|\.JPEG|\.jpeg|\.png|\.PNG/i;
	var filename = document.getElementById('gallery_image').value;
	/* Checking file type */
	
	if(document.getElementById('gallery_title').value == "" ){
		ErrorMsg = ErrorMsg + "Please Provide Photo Title \n\n";
		Error = 1;
	}
	if(document.getElementById('gallery_image').value == "" ){
		ErrorMsg = ErrorMsg + "Please Browse Image \n\n";
		Error = 1;
	}else {
		if (filename.search(re_text) == -1)
		{
			ErrorMsg = ErrorMsg + "File allow only (jpg,png,gif)  extension \n\n";
			Error = 1;
		}
	}
	
	if(Error == 1){	
		alert(ErrorMsg);
		return false;
	}
	else{
		return true;
	}
}
