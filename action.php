<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Action php</title>
</head>

<body>

<?php
session_start();
$x=0;
function PV($R,$n,$pmt) {				//$R for the rate, $n number of period, $pmt is the amount paid
$m=1;
$Z = 1 / (1 + ($R/$m));

return ($pmt * $Z * (1 - pow($Z,$n)))/(1 - $Z); 

}

$today = getdate();


if(!empty($_POST['owner_name'])&&!empty($_POST['property_address'])&&!empty($_POST['property_type'])&&!empty($_POST['lease_type'])&&!empty($_POST['property_size'])){
	$owner=$_POST['owner_name'];
	$report_date=$today;
	$property_address=$_POST['property_address'];
	$property_type=$_POST['property_type'];
	$lease_type=$_POST['lease_type'];
	$property_size=$_POST['property_size'];
	$energy=$_POST['energy'];
	$mortgage_holder=$_POST['mortgage_holder'];
	$est_out_mortgage=$_POST['est_out_mortgage'];
	$appraised_value=$_POST['appraised_value'];
	$assessed_value=$_POST['assessed_value'];
	$utility_cost=$_POST['utility_cost'];
	$useful_upgrades=$_POST['useful_upgrades'];
	$property_value=max($appraised_value, $assessed_value);
	$range[0]=0.2;
	$range[1]=0.3;
	$range[2]=0.4;
	$est_year_save=array('0','0','0');
	$est_year_save[0]=$utility_cost*0.2;
	$est_year_save[1]=$utility_cost*0.3;
	$est_year_save[2]=$utility_cost*0.4;
	$est_life_save=array('0','0','0');
	$est_life_save[0]=$useful_upgrades*$est_year_save[0];
	$est_life_save[1]=$useful_upgrades*$est_year_save[1];
	$est_life_save[2]=$useful_upgrades*$est_year_save[2];
	$est_max_project=array('0','0','0');
	$y=array('0','0','0');
	$y[0]=$est_life_save[0]/(1.25*20);
	$est_max_project[0]=PV(0.065,20,$y[0]);
	$y[1]=$est_life_save[1]/(1.25*20);
	$est_max_project[1]=PV(0.065,20,$y[1]);
	$y[2]=$est_life_save[2]/(1.25*20);
	$est_max_project[2]=PV(0.065,20,$y[2]);
	$est_lien_value=array('0','0','0');
	$est_max_project[0]=round($est_max_project[0], 0);
	$est_max_project[1]=round($est_max_project[1], 0);
	$est_max_project[2]=round($est_max_project[2], 0);
	$est_lien_value[0]=($est_max_project[0]/$property_value)*100;
	$est_lien_value[1]=($est_max_project[1]/$property_value)*100;
	$est_lien_value[2]=($est_max_project[2]/$property_value)*100;
	$est_lien_value[0]=round($est_lien_value[0], 2);
	$est_lien_value[1]=round($est_lien_value[1], 2);
	$est_lien_value[2]=round($est_lien_value[2], 2);
	$existing_loan=$est_out_mortgage/$property_value*100;
	

$con=mysqli_connect("localhost","texaspac_john","johnathanblack123","texaspac_johnathanblack") or die("<br>Connection error");
echo ("Report Has Been Saved In The Database");
$sql="INSERT INTO `texaspac_johnathanblack`.`report` (`owner_name`, `report_date`, `property_address`, `property_type`, `lease_type`, `property_size`, `energy`, `mortgage_holder`, `est_out_mortgage`, `appraised_value`, `assessed_value`, `utility_cost`, `useful_upgrades`,  `property_value`, `est_existing_loan`, `range1`,`range2`,`range3`, `est_year_save1`,`est_year_save2`,`est_year_save3`,`est_life_save1`, `est_life_save2` ,`est_life_save3`, `est_max_project1`, `est_max_project2`, `est_max_project3`, `est_lien_value1` , `est_lien_value2`, `est_lien_value3`) VALUES ('$owner', '$report_date', '$property_address', '$property_type', '$lease_type', '$property_size', '$energy','$mortgage_holder', '$est_out_mortgage', '$appraised_value', '$assessed_value', '$utility_cost', '$useful_upgrades', '$property_value', '$existing_loan', '$range[0]', '$range[1]', '$range[2]', '$est_year_save[0]', '$est_year_save[1]', '$est_year_save[2]', '$est_life_save[0]', '$est_life_save[1]', '$est_life_save[2]', '$est_max_project[0]' , '$est_max_project[1]', '$est_max_project[2]', '$est_lien_value[0]', '$est_lien_value[1]', '$est_lien_value[2]')";
mysqli_query($con,$sql);
}
else{
	echo "Fill all fields";
	}
