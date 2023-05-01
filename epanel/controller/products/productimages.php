<script type="text/javascript" src="js/tmpl.min.js"></script>
<script type="text/javascript" src="js/load-image.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery.iframe-transport.js"></script>
<script type="text/javascript" src="js/jquery.fileupload.js"></script>
<script type="text/javascript" src="js/jquery.fileupload-ui.js"></script>
<script type="text/javascript" src="js/jquery.fileupload-process.js"></script>
<script type="text/javascript" src="js/jquery.fileupload-image.js"></script>
<script type="text/javascript" src="js/jquery.fileupload-validate.js"></script>


<?php
include WS_PFBC_ROOT."Form.php";
require_once DIR_WS_CLASSES."proUpload.php";
//echo DIR_WS_CLASSES;
class productimages
{
    function addForm()
    {

        $imgSql = ets_db_query("Select * from gallery where productID = '".(int)$_REQUEST['productID']."' and isFront = 'E' ");
        $imgfiles = "";
        while($irs = ets_db_fetch_array($imgSql)){
            $imginfo = getimagesize(DIR_FS_PROJECT_PATH.$_REQUEST['productID']."/".$irs['galleryImage']);
            $imgsize = filesize(DIR_FS_PROJECT_PATH.$_REQUEST['productID']."/".$irs['galleryImage']);

            $imgfiles .=
                '
			{
				"name":"'.$irs['galleryImage'].'",
				"title":"'.$irs['galleryTitle'].'",
				"isFront":"'.$irs['isFront'].'",
				"size":"'.$imgsize.'",
				"type":"'.$imginfo['mime'].'",
				"thumbnailUrl":"'.DIR_WS_PROJECT_PATH.$_REQUEST['productID'].'/thumbnail/'.$irs['galleryImage'].'",
				"deleteUrl":"'.HTTP_SERVER.WS_ADMIN_ROOT.'upload.php?file='.$irs['galleryImage'].'",
				"deleteType":"DELETE"
			},
			';
        }
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                var files = [
                    <?php echo $imgfiles; ?>
                ];
                $('#fileupload').fileupload({
                    url: '<?php echo HTTP_SERVER.WS_ADMIN_ROOT; ?>upload.php?productID=<?php echo (int)$_REQUEST['productID']; ?>'
                }).on('fileuploadsubmit', function (e, data) {
                    data.formData = data.context.find(':input').serializeArray();
                });
                var $form = $('#fileupload');
                $form.fileupload('option', 'done').call($form, $.Event('done'), {result: {files: files}});
            });

        </script>
        <form id="fileupload" action="<?php echo HTTP_SERVER.WS_ADMIN_ROOT; ?>upload.php?productID=<?php echo (int)$_REQUEST['productID']; ?>" method="POST" enctype="multipart/form-data">
            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
            <div class="container">
                <div class="row-fluid fileupload-buttonbar">
                    <div class="span7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <input type="file" name="files[]" multiple>
                </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="icon-upload icon-white"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-warning cancel">
                            <i class="icon-ban-circle icon-white"></i>
                            <span>Cancel upload</span>
                        </button>
                        <button type="button" class="btn btn-danger delete">
                            <i class="icon-trash icon-white"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>

                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
        </form>
        <script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
        		<label class="title">
			    <span>Title:</span><br>
			    <input name="productID" value="<?php echo (int)$_REQUEST['productID']; ?>" type="hidden">
			    <input name="title[]" class="form-control">
			    <input name="isFront[]" type="hidden" value="E">
			</label>
	   </td>
        		   	   
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
         <td>
        		<label class="title">
			    <span>Title:</span><br>
			    <input name="productID" value="{%=file.productID%}" type="hidden">
			    <input name="title[]" class="form-control" value="{%=file.title%}">
			    <input name="isFront[]" type="hidden" value="E">
			</label>
	   </td>
 
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
        <?php
    }

    function editForm()
    {
        $sql = "select * from  gallery where galleryID ='".$_REQUEST['galleryID']."'";
        $qry = ets_db_query($sql) or die(ets_db_error().$sql);

        if(ets_db_num_rows($qry) > 0){
            $rs=ets_db_fetch_array($qry);
            $form = new Form("html5");
            $form->configure(array(
                "prevent" => array("bootstrap","jQuery"),
                "view" => new View_SideBySide
            ));
            $status = array("E" => "Enabled", "D" => "Disabled");
            $front = array( "D" => "No", "E" => "Yes");
            $form->addElement(new Element_HTML("<legend>Edit Product Image</legend>"));
            $form->addElement(new Element_Hidden("controller", "products"));
            $form->addElement(new Element_Hidden("action", "productimages"));
            $form->addElement(new Element_Hidden("subaction", "edit"));
            $form->addElement(new Element_Hidden("galleryID", $_REQUEST['galleryID']));
            $form->addElement(new Element_Hidden("modifieddate"));
            $form->addElement(new Element_Hidden("username"));
            $form->addElement(new Element_Hidden("prevImage", $rs['galleryImage']));
            $form->addElement(new Element_Hidden("mobile_prevImage", $rs['mobile_galleryImage']));
            $form->addElement(new Element_Hidden("isFront", 'E'));
            /* Actual Form Fields Started */
            $productID = getMasterArray("products","productID","productTitle");

            $form->addElement(new Element_Select("Select Product:", "productID",$productID, array(
                "required" => 1,
                "value"=> $rs['productID']
            )));
            $form->addElement(new Element_Textbox("Image Title:", "galleryTitle", array(
                "value"=> $rs['galleryTitle']
            )));

            $form->addElement(new Element_HTML('<img src="'.DIR_WS_PROJECT_PATH.$rs['productID']."/thumbnail/".$rs['galleryImage'].'" style="margin-left:200px;">'));
            $form->addElement(new Element_File("Project Slider Image:", "galleryImage", array(
                "placeholder" => "Browse Image"
            )));

            $form->addElement(new Element_HTML('<img src="'.DIR_WS_PROJECT_PATH.$rs['productID']."/thumbnail/".$rs['mobile_galleryImage'].'" style="margin-left:200px;">'));
            $form->addElement(new Element_File("Mobile Project Slider:", "mobile_galleryImage", array(
                "placeholder" => "Browse Image"
            )));

            $form->addElement(new Element_Textbox("Sortorder:", "sortorder", array(
                "required" => 1,
                "value"=> $rs['sortorder']
            )));
            $form->addElement(new Element_Select("Status:", "status", $status, array(
                "required" => 1,
                "value"=> $rs['status']
            )));
            $form->addElement(new Element_HTML('<hr>'));
            $form->addElement(new Element_Button);
            $form->addElement(new Element_Button("Cancel", "button", array(
                "onclick" => "history.go(-1);"
            )));
            $form->addElement(new Element_HTML('<hr>'));
            $form->render();
        }
        else
        {
            echo "No Found...";
        }

    }
    function edit()
    {
        $username=$_SESSION['username'];
        $modifieddate = date("Y-m-d");
        $updimg = true;

        $mobileupdimg = true;

        $error = false;
        $error_mob = false;
        $path = DIR_FS_PROJECT_PATH.$_POST['productID'].'/';
        if(!file_exists($path))
        {
            mkdir($path);
            exec("chown ".FILEUSER.FILEUSER." ".$path);
            exec("chmod 0777 ".$path);

        }
        if($_FILES["galleryImage"]['size'] == 0 ||  $_FILES["galleryImage"] == $_POST['prevImage']){
            $updimg = false;
            $upload = $_POST['prevImage'];
        }
        if($_FILES["mobile_galleryImage"]['size'] == 0 ||  $_FILES["mobile_galleryImage"] == $_POST['mobile_prevImage']){
            $mobileupdimg = false;
            $mobile_upload = $_POST['mobile_prevImage'];
        }
        if($updimg){


            @unlink(DIR_FS_PROJECT_PATH.$_POST['productID']."/".$_POST['prevImage']);
            $galleryID = $_POST['galleryID'];
            $title = preg_replace("![^a-z0-9]+!i", "-", trim($_POST['galleryTitle']));
            $title = $galleryID.'-'.str_replace(' ', '-', trim($title)).'.jpg';
            $upload = $title;
            $target_path = DIR_FS_PROJECT_PATH.$_POST['productID']."/".$title;
//            exit;
            if(!move_uploaded_file($_FILES["galleryImage"]["tmp_name"],$target_path)){

                $error = true;
                echo "Error in Uploading File....";
            }
        }
        if($mobileupdimg){
            @unlink(DIR_FS_PROJECT_PATH.$_POST['productID']."/".$_POST['mobile_prevImage']);
            $galleryID = $_POST['galleryID'];

            $mobile_title = preg_replace("![^a-z0-9]+!i", "-", trim($_POST['galleryTitle']));
            $mobile_title = $galleryID.'-'.str_replace(' ', '-', trim($mobile_title)).'_mobile.jpg';
            $mobile_upload = $mobile_title;

            $mobiletarget_path = DIR_FS_PROJECT_PATH.$_POST['productID']."/".$mobile_title;
//            exit;
            if(!move_uploaded_file($_FILES["mobile_galleryImage"]["tmp_name"],$mobiletarget_path)){

                $error_mob = true;
                echo "Error in Uploading File....";
            }
        }



        if(!$error || !$error_mob){
            $updqry = ets_db_query("update gallery set 
			username = '".$username."',
			modifieddate = '".$modifieddate."',
			productID = '".ets_db_real_escape_string($_POST['productID'])."',
			galleryTitle = '".ets_db_real_escape_string($_POST['galleryTitle'])."',
			galleryImage = '".$upload."',
			mobile_galleryImage = '".$mobile_upload."',
			sortorder = '".$_POST['sortorder']."',
			isFront = '".$_POST['isFront']."',
			status = '".$_POST['status']."',
			remote_ip ='".$_SERVER['REMOTE_ADDR']."'
			where galleryID= '".$_POST['galleryID']."'") or die ("Updating  gallery records query failed: ".ets_db_error());
            return true;
        }
    }
    function listData()
    {
        ?>
        <script>
            $(document).ready(function() {
                var listURL = "helperfunc/projectgalleryList.php?productID=<?php echo (int)$_REQUEST['productID'];?>";
                var oTable = $('#gallerylist').dataTable({
                    "ajax": listURL
                });
                /*
                 $('#gallerylist').dataTable({
                 "bProcessing": true,
                 "sAjaxSource": listURL,
                 "sDom": "<'row-fluid'<'span8'l><'span4'f>r>t<'row-fluid'<'span8'i><'span4'p>>",
                 "sPaginationType": "bootstrap",
                 "oLanguage": {"sLengthMenu": "_MENU_ records per page"}
                 });
                 */
                $('.esortorder').editable({params:{"tblName":"gallery"}});
            });
        </script>
        <?php
        $subvar = 'onclick="return confirmSubmit();"';
        echo '<div id="no-more-tables"><table cellpadding="1" cellspacing="2" border="0" class="table table-striped table-bordered dataTable" id="gallerylist" width="100%">
		<thead>
		<tr>
			<th>Id</th>
			<th>Project Name</th>
			<th>Image Title</th>
			<th>Image</th>
			<th>Status</th>
			<th>Sort-Order</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody></tbody>	
		<tfoot>
			<tr>
				<th>Id</th>
				<th>Project Name</th>
				<th>Image Title</th>
				<th>Image</th>
				<th>Status</th>
				<th>Sort-Order</th>
				<th>Action</th>
			</tr>
		</tfoot>
		
		 </table></div>';
        ?>
        <script>
            $('.table').editable({
                selector: 'a.estatus,a.esortorder',
                params:{"tblName":"gallery"},
                value: 1,
                source: [{value: 'E', text: 'Active'},{value: 'D', text: 'Disabled'}]
            });
        </script>
        <?php

    }
    function delete()
    {
        $delsql = "Delete from  gallery where galleryID='".$_GET['galleryID']."'";
        $delqry = ets_db_query($delsql) or die(ets_db_error().$delsql);
        return true;
    }
}

?>
