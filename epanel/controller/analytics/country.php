<script>
$(document).ready(function() {
	var listURL = 'helperfunc/countryList.php';
	
	$('#countrylist').dataTable( {
        "ajax": listURL
		
    } );
	
    //$(".marker").tooltip({placement: 'top'});
});
</script>

<table class="table table-hover" id="countrylist">
    <thead>
      <tr>
        <th>No.</th>
        <th>Country</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
	<tfoot>
      <tr>
        <th>No.</th>
        <th>Country</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </tfoot>
</table>

