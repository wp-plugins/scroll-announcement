
<?php /*
Plugin Name: scroll_announcement
Plugin URI: http://prasanna.freeoda.com/blog/plugins/scroll-announcement
Description:Scroll announcement
Author:Prasanna 
Version: 1
Author URI:http://prasanna.freeoda.com/blog/*/

function scann_show(){


    $ann1 = get_option('ann1');
	$ann2 = get_option('ann2');
	$ann3 = get_option('ann3');
	$ann4 = get_option('ann4');
	$ann5 = get_option('ann5');
	$ann6 = get_option('ann6');
	$ann7 = get_option('ann7');
	$ann8 = get_option('ann8');
	$ann9 = get_option('ann9');
	$ann10 = get_option('ann10');
	
	$values = array($ann1,$ann2,$ann3,$ann4,$ann5,$ann6,$ann7,$ann8,$ann9,$ann10);
	
	$imght = get_option('imght');
	$imghwt = get_option('imghwt');
	$imgcl = get_option('imgcl');
	$speed = get_option('speed');
	
	
	?>
	<style type="text/css">
	.own
	{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	text-shadow:#CCCCCC;
	text-transform:capitalize;
	}
	</style>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<script type="text/javascript">
	var delay=<?php echo $speed; ?>
	//Configure scroller width
	var scrollwidth="<?php echo $imghwt;?>px"
	//Configure scroller height
	var scrollheight="<?php echo $imght;?>px"
	var textcolor="<?php echo $textcolor;?>"
	var bgcolor="<?php echo $bgcolor;?>"
	var announcescroller=new Array()
	//Configure announcescrollers. Extend array as needed:
	/*var openingtag='<font face="Arial"  size=3>'*/
	var openingtag='<font>'
	var hoffset=-20
	/*announcescroller[0]='<b>Message 1 here</b>'
	announcescroller[1]='<b>Message 2 here</b>'
	announcescroller[2]='<b>Message 3 here</b>'*/
<?php

			
	           foreach ( $values as $key=>$val )
		        {
                          if($val!="")
						  {
                        	 print "announcescroller.push('".$val."');"; // This line updates the script array with new entry
						  }	 
                }

?>
var closingtag='</font>'

	</script>
	<ilayer width=&{scrollwidth}; height=&{scrollheight}; name="sslide">
<layer name="sslide2" width=&{scrollwidth}; height=&{scrollheight};></layer>
</ilayer>

<script language="JavaScript1.2">

var inc=1
var ns4=document.layers
var ie5ns6=document.getElementById||document.all

if (ie5ns6)
document.write(openingtag+'<div id="flyin" class="own" style="position:relative;width:'+scrollwidth+';height:'+scrollheight+';">'+announcescroller[0]+'</div>'+closingtag)


function updatemsg(){
crossobj.style.left="-2000px"
crossobj.style.fontStyle="italic"
crossobj.innerHTML=announcescroller[inc]
crossobj.style.left=crossobj.offsetWidth*(-1)+hoffset+"px"
start=setInterval("animatein()",50)
inc=(inc<announcescroller.length-1)? inc+1 : 0
}

function animatein(){
if (parseInt(crossobj.style.left)<0)
crossobj.style.left=parseInt(crossobj.style.left)+20+"px"
else{
crossobj.style.left=0+"px"
crossobj.style.fontStyle="normal"
clearInterval(start)
}
}

function updatemsgns4(){
document.sslide.document.sslide2.document.write(openingtag+announcescroller[inc]+closingtag)
document.sslide.document.sslide2.document.close()
inc=(inc<announcescroller.length-1)? inc+1 : 0
}

function initialize(){
if (ie5ns6){
crossobj=document.getElementById? document.getElementById("flyin") : document.all.flyin
setInterval("updatemsg()",delay+1000)
}
else if (ns4){
document.sslide.document.sslide2.document.write(openingtag+announcescroller[0]+closingtag)
document.sslide.document.sslide2.document.close()
setInterval("updatemsgns4()",delay)
}
}

window.onload=initialize

</script>
<?php 
}



