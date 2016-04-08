<?php
/*
Plugin Name: HTML Table randomizer
Plugin URI: http://freelancer.com/u/Torricelli.html
Description: A plugin that randomizes HTML table using the shortcode [random-table]
Version: 1.0
Author: Torricelli (eduardoescdel@gmail.com)
Author URI: https://freelancer.com/u/Torricelli.html
License: Private license for jblack6572@freelancer.com
*/

if (!defined('ABSPATH')) exit;

function random_table() {
$html_dynamic = array();
$html_static = '<p>Texas PACE Authority does not endorse any particular PACE lenders. The list below is provided for convenience if you need help in finding a lender who meets the PACE in a Box recommendations and is interested in financing PACE projects.</p>
<p><strong>LENDERS</strong></p>
<hr />';
$html_dynamic[0] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/CleanFund_LOGO.jpg" alt="Clean Fund LLC" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>Clean Fund</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $500K - $15M
				<br><strong>Types of Projects:</strong> Any
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:joshua.kagan@cleanfund.com">Josh Kagan</a>
				<br><a href="http://www.cleanfund.com" target="_blank">www.cleanfund.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[1] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/unnamed.jpg" alt="Green Bank, NA" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>Green Bank, NA</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $50K - $5M
				<br><strong>Types of Projects:</strong> Energy and Water Savings/ All Commercial Property 			Types
				<br><strong>Geographic Coverage:</strong> Travis County
				<br><strong>Contact:</strong> <a href="mailto:tteske@greenbank.com">Tim Teske</a>
				<br><a href="http://www.greenbank.com" target="_blank">www.greenbank.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[2] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/Greenworks-Lending-Logo.jpg" alt="Greenworks Lending" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>Greenworks Lending</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $30K - $5M
				<br><strong>Types of Projects:</strong> Any Eligible Technologies and Properties
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:azech@greenworkslending.com">Andrew Zech</a>
				<br><a href="http://www.greenworkslending.com" target="_blank">www.greenworkslending.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[3] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/KawaPACE-Logo.jpg" alt="KawaPACE" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>kawaPACE</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $100K - $10M
				<br><strong>Types of Projects:</strong> Any
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:info@kawapace.com">Carlos Escobar</a>
				<br><a href="http://www.kawapace.com" target="_blank">www.kawapace.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[4] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/PACEEquity-ALT.-Tag-Vert.jpg" alt="PACE Equity Finance" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>PACE Equity Finance</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $250K - $20M
				<br><strong>Types of Projects:</strong> Any
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:demmerich@pace-equity.com">David Emmerich</a>
				<br><a href="http://www.pace-equity.com" target="_blank">www.pace-equity.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[5] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168px"><img src="http://www.petros-pace.com/wp-content/themes/PACE/images/logo.png" alt="PETROS PACE Finance" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>PETROS PACE Finance</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $250K+
				<br><strong>Types of Projects:</strong> All Qualified Projects
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:mansoor@petrospartners.com">Mansoor Ghori</a>
				<br><a href="http://www.petros-pace.com" target="_blank">www.PETROS-PACE.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[6] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/SFS-Logo-1.jpg" alt="Seminole Financial Services, LLC" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>Seminole Financial Services, LLC</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $2M - $40M
				<br><strong>Types of Projects:</strong> Solar, Wind
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:cdiaz@seminolefniancialservices.com">Chris Diaz</a>
				<br><a href="http://www.seminolefinancialservices.com" target="_blank">www.seminolefinancialservices.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[7] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/SFA-Logo-Hi-Res.jpg" alt="Structured Finance Associates" 	width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>Structured Finance Associates</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $500K+
				<br><strong>Types of Projects:</strong> Apartments, hotels, retail, offices, industrial
				<br><strong>Contact:</strong> <a href="mailto:ljdunn@strucfinance.com">Jean Dunn</a>
				<br><a href="mailto:jkrappman@strucfinance.com">John Krappman</a>
				<br><a href="http://www.strucfinance.com" target="_blank">www.strucfinance.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[8] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/2015/05/360PL_websitelogo.png" alt="360 PACE Lending" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>360 PACE Lending</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $1M+
				<br><strong>Types of Projects:</strong> Any
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:moore@360PaceLending.com">Moore McDonough</a>
				<br><a href="http://www.360PaceLending.com" target="_blank">www.360PaceLending.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';
$html_dynamic[9] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/TBL-Foundation-Small-Logo.jpg" alt="Triple Bottom Line Foundation" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>Triple Bottom Line Foundation</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $200,000 - $1M
				<br><strong>Types of Projects:</strong> Only Multifamily Properties
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:MarciaC@tblfund.org">Marcia C</a>
				<br><a href="http://www.tblfund.org" target="_blank">www.tblfund.org</a></span>
			</td>
		</tr>
	</tbody>
</table>';

$html_dynamic[10] = '
<table>
	<tbody>
		<tr>
			<td class="lender-logo" width="200" height="168x"><img src="http://www.texaspaceauthority.org/wp-content/uploads/osp_box_logo.jpg" alt="OBrien-Staley Partners" width="200" /></td>
			<td width="15px"></td>
			<td width="340px"><strong>OBrien-Staley Partners</strong><br>
				<br><span style="font-size: small;"><strong>Preferred Financing Range:</strong> $250K - $20M
				<br><strong>Types of Projects:</strong> Any
				<br><strong>Geographic Coverage:</strong> All of Texas
				<br><strong>Contact:</strong> <a href="mailto:bruce.weintraub@osp-group.com">Bruce Weintraub</a>
				<br><a href="http://www.econdev-investing.com" target="_blank">www.econdev-investing.com</a></span>
			</td>
		</tr>
	</tbody>
</table>';

shuffle($html_dynamic);
foreach ($html_dynamic as $index => $a) {
$html_static .= $a;
	if ($index < count($html_dynamic)-1) {
		$html_static .= '<hr/>';
	}
}
return $html_static;
}
add_shortcode('random-table', 'random_table');
?>
