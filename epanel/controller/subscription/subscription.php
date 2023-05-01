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
			var loc = 'index.php?controller=subscription&action=subscription&subaction=delete&sid='+finalDelArray;
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
include WS_PFBC_ROOT."Form.php";
class subscription
{

	function listData(){
	$table = 'subscription_master';
	update_data($table);
	?>
	
	<?php 
		$form = new Form("addFrm");
		$form->configure(array(
			"prevent" => array("bootstrap","jQuery"),
			"view" => new View_Inline
		));
		$form->addElement(new Element_HTML("<legend>Search Entries</legend>"));
		$form->addElement(new Element_Hidden("controller", "subscription"));
		$form->addElement(new Element_Hidden("action", "subscription"));
		$form->addElement(new Element_Hidden("subaction", "listData"));
		$form->addElement(new Element_Hidden("display","search"));
		/* Actual Form Fields Started */
		
		$form->addElement(new Element_jQueryUIDate("Date:", "entrydate", array(
				"jqueryOptions" => array("pickTime" => "false"),
				"data-date-format" => "yyyy-mm-dd",
				"placeholder" => "Date"
		)));			
		$form->addElement(new Element_Button);
		$form->addElement(new Element_HTML('<br><br>&nbsp;&nbsp;<a href="subscription_report.php">Export To Excel</a>'));
		$form->addElement(new Element_HTML('<hr>'));
		$form->render();		
		
		$whr = "";
		$disQry =  "SELECT  * from subscription_master where 1=1 ";
		
		//if(isset($_POST['posttype'])) $whr .= " and post = '".$_POST['posttype']."'";
		if(isset($_POST['entrydate']) && $_POST['entrydate'] != "" ) $whr .= " and s_date >= '".$_POST['entrydate']."'";
		
		
		
		$disQry .= $whr;
		$disQry .= ' order by s_date desc';
	
		if(isset($_SESSION['listSQL'])){ unset($_SESSION['listSQL']); }
		$_SESSION['listSQL'] = $disQry;
	
?>
	<script>
	$(document).ready(function() {
		var listURL = "helperfunc/subscription.php";
		var oTable = $('#inquirylist').dataTable({
			"ajax": listURL,
			"order": [[ 4, "desc" ]]
		});
		
		$(window).bind('resize', function () {  oTable.fnAdjustColumnSizing();  });
		$('.esortorder').editable({params:{"tblName":"inquiry"}});
	});
	</script>
<?php
	$subvar = 'onclick="return confirmSubmit();"';
	echo '<div id="no-more-tables">
	<table class="table table-striped table-bordered dataTable" id="inquirylist" style="width:100%;">

		

		<thead>
		<tr>
			<th colspan="8"><input type="checkbox" id="selectall" value="false">&nbsp; &nbsp;Select All</input>&nbsp; &nbsp;
			<button class="btn btn-danger" id="deleteMultiple">Delete Selected</th>	
		</tr>
		<tr>
			<th><center>Select</center></th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>	
		<tr>
			<th>Select</th>
			<th>Name</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		</tfoot>
	</table></div>';	
?>
<script>
	$('.table').editable({
		selector: 'a.estatus,a.esortorder',
		params:{"tblName":"subscription_master"},
		value: 1,
		source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
	});
</script>
<?php
		 
	}
	function delete()
	{		
		
		$values = explode(",", $_GET["sid"]);
		if(count($values) > 1){
			foreach($values as $key => $val){
				$delsql = "Delete from subscription_master where s_id = '".$val."'";
				$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
			}
		}else{
			$delsql = "Delete from subscription_master where s_id = '".$_GET['sid']."'";
			$delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
		}
		return true;		
	}
	
}
?>