?>

<style>
table {
	mso-displayed-decimal-separator: ".";
	mso-displayed-thousand-separator: ",";
}
td {
	border: 1px solid black; !important
	mso-style-parent: style0;
	padding: 0px;
	fmso-ignore: padding;
	color: black;
	font-size: 14pt;
	font-weight: 400;
	font-style: normal;
	text-decoration: none;
	font-family: Georgia, sans-serif;
	mso-font-charset: 0;
	mso-number-format: General;
	text-align: general;
	vertical-align: bottom;
	mso-background-source: auto;
	mso-pattern: auto;
	mso-protection: locked visible;
	white-space: nowrap;
	mso-rotate: 0;
}
col {
	mso-width-source: auto;
}
.xl75 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
}
tr {
	mso-height-source: auto;
}
.xl71 {
	mso-style-parent: style0;
	border: 1px solid black;
}
.xl77 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
}
.xl103 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: none;
}
.xl138 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	white-space: normal;
}
.xl76 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
}
.xl135 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	white-space: normal;
}
.xl104 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: none;
}
.xl107 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: none;
}
.xl152 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	white-space: normal;
}
.xl102 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
}
.xl95 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
}
.xl99 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
}
.xl110 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0.00_);[Red]\("$"#,##0.00\)";
	vertical-align: middle;
	border: 1px solid black;
}
.xl106 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	white-space: normal;
}
.xl112 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl125 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl108 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl121 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl109 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl124 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl113 {
	mso-style-parent: style0;
	font-size: 14pt;
	font-weight: 700;
	font-family: Georgia, serif;
	mso-font-charset: 0;
	mso-number-format: 0%;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl114 {
	mso-style-parent: style18;
	font-size: 14pt;
	font-weight: 700;
	font-family: Georgia, serif;
	mso-font-charset: 0;
	mso-number-format: 0%;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl115 {
	mso-style-parent: style0;
	font-size: 14pt;
	font-weight: 700;
	font-family: Georgia, serif;
	mso-font-charset: 0;
	mso-number-format: 0%;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl116 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
}
.xl123 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
}
.xl105 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	white-space: normal;
}
.xl111 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	background: #E7E6E6;
	mso-pattern: black none;
}
.xl117 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
}
.xl122 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: Percent;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
}
.xl149 {
	mso-style-parent: style0;
	color: white;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
	background: #21799E;
	mso-pattern: black none;
}
.xl84 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl85 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl97 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl98 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl82 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl131 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: center;
	vertical-align: middle;
	
	
	mso-pattern: black none;
}
.xl89 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: 0%;
	text-align: center;
	vertical-align: middle;
	
}
.xl90 {
	mso-style-parent: style18;
	font-size: 14pt;
	mso-number-format: 0%;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl134 {
	mso-style-parent: style17;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	
	
	mso-pattern: black none;
}
.xl91 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: Fixed;
	text-align: center;
	vertical-align: middle;
	
}
.xl92 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: Fixed;
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl93 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	
}
.xl132 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	
	
	mso-pattern: black none;
}
.xl133 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
	
	mso-pattern: black none;
}
.xl94 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: ""$"#,##0_);[Red]\("$"#,##0\)";
	text-align: center;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl146 {
	mso-style-parent: style0;
	color: white;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
	background: #21799E;
	mso-pattern: black none;
}
.xl78 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl118 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl119 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl120 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl96 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl86 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl87 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl144 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: left;
	vertical-align: top;
	border: 1px solid black;
	
	
	
	white-space: normal;
}
.xl130 {
	mso-style-parent: style16;
	font-size: 14pt;
	mso-number-format: "#,##0_);\(#,##0\)";
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
	
	mso-pattern: black none;
}
.xl83 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
}
.xl129 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: left;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
	
	mso-pattern: black none;
}
.xl128 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
	
	mso-pattern: black none;
	white-space: normal;
}
.xl127 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	border: 1px solid black;
	
	
	
	
	mso-pattern: black none;
	white-space: normal;
}
.xl88 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl79 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl126 {
	mso-style-parent: style0;
	font-size: 14pt;
	text-align: left;
	vertical-align: middle;
	
	
	
	
	
	mso-pattern: black none;
}
.xl80 {
	mso-style-parent: style0;
	font-size: 14pt;
	vertical-align: middle;
	
	
	
	
}
.xl81 {
	mso-style-parent: style0;
	font-size: 14pt;
	mso-number-format: "Short Date";
	vertical-align: middle;
	
	
	
	
}
.xl100 {
	mso-style-parent: style0;
	border: 1px solid black;
	
	
	
}
.xl72 {
	mso-style-parent: style0;
	border: 1px solid black;
	
	
	
}
.xl101 {
	mso-style-parent: style0;
	border: 1px solid black;
	
	
	
}
.xl141 {
	mso-style-parent: style0;
	color: white;
	font-size: 18pt;
	font-weight: 700;
	font-family: Georgia, serif;
	mso-font-charset: 0;
	text-align: center;
	vertical-align: middle;
	
	
	
	
	background: #21799E;
	mso-pattern: black none;
}
.xl74 {
	mso-style-parent: style0;
	text-align: center;
	
}
.xl73 {
	mso-style-parent: style0;
	color: #21799e;
	font-size: 24pt;
	font-weight: 700;
	font-family: "Futura Book", sans-serif;
	mso-font-charset: 0;
	text-align: left;
	
}
</style>
</head>
<body class="xl75" link="#0563c1" vlink="#954f72"><table style="border: thick black; border-image: none; min-width: 1000px; border-collapse: collapse; table-layout: fixed;" cellspacing="0" cellpadding="0">
<form id="formed" action="action.php" method="post">
<input id="i1" type="hidden" name="owner_name" value=""/>
<input id="i2" type="hidden" name="property_address" value="" />
<input id="i3" type="hidden" name="property_type" value="" />
<input id="i4" type="hidden" name="lease_type" value="" />
<input id="i5" type="hidden" name="property_size" value="" />
<input id="i6" type="hidden" name="energy"  value=""/>
<input id="i7" type="hidden" name="mortgage_holder" value="" />
<input id="i8" type="hidden" name="est_out_mortgage" value="" />
<input id="i9" type="hidden" name="appraised_value" value="" />
<input id="i10" type="hidden" name="assessed value" value="" />
<input id="i11" type="hidden" name="utility_cost" value="" />
<input id="i12" type="hidden" name="useful_upgrades" value="" />
<input type="button" value="Submit form" style="visibility:hidden;">
</form>

 
<colgroup><col width="70" class="xl75" style="width: 53pt;">
 <col width="321" class="xl75" style="width: 241pt; mso-width-source: userset; mso-width-alt: 10282;">
 <col width="120" class="xl75" style="width: 90pt; mso-width-source: userset; mso-width-alt: 3840;">
 <col width="101" class="xl75" style="width: 76pt; mso-width-source: userset; mso-width-alt: 3221;" span="2">
 <col width="70" class="xl75" style="width: 53pt;">
 <col width="95" class="xl75" style="width: 71pt; mso-width-source: userset; mso-width-alt: 3029;">
 <col width="86" class="xl75" style="width: 65pt; mso-width-source: userset; mso-width-alt: 2752;">
 <col width="70" class="xl75" style="width: 53pt;">
 <tbody>
  <tr height="28" style="height: 21pt; mso-height-source: userset;">
  <td height="28" class="xl95" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td  class="xl141" colspan="5">Preliminary
  PACE Qualification Report</td>
  
 </tr>
 <tr height="22" style="height: 16.5pt; mso-height-source: userset;">
  <td height="22" class="xl95" style="border: currentColor; border-image: none; height: 16.5pt;">&nbsp;</td>
  <td class="xl100">&nbsp;</td>
  <td class="xl72" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl72" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl101" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
 </tr>
 <tr height="22" style="height: 16.5pt; mso-height-source: userset;">
  <td class="xl88" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl79">Owner Name:</td>
  <td class="xl126" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;"><?php echo $owner?></td>
  <td style="font-size:11pt;" class="xl80">Report Date:</td>
  <td align="right" class="xl81" style="font-size:11pt;"><?php echo date('jS \of F Y'); ?></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;"></td>

 </tr>
 <tr height="22" style="height: 16.5pt; mso-height-source: userset;">
  <td height="22" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Property Address:</td>
  <td width="120" class="xl127" style="width: 90pt; border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $property_address?></td>
  <td class="xl75" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td class="xl83" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
 
 </tr>
 
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Property Type:</td>
  <td class="xl129" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $property_type?></td>
  
  <td colspan="3" rowspan="3"><img src="images/image003.png"/></td>
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Lease Type:</td>
  <td class="xl129" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $lease_type?></td>
 
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Property Size (Square Feet):</td>
  <td class="xl130" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $property_size?></td>  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl87" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl102" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Energy/Water Efficiency Measures:</td>
  <td width="120" class="xl144" style="width: 90pt;"><?php echo $energy?></td>
  <td class="xl95" colspan="3">&nbsp;</td>
   
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl96" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td colspan="5">&nbsp;</td>
 </tr>
 
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl146" style="border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="5">Additional
  Building Information</td>
  
  
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Mortgage holder name(s)</td>
  <td class="xl131" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $mortgage_holder ?></td>
  <td class="xl93" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl94" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td>&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Estimated outstanding mortgage(s)</td>
  <td class="xl132" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_out_mortgage ?></td>
  <td class="xl93" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">Date</td>
  <td class="xl133" style="font-size:11pt;!important border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo date('jS \of F Y'); ?></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Appraised value</td>
  <td class="xl132" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $appraised_value ?></td>
  <td class="xl93" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">Date</td>
  <td class="xl133" style="font-size:11pt;!important border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo date('jS \of F Y'); ?></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td><td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Assessed value<span style="mso-spacerun: yes;">&nbsp;</span></td>
  <td class="xl132" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $assessed_value ?></td>
  <td class="xl93" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">Date</td>
  <td class="xl133" style="font-size:11pt;!important border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo date('jS \of F Y'); ?></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Property value for analysis</td>
  <td class="xl108" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $property_value ?> </td>
  <td class="xl93" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">Source:</td>
  <td class="xl121" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">Assessed value<span style="mso-spacerun: yes;">&nbsp;</span></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border: currentColor; border-image: none;">&nbsp;</td>
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td class="xl75" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl89" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl90" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border:none;!important height: 18pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td class="xl149" style="border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="4">Utility Cost
  and Useful Life Information</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  <td height="24" class="xl76" style="border:none;!important height: 18pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;" rowspan="12">&nbsp;</td>
  <td class="xl82">Estimated annual utility costs</td>
  <td class="xl134" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">$<?php echo $utility_cost ?> </td>
  <td class="xl91" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl92" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  
  <td class="xl82" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Estimated useful life of upgrades
  (years)</td>
  <td class="xl131" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $useful_upgrades ?></td>
  <td class="xl89" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl90" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  
  <td class="xl84" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td class="xl85" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl97" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl98" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="24" style="height: 18pt; mso-height-source: userset;">
  
  <td class="xl149" style="border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="4">PACE-Financed
  Option</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="33" style="height: 24.75pt; mso-height-source: userset;">
  
  <td width="321" class="xl105" style="width: 241pt;">Estimated existing
  loan-to-value percentage (LTV &lt; 80% prequalifies):<span style="mso-spacerun: yes;">&nbsp;</span></td>
  <td class="xl111" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;"><?php echo $existing_loan; ?>%</td>
  <td class="xl117" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl122" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">&nbsp;</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 
 <tr height="33" style="height: 24.75pt; mso-height-source: userset;">
  
  <td width="321" class="xl106" style="width: 241pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Range of
  estimated annual energy savings percentages</td>
  <td class="xl113" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">20%</td>
  <td class="xl114" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">30%</td>
  <td class="xl115" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">40%</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="33" style="height: 24.75pt; mso-height-source: userset;">
  
  <td width="321" class="xl106" style="width: 241pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Estimated
  first-year savings</td>
  <td class="xl109" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">$<?php echo $est_year_save[0]; ?> </td>
  <td class="xl109" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">$<?php echo $est_year_save[1]; ?></td>
  <td class="xl124" style="border-left-color: currentColor; border-left-width: medium; border-left-style: none;">$<?php echo $est_year_save[2]; ?> </td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="33" style="height: 24.75pt; mso-height-source: userset;">
  
  <td width="321" class="xl106" style="width: 241pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Estimated
  life-cycle savings</td>
  <td class="xl108" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_life_save[0]; ?></td>
  <td class="xl108" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_life_save[1]; ?></td>
  <td class="xl121" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_life_save[2]; ?></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="33" style="height: 24.75pt; mso-height-source: userset;">
  
  <td width="321" class="xl106" style="width: 241pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Estimated
  maximum project finance amount</td>
  <td class="xl108" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_max_project[0]; ?></td>
  <td class="xl108" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_max_project[1]; ?></td>
  <td class="xl121" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">$<?php echo $est_max_project[2]; ?></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="33" style="height: 24.75pt; mso-height-source: userset;">
  
  <td width="321" class="xl106" style="width: 241pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">Estimated
  lien-to-value percentage (LiTV &lt; 20% prequalifies):</td>
  <td class="xl112" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $est_lien_value[0]; ?>%</td>
  <td class="xl112" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $est_lien_value[1]; ?>%</td>
  <td class="xl125" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;"><?php echo $est_lien_value[2]; ?>%</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="22" style="height: 16.5pt; mso-height-source: userset;">
  
  <td class="xl102" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td class="xl95" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl95" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl99" style="border-top-color: currentColor; border-left-color: currentColor; border-top-width: medium; border-left-width: medium; border-top-style: none; border-left-style: none;">&nbsp;</td>
  <td class="xl75" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="53" style="height: 39.75pt; mso-height-source: userset;">
  
  <td width="643" class="xl152" style="font-size:11pt;!important width: 483pt; border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="4">(1) Loan-to-value percentage is equal to the estimated
  outstanding mortgage amount(s) divided by the estimated property value. To
  qualify for PACE financing the property's existing LTV should be less than
  80%.</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="53" style="height: 39.75pt; mso-height-source: userset;">
  <td height="53" class="xl104" style="height: 39.75pt;">&nbsp;</td>
  <td width="643" class="xl135" style="font-size:11pt;!important width: 483pt; border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="4">(2) Lien-to-value percentage is equal to the estimated lien
  amount, based on estimated maximum project amount at 30% annual savings case,
  divided by the estimated property value.</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="53" style="height: 39.75pt; mso-height-source: userset;">
  <td height="53" class="xl103" style="height: 39.75pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td width="643" class="xl135" style="font-size:11pt;!important width: 483pt; border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="4">(3) Savings are assumed to persist over the estimated useful
  life of the upgrades.<span style="mso-spacerun: yes;">&nbsp;</span></td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 <tr height="53" style="height: 39.75pt; mso-height-source: userset;">
  <td height="53" class="xl103" style="height: 39.75pt; border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  <td width="643" class="xl138" style="font-size:11pt;!important width: 483pt; border-right-color: black; border-right-width: 0.5pt; border-right-style: solid;" colspan="4">(4) PACE requires that the projected energy savings over the
  finance term are greater than the amount financed plus interest, i.e.
  savings-to-investment ratio (SIR) is greater than one. This estimated finance
  amount assumes an SIR of 1.25, for a 20 year loan at 6.5%. Actual project
  finance amount will be determined based on detailed projected energy savings
  in an energy audit and/or renewable energy feasibility study.</td>
  <td class="xl76" style="border-top-color: currentColor; border-top-width: medium; border-top-style: none;">&nbsp;</td>
  
  
  
 </tr>
 
 <!--[if supportMisalignedColumns]-->
 <tr height="0" style="display: none;">
  <td width="70" style="width: 53pt;"></td>
  <td width="321" style="width: 241pt;"></td>
  <td width="120" style="width: 90pt;"></td>
  <td width="101" style="width: 76pt;"></td>
  <td width="101" style="width: 76pt;"></td>
  <td width="70" style="width: 53pt;"></td>
  <td width="95" style="width: 71pt;"></td>
  <td width="86" style="width: 65pt;"></td>
  <td width="70" style="width: 53pt;"></td>
 </tr>
 <!--[endif]-->
</tbody>
</table>

</body>
</html>