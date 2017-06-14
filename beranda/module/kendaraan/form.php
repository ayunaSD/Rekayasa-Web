 <!-- Content Header (Page header) -->
 <?php
 	if(isset($_GET['act'])=="edit"){
 		$stmt = $conn->prepare("SELECT * FROM kendaraan WHERE kd_kendaraan=".$_GET["ID"]);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_OBJ);
		$merk_kendaraan= $rows[0]->merk_kendaraan; 
		$harga_jual= $rows[0]->harga_jual;  
		$kd_kendaraan = $rows[0]->kd_kendaraan; 
 	}else{
 		$merk_kendaraan= ""; 	
 		$harga_jual = "";
 		$kd_kendaraan = "";	
 	}
 ?>
    <section class="content-header">
      <h1>
        Kendaraan
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content">
	 	
      <!-- Small boxes (Stat box) -->
		<div class="row">
		 <div class="col-md-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">mari coba</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="#">
             </div>
              <div class="box-body">
            <div class="form-group">
                  <label for="harga_jual">Harga Jual </label>
                  <input type="text" class="form-control" name="harga_jual" placeholder=" silahkan input harga jual" required="required" value="<?php echo $harga_jual;?>">
             </div>
              <div class="form-group">
                  <label for="merk_kendaraan"> merk Kendaraan</label>
                  <input type="text" class="form-control" name="merk_kendaraan" placeholder="input merk kendaraan yang diinginkan" required="required" value="<?php echo $merk_kendaraan;?>">
             
              </div>
			



                 
                 	
                 </select>
             
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="btnSimpan" class="btn btn-primary">klik untuk menyimpan </button>
              </div>
            </form>
          </div>
		</div>
		
		</div>
      <!-- /.row -->
      <!-- Main row -->
	<?php	
	 if(isset($_POST["btnSimpan"])):
		$a = $_POST["merk_kendaraan"];
		$b = $_POST["harga_jual"];		
		// validation
		if(empty($a)){
			echo "merk kendaraan cannot empty";
			exit();
		}
		if(empty($b)){
			echo "harga jual cannot empty";
			exit();
		}

			if(isset($_GET['act'])=="edit")
				$sql = "UPDATE kendaraan SET merk_kendaraan='$a',harga_jual='$b' WHERE kd_kendaraan=".$_GET["ID"];
			else
				$sql = "INSERT INTO kendaraan (merk_kendaraan,harga_jual) VALUES ('$a','$b')";
				
			if ($conn->query($sql)) {
				echo "<script type= 'text/javascript'>alert('Save data Successfully');
				      window.location.replace('index.php?pages=kendaraan');
					 </script>";
			}else{
				echo "<script type= 'text/javascript'>alert('Data not successfully save data.');</script>";
			}
			$conn = null;
		// }
		// catch(PDOException $e){
		// 	echo $e->getMessage();
		// }
	  endif;	
	?>	
   // </section>
  //  <!-- /.content -->