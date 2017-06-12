<?php echo "avskldhvaskhld"; ?>
























<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$<?php 
                        //Grand Total.
                        echo number_format($grand_total, 2); ?></span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>$61</span></li>
						</ul>
						<a href="<?php echo base_url('index.php/shopping/index'); ?>" class="btn btn-default update">Continue Shopping</a>
						<input type="button" class ='btn btn-default update' value="Clear Cart" onclick="clear_cart()">
                <input type="submit" class ='btn btn-default update' value="Update Cart">
                <input type="button" class ='btn btn-default update' value="Place Order" onclick="window.location = 'shopping/billing_view'">
                            <?php echo form_close(); ?>
                            
                            <!-- "Place order button" on click send "billing" controller  -->
					</div>
				</div>
			</div>
		</div>
	</section>







			



			<?php  $cart_check = $this->cart->contents();
            
            // If cart is empty, this will show below message.
             if(empty($cart_check)) {
             echo 'To add products to your shopping cart click on "Add to Cart" Button'; 
             } ?>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
				<?php
                  // All values of cart store in "$cart". 
                  if ($cart = $this->cart->contents()){ ?>
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php
                     // Create form and send all values in "shopping/update_cart" function.
                    echo form_open('shopping/update_cart');
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item){
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="images/cart/one.png" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $item['name']; ?></h4>
							</td>
							<td class="cart_price">
								<p>$ <?php echo number_format($item['price'], 2); ?></p>
							</td>
							<td class="cart_quantity">
								<?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
							</td>
							<?php $grand_total = $grand_total + $item['subtotal']; ?>
							<td class="cart_total">
								<p class="cart_total_price">$ <?php echo number_format($item['subtotal'], 2) ; ?></p>
							</td>
							<td class="cart_delete">
								<?php echo anchor('shopping/remove/' . $item['rowid'], 'Hapus'); ?>
							</td>
						</tr>
						<?php }; ?>
						
					</tbody>
				</table>
			</div>
			<?php }else{echo "<h1 align='center'>Keranjang Kosong</h1>";} ?><br>