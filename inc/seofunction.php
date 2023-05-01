<?php
/*BOF SEO function for pages*/
function get_pageseo_url($pageid, $module)
{
    $seoqry = "Select seo_slug from seo_link_master where module_id = '" . $pageid . "' and module_name = '" . $module . "'";
    //echo $seoqry;
    $seoexecute = ets_db_query($seoqry) or die(ets_db_error());
    if (ets_db_num_rows($seoexecute) > 0) {
        $seorow = ets_db_fetch_array($seoexecute);
        $seourl = $module . '/' . $seorow['seo_slug'] . '/';
        return $seourl;
    } else {
        return false;
    }
}

function get_pageseo_url1($pageid, $module)
{
    $seoqry = "Select seo_slug from seo_link_master where module_id = '" . $pageid . "' and module_name = '" . $module . "'";
///echo $seoqry;
    $seoexecute = ets_db_query($seoqry) or die(ets_db_error());
    if (ets_db_num_rows($seoexecute) > 0) {
        $seorow = ets_db_fetch_array($seoexecute);
        $seourl = $module . '/' . $seorow['seo_slug'];
        return $seourl;
    } else {
        return false;
    }
}

/*EOF SEO function for pages*/

/*BOF SEO function for projects*/
function get_projectseo_url($module_id, $seoslug)
{
    $seoqry = "Select * from seo_link_master where module_id = '" . $module_id . "' and seo_slug = '" . $seoslug . "'";
    //echo $seoqry;

    $seoexecute = ets_db_query($seoqry) or die(ets_db_error());

    if (ets_db_num_rows($seoexecute) > 0) {
        $seorow = ets_db_fetch_array($seoexecute);
        $seourl = $seorow['module_name'] . '/' . $seorow['seo_slug'] . '/';
        //echo $seourl;
        return $seourl;
    } else {
        return false;
    }
}

function get_projectseo_url1($module_id, $seoslug)
{
    $seoqry = "Select * from seo_link_master where module_id = '" . $module_id . "' and seo_slug = '" . $seoslug . "'";

    $seoexecute = ets_db_query($seoqry) or die(ets_db_error());

    if (ets_db_num_rows($seoexecute) > 0) {
        $seorow = ets_db_fetch_array($seoexecute);
        $seourl = $seorow['module_name'] . '/' . $seorow['seo_slug'];

        return $seourl;
    } else {
        return false;
    }
}

/*EOF SEO function for projects*/
function generate_seo_link($slug = '', $module_name = '')
{
    $whr = '';
    if ($slug != '') {
        $whr .= " and seo_slug = '" . $slug . "'";
    }
    if ($module_name != '') {
        $whr .= " and module_name = '" . $module_name . "'";
    }
    $seo_link_sql = ets_db_query("select module_id from seo_link_master where 1" . $whr) or die(ets_db_error());
    $seo_link_res = ets_db_fetch_array($seo_link_sql);
    return $seo_link_res['module_id'];
}

function get_record_from_db($table_name, $primary_field = '', $primary_id = '', $limit = '')
{
    $whr = '';
    $limit_whr = '';
    if ($primary_field != '') {
        $whr .= " and " . $primary_field . " = '" . $primary_id . "'";
    }

    if ($limit != '') {
        $limit_whr .= " limit " . $limit;
    }
    //echo "select * from ".$table_name." where status = 'E' ".$whr." order by sortorder".$limit_whr;
    $select_db_sql = ets_db_query("select * from " . $table_name . " where status = 'E' " . $whr . " order by sortorder" . $limit_whr) or die(ets_db_error());

    return ets_db_fetch_array($select_db_sql);
}

function breadcrumb_display($module, $pageTitle, $sep, $module_id = '')
{
    if ($module == 'pages') {
        $page_res = get_record_from_db('page_master', 'page_id', $module_id);
        if ($page_res['parent_id'] != 0) {
            $parent_res = get_record_from_db('page_master', 'page_id', $page_res['parent_id']);
            $bread .= '<a href="' . HTTP_SERVER . WS_ROOT . '">Home</a>&nbsp;' . $sep . '&nbsp;<a href="' . get_pageseo_url($parent_res['page_id']) . '">' . $parent_res['page_title'] . '</a>&nbsp;' . $sep . '&nbsp;' . $pageTitle;
        } else {
            $bread .= '<a href="' . HTTP_SERVER . WS_ROOT . '">Home</a>&nbsp;' . $sep . '&nbsp;' . $pageTitle;
        }
    } else {
        $bread .= '<a href="' . HTTP_SERVER . WS_ROOT . '">Home</a>&nbsp;' . $sep . '&nbsp;' . $pageTitle;
    }
    return $bread;
}

?>
