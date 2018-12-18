<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
$cols = array(
	'plan',
	'Room',
	'IPD',
	'OPD',
	'Maternity',
	'Vision',
	'Dental',
	'Emergency Expense',
	'Annuall Limit',
	'Premium'
);
$datas = array(
	array(
		'plan' => 'Platinum',
		'Room' => '16000',
		'IPD' => true,
		'OPD' => true,
		'Maternity' => true,
		'Vision' => true,
		'Dental' => true,
		'Emergency Expense' => true,
		'Annuall Limit' => 'THB 20,000,000',
		'Premium' => 'Platinum'
	),
	array(
		'plan' => 'Gold',
		'Room' => '10000',
		'IPD' => true,
		'OPD' => true,
		'Maternity' => true,
		'Vision' => true,
		'Dental' => 'Optional',
		'Emergency Expense' => true,
		'Annuall Limit' => 'THB 10,000,000',
		'Premium' => 'Gold'
	),
	array(
		'plan' => 'Silver',
		'Room' => '8000',
		'IPD' => true,
		'OPD' => true,
		'Maternity' => true,
		'Vision' => 'Optional',
		'Dental' => 'Optional',
		'Emergency Expense' => true,
		'Annuall Limit' => 'THB 5,000,000',
		'Premium' => 'Silver'
	),
	array(
		'plan' => 'Bronze',
		'Room' => '5000',
		'IPD' => true,
		'OPD' => true,
		'Maternity' => false,
		'Vision' => 'Optional',
		'Dental' => 'Optional',
		'Emergency Expense' => true,
		'Annuall Limit' => 'THB 1,200,000',
		'Premium' => 'Bronze'
	),
);

?>

<div class="container">
	<div class="row census-intro">
		<div class="row contentRow">
			<div class="col-md-12">
				<h3>Find the right plan</h3>
			</div>	        
		</div>
	</div>
</div>

<div class="container census-section">
	<div class="row quoteContentBackground census-container">
		<div class="container">
			<div class="row margin0">
				<div class="col-md-12 col-8-white census-left">

						<?php if(isset($plans)): ?>
						<?php 
							//  echo "<pre>";
							//  print_r($plans);
							//  echo "</pre>";
						?>
						  <div class="row">
							
							<div class="col-md-12 mb-40">
								<h2 class="text-center quote-form--header">Health Insurance Plans</h2>
								  <h4 class="text-center">( <?php echo DATE('d F Y', strtotime($date)) ?> / Age <?php echo $age ?> years )</h4>					        	
							  </div>

								<style>
									table.table tr td{
										vertical-align: middle;
									}
								</style>														

								<table class="table table-striped">
									<thead>
										<tr>
											<th>Plan</th>
											<th class="text-center">Room</th>
											<th class="text-center">IPD</th>
											<th class="text-center">OPD</th>
											<th class="text-center">Maternity</th>
											<th class="text-center">Vision</th>
											<th class="text-center">Dental</th>
											<th>Emergency Expense</th>
											<th>Annual Limit</th>
											<th>Premium</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($datas as $data): ?>
										<tr>
											<?php foreach( $cols as $col ): ?>

												<?php if($col == 'plan'): ?>
													<td style="color: blue; font-size: 22px;">
															<?php 
																if($data[ $col ] == 'Platinum'){
																		echo $plans[0]['name'];
																} else if($data[ $col ] == 'Gold'){
																		echo $plans[1]['name'];
																} else if($data[ $col ] == 'Silver'){
																		echo $plans[2]['name'];
																} else if($data[ $col ] == 'Bronze'){
																		echo $plans[3]['name'];
																}
															?>
													</td>
												<?php elseif($col == 'Room'): ?>
													<td><?php echo number_format($data[ $col ], 0) ?></td>
												<?php elseif($col == 'Premium'): ?>
													<td style="color: blue; font-size: 22px;">
															<?php 
																if($data[ $col ] == 'Platinum'){
																		echo number_format($plans[0]['price'], 0);
																} else if($data[ $col ] == 'Gold'){
																	echo number_format($plans[1]['price'], 0);
																} else if($data[ $col ] == 'Silver'){
																	echo number_format($plans[2]['price'], 0);
																} else if($data[ $col ] == 'Bronze'){
																	echo number_format($plans[3]['price'], 0);;
																}
															?>
													</td>
												<?php elseif($col == 'Annuall Limit'): ?>
													<td><?php echo $data[ $col ] ?></td>
												<?php else: ?>
														<?php if($data[ $col ] === true): ?>
															<td class="text-center text-primary"><i class="fa fa-2x fa-check" data-toggle="tooltip" data-placement="top" title="Description"></i></td>
														<?php elseif($data[ $col ] === false): ?>
															<td class="text-center text-danger"><i class="fa fa-2x fa-close" data-toggle="tooltip" data-placement="top" title="Description"></i></td>
														<?php else: ?>
															<td class="text-center"><?php echo $data[ $col ] ?></td>
														<?php endif; ?>
												<?php endif; ?>
												<?php endforeach; ?>

												
												<td><button class="btn btn-block btn-choose-plan">Choose this plan</button></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							  
								<?php for($i = 0; $i < count($plans); $i++ ): ?>
								  <div class="col-xs-12">
									  <div id="quote-form--<?=$i;?>" class="quote-form hidden">
									  <h2 class="text-center quote-form--header">Discount Options</h2>
									  <!-- <h4 class="text-center">แผนที่ท่านกำลังเลือกคือ (<?php echo $plans[$i]['name'] ?>)</h4> -->
