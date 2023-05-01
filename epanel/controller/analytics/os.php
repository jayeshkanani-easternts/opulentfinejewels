<script>
$(document).ready(function() {
	var listURL = 'helperfunc/osList.php';
	
	$('#oslist').dataTable( {
        "ajax": listURL ,
		 "responsive" : true
    } );
	
   // $(".marker").tooltip({placement: 'top'});
});
</script>


<table class="table table-hover" id="oslist">
    <thead>
      <tr>
        <th>No.</th>
        <th>Operating System</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
	<tfoot>
      <tr>
        <th>No.</th>
        <th>Operating System</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </tfoot>
</table>
