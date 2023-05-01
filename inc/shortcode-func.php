<?php
/** 
* Dropcaps Shortcodes
* 
*/
function pro_drop_cap_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'variation'      => '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_sprite' : '';

   return '<span class="dropcap1' .$style. '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap1', 'pro_drop_cap_1');


function pro_drop_cap_2( $atts, $content = null ) {
   return '<span class="dropcap2">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap2', 'pro_drop_cap_2');


function pro_drop_cap_3( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'variation'      => '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_sprite' : '';

   return '<span class="dropcap3' .$style. '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap3', 'pro_drop_cap_3');


function pro_drop_cap_4( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'variation'      => '',
    ), $atts));

	$style = ($variation) ? ' '.$variation. '_color' : '';

   return '<span class="dropcap4' .$style. '">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap4', 'pro_drop_cap_4');

/** 
* Pullquotes Shortcodes
* 
*/
function pro_pullquote_right( $atts, $content = null ) {
   return '<span class="pullquote_right">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_right', 'pro_pullquote_right');


function pro_pullquote_left( $atts, $content = null ) {
   return '<span class="pullquote_left">' . do_shortcode($content) . '</span>';
}
add_shortcode('pullquote_left', 'pro_pullquote_left');

function pro_pullquote1( $atts = null, $content = null ) {
		
		extract(shortcode_atts(array(
			'quotes'	=> '',
			'align'		=> '',
			'variation'	=> '',
			'textcolor'	=> '',
			'cite'		=> '',
			'citelink'	=> ''
	    ), $atts));
	
		$class = array();
		
		if( trim( $quotes ) == 'true' )
			$class[] = ' quotes';
			
		if( preg_match( '/left|right|center/', trim( $align ) ) )
			$class[] = ' align' . $align;
			
		if( ( $variation ) && ( empty( $textcolor ) ) )
			$class[] = ' ' . $variation . '_text';
			
		$citelink = ( $citelink ) ? ' ,<a href="' .  $citelink  . '" class="target_blank">' . $citelink . '</a>' : '';
		
		$cite = ( $cite ) ? ' <cite>&ndash; ' . $cite . $citelink . '</cite>' : '' ;
		
		$style = ( $textcolor ) ? ' style="color:' . $textcolor . ';"' : '';
			
		$class = join( '', array_unique( $class ) );
	
		return '<span class="pullquote' . $class . '"' . $style . '>' . do_shortcode( $content ) . $cite . '</span>';
	}
add_shortcode('pullquote1', 'pro_pullquote1');
function pro_box( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'h3'      => '',
	'link'      => '',
    ), $atts));
	$h3 = ( $h3 ) ? ''.$h3.'' : '';
	$link = ( $link ) ? ' <a href="'.$link.'" title="Read More" class="read_more">Read More...</a>' : '';
   
   return '
   <div class="box">
		<h3>'.$h3.'</h3>
		<div class="box_bg">
		' . do_shortcode($content) . '<br> '.$link.'
		</div>
		<div class="box_bot">&nbsp;</div>
		</div>
  ';
}
add_shortcode('box', 'pro_box');


function pro_box_news( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'h3'      => '',
	'link'      => '',
    ), $atts));
	$h3 = ( $h3 ) ? ''.$h3.'' : '';
   
   return '
   
   <div class="box">
	<h3>'.$h3.'</h3>
	<div class="box_bg">
		' . display_newslist("News") . '
	</div>
	<div class="box_bot"></div>
</div>
  ';
}
add_shortcode('box_news', 'pro_box_news');

//************************************* Box Styles

function pro_download_box( $atts, $content = null ) {
   return '<div class="download_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('download_box', 'pro_download_box');


function pro_warning_box( $atts, $content = null ) {
   return '<div class="warning_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('warning_box', 'pro_warning_box');


function pro_info_box( $atts, $content = null ) {
   return '<div class="info_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('info_box', 'pro_info_box');


function pro_note_box( $atts, $content = null ) {
   return '<div class="note_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('note_box', 'pro_note_box');


function pro_fancy_box( $atts, $content = null ) {
   return '<div class="fancy_box">' . do_shortcode($content) . '</div>';
}
add_shortcode('fancy_box', 'pro_fancy_box');



//************************************* List Styles

function pro_check_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="check_list">', do_shortcode($content));
	return $content;
	
}
add_shortcode('check_list', 'pro_check_list');


function pro_arrow_list( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="arrow_list">', do_shortcode($content));
	return $content;
	
}
add_shortcode('arrow_list', 'pro_arrow_list');

//************************************* Toggle Content

function pro_toggle_content( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));
	
	$out .= '<div class="toggle"><a href="#"><span>' .$title. '</a></span></div>';
	$out .= '<div class="toggle_content " style="display: none;">';
	$out .= '<div class="block accordion-wrapper">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '</div>';
	
   return $out;
}
add_shortcode('toggle', 'pro_toggle_content');


//************************************* Highlight Styles

function pro_highlight( $atts, $content = null ) {
   return '<span class="highlight">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight', 'pro_highlight');


function pro_highlight2( $atts, $content = null ) {
   return '<span class="highlight2">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight2', 'pro_highlight2');


//************************************* Divider Styles

function pro_divider( $atts, $content = null ) {
   return '<div class="divider"></div>';
}
add_shortcode('divider', 'pro_divider');


function pro_divider_top( $atts, $content = null ) {
   return '<div class="divider top"><a href="#">Top</a></div>';
}
add_shortcode('divider_top', 'pro_divider_top');


//************************************* Columns


function pro_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'pro_one_third');


