$(document).ready(function(){


	$(document).on("click", "#makePickButton", function () {
		 var myTeamId = $(this).data('id');
	     var myTeamName = $(this).data('name');
	     console.log(myTeamId);
	     console.log(myTeamName);
	     $(".modal-body #makePickTeamId").val(myTeamId);
	     $(".modal-body #makePickTeamName").val( myTeamName );
	});

});
