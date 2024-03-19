!(function($) {
  "use strict";

  $(window).on('load',function() {

var selectedValue
 showWhatapp(1,$("#eqcn_icocta1").attr("value"))
	//When page loads...
 $(".tab-pane").removeClass("hide");

 if (!$("#giconCta1").hasClass("gicon-whatsapp")) {
    $("#eqcn_wa1").hide();
 };
  if (!$("#giconCta2").hasClass("gicon-whatsapp")) {
    $("#eqcn_wa2").hide();
 };
  if (!$("#giconCta3").hasClass("gicon-whatsapp")) {
    $("#eqcn_wa3").hide();
 };
  if (!$("#giconCta4").hasClass("gicon-whatsapp")) {
    $("#eqcn_wa4").hide();
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
		

    var tap= activeTab.slice(4)
    if (tap>0 && tap<5) {
      showWhatapp(tap,$("#eqcn_icocta"+tap).attr("value"))
    }
    
    return false;  

	});


$("#selectIcon1 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqcn_icocta1").val(selectedValue);
  $("#giconCta1").removeClass().addClass('mx-2 gicon-'+selectedValue);
 showWhatapp(1,selectedValue)
});

 $("#selectIcon2 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqcn_icocta2").val(selectedValue);
  $("#giconCta2").removeClass().addClass('mx-2 gicon-'+selectedValue);
  showWhatapp(2,selectedValue)

});

 $("#selectIcon3 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqcn_icocta3").val(selectedValue);
  $("#giconCta3").removeClass().addClass('mx-2 gicon-'+selectedValue);
  showWhatapp(3,selectedValue)

});

 $("#selectIcon4 a").on('click', function() {
   selectedValue = $(this).attr("value");
  $("#eqcn_icocta4").val(selectedValue);
  $("#giconCta4").removeClass().addClass('mx-2 gicon-'+selectedValue);
  showWhatapp(4,selectedValue)

});

});

function showWhatapp(i,value){
 

  var selectedValue =value.trim();
  //console.log("selectIcon"+ i + " a= " + selectedValue)

   if (selectedValue=='whatsapp'|| selectedValue=='phone') {
    $("#eqcn_linkcta" + i).removeAttr("placeholder").attr("placeholder", "535xxxxxxx").attr("type", "tel");
  }
  else if (selectedValue=='mail') {
    $("#eqcn_linkcta" + i).removeAttr("placeholder").attr("placeholder", "nombre@ejemplo.com").attr("type", "mail");
  }
  else {
    $("#eqcn_linkcta" + i).removeAttr("placeholder").attr("placeholder", "https://link.com").attr("type", "url");
  }

  if (selectedValue!='whatsapp') {
    $("#eqcn_watext" + i).attr('type', 'hidden');
    $("#eqcn_wa" + i).hide();
  }
  else{
    $("#eqcn_watext" + i).attr('type', 'text');
    $("#eqcn_wa" + i).show();
  }
}

})(jQuery) 
