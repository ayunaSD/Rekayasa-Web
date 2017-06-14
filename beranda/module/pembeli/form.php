 <!-- Content Header (Page header) -->
 <?php
 	if(isset($_GET['act'])=="edit"){
 		$stmt = $conn->prepare("SELECT * FROM pembeli WHERE id_pembeli=".$_GET["ID"]);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_OBJ);	
 		$Nama_pembeli = $rows[0]->Nama_pembeli; 
 		$alamat_pembeli = $rows[0]->alamat_pembeli; 
		$noTelp_pembeli = $rows[0]->noTelp_pembeli;
		$kd_kendaraan = $rows[0]->kd_kendaraan;
	//	$merk_kendaraan = $row{0}->merk_kendaraan; 
 	}else{
 		$Nama_pembeli = ""; 
 		$alamat_pembeli = ""; 	
 		$noTelp_pembeli = "";
 		$kd_kendaraan = "";		
 	//	$merk_kendaraan = "";
 	}
 ?>
    <section class="content-header">
      <h1>
        Pembeli
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content">
	 	
      <!-- Small boxes (Stat box) -->
		<div class="row">
		 <div class="col-md-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="#">
             <div class="box-body">
                <div class="form-group">
                  <label for="Nama_pembeli"> Nama Pembeli</label>
                  <input type="text" class="form-control" name="Nama_pembeli" placeholder="input Nama Anda" required="required" value="<?php echo $Nama_pembeli;?>">
             </div>

            <div class="form-group">
                  <label for="alamat_pembeli"> Alamat Pembeli</label>
                  <input type="text" class="form-control" name="alamat_pembeli" placeholder="input Alamat Anda" required="required" value="<?php echo $alamat_pembeli;?>">
             </div>

             <div class="form-group">
                  <label for="noTelp_pembeli"> Nomer Telpon Pembeli</label>
                  <input type="text" class="form-control" name="noTelp_pembeli" placeholder="input Nomer Telpon Anda" required="required" value="<?php echo $noTelp_pembeli;?>">
             </div>
			 
             
			 <div class="form-group">
                  <label for="kd_kendaraan"> kode kendaraan</label>
                 <select name= "kd_kendaraan" class="form-control"> 
                 <?php
                 $auth = $conn->prepare("SELECT * FROM kendaraan");
                 $auth->execute();
                while($row = $auth->fetch(PDO::FETCH_OBJ)) {
                	$selected = ($row->kd_kendaraan==$kd_kendaraan)?"selected" : "";
                	echo "<option value='$row->kd_kendaraan' $selected >$row->merk_kendaraan</option>";

                } ?>

                 </select>
             
              </div>
     

        
              <div class="box-footer">
                <button type="submit" name="btnSimpan" class="btn btn-primary">jika sudah benar, klik disini untuk menyimpan </button>
              </div>
            </form>
          </div>
		</div>

		
		</div>
      <!-- /.row -->
      <!-- Main row -->
	<?php
	  if(isset($_POST["btnSimpan"])):
		$a = $_POST["Nama_pembeli"];
		$b = $_POST["alamat_pembeli"];
		$c = $_POST["noTelp_pembeli"];	
		$d = $_POST["kd_kendaraan"];	
		if(empty($a)){
			echo "Nama pembeli cannot empty";
			exit();
		}
		if(empty($b)){
			echo "alamat pembeli cannot empty";
			exit();
		}
		if(empty($c)){
			echo "nomer telpon anda cannot empty";
			exit();
		}
		if(empty($d)){
			echo "Kode kendaraan cannot empty";
			exit();
	
		}
		try {  
			if(isset($_GET['act'])=="edit")
				$sql = "UPDATE pembeli SET Nama_pembeli='$a',alamat_pembeli='$b',noTelp_pembeli='$c', kd_kendaraan='$d' WHERE id_pembeli =".$_GET["ID"];
			else
				$sql = "INSERT INTO pembeli (Nama_pembeli,alamat_pembeli,noTelp_pembeli,kd_kendaraan)VALUES ('$a','$b','$c','$d')";
			
			if ($conn->query($sql)) {
				echo "<script type= 'text/javascript'>alert('Save data Successfully');
				      window.location.replace('index.php?pages=pembeli');
					 </script>";
			}else{
				echo "<script type= 'text/javascript'>alert('Data not successfully save data.');</script>";
			}
			$conn = null;
		
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	  endif;	
	?>	
    </section>
    <!-- /.content -->