function pro_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'pro_one_third_last');


function pro_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'pro_two_third');


function pro_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'pro_two_third_last');


function pro_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'pro_one_half');


function pro_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'pro_one_half_last');


function pro_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'pro_one_fourth');


function pro_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'pro_one_fourth_last');


function pro_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'pro_three_fourth');


function pro_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'pro_three_fourth_last');

function pro_clientele( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'h3'      => '',
	'num'      => '',
	
    ), $atts));
	$h3 = ( $h3 ) ? ''.$h3.'' : '';
	$num = ( $num ) ? ''.$num.'' : '';
   
   return clientele($h3,$num);
}
add_shortcode('clientele', 'pro_clientele');

function pro_loan( $atts, $content = null ) {
   return '
<script language="Javascript" src="js/calculator.js"></script>
<fieldset>
	<legend><h2>Loan EMI Calculator</h2></legend>
	<form name="frmloan" method="post" action="#" id="frmloan">
		<table width="100%"  border="0" cellpadding="2" cellspacing="5">
			<tr>
				<td width="120">
					<label for="Principle Amount"><strong>Principle Amount</strong></lable>
				</td>
				<td>
					<lable for="Input for Principle Amount"> : <input name="principle_amt" type="text" id="principle_amt" class="select" value="">
					</lable>
				</td>
			</tr>
			<tr>
				<td>
					<lable for="Term"><strong>No of Years<strong></lable>
				</td>
				<td>
					<lable for="Input for Term"> : <input name="installment" type="text" id="installment" class="sizeselect" size="3" value="">
					</lable>
				</td>
			</tr>
			<tr>
				<td>
					<lable for="ROI"><strong>Rate Of Interest<strong></lable>
				</td>
				<td>
					<lable for="Input for ROI"> : <input name="roi" type="text" id="roi" class="required sizeselect" value="">
					</lable>&nbsp;&nbsp;(%)
					</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<lable>&nbsp;&nbsp;<input name="Calculate" type="button" class="button"  value="Calculate" onclick= "javascript: enablediv();">
					</lable>
				</td>
			</tr>
		</table>
	</form>
	<div id="emiDet"></div>
</fieldset>';
}
add_shortcode('loan_calculate', 'pro_loan');

function pro_deposit( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'type'      => '',
    ), $atts));
		echo '<script language="Javascript" src="js/calculator.js"></script>';
	if($type == 'cum'){
		   return '
		   <script language="Javascript" src="js/calculator.js"></script>
			<fieldset>
			<legend><h2>Cumulative Deposit Calculator</h2></legend>
			<form action="" name="frmloan" method="post">
			<table width="100%"  border="0" cellpadding="2" cellspacing="5">
				<tr>
					<td width="200"><label for="Deposite Amount"><strong>Principle Amount :</strong></lable></td>
					<td><lable for="Input for Deposite Amount"><input name="deposit_amt" type="text" id="deposit_amt" class="select" value="" /></lable></td>
				</tr>
				<tr>
					<td><lable for="Term"><strong>Term :<strong></lable></td>
					<td><lable for="Input for Term"><input name="term_year" type="text" id="term_year" class="select" value="" /></lable>(In a Years)</td>
				</tr>
				<tr>
					<td><lable for="ROI"><strong>Rate Of Interest :<strong></lable></td>
					<td>
						<lable for="Input for ROI">
							<input name="roi" type="text" id="roi" class="select" value="" />
						</lable>(%)
					</td>
				</tr>
				 <tr>
					<td align="right" style="padding-right:10px;">&nbsp;</td>
					<td>
					<input name="Submit" type="button" class="button"  value="Submit" onclick="calDeposit(2);">
					<input name="clear" type="reset" class="button" id="clear" value="Clear">
					</td>
				</tr>
			</table>
			</form>

			<div id="deposit_id"></div>

			</fieldset>
			';
	}else{
		   return '
		    
			<fieldset>
			<legend><h2>Fixed Deposit Calculator</h2></legend>
			<form action="#" name="frmfixed" method="post">
			<table width="100%"  border="0" cellpadding="2" cellspacing="5">
				<tr>
					<td width="200"><label for="Principle Amount"><strong>Principle Amount :</strong></lable></td>
					<td><lable for="Input for Principle Amount"><input name="principle_amt" type="text" id="principle_amt" class="select" value="" /></lable></td>
				</tr>
				<tr>
					<td><lable for="Term"><strong>Term :<strong></lable></td>
					<td><lable for="Input for Term"><input name="term" type="text" id="term" class="select" value="" /></lable>&nbsp;<select name="term_type" id="term_type" class="select" style="width:80px;" >
							<option value="Year">Year</option> 
							<option value="Month">Month</option>
							<option value="Days">Days</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><lable for="ROI"><strong>Rate Of Interest :<strong></lable></td>
					<td>
						<lable for="Input for ROI">
							<input name="rooi" type="text" id="rooi" class="select" value="" />
						</lable>(%)
					</td>
				</tr>
				 <tr>
					<td align="right" style="padding-right:10px;">&nbsp;</td>
					<td>
					<input name="Submit" type="button" class="button"  value="Submit" onclick="calDeposit(3);" />
					<input name="clear" type="reset" class="button" id="clear" value="Clear">
					</td>
				</tr>
			</table>
			</form>
			<div id="fdeposit_id"></div>
			</fieldset>
			';	
	}
}
add_shortcode('deposit_calculate', 'pro_deposit');
?>