<br><br>
									  <?php echo form_open(base_url().'quote/calculate', array('class' => 'frm-quote', 'role'=>'form')); ?>
										  <!-- OPD -->
										  <div class="form-group">
											  <label>Do you require outpatient cover?</label><br/>
											  <label class="radio-inline"><input type="radio" checked="checked" name="opd[]" value="1">Yes</label>
											<label class="radio-inline"><input type="radio" name="opd[]" value="0">No</label>
										  </div>

										  <!-- Deduct -->
											<div class="form-group">
												  <label>Would you like a deductible/ excess option?</label> (A 'deductible' or 'excess' can be applied to the plan to lower the annual premium, the excess is a
one time contribution to incurred medical costs up to the selected amount)<br/>
												  <label class="radio-inline"><input type="radio" checked="checked" name="deduct[]" value="0">No</label>
													<label class="radio-inline"><input type="radio" name="deduct[]" value="15%">20,000 THB/year</label>
													<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_40k']; ?>">40,000 THB/year</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_100k']; ?>">100,000 THB/year</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_200k']; ?>">200,000 THB/year</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_300k']; ?>">300,000 THB/year</label>
											  </div>


											<!-- Dental -->
											<?php if($plans[$i]['name'] == 'Gold' || $plans[$i]['name'] == 'Silver' || $plans[$i]['name'] == 'Bronze'): ?>
												<div class="form-group">
												  <label>Do you require dental cover?</label><br/>
													<label class="radio-inline"><input type="radio" checked="checked" name="dental[]" value="0">No</label>
													<label class="radio-inline"><input type="radio" name="dental[]" value="1">Yes</label>

											  </div>
											<?php elseif($plans[$i]['name'] == 'Platinum'): ?>

											<?php else: ?>
												<div class="form-group">
												  <label>Do you require dental cover?</label><br/>
												  							<label class="radio-inline"><input type="radio" name="dental[]" value="0">No</label>

												  <label class="radio-inline"><input type="radio" checked="checked" name="dental[]" value="1">Yes</label>
											  </div>
											<?php endif; ?>
											  



											<!-- Vision -->
											<?php if($plans[$i]['name'] == 'Silver' || $plans[$i]['name'] == 'Bronze'): ?>
												<div class="form-group">
														<label>Do you require vision/optical cover?</label><br/>
												<label class="radio-inline"><input type="radio" checked="checked" name="vision[]" value="0">No</label>

														<label class="radio-inline"><input type="radio" name="vision[]" value="1">Yes</label>
												</div>
											<?php elseif($plans[$i]['name'] == 'Platinum'): ?>

											<?php elseif($plans[$i]['name'] == 'Gold'): ?>

											<?php else: ?>
												<div class="form-group">
														<label>Do you require vision/optical cover?</label><br/>
														<label class="radio-inline"><input type="radio" checked="checked" name="vision[]" value="1">Yes</label>
													<label class="radio-inline"><input type="radio" name="vision[]" value="0">No</label>
												</div>
											<?php endif; ?>
										  
										  

										  <div class="form-group text-center">
											  <h3>Total Premium is <span class="text-total text-main-blue"><?php echo (is_numeric($plans[$i]['price'])) ? number_format($plans[$i]['price'], 0) : $plans[$i]['price'] ?></span> THB <small>(included stamp duty)</small></h3>
										  </div>

										  <input type="hidden" name="plan" value="<?php echo $plans[$i]['id']; ?>">
										  <input type="hidden" name="date" value="<?php echo $date; ?>">
											<input type="hidden" name="name" value="<?php echo $name; ?>">
											<input type="hidden" name="app_name" value="<?php echo $appName; ?>">
										  <input type="hidden" name="phone" value="<?php echo $phone; ?>">
										  <input type="hidden" name="email" value="<?php echo $email; ?>">
										  <input type="hidden" name="age" value="<?php echo $age; ?>">
										  <input type="hidden" name="net_total" value="<?php echo $plans[$i]['price']; ?>">


										  <div class="rowFluid">
											<div class="col-xs-12 col-sm-6">
												 <button class="btn btn-secondary btn-block btn-submit">Save a Quote >></button>
											</div>
											<div class="col-xs-12 col-sm-6">
												 <a href="<?php echo site_url('quote/contact'); ?>" class="btn btn-block btn-default btn-contact">Contact us >></a>
											</div>
										</div>

									  </div>

									  <?php echo form_close(); ?>
								  </div> <!-- .col-xs-12 -->
							  <?php endfor; ?>

							<div class="clearfix"></div>
						  </div>
					  <?php endif; ?>


				</div>
			</div>
		</div>
	</div>
