<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php
include './partials/head.php';
?>

<body class="animsition">
	<!-- Header -->

	<?php
	include './partials/header.php';
	?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<?php
		$total = 0;
		?>
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
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>
								<?php
								if (isset($_SESSION["cart"])) {
									foreach ($_SESSION["cart"] as $id => $item) { ?>
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1" onclick="location.href='./handler/handle_cart-delete.php?id=<?php echo $id ?>'">
													<img src="./<?php echo $item['photo'] ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2"><?php echo $item['name'] ?></td>
											<td class="column-3">$ <?php echo $item['price'] ?></td>
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m" onclick="location.href='./handler/add_quantity.php?id=<?php echo $id ?>&quantity=<?php echo $item['quantity'] ?>&action=<?php echo 'down' ?>'">
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>
													<input class="mtext-104 cl3 txt-center num-product" type="number" name="quantity" value="<?php echo $item['quantity'] ?>">
													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m" onclick="location.href='./handler/add_quantity.php?id=<?php echo $id ?>&quantity=<?php echo $item['quantity'] ?>&action=<?php echo 'up' ?>'">
														<i class=" fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</td>
											<td class="column-5">$
												<?php
												$subtotal = $item['quantity'] * $item['price'];
												echo $subtotal;
												$total += $subtotal;
												?>
											</td>
										</tr>
								<?php }
								} ?>
							</table>
						</div>
					</div>
				</div>

				<div class=" col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									There are no shipping methods available. Please double check your address, or contact us if you need any help.
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>HN</option>
											<option>HCM</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>

									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>

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
								<span class="mtext-110 cl2">
									$<?php echo $total ?>
								</span>
							</div>
						</div>

						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Proceed to Checkout
						</button>
					</div>
				</div>
			</div>
		</div>
	</form>


	<!-- Footer  -->
	<?php
	include './partials/footer.php';
	$connect->close();
	?>

	<script>
		document.querySelector('header').classList.add('header-v4');
		document.querySelector('.nav-home').classList.remove('active-menu');
		document.querySelector('.nav-cart').classList.add('active-menu');
	</script>
</body>

</html>