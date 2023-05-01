<script>
$(document).ready(function() {
	var listURL = 'helperfunc/browserList.php';
	
	$('#browserlist').dataTable( {
        "ajax": listURL ,
		 "responsive" : true
    } );
	
   // $(".marker").tooltip({placement: 'top'});
});
</script>


<table class="table table-hover" id="browserlist">
    <thead>
      <tr>
        <th>No.</th>
        <th>Browser</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </thead>
    <tbody>
     
    </tbody>
	<tfoot>
      <tr>
        <th>No.</th>
        <th>Browser</th>
        <th>Sessions</th>
		<th>% Sessions</th>
      </tr>
    </tfoot>
</table>
