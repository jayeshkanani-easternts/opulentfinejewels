<?php
require('../includes/configure.php');
include('../includes/functions/general.php');
$result = array('data' => array());
$queryString = ets_db_query("SELECT * from gallery_master order by sortorder") or die(ets_db_error());
// Same from main controller File
while ($res = ets_db_fetch_array($queryString)) {

    if ($res['status'] == 'E') {
        $status = "Active";
    } else {
        $status = "Disabled";
    }
    $pk = "image_id:" . $res['image_id'];
    $thumb_image = HTTP_SERVER . WS_ROOT . "timthumb.php?src=" . DIR_WS_GALLERY_PATH . $res['a_id'] . "/" . $res['gallery_image'] . "&w=100&h=67&zc=0";

    $GalleryId = $res['image_id'];
    $GalleryType = getalbumName($res['a_id']);
    $GalleryTitle = $res['image_title'];
    $GalleryImage = '<img src="' . $thumb_image . '">';

    $GalleryStatus = '<a href="#" class="estatus" data-type="select" data-name="status" data-pk="' . $pk . '" data-url="ajaxUpd.php" data-title="Change Status">' . $status . '</a>';

    $GallerySortorder = '<a href="#" class="esortorder" data-type="text" data-name="sortorder" data-pk="' . $pk . '" data-url="ajaxUpd.php" data-title="Change Sort Order">' . $res['sortorder'] . '</a>';

    $Action = '';

    $Action = '<a href="index.php?controller=gallery&action=gallery&subaction=editForm&image_id=' . $res['image_id'] . '" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a> | 
				<a href="index.php?controller=gallery&action=gallery&subaction=delete&image_id=' . $res['image_id'] . '" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a>
				';



    /*if (strpos($_SESSION['userper'], 'e') !== false) {
        $Action .= '<td><a href="index.php?controller=banner&action=banner&subaction=editForm&bannerID=' . $res['bannerID'] . '" title="Edit" class="btn btn-success"><i class="fa fa-edit"></i></a>';
    }


    if (strpos($_SESSION['userper'], 'd') !== false) {
        $Action .= '| <a href="index.php?controller=banner&action=banner&subaction=delete&bannerID=' . $res['bannerID'] . '" title="Delete" class="btn btn-danger" onClick="return confirmSubmit();" ><i class="fa fa-times"></i></a> </td>';
    }*/

    $result['data'][] = array("$GalleryId", "$GalleryType", "$GalleryTitle", "$GalleryImage", "$GalleryStatus", "$GallerySortorder", "$Action");
}
// End While Loop
echo json_encode($result);

?>
