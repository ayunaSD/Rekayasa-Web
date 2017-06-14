 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kendaraan
      </h1>      
    </section>

    <!-- Main content -->
    <section class="content">
	 	
      <!-- Small boxes (Stat box) -->
		<div class="row">
		
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><a href="?pages=add_kendaraan" class="btn btn-primary">Add Kendaraan</a></h3>

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
                  <th>Kode Kendaraan</th>
                  <th>Merk Kendaraan</th>     
				          <th>Harga Jual kendaraan</th>
                  <th> Action </th>
                </tr>
               <?php
      $sql = "SELECT * FROM kendaraan ORDER BY kd_kendaraan DESC";         
				$data = $conn->prepare($sql);
				$data->execute();
			
				while($row = $data->fetch(PDO::FETCH_OBJ)){
					$link_del = "index.php?pages=kendaraan&act=delete&ID=$row->kd_kendaraan";
					$link_edit= "index.php?pages=add_kendaraan&act=edit&ID=$row->kd_kendaraan";	
         		
					echo "<tr>
						<td>$row->kd_kendaraan</td>
						<td>$row->merk_kendaraan</td>
             <td>$row->harga_jual</td>				
						<td><a href='$link_edit' title='edit'><i class='fa fa-pencil-square-o'></i></a>
							&nbsp;
							<a href='$link_del' title='delete'><i class='fa fa-times'></i></a>
						</td>
						</tr>";
				} 
				if(isset($_GET["act"])=="delete"):
					try {
						$sql = "DELETE FROM kendaraan WHERE kd_kendaraan=".$_GET["ID"];
						if ($conn->query($sql)) {
							echo "<script type= 'text/javascript'>alert('Deleted Successfully');
								  window.location.replace('index.php?pages=kendaraan');
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