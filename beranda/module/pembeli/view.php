 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembeli
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content">
	 	
      <!-- Small boxes (Stat box) -->
		<div class="row">
		
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="?pages=add_pembeli" class="btn btn-primary">Add Pembeli</a></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID Pembeli</th>
                  <th>Nama Pembeli</th>     
				          <th>Alamat pembeli</th>
                  <th>Nomer Telpon pembeli</th>
                    <th>kd_kendaraan</th>
                  <th> Action </th>
                </tr>
    
             <?php
	$sql = "SELECT * FROM pembeli AS a JOIN kendaraan AS b ON a.kd_kendaraan=b.kd_kendaraan ORDER BY b.kd_kendaraan DESC";
    
  	//$sql = "SELECT * FROM pembeli ORDER BY id_pembeli DESC";

				$data = $conn->prepare($sql);
				$data->execute();
			
				while($row = $data->fetch(PDO::FETCH_OBJ)){
					$link_del = "index.php?pages=pembeli&act=delete&ID=$row->id_pembeli";
					$link_edit= "index.php?pages=add_pembeli&act=edit&ID=$row->id_pembeli";	
         		
					echo "<tr>
						<td>$row->id_pembeli</td>
						<td>$row->Nama_pembeli</td>
             <td>$row->alamat_pembeli</td>
               <td>$row->noTelp_pembeli</td>
                <td>$row->kd_kendaraan</td>						
						<td><a href='$link_edit' title='edit'><i class='fa fa-pencil-square-o'></i></a>
							&nbsp;
							<a href='$link_del' title='delete'><i class='fa fa-times'></i></a>
						</td>
						</tr>";
				} 
				if(isset($_GET["act"])=="delete"):
					try {
						$sql = "DELETE FROM Pembeli WHERE id_pembeli=".$_GET["ID"];
						if ($conn->query($sql)) {
							echo "<script type= 'text/javascript'>alert('Deleted Successfully');
								  window.location.replace('index.php?pages=pembeli');
								 </script>";
						}else{
							echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
						}
						$conn = null;
					}
					catch(PDOException $e){
						echo $e->getMessage();
					}
				endif;
					
				$conn = null; // close connection
				?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
    
    </section>
    <!-- /.content -->