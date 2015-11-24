$(document).ready(function(){

	/* $('#makeModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget.makePickButton); // Button that triggered the modal
		
		// Extract info from data attributes
		var makeTeamId = button.data('id');
		var makeTeamName = button.data('name');
		console.log (makeTeamId);
		console.log (makeTeamName);

		// Update modal content
		var modal = $(this)
		modal.find('.makePickTeamId').val(makeTeamId);
		modal.find('.makePickTeamName').val(makeTeamName);
	}); */

	
	$(document).on("click", "#makePickButton", function () {
		 var myTeamId = $(this).data('id');
	     var myTeamName = $(this).data('name');
	     console.log(myTeamId);
	     console.log(myTeamName);
	     $(".modal-body #makePickTeamName").val( myTeamName );
	});

});
