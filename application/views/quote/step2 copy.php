<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
						  <div class="row">
							
							<div class="col-md-12 mb-40">
								<h2 class="text-center quote-form--header">Health Insurance Plans</h2>
								  <h4 class="text-center">( <?php echo $date ?> / Age <?php echo $age ?> years )</h4>					        	
							  </div>

								<table class="table table-striped">
									<thead>
										<tr>
											<th>Insurer</th>
											<th class="text-center">Inpatient</th>
											<th class="text-center">Outpatient</th>
											<th class="text-center">Maternity</th>
											<th class="text-center">Dental</th>
											<th class="text-center">Emergency Evacuation</th>
											<th class="text-center">Emergency Repatriation</th>
											<th>Annual limit</th>
											<th>PreMium</th>
											<th>&nbsp;</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($plans as $plan): ?>
										<tr>
											<td style="color: blue; font-size: 22px;"><?php echo $plan['name'] ?></td>
											<th class="text-center text-primary"><i class="fa fa-2x fa-check"></i></th>
											<th class="text-center text-danger"><i class="fa fa-2x fa-close"></i></th>
											<th class="text-center text-danger"><i class="fa fa-2x fa-close"></i></th>
											<th class="text-center text-primary"><i class="fa fa-2x fa-check"></i></th>
											<th class="text-center text-primary"><i class="fa fa-2x fa-check"></i></th>
											<th class="text-center text-primary"><i class="fa fa-2x fa-check"></i></th>
											<th>37,000</th>
											<th style="color: blue; font-size: 22px;"><?php echo (is_numeric($plan['price'])) ? number_format($plan['price'], 0).' THB' : $plan['price'] ?></th>
											<th><button class="btn btn-block btn-choose-plan">Choose this plan</button></th>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							  

							<div class="plan-card--container">
							  <?php $i = 1; foreach ($plans as $plan): ?>
								  <?php 
									  $theme = "default";
									  if( $i === 2 ){
										  $theme = 'reccomend';
									  } else if( $i === 3 ){
										  $theme = 'maxxi';
									  }
								   ?>
								  <div class="col-md-4 col-sm-6 col-xs-12 col-plan-card">
									  <div class="plan-select--card <?php echo $theme; ?>">
										  <div class="card-header">
											  <h3 class="plan-name"><?php echo $plan['name'] ?></h3>
											  <!-- <p class="plan-desc"><?php echo $plan['description'] ?></p> -->
											  <h3 class="plan-price"><?php echo (is_numeric($plan['price'])) ? number_format($plan['price'], 0).' THB' : $plan['price'] ?></h3>

											  <?php if( $i === 2 ): ?>
												  <div class="plan-tag">
													  <h3>Recommended</h3>
												  </div>
											  <?php endif; ?>
										  </div>

										  <div class="card-body">
											
											<!-- ตาราง ทุนประกัน -->
											  <table class="table table-benefit mb-0 info">
												  <tbody>
																											
												<?php if( $i == 1 ): ?>

												<!-- แผนแรก เรอ่ม -->

												  <tr>
														  <td class="col-md-7"><b>Maximum Limit per Disability / Year </b></td>
														  <td class="col-md-5 text-right">780,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7"><strong>Hospital Expenses</strong></td>
														  <td class="col-md-5 text-right">100,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7"><strong>Outpatient Benefits </strong></td>
														  <td class="col-md-5 text-right">2,000 THB/Visit</td>
													  </tr>

												  <!-- แผนแรก จบ -->

												  <?php elseif( $i == 2 ): ?>

													  <!-- แผนสอง เริ่ม -->

														  <tr>
														  <td class="col-md-7">Maximum Limit per Disability / Year </td>
														  <td class="col-md-5 text-right">5,000,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Hospital Expenses</td>
														  <td class="col-md-5 text-right">Fully Indemnified</td>
													  </tr>

																												<tr>
														  <td class="col-md-7">Outpatient Benefits </td>
														  <td class="col-md-5 text-right">5,000,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Maternity and Miscarriage Expenses</td>
														  <td class="col-md-5 text-right">100,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Permanent implanted medical devices and artificial organs</td>
														  <td class="col-md-5 text-right">300,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Loss of Life, loss of one or both hands, loss of vision in one or both eyes, or permanent and total disability caused directly and solely by accident </td>
														  <td class="col-md-5 text-right">200,000 THB</td>
													  </tr>
													  <!-- <tr>
														  <td class="col-md-7">ค่าบริการให้ความช่วยเหลือฉุกเฉินทั่วโลก</td>
														  <td class="col-md-5 text-right">ตลอด 24 ชั่วโมง</td>
													  </tr> -->
													  
													  <tr>
														  <td class="col-md-7">Emergency Medical Evacuation Service</td>
														  <td class="col-md-5 text-right">Fully Indemnified</td>
													  </tr>
													  


													  <!-- แผนสอง จบ -->



												  <?php elseif( $i == 3 ): ?>

													  <!-- แผนสาม เริ่ม -->

														  <tr>
														  <td class="col-md-7">Maximum Limit per Disability / Year </td>
														  <td class="col-md-5 text-right">50,000,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Hospital Expenses</td>
														  <td class="col-md-5 text-right">Fully Indemnified</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Outpatient Benefits </td>
														  <td class="col-md-5 text-right">50,000,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Maternity and Miscarriage Expenses</td>
														  <td class="col-md-5 text-right">150,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Permanent implanted medical devices and artificial organs</td>
														  <td class="col-md-5 text-right">Fully Indemnified</td>
													  </tr>
													  
													  <tr>
														  <td class="col-md-7">Vision Benefits</td>
														  <td class="col-md-5 text-right">up to 20,000 THB</td>
													  </tr>
													  <tr>
														  <td class="col-md-7">Dental Benefits</td>
														  <td class="col-md-5 text-right">up to 80,000 THB</td>
													  </tr>


													  

													  <!-- แผนสาม จบ -->


												  <?php endif; ?>


														  
											  </tbody>
											  </table>

												  
													  <button class="btn btn-block btn-choose-plan">Choose this plan</button>

										  </div>
									  </div>
								  </div>
							  <?php $i++; endforeach ?>
							  <div class="clearfix"></div>						
							</div>
							  


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
										  <?php if( ($plans[$i]['name'] === 'Standard Plus Plan') ): ?>

											  <div class="form-group">
												  <label>Would you like a deductible/ excess option?</label> <span class="text-danger">(The <?php echo $plans[$i]['name']; ?> does not provide an option for deductible)</span><br/>
