<script>
    $(document).ready(function () {

        $('#mainpages').select2({
            placeholder: "Select a Main Page"
        });

        $("#selectall").click(function () {
            $('.case').not(this).prop('checked', this.checked);
        });

        $(document).on("click", ".case", function () {
            if ($(".case").length == $(".case:checked").length) {
                $("#selectall").prop("checked", "checked");
            } else {
                $("#selectall").removeAttr("checked");
            }

        });

        $(document).on("click", ".loadModal", function () {

            var cID = $(this).attr('data-cid');
            $('.modal-body').load('viewappointment.php?cid=' + cID);

        });

        $("#deleteMultiple").click(function () {

            var result = confirm("Are You Sure you want to delete? ");
            if (result == true) {
                var delIDarray = [];
                $('.case').each(function () {
                    var ar = this.id;
                    var selectval = $('#' + ar).is(':checked');
                    if (selectval) {
                        delIDarray.push(ar);
                    }
                });
                var finalDelArray = delIDarray.join(',');
                var loc = 'index.php?controller=appointment&action=appointment&subaction=deleteappointment&cid=' + finalDelArray;
                window.location.assign(loc);
            } else {

            }
            //location.href="index.php?controller=products&action=subscriptionlist&subaction=delete&sid="+finalDelArray;
        });

    });
</script>
<?php
class appointment
{
	function listData()
	{
		$table = 'appointment_master';
        update_data($table);
?>
    <script>
        $(document).ready(function () {
            var listURL = 'helperfunc/appointmentList.php';
			
            $('#appointmentlist').dataTable({

                "ajax": listURL,
                "order": [[1, "desc"]]

            });
        });
    </script>
    <?php
		$subvar = 'onclick="return confirmSubmit();"';	
		echo '<a href="appointment-report.php">Export To Excel</a>';
		echo $list='
		<div id="no-more-tables">
		<table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable"	id="appointmentlist" width="100%">
					<thead>
					<tr>
							<td colspan="8"><input type="checkbox" id="selectall" value="false">&nbsp; &nbsp;Select All</input>&nbsp; &nbsp;
							<button class="btn btn-danger" id="deleteMultiple">Delete Selected</td>	
						</tr>
						<tr>
							<th style="width:5%";><center>Select</center></th>
							<th>appointment Id</th>	
							<th>Date</th>			
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody></tbody>
					<tfoot class="hidden-xs">
						<tr>
							<th style="width:5%";>Select</th>
							<th>appointment Id</th>
							<th>Date</th>							
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Subject</th>
							<th>Message</th>
							<th>Action</th>
						</tr>
					</tfoot>	
				</table>
				</div>';
?>
        <script>
            $('.table').editable({
                selector: 'a.estatus,a.esortorder',
                params: {
                    "tblName": "appointment_master"
                },
                value: 1,
                source: [{
                    value: 'E',
                    text: 'Active'
                }, {
                    value: 'D',
                    text: 'Disabled'
                }]
            });
        </script>
        <?php	 
	}
	function delete()    
	{
		$values = explode(",", $_GET["cid"]);
        if (count($values) > 1) {
            foreach ($values as $key => $val) {
                $delsql = "DELETE FROM `appointment_master` WHERE cid='" . $val . "'";
                $delqry = ets_db_query($delsql) or die(ets_db_error() . $delsql);
            }
        } else {
            $delsql = "DELETE FROM `appointment_master` WHERE cid='" . $_GET['cid'] . "'";
            $delqry = ets_db_query($delsql) or die(ets_db_error() . $delsql);
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
                            <h3 id="myModalLabel">Appointment Detail</h3>
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