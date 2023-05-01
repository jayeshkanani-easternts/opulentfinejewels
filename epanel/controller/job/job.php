<script> 
$(document).ready(function(){
	
    $('#mainpages').select2({
		placeholder: "Select a Main Page"
	});

$("#selectall").click(function(){
    $('.case').not(this).prop('checked', this.checked);
}); 

 $(document).on("click",".case" ,function(){
        if($(".case").length == $(".case:checked").length) {
            $("#selectall").prop("checked", "checked");
        } else {
            $("#selectall").removeAttr("checked");
        }
 
    }); 
	
	$(document).on("click",".loadModal" ,function(){
       
	var jobID = $(this).attr('data-job');
	$('.modal-body').load('viewjob.php?job_id='+jobID);
	
    }); 

$("#deleteMultiple").click(function(){
	
	  var result = confirm("Are You Sure you want to delete the subscription ? ");
		if (result == true) 
		{	
			var delIDarray = [];
			  $('.case').each(function(){
					var ar = this.id;
					var selectval = $('#'+ar).is(':checked');
					if(selectval){
						delIDarray.push(ar);
					}
			  });
			var finalDelArray = delIDarray.join(',');
			var loc = 'index.php?controller=job&action=job&subaction=deletejob&job_id='+finalDelArray;
			window.location.assign(loc);
		}
		else 
		{
			
		}	  
	  //location.href="index.php?controller=products&action=subscriptionlist&subaction=delete&sid="+finalDelArray;
});     
 
});
</script>

<?php
class job
{
	function listjob()
	{
		
		$table = 'job_master';
		update_data($table);
?>
<script>
$(document).ready(function() {
	var listURL = 'helperfunc/jobList.php';
	$('#joblist').dataTable( {
        "ajax": listURL,
        "order": [[ 2, "desc" ]]
    } );
    /*
	$('#joblist').dataTable({
		"bProcessing": true,
		"sAjaxSource": listURL,
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {"sLengthMenu": "_MENU_ Records Per Page"} 
	});
	*/
});
</script>
	<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<a href="job-report.php">Export To Excel</a>';
		echo $list='<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable"	id="joblist" width="100%">
					<thead>
						<tr>
							<th colspan="9"><input type="checkbox" id="selectall" value="false">&nbsp; &nbsp;Select All</input>&nbsp; &nbsp;
							<button class="btn btn-danger" id="deleteMultiple">Delete Selected</th>	
						</tr>
						<tr>
							<th><center>Select</center></th>
							<th>Job Id</th>		
							<th>Name</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Address</th>
							<th>view Resume</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot>
						<tr>
							<th><center>Select</center></th>
							<th>Job Id</th>			
							<th>Name</th>
							<th>Email</th>
							<th>Phone No</th>
							<th>Address</th>
							<th>view Resume</th>
							<th>Action</th>
						</tr>
					</tfoot>	
				</table></div>';
?>
<script>
	/*$("body").on("click","a[rel^='jobDetail']", function(e){
		var jobID = $(this).attr('data-job');
		$('#myModal').modal('show');
		$('.modal-body').load('viewjob.php',{job_id: jobID, ajax: 'true'});
		
		
	});*/
	
	
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"job_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
	
	
	
	
</script>

<?php	 
	}
	function delete()    
	{	
		$values = explode(",", $_GET["job_id"]);
		if(count($values) > 1){
			foreach($values as $key => $val){
				$delsql = "DELETE FROM  `job_master` WHERE job_id = '".$val."'";
				$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
			}
		}else{
			$delsql = "DELETE FROM  `job_master` WHERE job_id='".$_GET['job_id']."'";
			$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		}
		return true;		
	}	
}
?>

 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 id="myModalLabel">Resume Detail</h3>
        </div>
        <div class="modal-body">
          &nbsp;
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
 <!-- 
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></button>
		<h3 id="myModalLabel">Resume Detail</h3>
	</div>
	<div class="modal-body">&nbsp;</div>
	
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>
-->

