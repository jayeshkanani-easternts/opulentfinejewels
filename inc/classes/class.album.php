<script type="text/javascript" src="inc/js/jquery.js"></script>
<script type="text/javascript" src="inc/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="inc/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>
<?php
class album
{

	//Listin Album BOF
	function albumlist()
	{
		$albumlist = '';
		$i=0;
		$paging_sql = "select a.album_id,ad.album_title,ad.album_description 
						from album_master a
						inner join album_description ad on a.album_id = ad.album_id
						where ad.language_id = '".$_SESSION['language_id']."' 
						order by createdate desc ";
		
		$max_records= 8;
		paging_func($paging_sql,$max_records,$_GET['page_id']);
		list($tpg,$album_sql)= split('[|]',paging_func($paging_sql,$max_records,$_GET['page_id']));
		
		$album_rs = ets_db_query($album_sql);
		$albumlist= '
			<table cellspacing="0" cellpadding="8" width="100%" border="0" class="tbl_bdr" style="margin-top:10px;">
				<tr>
					<td colspan="2"><div class="heading">'.ALBUMS.'</div></td>
				</tr>
				<tr>';
		while($album_row = ets_db_fetch_array($album_rs))
		{
			$img_sql= "select image_thumb from gallery_master gm
						inner join gallery_description gd on gm.gallery_id= gd.gallery_id
						where gm.album_id='".$album_row['album_id']."' ";
			$img_rs = ets_db_query($img_sql);
			$img_row = ets_db_fetch_array($img_rs);
			$cover_img = $img_row['image_thumb'];

			$pgUrl= get_album_seo_url($album_row['album_id'],'');
			$albumlist .= '
					<td  valign="top" style="padding-left:10px;">
						<div class="sub_heading">
							<a href="'.$pgUrl.'"  class="main">
							<img src="'.DIR_WS_GALLERY_PATH.$album_row['album_id'].'/thumb/'.$cover_img.'" class="image_border"/>
							</a>
							<br/><br />
						</div>
						<div class="main" style="padding:5px 0px 5px 0px;">
							<a href="'.$pgUrl.'" 
								title="'.$album_row['album_title'].'" class="main">'.$album_row['album_title'].'
							</a>
						</div>
					</td>
					<td>&nbsp;</td>';
			$i++;
			if($i > 2)
			{
				$i=0;
				$albumlist .= '
				</tr>';
			}
		}
		//$url= 'album.php?';
		$albumlist.= display_paging($_GET['page_id'],'album',$tpg);
		$albumlist .= '
		</table>';
		
		echo $albumlist;
	}
	//Listin Album EOF
	
	//Listin Gallery BOF
	function display_gallery($album_id)
	{
		$gallerylist = '';
		$i=0;
		$gallery_sql = "select gm.gallery_id,gd.gallery_title, image, image_thumb, album_title, gm.album_id
						from gallery_master gm
						inner join gallery_description gd on gm.gallery_id = gd.gallery_id
						inner join album_description ad on ad.album_id= gm.album_id
						where gd.language_id = '".$_SESSION['language_id']."' and
							gm.album_id='".$album_id."'
						order by gm.createdate desc";
		
		//$max_records= 8;
		//list($tpg,$gallery_sql)= split('[|]',paging_func($paging_sql,$max_records,$_GET['page_id']));
		
		$gallery_rs = ets_db_query($gallery_sql);
		$gallerylist= '<div id="gallery">
			<table cellspacing="0" cellpadding="8" width="100%" border="0" class="tbl_bdr" style="margin-top:10px;">
				<tr>
					<td colspan="9">
						<div class="heading">'.GALLERY_CAPTION.'</div>
					</td>
				</tr>
				<tr>';
		while($gallery_row = ets_db_fetch_array($gallery_rs))
		{
			//$pgUrl= get_gallery_seo_url($gallery_row['gallery_id'],1);
			$gallerylist .= '
					<td  valign="top" style="padding-left:10px;">
						<div class="sub_heading">
							<td width="20%" align="left" valign="top">
								<a href="'.DIR_WS_GALLERY_PATH .$_GET['album_id'].'/'.$gallery_row['image'].'" rel="lightbox['.$gallery_row['gallery_title'].']" title="'.$gallery_row['gallery_title'].'" class="imglnk">
									<img src="'.DIR_WS_GALLERY_PATH.$_GET['album_id'].'/thumb/'.$gallery_row['image_thumb'].'" border="0"  class="borderimg" />
								</a>
							</td>
						</div>
					</td>
					<td>&nbsp;</td>';
			$i++;
			if($i > 2)
			{
				$i=0;
				$gallerylist .= '
				</tr>';
			}
		}
		
		//$pgUrl= get_album_seo_url($album_id,'');
		//$url= $pgUrl.'?';
		//$gallerylist.= display_paging($_GET['page_id'],'album',$tpg);
		$gallerylist .= '
		</table></div>';
		
		echo $gallerylist;
	}
	//Listin Gallery EOF
}
?>