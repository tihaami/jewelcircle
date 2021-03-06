<?php
  //Starting Database Connection
  require 'connect.inc.php';
?>
<link rel="stylesheet" type="text/css" href="tables.css">
<!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Coupons
    <button type="button" class="btn bg-blue margin" onclick="displayAddNew();">Add new 
      <i class="fas fa-plus-circle"></i>
    </button>
<!--     <div class="btn-group showButtons" id="btnAddons">
        <button class="btn bg-light-blue-gradient btn-lg" data-toggle="modal" data-target="#delConfirm">
          <i class="fas fa-trash"></i>
          <span class="label-warning labelCount counts"></span>
        </button>

        </div> -->

  </h1>
  <span><h4 id="warning" class="error hideShow"><i class="fa fa-warning"></i> Coupon Exists</h4></span>
  <ol class="breadcrumb">
    <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
    <li id="heee"> E-Commerce</li>
    <li class="active"> Coupons</li>
  </ol>
</section>
    <!-- Main content -->
<section class="content">
  <div class="hideShow" id="addNew">
    	<!-- <section class="content"> -->
    		<!-- <div class="row"> -->
    			<!-- <div class="col-md-6"> -->
    <div class="box-body" style="width: 75%;">
			<form role="form" action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="POST">
				<div class="form-group">
					<!-- <label>Text</label> -->
					<input id="fis" type="text" name="couponCode" class="form-control" maxlength="5" placeholder="Coupon Code..." style="text-transform:uppercase;" required>
				</div> <br>
				<div class="form-group">
					<!-- <label>Text</label> -->
				 	<textarea class="form-control" name="description" rows="3" placeholder="Description(optional)" required></textarea>
				</div>
				<div class="form-group">
					<!-- <label>Text</label> -->
					<input type="number" name="discount" class="form-control" max="100" placeholder="Discount(%)..." required>
        </div>
        <div class="form-group">
          <!-- <label>Text</label> -->
          <input type="date" name="expiryDate" class="form-control" required>
        </div>
        <button type="submit" id="submit" name="submit" class="btn bg-blue">Proceed <i class="far fa-check-circle"></i></button>   
        <button type="button" id="minimize" class="btn btn-box-tool pull-right"><i class="far fa-window-minimize"></i></button>   
			</form>
  	</div>
  </div>
 <!--      <div class="row">
        <div class="col-xs-12"> -->

  <div class="box">

        <!-- /.box-header -->
    <div class="box-body table-responsive">
<!--       <div>
        <p>
          <input class="form-control" id="myInput" type="text" placeholder="Search..">
        </p>
      </div> -->
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr class="bg-custom">
            <th class="checkboxColumn"></th>
            <th>Code</th>
            <th>Discount(%)</th>
            <th>Description</th>
            <th>Expiry Date</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <?php
            $query = "SELECT * FROM coupon ORDER BY couponId";
            $query_run = mysqli_query($conn, $query);
            while(@$query_array = mysqli_fetch_array($query_run)){
              echo "<tr>";
              echo '<td><input type="checkbox" class="icheckbox_flat-blue checks" name="table_records"></td>';
              echo '<td class="data">'.$query_array["couponCode"].'</td>';
              echo '<td>'.$query_array["discount"].'</td>';
              echo '<td>'.$query_array["description"].'</td>';
              echo '<td>'.$query_array["expiryDate"].'</td>';
              echo '<td><button type="button" class="btn bg-grey buttonDel" data-toggle="modal" data-target="#delConfirm"><i class="fas fa-trash-alt"></i></button></td>';
              echo '</tr>';
            }
          ?>
        </tbody>
        <tfoot>
          <tr class="bg-custom">
            <th></th>
            <th>Code</th>
            <th>Discount(%)</th>
            <th>Description</th>
            <th>Expiry Date</th>
            <th></th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->