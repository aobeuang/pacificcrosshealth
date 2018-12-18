<!DOCTYPE html> 
<html lang = "en"> 

   <head> 
      <meta charset = "utf-8"> 
      <title>CodeIgniter Email Example</title> 
   </head>
	
   <body> 
      <div>
         <h3>ชื่อ : <?php echo $name ?></h3>
         <h3>เบอร์โทรศัพท์ : <?php echo $phone ?></h3>
         <h3>อีเมล์ : <?php echo $email ?></h3>
         <h3>อายุ : <?php echo $age ?></h3>
			<h3>แผนที่ท่านเลือก : <?php echo $plan ?></h3>
			<h3>ราคาสุทธิ : <?php echo number_format( $net_price ); ?> บาท</h3>
         <p>
            ถ้าคุณต้องการข้อมูลเพิ่มเติม สามารถเยี่ยมชมเว็บไซต์ของเราได้ที่ www.pacificcrosshealth.com หรือโทร. 02-401-9189 
         </p>
		</div>
   </body>
	
</html>