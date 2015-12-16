$(document).ready(function(){

	$(document).on("click", "#makePickButton", function () {
		 var myTeamId = $(this).data('id');
	     var myTeamName = $(this).data('name');
	     console.log(myTeamId);
	     console.log(myTeamName);
	     $(".modal-body #makePickTeamId").val(myTeamId);
	     $(".modal-body #makePickTeamName").val( myTeamName);
	});

	$(document).on("click", "#editPickButton", function () {
		var myPickId = $(this).data('nonsence');
		var myTeamId = $(this).data('id');
		var myTeamName = $(this).data('name');
		var myTeamPick = $(this).data('pick');
		console.log(myPickId);
		console.log(myTeamId);
		console.log(myTeamName);
		console.log(myTeamPick);
		$(".modal-body #editPickId").val(myPickId);
		$(".modal-body #editPickTeamId").val(myTeamId);
		$(".modal-body #editPickTeamName").val(myTeamName);
		$(".modal-body #editPickTeamPick").val(myTeamPick);
	});

});
