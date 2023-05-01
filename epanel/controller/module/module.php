<?php
include WS_PFBC_ROOT."Form.php";
class module
{
	function listData()
	{
?>
<script>
$(document).ready(function() {
	$('#modulelist').dataTable({
		"sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
		"sPaginationType": "bootstrap",
		"iDisplayLength" : 50,
		"oLanguage": {"sLengthMenu": "_MENU_ records per page"} 
	});
	$('.esortorder').editable({params:{"tblName":"module_master"}});
	$('.estatus').editable({
		params:{"tblName":"module_master"},
		value: 1,
		source: [{value: 'E', text: 'Install'},{value: 'D', text: 'Un Install'}]
	});
});
</script>
<?php
		$subvar = 'onclick="return confirmSubmit();"';	
		$queryString =  ets_db_query("SELECT * from module_master order by sortorder") or die(ets_db_error());	
		echo '<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="modulelist" width="100%">
		<thead>
		<tr>
			<th align="left">Module Id</th>
			<th align="left">Module Title</th>
			<th align="left">Module Name</th>
			<th align="left">Module File</th>
			<th align="left">Module Parent</th>
			<th align="left">Module SeoSlug</th>
			<th align="left">Action</th>
		</tr>
		</thead>
		<tbody>';
		$rows = 0;
		while($res = ets_db_fetch_array($queryString)){
			$str = '';
			$rows ++;
			if (($rows/2) == floor($rows/2)) {
				$cssclass =  'even';
			} else {
				$cssclass =  'odd';
			} 
			if($res['status']=='E'){
				$status = "Uninstall";
			}else{
				$status = "Install";
			}
			$pk = "module_id:".$res['module_id'];
			if($res['module_parent'] > 0){
				$ParentModule = getModuleName($res['module_parent']);
			}else{
				$ParentModule = 'Self';
			}
			echo '<tr class="'.$cssclass.'">
				<td>'.$res['module_id'].'</td>
				<td>'.$res['module_title'].'</td>
				<td>'.$res['module_name'].'</td>
				<td>'.$res['module_file'].'</td>
				<td>'.$ParentModule.'</td>
				<td>'.$res['module_seo_slug'].'</td>
				<td><a href="#" class="estatus" data-type="select" data-name="status" data-pk="'.$pk.'" data-url="ajaxUpd.php" data-title="Change Status">'.$status.'</a></td>
				</tr>';
		}
		echo '</tbody>
			<tfoot>
			<tr>
			<th align="left">Module Id</th>
			<th align="left">Module Title</th>
			<th align="left">Module Name</th>
			<th align="left">Module File</th>
			<th align="left">Module Parent</th>
			<th align="left">Module SeoSlug</th>
			<th align="left">Action</th>
		</tr>
			</tfoot>
		 </table>';				
	}	
}
?>
