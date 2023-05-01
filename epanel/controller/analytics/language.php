<script>
$(document).ready(function() {
	var listURL = 'helperfunc/languageList.php';
	
	$('#languagelist').dataTable( {
        "ajax": listURL ,
		"responsive" : true
    } );
	
    //$(".marker").tooltip({placement: 'top'});
});
</script>

<table class="table table-hover" id="languagelist">
    <thead>
      <tr>
        <th>No.</th>
        <th>Language</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
	<tfoot>
      <tr>
        <th>No.</th>
        <th>Language</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </tfoot>
</table>
</div>
</div>
