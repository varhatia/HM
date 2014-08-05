/**
 * 
 */

function checkEmail(email) {

    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email)) {
    alert('Please provide a valid email address');
    return false;
 }
    return true ;
}


function validatepwd(str1, str2) {
	if(str1 == str2) {
		if(str1.length<6) {
			alert('Unacceptable password length. Password must be atleast 6 characters.') ;
			return false ;
		}
		return  true ;
	}	
	alert('Password and confirm password do not match.') ;
	return false ;
}

    
