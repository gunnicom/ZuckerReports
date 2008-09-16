<?php
global $theme;
$theme_path="themes/".$theme."/";
$image_path=$theme_path."images/";

require_once("modules/ZuckerReports/config.php");

?>

<table width='100%' cellpadding='0' cellspacing='0' border='0' class='moduleTitle'>
<tr><td valign='top'><h2>About us</h2></td></tr>
</table>
<p/>
<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr><td valign='top'><a href="http://www.go-mobile.at"><img border="0" src="modules/ZuckerReports/images/go-mobile.gif"/></a></td></tr>
</table>
<p/>
<table width='100%' cellpadding='0' cellspacing='0' border='0'>
<tr><td valign='top'><a href="http://jasperreports.sourceforge.net"><img border="0" src="modules/ZuckerReports/images/jasperreports.gif"/></a></td></tr>
</table>
<p/>
<form method="GET" action="http://www.go-mobile.at">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr>
		<td style="padding-bottom: 2px;"><input class="button" type="submit" value="  Go to our Website!  " > </td>
	</tr>
</table>
</form>

<table width="100%" cellspacing="0" cellpadding="0" border="0" class="tabForm">
	<tr>
		<td class="tabDetailViewDL">ZuckerReports</td>
		<td class="tabDetailViewDF"><?php echo get_image("themes/Default/images/ZuckerReports32", "alt=\"ZuckerReports\""); ?> 1.9</td>
	</tr><tr>
		<td width="15%" class="tabDetailViewDL">Company</td>
		<td class="tabDetailViewDF">go-mobile IT GmbH<br/>Grillparzerstra&szlig;e 26<br/>A-4020 Linz<br/></td>
	</tr><tr>
		<td class="tabDetailViewDL">Website</td>
		<td class="tabDetailViewDF"><a href="http://www.go-mobile.at">http://www.go-mobile.at</a></td>
	</tr><tr>
		<td class="tabDetailViewDL">Email</td>
		<td class="tabDetailViewDF"><a href="mailto:office@go-mobile.at">management@go-mobile.at</a></td>
	</tr><tr>
		<td class="tabDetailViewDL">Contributors</td>
		<td class="tabDetailViewDF"> 
		<strong>Florian Treml, Bakk. techn.</strong>, <a href="mailto:f.treml@go-mobile.at">f.treml@go-mobile.at</a>
		<br/>
		<strong>Lothar Mausz</strong>, <a href="mailto:l.mausz@go-mobile.at">l.mausz@go-mobile.at</a>	
		<br/>
		This product includes software developed by the <strong>Apache Software Foundation (<a href="http://www.apache.org/" target="_blank">http://www.apache.org/</a>)</strong>.
		<br/>
		This product includes software developed by <strong>Teodor Danciu (<a href="http://jasperreports.sourceforge.net" target="_blank">http://jasperreports.sourceforge.net</a>)</strong>.
		</td>
	</tr><tr>
		<td class="tabDetailViewDL">Special Thanks</td>
		<td class="tabDetailViewDF"> 
		<strong>Spanish language pack: </strong> Frank, <a href="mailto:fhprietor@hotmail.com">fhprietor@hotmail.com</a>
		<br/>
		<strong>French language pack: </strong> Jean Jacques Serpoul	
		<br/>
		<strong>Norwegian language pack: </strong> Øyvind Berntsen, <a href="mailto:omb@smallworld.no">omb@smallworld.no</a>
		</td>
	</tr>
</table>
