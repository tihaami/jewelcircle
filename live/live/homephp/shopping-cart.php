<?php
	require 'connect.inc.php';
	require 'templates/top.inc.php';
?>
<title>Your Cart</title>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shopping Cart
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
	<form <?php 
		if(isset($_SESSION["products"]))
			if(count($_SESSION["products"]))
				echo "action='checkout'"
	 ?> method="POST" class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-3">Name</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								<?php
								if(isset($_SESSION["products"])){
									for ($i=0, $count = count($_SESSION["products"]); $i < $count; $i++) {
										if(isset($_SESSION['products'][$i]['cardName'])){
											$cardName = $_SESSION["products"][$i]["cardName"];
											$cardCost = $_SESSION["products"][$i]["cardCost"];
											echo '<tr class="table_row">';
												echo '<td class="column-1">';
													echo '<div class="how-itemcart1">';
														echo '<img src="../assets/images/giftcards/'.$cardName.'-thumb.jpg" alt="IMG">';
													echo '</div>';
												echo '</td>';
												echo '<td data-PID="'.$cardName.'" class="column-2">'.$cardName.'</td>';
												echo '<td class="column-3 unit-price">Rs '.$cardCost.'</td>';
												echo '<td>-</td>';
												echo '<td class="column-4">';
													echo '<div class="wrap-num-product flex-w m-l-auto m-r-0">';
														echo '<div id="cart-prod-minus" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">';
															echo '<i class="fs-16 zmdi zmdi-minus"></i>';
														echo '</div>';

														echo '<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">';

														echo '<div id="cart-prod-plus" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">';
															echo '<i class="fs-16 zmdi zmdi-plus"></i>';
														echo '</div>';
													echo '</div>';
												echo '</td>';
												echo '<td class="column-5">Rs '.$cardCost.'</td>';
											echo '</tr>';
										} 
										if(isset($_SESSION['products'][$i]['productID'])){
											$productID = $_SESSION["products"][$i]["productID"];
											$title = $_SESSION["products"][$i]["title"];
											$price = $_SESSION["products"][$i]["price"];
											$quantity = $_SESSION["products"][$i]["quantity"];
											$name = $_SESSION["products"][$i]["nameOnProduct"];
											$query = "SELECT imageDestination FROM images WHERE productID='$productID'";
											$query_run = mysqli_query($conn, $query);
											if(@$query_array = mysqli_fetch_array($query_run)){
												$imgPath = $query_array['imageDestination'];
											}
											echo '<tr class="table_row">';
												echo '<td class="column-1">';
													echo '<div class="how-itemcart1">';
														echo '<img src="'.$imgPath.'" alt="IMG">';
													echo '</div>';
												echo '</td>';
												echo '<td data-PID="'.$productID.'" class="column-2">'.$title.'</td>';
												echo '<td class="column-3 unit-price">Rs '.$price/$quantity.'</td>';
												echo '<td>'.$name.'</td>';
												echo '<td class="column-4">';
													echo '<div class="wrap-num-product flex-w m-l-auto m-r-0">';
														echo '<div id="cart-prod-minus" class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">';
															echo '<i class="fs-16 zmdi zmdi-minus"></i>';
														echo '</div>';

														echo '<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="'.$quantity.'">';

														echo '<div id="cart-prod-plus" class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">';
															echo '<i class="fs-16 zmdi zmdi-plus"></i>';
														echo '</div>';
													echo '</div>';
												echo '</td>';
												echo '<td class="column-5">Rs '.$price.'</td>';
											echo '</tr>';
										}
									}
								}
								?>

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code" maxlength="5">
									
								<div id="apply-coupon" class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="update flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span id="sub-total" class="mtext-110 cl2">
									Rs 0
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Free shipping across Pakistan
								</p>
								
								<div style="display: none;" class="p-t-15">

									<!-- <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="country">
											<option>Select your country</option>
											<?php
												// $query = "SELECT * FROM shipping";
												// $query_run = mysqli_query($conn, $query);
												// while(@$query_array = mysqli_fetch_array($query_run)){
												// 	echo '<option data-price="'.$query_array['cost'].'">'.$query_array['country'].'</option>';
												// }
											?>
										</select>
										<div class="dropDownSelect2"></div>
									</div> -->

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State" >
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip" >
									</div>
									
									<div class="stext-111 cl6 p-t-2" style="padding-bottom: 15px">
										<p>Shipping Charges: NONE<!-- Rs <span id="shipping">0</span> --></p>
									</div>
									
									<!-- <div class="flex-w">
										<div class="update flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div> -->
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<div id="coupon" data-label1=""></div>
								<span id="total" class="mtext-110 cl2">
									Rs 0
								</span>
							</div>
						</div>

						<button type="submit" id="proceedToCheckout" class="flex-c-m stext-101 cl0 size-116 bg-dark bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php
	require 'templates/bottom.inc.php'
?>