</div>

<!-- Helper modal -->
<div id="modal-helper" class="modal modal-pchi fade" role="dialog">
  <div class="modal-dialog modal-md">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Can we help ??</h4>
	  </div>
	  <div class="modal-body">
		<p>Chat with one of our friendly PCHI customer service staff</p>
		<p class="text-center"><a href="#" class="btn btn-md btn-primary">Click now ></a></p>
	  </div>
	</div>

  </div>
</div>


<!-- Contact modal -->
<div id="modal-contact" class="modal modal-pchi fade" role="dialog">
  <div class="modal-dialog modal-md">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title">Customer Service</h4>
	  </div>
	  <div class="modal-body">
		<div class="rowFluid">
			<div class="col-md-4 col-md-offset-8">
				<h4 class="page-header">Contact Info</h4>
				<ul class="list-unstyled">
					<li><i class="fa fa-phone"></i> 999-9999-9999</li>
					<li><i class="fa fa-envelope"></i> support@PCHI.com</li>
				</ul>
			</div>
		</div>
	  </div>
	</div>

  </div>
</div>



<!-- Info modal -->
<?php $i = 1; foreach ($plans as $plan): ?>
<div id="modal-info-<?=$i;?>-1" class="modal modal-pchi fade" role="dialog">
  <div class="modal-dialog modal-md">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><i class="fa fa-info-circle"></i> Information</h4>
	  </div>
	  <div class="modal-body">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;สติกเกอร์ดีพาร์ตเมนท์ทัวริสต์ ปาร์ตี้คีตกวี ซาบะพาวเวอร์แซมบ้าบ๊อบ โพสต์ ออดิชั่นหลวงตาอยุติธรรมอัลไซเมอร์แอ็คชั่น มายาคติสุนทรีย์พาสต้า ปิโตรเคมีเจ๊าะแจ๊ะเบลอเยอร์บีร่าโชว์รูม เบนโลธัมโมฟลุคชาร์ตเครป ผู้นำสต๊อกโซนหลวงปู่ อุปการคุณคอมเมนต์เซ็นเตอร์สตูดิโอคอปเตอร์ แมชชีนบิลสตรอว์เบอร์รีเซอร์วิส บูมซาร์ไมเกรนสกรัมโปรเจกเตอร์ โกลด์มินท์อิเลียด ไลท์ ไคลแม็กซ์คอร์ปโปรเจกต์ ฮอตแอนด์สต็อกออร์แกน</p>
	  </div>
	  <div class="modal-footer text-left">
		  <a href="#">PHCI</a>
	  </div>
	</div>

  </div>
