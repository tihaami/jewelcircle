<?php
  //Starting Database Connection
  require 'connect.inc.php';
?>
<link rel="stylesheet" type="text/css" href="tables.css">
<!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Users

  </h1>
  <ol class="breadcrumb">
    <li><a href="home.php"><i class="fas fa-home"></i> Home</a></li>
    <li class="active"> Users</li>
  </ol>
</section>
<section class="content">
    <!-- Main content -->

      <div class="box">

            <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr class="bg-custom">
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Role</th>
              </tr>
            </thead>
            <tbody id="tableBody">
            <?php 
              $query = "SELECT CONCAT(first_name, ' ', last_name) 'name', email, contact, role FROM customer";
              $query_run = mysqli_query($conn, $query);
              while(@$query_array = mysqli_fetch_array($query_run)){
                echo '<tr><td>'.$query_array['name'].'</td>
                      <td>'.$query_array['email'].'</td>
                      <td>'.$query_array['contact'].'</td>
                      <td>'.$query_array['role'].'</td></tr>';
              }
            ?>
            </tbody>
            <tfoot>
              <tr class="bg-custom">
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Role</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.row -->
</section>
<!-- /.content -->