<!-- 			                  						<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">No</label>
												<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">40,000 THB/year</label>
												<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">100,000 THB/year</label>
												<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">200,000 THB/year</label>
												<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">300,000 THB/year</label> -->
											  </div>

										  <?php else: ?>

											  <div class="form-group">
												  <label>Would you like a deductible/ excess option?</label> (A 'deductible' or 'excess' can be applied to the plan to lower the annual premium, the excess is a
one time contribution to incurred medical costs up to the selected amount)<br/>
												  <label class="radio-inline"><input type="radio" checked="checked" name="deduct[]" value="0">No</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_40k']; ?>">40,000 THB/year</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_100k']; ?>">100,000 THB/year</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_200k']; ?>">200,000 THB/year</label>
												<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_300k']; ?>">300,000 THB/year</label>
											  </div>

										  <?php endif; ?>


										  <!-- Dental -->
										  <?php if( ($plans[$i]['name'] !== 'Plan 4') && ($plans[$i]['name'] !== 'Plan 5') && ($plans[$i]['name'] !== 'Plan 6') && ($plans[$i]['name'] !== 'Plan 7') && ($plans[$i]['name'] !== 'Maxima Plan') ): ?>
											  <?php
												  $dental_msg = "";
												  if( ($plans[$i]['name'] === 'Standard Plus Plan') || ($plans[$i]['name'] === 'Maxima Plan') || ($plans[$i]['name'] === 'Plan 3') || ($plans[$i]['name'] === 'Standard Plus Plan') ){
													  $dental_msg = "(The ". $plans[$i]['name'] ." does not provide an option for dental)";
												  } else if( ($plans[$i]['name'] === 'Plan 8') || ($plans[$i]['name'] === 'Plan 9' ) || ($plans[$i]['name'] === 'Ultima Plus Plan' ) ){
													  $dental_msg = "(This option is included in your selected plan)";
												  }
											   ?>
											  <div class="form-group <?php echo ($plans[$i]['name'] === 'Ultima Plus Plan') ? 'hidden' : ''; ?>">
												  <label>Do you require dental cover?</label> <span class="text-danger"><?php echo $dental_msg ?></span><br/>
											  </div>

										  <?php else: ?>

											  <div class="form-group">
												  <label>Do you require dental cover?</label><br/>
												  <label class="radio-inline"><input type="radio" checked="checked" name="dental[]" value="1">Yes</label>
												<label class="radio-inline"><input type="radio" name="dental[]" value="0">No</label>
											  </div>

										  <?php endif; ?>



										  <!-- Vision -->
										  <?php if( ($plans[$i]['name'] !== 'Plan 4') && ($plans[$i]['name'] !== 'Plan 5') && ($plans[$i]['name'] !== 'Plan 6') && ($plans[$i]['name'] !== 'Plan 7') && ($plans[$i]['name'] !== 'Maxima Plan') ): ?>

											  <?php
												  $vision_msg = "";
												  if( ($plans[$i]['name'] === 'Standard Plus Plan') || ($plans[$i]['name'] === 'Maxima Plan') || ($plans[$i]['name'] === 'Plan 3') || ($plans[$i]['name'] === 'Standard Plus Plan') ){
													  $vision_msg = "(The ". $plans[$i]['name'] ." does not provide an option for Vision)";
												  } else if( ($plans[$i]['name'] === 'Plan 7') || ($plans[$i]['name'] === 'Plan 8') || ($plans[$i]['name'] === 'Plan 9') || ($plans[$i]['name'] === 'Ultima Plus Plan' ) ){
													  $vision_msg = "(This option is included in your selected plan)";
												  }
											   ?>


											  <div class="form-group <?php echo ($plans[$i]['name'] === 'Ultima Plus Plan') ? 'hidden' : ''; ?>">
												  <label>Do you require vision/optical cover?</label> <span class="text-danger"><?php echo $vision_msg ?></span><br/>
											  </div>


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
										  <input type="hidden" name="phone" value="<?php echo $phone; ?>">
										  <input type="hidden" name="email" value="<?php echo $email; ?>">
										  <input type="hidden" name="age" value="<?php echo $age; ?>">
										  <input type="hidden" name="net_total" value="<?php echo $plans[$i]['price']; ?>">


										  <div class="rowFluid">
											<div class="col-xs-12 col-sm-6">
												 <button class="btn btn-secondary btn-block btn-submit">Save a Quote >></button>
											</div>
											<div class="col-xs-12 col-sm-6">
												 <a href="<?php echo site_url('/quote-en/contact'); ?>" class="btn btn-block btn-default btn-contact">Contact us >></a>
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

		$(modalVerticalCenterClass).on('show.bs.modal', function(e) {
			centerModals( $(this) );
		});
		$(window).on('resize', centerModals);
		
	});
</script>