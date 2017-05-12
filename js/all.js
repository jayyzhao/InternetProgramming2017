//Suburb, Postcode and State mandatory when country=Australia

$(".personal-details").on("change",function(){
	if ($("#country").val() == "Australia") {
		$("#suburb").prop('required',true);
		$("#postcode").prop('required',true);
		$("#state").prop('required',true);
		$("#postcode").attr("pattern", '^\\d{4}$');
	}
	else {
		$("#suburb").prop('required',false);
		$("#postcode").prop('required',false);
		$("#state").prop('required',false);
	}

});

