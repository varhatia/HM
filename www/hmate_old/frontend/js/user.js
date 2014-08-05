$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);
        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        });
    });


    $('[data-toggle="tooltip"]').tooltip();

//    $('#join').change(function(e) {
//    	selection = $(this).val();
//    	if(selection != 0)
//    	{
//    		$('#place').prop('disabled', false);
//    	}
//    	else
//    	{
//    		$('#place').prop('disabled', 'disabled');
//    	}
//    });

    $('#invite').change(function() {
    	selection = $(this).val();
        if (selection == 1) {
        	FB.ui({
        		method: 'apprequests',
        		message: 'HobbyMate!!! Your hobbyworld'
        		});

        }
        else if (selection == 2) {
        	//Hobbymate launch box to go here
        	$("#myModal").modal('show');
        }
    });
    
    $('#place').change(function() {
    	selection = $(this).val();
        if (selection == 1) {
        	$("#selectResidence").modal('show');
        	$('#invite').prop('disabled', false);
        }
        else if (selection == 2) {
        	$("#selectWork").modal('show');
        	$('#invite').prop('disabled', false);
        }//alert('Call modal function');
        else
        {
        	$('#invite').prop('disabled', 'disabled');        	
        }
		
    });

//    $('#createEvent').change(function() {
//    	if (selection == 1) {
//        	$("#selectResidence").modal('show');
//        	$('#invite').prop('disabled', false);
//        }
//        else if (selection == 2) {
//        	$("#selectWork").modal('show');
//        	$('#invite').prop('disabled', false);
//        }//alert('Call modal function');
//        else
//        {
//        	$('#invite').prop('disabled', 'disabled');        	
//        }
//		
//    });
    
    $('.btn-default').click(function () {
        var id = $(this).attr('id');
        
        if(id == 'createEvent')
        {
        	
            var eventName = $('#activityName').val();
            var desc          = $('#desc').val();
            var join       	  = $('#join').val();
            var dateTime      = $('#datetimepicker1').val();
            var place         = $('#place').val();
            var organization  = $('#organization_m').val();
            var orgLocation   = $('#orgLocation_m').val();
            var aptName       = $('#aptName').val();
            var resArea       = $('#resArea').val();
            var landmark      = $('#landmark').val();

            post_data = {'eventName':eventName, 'desc':desc, 'join':join, 'dateTime':dateTime, 'place':place, 'organization':organization, 'orgLocation':orgLocation,'aptName':aptName,'resArea':resArea,'landmark':landmark};
//            alert("activity :"+activity_name);
//            
//            alert("desc : "+desc);
//            
//            alert("join : "+join);
//            alert("date : "+dateTime);
//            alert("place : "+place);
//            alert("org : "+organization);
//            alert("org loca : "+orgLocation);
//            alert("apt : "+aptName);
//            alert("res : "+resArea);
//            alert("landmark : "+landmark);

            //Ajax post data to server
            $.post('../frontend/planEvent.php', post_data).done(function(response){  
                
                //load json data from server and output message     
                if(response.type == 'error')
                {
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                
                    output = '<div class="success">'+response.text+'</div>';
                    
                }

                // uncomment below 2 lines to display result
//                alert(response);
//                $("#resultPHP input").hide().html(response).slideDown();
            });

            $( "#a" ).next('li').removeClass('disabled');
            $( "#a" ).next('li').find('a').attr("data-toggle","tab");

            $( "#a" ).next('li').children("a").tab("show");
        }
        else if(id == 'done')
        {
            $( "#b" ).next('li').removeClass('disabled');
            $( "#b" ).next('li').find('a').attr("data-toggle","tab");
            $( "#b" ).next('li').children("a").tab("show");
        }
        else if(id == 'backToEvent')
        {
            $( "#a" ).children("a").tab("show");
        }
        });