function scann_admin_option() 
{
	//include_once("extra.php");
	echo "<div class='wrap'>";
	echo "<h2>"; 
	echo wp_specialchars( "Scroll announcement" ) ; 
	echo "</h2>";
    
	$ann1 = get_option('ann1');
	$ann2 = get_option('ann2');
	$ann3 = get_option('ann3');
	$ann4 = get_option('ann4');
	$ann5 = get_option('ann5');
	$ann6 = get_option('ann6');
	$ann7 = get_option('ann7');
	$ann8 = get_option('ann8');
	$ann9 = get_option('ann9');
	$ann10 = get_option('ann10');
	
	$imght = get_option('imght');
	$imghwt = get_option('imghwt');
	$imgcl = get_option('imgcl');
	$speed = get_option('speed');
	
	if ($_POST['cd_submit']) 
	{
		$ann1 = stripslashes($_POST['ann1']);
		$ann2 = stripslashes($_POST['ann2']);
		$ann3 = stripslashes($_POST['ann3']);
		$ann4 = stripslashes($_POST['ann4']);
		$ann5 = stripslashes($_POST['ann5']);
		$ann6 = stripslashes($_POST['ann6']);
		$ann7 = stripslashes($_POST['ann7']);
		$ann8 = stripslashes($_POST['ann8']);
		$ann9 = stripslashes($_POST['ann9']);
		$ann10 = stripslashes($_POST['ann10']);
		
		$imght = stripslashes($_POST['imght']);
		$imghwt = stripslashes($_POST['imghwt']);
		$imgcl = stripslashes($_POST['imgcl']);
		$speed = stripslashes($_POST['speed']);
		
		update_option('ann1', $ann1 );
		update_option('ann2', $ann2 );
		update_option('ann3', $ann3 );
		update_option('ann4', $ann4 );
		update_option('ann5', $ann5 );
		update_option('ann6', $ann6 );
		update_option('ann7', $ann7 );
		update_option('ann8', $ann8 );
		update_option('ann9', $ann9 );
		update_option('ann10', $ann10 );
		update_option('imght', $imght );
		update_option('imghwt', $imghwt );
		update_option('imgcl', $imgcl );
	    update_option('speed', $speed );
	}
	?>
   

   
	<form name="cd_form" method="post" action="">
     <input name="hiddenid" type="hidden" id="hiddenid" value="<?php echo $edit_id; ?>">
        <input name="process" type="hidden" id="process" value="<?php echo $process; ?>">
   
	<table width="382" border="0" cellpadding="5" cellspacing="0">
   <tr>
    <td width="169">Announcement 1 </td>
    <td width="203"><textarea name="ann1" id="ann1"><?php echo $ann1; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 2 </td>
    <td width="203"><textarea name="ann2" id="ann2"><?php echo $ann2; ?></textarea></td>
   </tr>
   <tr>
    <td width="169">Announcement 3 </td>
    <td width="203"><textarea name="ann3" id="ann3"><?php echo $ann3; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 4 </td>
    <td width="203"><textarea name="ann4" id="ann4"><?php echo $ann4; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 5 </td>
    <td width="203"><textarea name="ann5" id="ann5"><?php echo $ann5; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 6 </td>
    <td width="203"><textarea name="ann6" id="ann6"><?php echo $ann6; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 7 </td>
    <td width="203"><textarea name="ann7" id="ann7"><?php echo $ann7; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 8 </td>
    <td width="203"><textarea name="ann8" id="ann8"><?php echo $ann8; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 9 </td>
    <td width="203"><textarea name="ann9" id="ann9"><?php echo $ann9; ?></textarea></td>
  </tr>
   <tr>
    <td width="169">Announcement 10 </td>
    <td width="203"><textarea name="ann10" id="ann10"><?php echo $ann10; ?></textarea></td>
  </tr>
  <tr>
    <td>Height</td>
    <td><input type="text" name="imght" id="imght"  value="<?php echo $imght; ?>"/></td>
  </tr>
  <tr>
    <td>Width</td>
    <td><input type="text" name="imghwt" id="imghwt"  value="<?php echo $imghwt; ?>"/></td>
  </tr>
  <tr>
    <td>Class</td>
    <td><input type="text" name="imgcl" id="imgcl"  value="<?php echo $imgcl; ?>"/></td>
  </tr>
  <tr>
    <td>Class</td>
    <td><input type="text" name="imgcl" id="imgcl"  value="<?php echo $imgcl; ?>"/></td>
  </tr>
  <tr>
    <td>Speed</td>
    <td><input type="text" name="speed" id="speed"  value="<?php echo $speed; ?>"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="cd_submit" id="cd_submit" class="button-primary" value="Submit" type="submit" /></td>
  </tr>
</table>

</form>
<?php
	echo "</div>";
}



function scann_install () 
 {
     add_option('ann1', "A sampletext scroller, it supports multiple language");
	 add_option('ann2', "Поддержка нескольких языков");
	 add_option('imght', "170px");
	 add_option('imghwt', "160px");
	 add_option('imgcl', ""); 
     add_option('speed', "2000"); 
  
  }

function scann_deactivation() 
{
	delete_option('ann1');
	delete_option('ann2');
	delete_option('imght');
	delete_option('imghwt');
	delete_option('imgcl');
	delete_option('speed');
}
function scann_widget($args) 
{
	extract($args);
	echo $before_widget . $before_title;
	echo "Scroll announcement";
	
	echo $after_title;
	scann_show();
	echo $after_widget;
}


function scann_control()
{
	echo '<p>Image slideshow.<br> Goto Image slideshow link.';
	echo ' <a href="options-general.php?page=scroll_announcement.php">';
	echo 'click here</a></p>';
}


function scann_widget_init() 
{
  	register_sidebar_widget(('Scroll announcement'), 'scann_widget');   
	
	if(function_exists('register_sidebar_widget')) 	
	{
		register_sidebar_widget('Scroll announcement', 'scann_widget');
	}
	
	if(function_exists('register_widget_control')) 	
	{
		register_widget_control(array('Scroll announcement', 'widgets'), 'scann_control');
	} 
}

function scann_add_to_menu() 
{
 add_options_page('Scroll announcement', 'Scroll announcement', 3, __FILE__, 'scann_admin_option' );
}

add_action('admin_menu', 'scann_add_to_menu');
add_action("plugins_loaded", "scann_widget_init");
register_activation_hook(__FILE__, 'scann_install');
register_deactivation_hook(__FILE__, 'scann_deactivation');
add_action('init', 'scann_widget_init');
add_option("jal_db_version", "2.0");






?>


