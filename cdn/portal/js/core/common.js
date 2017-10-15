
/*Confirm Delete*/
function confirmDelete(url){
	swal({
	  title: "Are you sure?",
	  text: "You will not be able to recover!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonClass: "btn-danger",
	  confirmButtonText: "Yes, remove it!",
	  cancelButtonText: "No, cancel!",
	  closeOnConfirm: false,
	  closeOnCancel: true
	},
	function(isConfirm) {
	  if (isConfirm) {
	  	window.location.href = url;
	  } 
	});
}