//    $('.btn-style').click(function () {
//        var id = $(this).attr('id');
//        alert(id);
//        if(id == '1')
//        {
//            var activity_name       = $('input[name=activityName]').val(); 
////          var user_email      = $('input[name=email]').val();
////          var user_phone      = $('input[name=phone]').val();
////          var user_message    = $('textarea[name=message]').val();
//
//          alert(activity_name);
//
//        	 $( "#a" ).next('li').removeClass('disabled');
//             $( "#a" ).next('li').find('a').attr("data-toggle","tab");
//
//             $( "#a" ).next('li').children("a").tab("show");
//        }
//        
//        if(id == 'createEvent')
//        {
//            var activity_name       = $('input[name=activityName]').val(); 
////          var user_email      = $('input[name=email]').val();
////          var user_phone      = $('input[name=phone]').val();
////          var user_message    = $('textarea[name=message]').val();
//
//          alert(activity_name);
//
//        	 $( "#a" ).next('li').removeClass('disabled');
//             $( "#a" ).next('li').find('a').attr("data-toggle","tab");
//
//             $( "#a" ).next('li').children("a").tab("show");
//        }
//
//        });

    $('#save').click(function() {
        var id = $(this).attr('id');
        alert(id);
        if(id == 'save')
        {
        	var organization  = $('#organization_m').val();
        	alert(organization);
        	$( '#organization_h').val($('#organization_m').val());
        	var organization_h  = $('#organization_h').val();
        	alert(organization_h);
        }
    });

	function getQueryVariable(variable) {
  	  var query = window.location.search.substring(1);
  	  var vars = query.split("&");
  	  for (var i=0;i<vars.length;i++) {
  	    var pair = vars[i].split("=");
  	    if (pair[0] == variable) {
  	      return pair[1];
  	    }
  	  } 
  	  alert('Query Variable ' + variable + ' not found');
  	}

    $('#join').click(function() {
    		//write ajax to update attendie details
    		//Ajax post data to server
    	$('#initial').remove();//'disabled',true);
    	//$('#initial').children().prop('disabled',true);
    	var eventId = getQueryVariable("id");

    		//var eventId = $_GET['id'];
    		post_data = {'eventId':eventId, 'status':1};
        	$.post('../frontend/updateEventAttendee.php', post_data).done(function(response){  
            
            //load json data from server and output message     
            if(response.type == 'error')
            {
                output = '<div class="error">'+response.text+'</div>';
            }else{
            
                output = '<div class="success">'+response.text+'</div>';
                
            }

            // uncomment below 2 lines to display result
//            alert(response);
            $("#resultPHP").html(response);
        	});


    	});

    $('#maybe').click(function() {
		//write ajax to update attendie details
		//Ajax post data to server
	$('#initial').remove();//'disabled',true);
	//$('#initial').children().prop('disabled',true);
	var eventId = getQueryVariable("id");

		//var eventId = $_GET['id'];
		post_data = {'eventId':eventId, 'status':2};
    	$.post('../frontend/updateEventAttendee.php', post_data).done(function(response){  
        
        //load json data from server and output message     
        if(response.type == 'error')
        {
            output = '<div class="error">'+response.text+'</div>';
        }else{
        
            output = '<div class="success">'+response.text+'</div>';
            
        }

        // uncomment below 2 lines to display result
//        alert(response);
        $("#resultPHP").html(response);
    	});


	});

    $('#decline').click(function() {
		//write ajax to update attendie details
		//Ajax post data to server
		$('#initial').remove();
		//$('#initial').children().prop('disabled',true);
		var eventId = getQueryVariable("id");
	
		//var eventId = $_GET['id'];
		post_data = {'eventId':eventId, 'status':3};
    	$.post('../frontend/updateEventAttendee.php', post_data).done(function(response){  
        
        //load json data from server and output message     
        if(response.type == 'error')
        {
            output = '<div class="error">'+response.text+'</div>';
        }else{
        
            output = '<div class="success">'+response.text+'</div>';
            
        }

        // uncomment below 2 lines to display result
//        alert(response);
        $("#resultPHP").html(response);
    	});


	});

    //To add user comment
    $('#commentButton').click(function() {
		$('#onPageLoad').remove();
		
    	var boxval = $("#content").val();

		if(boxval=='')
		{
			alert("Please Enter Some Text");
		}
		else
		{
	        var eventId = getQueryVariable("id");
	  		
	 		//var eventId = $_GET['id'];
	 		post_data = {'eventId':eventId, 'comment':boxval};
	     	$.post('../frontend/addComment.php', post_data).done(function(response){  
	         
	      

	        // uncomment below 2 lines to display result
	     //		         alert(response);
	        $("#resultComment").html(response);
	     	});
	     	
	     	//$('#addComment').show();
	     	document.getElementById('content').value='';
	     	document.getElementById('content').focus();
			
			
		} 
		
		return false;
    	
	});

    // To delete user comment
    $(".delbutton").click(function(){

    	//Save the link in a variable called element
    	var element = $(this);

    	//Find the id of the link that was clicked
    	var del_id = element.attr("id");

		// Delete on page 
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");
         
         //Below to delete from database
 		
         var eventId = getQueryVariable("id");
 		
		//var eventId = $_GET['id'];
		post_data = {'eventId':eventId, 'id':del_id};
    	$.post('../frontend/deleteComment.php', post_data).done(function(response){  
        
     

        // uncomment below 2 lines to display result
//        alert(response);
       // $("#resultPHP").html(response);
    	});


    	 
    	return false;

    	});

    //To add user comment
    $('#greetingButton').click(function() {
		$('#onPageLoad').remove();
		
    	var boxval = $("#content").val();

		if(boxval=='')
		{
			alert("Please Enter Some Text");
		}
		else
		{
	        var uid = getQueryVariable("id");
	  		
	 		//var eventId = $_GET['id'];
	 		post_data = {'uid':uid, 'comment':boxval};
	     	$.post('../frontend/addGreeting.php', post_data).done(function(response){  

	     	// uncomment below 2 lines to display result
	     	// alert(response);
	        $("#resultComment").html(response);
	     	});
	     	
	     	//$('#addComment').show();
	     	document.getElementById('content').value='';
	     	document.getElementById('content').focus();
			
			
		} 
		
		return false;
    	
	});

    // To delete user greeting
    $(".delgreeting").click(function(){

    	//Save the link in a variable called element
    	var element = $(this);

    	//Find the id of the link that was clicked
    	var del_id = element.attr("id");

		// Delete on page 
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({ opacity: "hide" }, "slow");
         
         //Below to delete from database
 		
         var uid = getQueryVariable("id");
 		
		//var eventId = $_GET['id'];
		post_data = {'uid':uid, 'id':del_id};
    	$.post('../frontend/deleteGreeting.php', post_data).done(function(response){  
        
     

        // uncomment below 2 lines to display result
//        alert(response);
       // $("#resultPHP").html(response);
    	});


    	 
    	return false;

    	});
//
//    $('#customP').click(function (e) { 
//    	$('#egang').removeclass('active');
//    	//e.preventDefault();
//    	$('#pactivity').addClass('active');
//    	//$(this).tab('show');
//      	//$('a[href="' + $(this).attr('href') + '"]').tab('show');
//     	   
//    }); 

    //grabs the hash tag from the url
//    var hash = window.location.hash;
//    //checks whether or not the hash tag is set
//    if (hash != "") {
//      //removes all active classes from tabs
//      $('#tabs li').each(function() {
//        $(this).removeClass('active');
//      });
//      $('#my-tab-content div').each(function() {
//        $(this).removeClass('active');
//      });
//      //this will add the active class on the hashtagged value
//      var link = "";
//      $('#tabs li').each(function() {
//        link = $(this).find('a').attr('href');
//        if (link == hash) {
//          $(this).addClass('active');
//        }
//      });
//      $('#my-tab-content div').each(function() {
//        link = $(this).attr('id');
//        if ('#'+link == hash) {
//          $(this).addClass('active');
//        }
//      });
//    }
    
    var hash = window.location.hash;

    if (hash != "")
        $('#tabs a[href="' + hash + '"]').tab('show');
//    else
//        $('#tabs a:first').tab('show');
});