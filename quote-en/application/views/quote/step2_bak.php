    <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <div class="container">
        <div class="row census-intro">
	        <div class="row contentRow">
				<div class="col-md-12">
	        		<h3>เลือกแผนประกันสุขภาพที่เหมาะสำหรับคุณ</h3>
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
									<h2 class="text-center quote-form--header">แผนประกันสุขภาพสำหรับ</h2>
                  					<h4 class="text-center">( <?php echo $date ?> / อายุ <?php echo $age ?> ปี )</h4>					        	
                  				</div>
                  				

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
		                  						<p class="plan-desc"><?php echo $plan['description'] ?></p>
		                  						<h3 class="plan-price"><?php echo (is_numeric($plan['price'])) ? number_format($plan['price'], 0).' บาท' : $plan['price'] ?></h3>

		                  						<?php if( $i === 2 ): ?>
		                  							<div class="plan-tag">
		                  								<h3>แพ็คเกจ<small>ยอดนิยม</small></h3>
		                  							</div>
		                  						<?php endif; ?>
	                  						</div>

	                  						<div class="card-body">
												
												<!-- ตาราง ทุนประกัน -->
	                  							<table class="table table-bordered mb-0 info">
	                  								<tbody>
	                  										                  								
													<?php if( $i == 1 ): ?>

													<!-- แผนแรก เรอ่ม -->

	                  								<tr>
	                  										<td class="col-md-7"><b>ผลประโยชน์สูงสุดต่อโรคต่อปี</b></td>
	                  										<td class="col-md-5 text-right">780,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7"><strong>ค่ารักษาพยาบาลทั่วไป</strong></td>
	                  										<td class="col-md-5 text-right">100,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7"><strong>ผลประโยชน์สำหรับผู้ป่วยนอก</strong></td>
	                  										<td class="col-md-5 text-right">2,000 บาท/ครั้ง</td>
	                  									</tr>

	                  								<!-- แผนแรก จบ -->

	                  								<?php elseif( $i == 2 ): ?>

	                  									<!-- แผนสอง เริ่ม -->

		                  									<tr>
	                  										<td class="col-md-7">ผลประโยชน์สูงสุดต่อโรคต่อปี</td>
	                  										<td class="col-md-5 text-right">5,000,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ค่ารักษาพยาบาลทั่วไป</td>
	                  										<td class="col-md-5 text-right">คุ้มครองตามจริง</td>
	                  									</tr>

	                  										                  									<tr>
	                  										<td class="col-md-7">ผลประโยชน์สำหรับผู้ป่วยนอก</td>
	                  										<td class="col-md-5 text-right">5,000,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ค่าใช้จ่ายในการคลอดบุตรสูงสุดต่อการตั้งครรภ์</td>
	                  										<td class="col-md-5 text-right">100,000 บาท</td>
	                  									</tr>


		                  								<!-- แผนสอง จบ -->



	                  								<?php elseif( $i == 3 ): ?>

	                  									<!-- แผนสาม เริ่ม -->

		                  									<tr>
	                  										<td class="col-md-7">ผลประโยชน์สูงสุดต่อโรคต่อปี</td>
	                  										<td class="col-md-5 text-right">50,000,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ค่ารักษาพยาบาลทั่วไป</td>
	                  										<td class="col-md-5 text-right">คุ้มครองตามจริง</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ผลประโยชน์สำหรับผู้ป่วยนอก</td>
	                  										<td class="col-md-5 text-right">50,000,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ค่าใช้จ่ายในการคลอดบุตรสูงสุดต่อการตั้งครรภ์</td>
	                  										<td class="col-md-5 text-right">150,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ผลประโยชน์ด้านทันตกรรม</td>
	                  										<td class="col-md-5 text-right">สูงสุด 80,000 บาท</td>
	                  									</tr>
	                  									<tr>
	                  										<td class="col-md-7">ผลประโยชน์ด้านสายตา</td>
	                  										<td class="col-md-5 text-right">สูงสุด 20,000 บาท</td>
	                  									</tr>
	                  									


	                  									

		                  								<!-- แผนสาม จบ -->


	                  								<?php endif; ?>


					  										
	                  							</tbody>
	                  							</table>

	                  								
	                  									<button class="btn btn-block btn-choose-plan">คลิกเลือกแผนนี้</button>
	                  								

	                  							

	                  						</div>
	                  					</div>
	                  				</div>
                  				<?php $i++; endforeach ?>
                  				<div class="clearfix"></div>						
								</div>
                  				


	                  			<?php for($i = 0; $i < count($plans); $i++ ): ?>
	                  				<div class="col-xs-12">
		                  				<div id="quote-form--<?=$i;?>" class="quote-form hidden">
		                  				<h2 class="text-center quote-form--header">เลือกความคุ้มครอง/ส่วนลดเพิ่มเติม</h2>
		                  				<h4 class="text-center">แผนที่ท่านกำลังเลือกคือ (<?php echo $plans[$i]['name'] ?>)</h4>
	<br><br>
		                  				<?php echo form_open(base_url().'quote/calculate', array('class' => 'frm-quote', 'role'=>'form')); ?>
		                  					<!-- OPD -->
		                  					<div class="form-group">
		                  						<label>ท่านต้องการซื้อความคุ้มครองผู้ป่วยนอกหรือไม่ / Outpatient Exclusion</label><br/>
		                  						<label class="radio-inline"><input type="radio" checked="checked" name="opd[]" value="1">ต้องการ</label>
												<label class="radio-inline"><input type="radio" name="opd[]" value="0">ไม่ต้องการ</label>
		                  					</div>

		                  					<!-- Deduct -->
		                  					<?php if( ($plans[$i]['name'] === 'Standard Plan 1') || ($plans[$i]['name'] === 'Standard Plan 2') ): ?>

		                  						<div class="form-group">
			                  						<label>ความรับผิดส่วนแรก / Deductible</label> 										<span class="text-danger">(แผนที่ท่านเลือกไม่คุ้มครองในส่วนนี้โปรดเลือก แผนอื่น)</span><br/>
			                  						<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">ไม่ต้องการ</label>
													<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">40,000 บาท</label>
													<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">100,000 บาท</label>
													<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">200,000 บาท</label>
													<label class="radio-inline"><input type="radio" disabled="disabled" name="deduct[]" value="0">300,000 บาท</label>
			                  					</div>

		                  					<?php else: ?>

		                  						<div class="form-group">
			                  						<label>ความรับผิดส่วนแรก / Deductible</label><br/>
			                  						<label class="radio-inline"><input type="radio" checked="checked" name="deduct[]" value="0">ไม่ต้องการ</label>
													<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_40k']; ?>">40,000 บาท</label>
													<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_100k']; ?>">100,000 บาท</label>
													<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_200k']; ?>">200,000 บาท</label>
													<label class="radio-inline"><input type="radio" name="deduct[]" value="<?php echo $plans[$i]['deduct_300k']; ?>">300,000 บาท</label>
			                  					</div>

		                  					<?php endif; ?>


		                  					<!-- Dental -->
		                  					<?php if( ($plans[$i]['name'] !== 'Plan 4') && ($plans[$i]['name'] !== 'Plan 5') && ($plans[$i]['name'] !== 'Plan 6') && ($plans[$i]['name'] !== 'Plan 7') && ($plans[$i]['name'] !== 'แม๊กซิม่า แพลน') ): ?>
		                  						<?php
		                  							$dental_msg = "";
		                  							if( ($plans[$i]['name'] === 'Standard Plan 1') || ($plans[$i]['name'] === 'Standard Plan 2') || ($plans[$i]['name'] === 'Plan 3') || ($plans[$i]['name'] === 'สแตนดาร์ด พลัส แพลน') ){
		                  								$dental_msg = "(ความคุ้มครองรายการนี้ ไม่สามารถปรับเปลี่ยนสำหรับแผนประกันที่ท่านเลือกได้)";
		                  							} else if( ($plans[$i]['name'] === 'Plan 8') || ($plans[$i]['name'] === 'Plan 9' ) || ($plans[$i]['name'] === 'อัลติม่า แพลน' ) ){
		                  								$dental_msg = "(ความคุ้มครองนี้ รวมอยู่ในแผนประกันสุขภาพ)";
		                  							}
		                  						 ?>
		                  						<div class="form-group">
			                  						<label>การบัดบำโรคทางทันตกรรม / Dental</label> <span class="text-danger"><?php echo $dental_msg ?></span><br/>
			                  					</div>

		                  					<?php else: ?>

		                  						<div class="form-group">
			                  						<label>การบัดบำโรคทางทันตกรรม / Dental</label><br/>
			                  						<label class="radio-inline"><input type="radio" checked="checked" name="dental[]" value="1">ต้องการ</label>
													<label class="radio-inline"><input type="radio" name="dental[]" value="0">ไม่ต้องการ</label>
			                  					</div>

		                  					<?php endif; ?>



		                  					<!-- Vision -->
		                  					<?php if( ($plans[$i]['name'] !== 'Plan 4') && ($plans[$i]['name'] !== 'Plan 5') && ($plans[$i]['name'] !== 'Plan 6') && ($plans[$i]['name'] !== 'Plan 7') && ($plans[$i]['name'] !== 'แม๊กซิม่า แพลน') ): ?>

		                  						<?php
		                  							$vision_msg = "";
		                  							if( ($plans[$i]['name'] === 'Standard Plan 1') || ($plans[$i]['name'] === 'Standard Plan 2') || ($plans[$i]['name'] === 'Plan 3') || ($plans[$i]['name'] === 'สแตนดาร์ด พลัส แพลน') ){
		                  								$vision_msg = "(ความคุ้มครองรายการนี้ ไม่สามารถปรับเปลี่ยนสำหรับแผนประกันที่ท่านเลือกได้)";
		                  							} else if( ($plans[$i]['name'] === 'Plan 7') || ($plans[$i]['name'] === 'Plan 8') || ($plans[$i]['name'] === 'Plan 9') || ($plans[$i]['name'] === 'อัลติม่า แพลน' ) ){
		                  								$vision_msg = "(ความคุ้มครองนี้ รวมอยู่ในแผนประกันสุขภาพ)";
		                  							}
		                  						 ?>


		                  						<div class="form-group">
			                  						<label>การตรวจทางด้านสายตา / Vision</label> <span class="text-danger"><?php echo $vision_msg ?></span><br/>
			                  					</div>


		                  					<?php else: ?>

		                  						<div class="form-group">
			                  						<label>การตรวจทางด้านสายตา / Vision</label><br/>
			                  						<label class="radio-inline"><input type="radio" checked="checked" name="vision[]" value="1">ต้องการ</label>
													<label class="radio-inline"><input type="radio" name="vision[]" value="0">ไม่ต้องการ</label>
			                  					</div>

		                  					<?php endif; ?>
		                  					

		                  					<div class="form-group text-center">
		                  						<h3>ราคาสุทธิของท่านคือ <span class="text-total text-main-blue"><?php echo (is_numeric($plans[$i]['price'])) ? number_format($plans[$i]['price'], 0) : $plans[$i]['price'] ?></span> บาท <small>(ราคารวมอากรแสตมป์)</small></h3>
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
					                             	<button class="btn btn-secondary btn-block btn-submit">บันทึกใบเสนอราคา >></button>
				                            	</div>
				                            	<div class="col-xs-12 col-sm-6">
				                         			<a href="<?php echo site_url('quote/contact'); ?>" class="btn btn-block btn-default btn-contact">ติดต่อเจ้าหน้าที่ >></a>
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

			setTimeout(function(){
				$('#modal-helper').modal('show');
			}, 60000);

			$(modalVerticalCenterClass).on('show.bs.modal', function(e) {
			    centerModals( $(this) );
			});
			$(window).on('resize', centerModals);
			
		});
	</script>