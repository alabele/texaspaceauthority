<?php
/*
Plugin Name: Custom form to PDF
Plugin URI: http://freelancer.com/u/Torricelli.html
Description: A plugin that enables shortcode [cf2pdf] for embedding a custom form, calculator and PDF outputter
Version: 1.0
Author: Torricelli (eduardoescdel@gmail.com)
Author URI: https://freelancer.com/u/Torricelli.html
License: Private license for jblack6572@freelancer.com
*/

	if (!defined('ABSPATH')) exit;

	function generate_output() {
		$check = (array_key_exists('cf2pdf', $_POST) ? true : false);
		if ($check) {
			setlocale(LC_MONETARY, 'en_US');
			$property_types = array(
							'0' => '',
							'1' => 'Commercial Retail',
							'2' => 'Commercial Office',
							'3' => 'Multifamily',
							'4' => 'Industrial',
							'5' => 'Agricultural',
							'6' => 'Nonprofit',
							'7' => 'School',
							'8' => 'Hospital',
							'9' => 'Data Center',
							'10' => 'Other'
			);
			$efficiency_measures_arr = array(
							'1' => 'Insulation',
							'2' => 'High-efficiency windows or doors',
							'3' => 'Automated energy control systems',
							'4' => 'HVAC modification or replacement',
							'5' => 'Caulking, weather-stripping or air sealing',
							'6' => 'Light fixture modifications',
							'7' => 'Water use efficiency improvements',
							'8' => 'Energy- or water-efficient manufacturing processes and/or equipment',
							'9' => 'Solar panels',
							'10' => 'Solar hot water',
							'11' => 'Gray water reuse',
							'12' => 'Rainwater collection system',
							'13' => 'Other'
			);
			$efficiency_measures = '';
			$eff_mea_counter = 0;
			foreach ($_POST as $key => $postfield) {
				if (preg_match('/eff-mea/i', $key) && $postfield != '0') {
					$eff_mea_counter++;
					if ($eff_mea_counter > 1) {
						$efficiency_measures .= '<br>';
					}
					$efficiency_measures .= '&bull; '.$efficiency_measures_arr[$postfield];
				}
			}
			$pvfa   = (intval($_POST['papv']) > intval($_POST['pasv']) ? intval($_POST['papv']) : intval($_POST['pasv']));
			$source = (intval($_POST['papv']) > intval($_POST['pasv']) ? 'Appraised value' : 'Assessed value');

			$efys02 = efys(0.2,$_POST['auc']);
			$efys03 = efys(0.3,$_POST['auc']);
			$efys04 = efys(0.4,$_POST['auc']);

			$elcs02 = elcs($efys02,$_POST['ulpu']);
			$elcs03 = elcs($efys03,$_POST['ulpu']);
			$elcs04 = elcs($efys04,$_POST['ulpu']);

			$pv02   = present_value(0.065,20,$elcs02/25);
			$pv03   = present_value(0.065,20,$elcs03/25);
			$pv04   = present_value(0.065,20,$elcs04/25);

			$litv02 = round(($pv02/$pvfa)*100,2);
			$litv03 = round(($pv03/$pvfa)*100,2);
			$litv04 = round(($pv04/$pvfa)*100,2);

			require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR .'html2pdf'. DIRECTORY_SEPARATOR . 'html2pdf.class.php');
			$content = '
				<style type="text/css">
					td {
						padding-top:5px;
						padding-bottom:5px;
					}
					p {
						padding-left:3px;
						padding-right:3px;
						margin-top:5px;
						margin-bottom:5px;
					}
				</style>
				<div style="border:1px solid #000;font-family:Arial;width:750px;">
					<div style="background:#21799E;color:#fff;text-align:center;font-size:30px;">
						<b>Preliminary PACE Qualification Report</b>
					</div>
					<div style="border-bottom:1px solid #000;">
						<br><br>
					</div>
					<table style="font-size:12px;">
						<tr>
							<td style="width:360px;">
								Owner Name:
							</td>
							<td style="width:120px;">
								'.$_POST['owner-name'].'
							</td>
							<td style="width:120px;">
								Report Date:
							</td>
							<td style="width:120px;text-align:right;">
								'.$_POST['date'].'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Property Address:
							</td>
							<td style="width:120px;">
								'.$_POST['prop-street-address'] . ', ' . $_POST['city'] . ' ' . $_POST['state'] . ' ' . $_POST['zip-code'].'
							</td>
							<td colspan="2" rowspan="4" style="width:240px;text-align:center;vertical-align:middle;">
								<img style="width:238px;" src="'.plugins_url('images/TPA.png',__FILE__).'">
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Property Type:
							</td>
						<td style="width:120px;">
								'.($_POST['prop-type'] == 10 ? $_POST['other-description'] : $property_types[$_POST['prop-type']]).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Property Size (Square Feet):
							</td>
						<td style="width:120px;">
								'.$_POST['prop-size'].'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Energy/Water Efficiency Measures:
							</td>
						<td style="width:120px;">
								'.$efficiency_measures.'
							</td>
						</tr>
					</table>
					<div style="border-bottom:1px solid #000;">
						<br><br>
					</div>
					<div>
						<br><br>
					</div>
					<div style="background:#21799E;color:#fff;text-align:left;font-size:20px;padding:3px;">
						Additional Building Information
					</div>
					<table style="font-size:12px;">
						<tr>
							<td style="width:360px;">
								Mortgage holder name(s)
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;">
								'.$_POST['mgh'].'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Estimated outstanding mortgage(s)
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;">
								$'.number_format(floatval($_POST['omga'])).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Appraised value
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;">
								$'.number_format(floatval($_POST['papv'])).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Assessed value
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;">
								$'.number_format(floatval($_POST['pasv'])).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Property value for analysis
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;">
								$'.number_format($pvfa).'
							</td>
							<td style="width:120px;text-align:center;">
								Source:
							</td>
							<td style="width:130px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.$source.'
							</td>
						</tr>
					</table>
					<div>
						<br><br>
					</div>
					<div style="background:#21799E;color:#fff;text-align:left;font-size:20px;padding:3px;">
						Utility Cost and Useful Life Information
					</div>
					<table style="font-size:12px;">
						<tr>
							<td style="width:360px;">
								Estimated annual utility costs
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.number_format(floatval($_POST['auc'])).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Estimated useful life of upgrades (years)
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.$_POST['ulpu'].'
							</td>
						</tr>
					</table>
					<div>
						<br><br>
					</div>
					<div style="background:#21799E;color:#fff;text-align:left;font-size:20px;padding:3px;">
						PACE-Financed Option
					</div>
					<table style="font-size:12px;">
						<tr>
							<td style="width:360px;">
								Estimated existing loan-to-value percentage (LTV &lt; 80% prequalifies):
							</td>
							<td style="width:120px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.($pvfa > 0 ? round(100*intval($_POST['omga'])/$pvfa,2) : '').'%
							</td>
						</tr>
						<tr>
							<td>
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Range of estimated annual energy savings percentages
							</td>
							<td style="width:124px;background:#E6E5E5;text-align:center;padding-right:0;border-bottom:1px solid #000;">
								<b>20%</b>
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;border-bottom:1px solid #000;">
								<b>30%</b>
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;border-bottom:1px solid #000;">
								<b>40%</b>
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Estimated first-year savings
							</td>
							<td style="width:124px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($efys02).'
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($efys03).'
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($efys04).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Estimated life-cycle savings
							</td>
							<td style="width:124px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($elcs02).'
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($elcs03).'
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($elcs04).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Estimated maximum project finance amount
							</td>
							<td style="width:124px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($pv02).'
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($pv03).'
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								$'.number_format($pv04).'
							</td>
						</tr>
						<tr>
							<td style="width:360px;">
								Estimated maximum project finance amount
							</td>
							<td style="width:124px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.$litv02.'%
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.$litv03.'%
							</td>
							<td style="width:125px;background:#E6E5E5;text-align:center;padding-right:0;">
								'.$litv04.'%
							</td>
						</tr>
					</table>
					<div style="border-bottom:1px solid #000;">
						<br>
					</div>
					<p>(1) Loan-to-value percentage is equal to the estimated outstanding mortgage amount(s) divided by the estimated property value. To qualify for PACE financing the property\'s existing LTV should be less than 80%.</p>
					<p>(2) Lien-to-value percentage is equal to the estimated lien amount, based on estimated maximum project amount at 30% annual savings case, divided by the estimated property value.</p>
					<p>(3) Savings are assumed to persist over the estimated useful life of the upgrades.</p>
					<p>(4) PACE requires that the projected energy savings over the finance term are greater than the amount financed plus interest, i.e. savings-to-investment ratio (SIR) is greater than one. This estimated finance amount assumes an SIR of 1.25, for a 20 year loan at 6.5%. Actual project finance amount will be determined based on detailed projected energy savings in an energy audit and/or renewable energy feasibility study.</p>
					<p>&nbsp;</p>
				</div>
			';
			$html2pdf = new HTML2PDF('P','A4','en');
			header( 'Content-type: Application/pdf');
    	$html2pdf->WriteHTML($content);
    	$html2pdf->Output('report.pdf');
			die();
		}
	}

	function cf2pdf_output($atts) {
		$html = '
			<form id="c-c" role="form" action="" method="post">
				<input type="hidden" name="cf2pdf" value="1">
				<input id="form-date" type="hidden" name="date">
				<div class="row">
					<div class="col-md-6 col-sm-8">
						<label style="display:block;text-align:center;" class="small" for="prop-street-address">Property Street Address</label>
						<input style="width:100%;" type="text" class="form-control" name="prop-street-address">
					</div>
					<div class="col-md-2 col-sm-4">
						<label style="display:block;text-align:center;" class="small" for="city">City</label>
						<input style="width:100%;" type="text" class="form-control" name="city">
					</div>
					<div class="col-md-2 col-sm-4">
						<label style="display:block;text-align:center;" class="small" for="state">State</label>
						<input style="width:100%;" type="text" class="form-control" name="state">
					</div>
					<div class="col-md-2 col-sm-4">
						<label style="display:block;text-align:center;" class="small" for="zip-code">Zip Code</label>
						<input style="width:100%;" type="text" class="form-control" name="zip-code">
					</div>
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="prop-type">Property Type</label>
						<select class="form-control" name="prop-type">
							<option value="0">Please Select</option>
							<option value="1">Commercial Retail</option>
							<option value="2">Commercial Office</option>
							<option value="3">Multifamily</option>
							<option value="4">Industrial</option>
							<option value="5">Agricultural</option>
							<option value="6">Nonprofit</option>
							<option value="7">School</option>
							<option value="8">Hospital</option>
							<option value="9">Data Center</option>
							<option value="10">Other</option>
						</select>
					</div>
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="other-description">If Other Please Enter Description:</label>
						<input style="width:100%;" type="text" class="form-control" name="other-description">
					</div>
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="prop-size">Property Size (sq ft)</label>
						<input style="width:100%;" type="text" class="form-control" name="prop-size">
					</div>
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="owner-name">Owner Name</label>
						<input style="width:100%;" type="text" class="form-control" name="owner-name">
					</div>
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-12">
						<label style="display:block;text-align:center;" for="eff-mea">Energy/Water Efficiency Measures</label>
					</div>
				</div>
				<div class="row eff-mea-cont">
					<div class="col-md-3 col-sm-2 col-xs-2 eff-mea-label-def">
						<label style="display:block;text-align:center;" for="eff-mea-1">1</label>
					</div>
					<div class="col-md-9 col-sm-10 col-xs-10 eff-mea-select-def">
						<select class="form-control" name="eff-mea-1">
							<option value="0">Please Select</option>
							<option value="1">Insulation</option>
							<option value="2">High-efficiency windows or doors</option>
							<option value="3">Automated energy control systems</option>
							<option value="4">HVAC modification or replacement</option>
							<option value="5">Caulking, weather-stripping or air sealing</option>
							<option value="6">Light fixture modifications</option>
							<option value="7">Water use efficiency improvements</option>
							<option value="8">Energy- or water-efficient manufacturing processes and/or equipment</option>
							<option value="9">Solar panels</option>
							<option value="10">Solar hot water</option>
							<option value="11">Gray water reuse</option>
							<option value="12">Rainwater collection system</option>
							<option value="13">Other</option>
						</select>
					</div>
				</div>
				<div class="row" style="margin-top:5px;">
					<div style="text-align:right;" class="col-xs-12">
						<button type="button" class="btn btn-default add-eff-mea">+ Add another</button>
					</div>
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="omga">Outstanding Mortgage Amount</label>
						<input style="width:100%;" type="text" class="form-control" name="omga">
					</div>
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="mgh">Mortgage Holder</label>
						<input style="width:100%;" type="text" class="form-control" name="mgh">
					</div>
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="pasv">Property Assessed Value</label>
						<input style="width:100%;" type="text" class="form-control" name="pasv">
					</div>
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="papv">Property Appraised Value</label>
						<input style="width:100%;" type="text" class="form-control" name="papv">
					</div>
				</div>
				<p>&nbsp;</p>
				<div class="row">
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="auc">Annual Utility Cost</label>
						<input style="width:100%;" type="text" class="form-control" name="auc">
					</div>
					<div class="col-md-6">
						<label style="display:block;text-align:center;" class="small" for="ulpu">Useful Life of Potential Upgrades</label>
						<input style="width:100%;" type="text" class="form-control" name="ulpu">
					</div>
				</div>
				<p>&nbsp;</p>
				<div style="text-align:center" class="row">
				  <button type="submit" class="btn btn-lg btn-primary">Create Report</button>
				</div>
			</form>
			<script type="text/javascript">
				var formDate = new Date();
				jQuery("#form-date").val(formDate.toLocaleDateString());
				var effMea = 1;
				jQuery(".add-eff-mea").click(function() {
					effMea++;
					var newEffMeaLabel = jQuery(".eff-mea-label-def").clone();
					newEffMeaLabel.removeClass("eff-mea-label-def");
					newEffMeaLabel.find("label").html(effMea);
					newEffMeaLabel.find("label").attr("for", "eff-mea-"+effMea);
					var newEffMeaSelect = jQuery(".eff-mea-select-def").clone();
					newEffMeaSelect.removeClass("eff-mea-select-def");
					newEffMeaSelect.find("select").attr("name", "eff-mea-"+effMea);
					jQuery(".eff-mea-cont").append("<div class=\"row\" style=\"height:5px;clear:both;\"></div>");
					jQuery(".eff-mea-cont").append(newEffMeaLabel);
					jQuery(".eff-mea-cont").append(newEffMeaSelect);
				});
			</script>
		';
		return $html;
	}
	function elcs($efys,$ulpu) {
		$efys  = floatval($efys);
		$ulpu  = floatval($ulpu);
		return $efys*$ulpu;
	}
	function efys($p,$auc) {
		$i   = floatval($p);
		$auc = floatval($auc);
		return $p*$auc;
	}
	function present_value($i,$t,$c) {
		$i = floatval($i);
		$t = floatval($t);
		$c = floatval($c);
		return round($c/($i/(1-(1/pow(1+$i,$t)))));
	}
	function cf2pdf_css() {
    wp_enqueue_style( 'bootstrapstyle', plugins_url( 'css/bootstrap.min.css', __FILE__ ));
	}
	add_action('init', 'generate_output');
	add_shortcode('cf2pdf', 'cf2pdf_output');
	add_action('wp_enqueue_scripts', 'cf2pdf_css');
?>