</div>

<div id="modal-info-<?=$i;?>-2" class="modal modal-pchi fade" role="dialog">
  <div class="modal-dialog modal-md">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><i class="fa fa-info-circle"></i> Information</h4>
	  </div>
	  <div class="modal-body">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;สติกเกอร์ดีพาร์ตเมนท์ทัวริสต์ ปาร์ตี้คีตกวี ซาบะพาวเวอร์แซมบ้าบ๊อบ โพสต์ ออดิชั่นหลวงตาอยุติธรรมอัลไซเมอร์แอ็คชั่น มายาคติสุนทรีย์พาสต้า ปิโตรเคมีเจ๊าะแจ๊ะเบลอเยอร์บีร่าโชว์รูม เบนโลธัมโมฟลุคชาร์ตเครป ผู้นำสต๊อกโซนหลวงปู่ อุปการคุณคอมเมนต์เซ็นเตอร์สตูดิโอคอปเตอร์ แมชชีนบิลสตรอว์เบอร์รีเซอร์วิส บูมซาร์ไมเกรนสกรัมโปรเจกเตอร์ โกลด์มินท์อิเลียด ไลท์ ไคลแม็กซ์คอร์ปโปรเจกต์ ฮอตแอนด์สต็อกออร์แกน</p>
	  </div>
	  <div class="modal-footer text-left">
		  <a href="#">PHCI</a>
	  </div>
	</div>

  </div>
</div>

<div id="modal-info-<?=$i;?>-3" class="modal modal-pchi fade" role="dialog">
  <div class="modal-dialog modal-md">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><i class="fa fa-info-circle"></i> Information</h4>
	  </div>
	  <div class="modal-body">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;สติกเกอร์ดีพาร์ตเมนท์ทัวริสต์ ปาร์ตี้คีตกวี ซาบะพาวเวอร์แซมบ้าบ๊อบ โพสต์ ออดิชั่นหลวงตาอยุติธรรมอัลไซเมอร์แอ็คชั่น มายาคติสุนทรีย์พาสต้า ปิโตรเคมีเจ๊าะแจ๊ะเบลอเยอร์บีร่าโชว์รูม เบนโลธัมโมฟลุคชาร์ตเครป ผู้นำสต๊อกโซนหลวงปู่ อุปการคุณคอมเมนต์เซ็นเตอร์สตูดิโอคอปเตอร์ แมชชีนบิลสตรอว์เบอร์รีเซอร์วิส บูมซาร์ไมเกรนสกรัมโปรเจกเตอร์ โกลด์มินท์อิเลียด ไลท์ ไคลแม็กซ์คอร์ปโปรเจกต์ ฮอตแอนด์สต็อกออร์แกน</p>
	  </div>
	  <div class="modal-footer text-left">
		  <a href="#">PHCI</a>
	  </div>
	</div>

  </div>
</div>
<?php $i++; endforeach; ?>


<script type="text/javascript">
	jQuery(document).ready(function($){

		// setTimeout(function(){
		// 	$('#modal-helper').modal('show');
		// }, 60000);

		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})

		$(modalVerticalCenterClass).on('show.bs.modal', function(e) {
			centerModals( $(this) );
		});
		$(window).on('resize', centerModals);
		
	});
</script>