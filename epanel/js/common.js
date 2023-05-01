 function hideItems() {
	   var list = document.getElementById("dynamic").getElementsByTagName("div");
	   for(i=0;i<list.length;i++) {
		  list[i].style.display="none";
	   }
    }

    function showItem(obj) {
	   var item = document.getElementById(obj);
		item.style.display="block";
    }

	function hideThis(obj) {
	   var item = document.getElementById(obj);
		item.style.display="none";
	}

	function toggle(obj) {
	   var item = document.getElementById(obj);
		if(item.style.display=="block") {
			hideItems();
		} else {
			showItem(obj);
		}
	}
function confirmSubmit()
{
var agree=confirm("Are you sure you want to delete?");
if (agree)
	return true ;
else
	return false ;
}
/*
jQuery(function($) {
	$('form[data-async]').live('submit', function(event) {
		var $form = $(this);
		var $target = $($form.attr('data-target'));
		$('.modal-body').html('<p>Loading ...</p>');
		$.ajax({
			type: $form.attr('method'),
			url: $form.attr('action'),
			data: $form.serialize(),
			success: function(msg){
				$("#thanks").html(msg)
				$("#form-content").modal('hide');    
            },
            error: function(){
                $('.modal-body').html('<p>failure ...</p>');
            }
			success: function(data, status) {
				$target.html(data);
			}
		});
		event.preventDefault();
	});
});


<!-- Bootstrap trigger to open modal -->
<a data-toggle="modal" href="#rating-modal">Write a Review</a>
 
<div class="hide fade modal" id="rating-modal">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">×</button>
<h2>Your Review</h2>
</div>
 
<div class="modal-body">
<!-- The async form to send and replace the modals content with its response -->
<form class="form-horizontal well" data-async data-target="#rating-modal" action="/some-endpoint" method="POST">
<fieldset>
<!-- form content -->
</fieldset>
</form>
</div>
 
<div class="modal-footer">
<a href="#" class="btn" data-dismiss="modal">Cancel</a>
</div>
</div>

*/