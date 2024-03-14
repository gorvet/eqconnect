!(function($) {
  "use strict";

  $(window).on('load',function() {

var selectedValue

	//When page loads...
 $(".tab-pane").removeClass("hide");

 if (!$("#giconCta1").hasClass("gicon-whatsapp")) {
    $("#eqconnect_wa1").hide();
 };
  if (!$("#giconCta2").hasClass("gicon-whatsapp")) {
    $("#eqconnect_wa2").hide();
 };
  if (!$("#giconCta3").hasClass("gicon-whatsapp")) {
    $("#eqconnect_wa3").hide();
 };
  if (!$("#giconCta4").hasClass("gicon-whatsapp")) {
    $("#eqconnect_wa4").hide();
 };
 
 

	$(".tab-pane").hide(); //Hide all content
	$("ul.tabs-container li:first").addClass("active").show(); //Activate first tab
	$(".tab-pane:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs-container li").click(function() {

		$("ul.tabs-container li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab-pane").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).show(); //Fade in the active ID content
		return false;  
	});


$("#selectIcon1 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqconnect_icocta1").val(selectedValue);
  $("#giconCta1").removeClass().addClass('gicon-'+selectedValue +' mx-2');
 showWhatapp(1,selectedValue)
});

 $("#selectIcon2 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqconnect_icocta2").val(selectedValue);
  $("#giconCta2").removeClass().addClass('gicon-'+selectedValue +' mx-2');
  showWhatapp(2,selectedValue)

});

 $("#selectIcon3 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqconnect_icocta3").val(selectedValue);
  $("#giconCta3").removeClass().addClass('gicon-'+selectedValue +' mx-2');
  showWhatapp(3,selectedValue)

});

 $("#selectIcon4 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqconnect_icocta4").val(selectedValue);
  $("#giconCta4").removeClass().addClass('gicon-'+selectedValue +' mx-2');
  showWhatapp(4,selectedValue)

});

});

function showWhatapp(i,value){
 
  var selectedValue =value;
  console.log("selectIcon"+ i + " a= " + selectedValue)

   if (selectedValue=='whatsapp'|| selectedValue=='phone') {
    $("#eqconnect_linkcta" + i).removeAttr("placeholder").attr("placeholder", "535xxxxxxx");
  }
  else if (selectedValue=='mail') {
    $("#eqconnect_linkcta" + i).removeAttr("placeholder").attr("placeholder", "nombre@ejemplo.com");
  }
  else {
    $("#eqconnect_linkcta" + i).removeAttr("placeholder").attr("placeholder", "https://link.com");
  }

  if (selectedValue!='whatsapp') {
    $("#eqconnect_watext" + i).attr('type', 'hidden');
    $("#eqconnect_wa" + i).hide();
  }
  else{
    $("#eqconnect_watext" + i).attr('type', 'text');
    $("#eqconnect_wa" + i).show();
  }
}

})(jQuery) 
