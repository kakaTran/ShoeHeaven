
    <div class="container-payment">
        <header>
            <h1>Payment</h1>
        </header>
        <main>
            <section class="billing-info">
                <h2 class="h2-payment">Billing Information</h2>
                <form action="#">
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>

                    <label for="country">Country:</label>
                    <select id="country" name="country" required>
                        <option value="">Select country</option>
                        <option value="vn">Vietnam</option>
                        <option value="us">United States</option>
                        <option value="uk">United Kingdom</option>
                    </select>
                </form>
            </section>

            <section class="order-summary">
                <h2 class="h2-payment">Order Summary</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>
                            <div class="product-info-cart">
                                <img src="images/product01.png" alt="Adidas Running Shoes">
                                <p>Adidas Running Shoes for Men</p>
                            </div>
                        </td>
                            <td>$109.99</td>
                            <td>3</td>
                            <td>$329.97</td>
                        </tr>
                        <tr>
                            <td colspan="3">Shipping Fee</td>
                            <td>$10.00</td>
                        </tr>
                        <tr>
                            <td colspan="3">Total</td>
                            <td>$339.97</td>
                        </tr>
                    </tbody>
                </table>
                <div class="payment-methods">
                    <p class="payment-methods-title">Payment Methods:</p>
                    <div class="payment-options">
                        <input type="radio" id="cod" name="payment" value="cod" checked>
                        <label class="payment-option" for="cod">Cash on Delivery</label>
                    </div>
                    <div class="payment-options">
                        <input type="radio" id="paypal" name="payment" value="paypal">
                        <label class="payment-option" for="paypal">Paypal</label>
                    </div>
                    <div class="payment-options">
                        <input type="radio" id="vnpay" name="payment" value="vnpay">
                        <label class="payment-option" for="vnpay">VNPay</label>
                    </div>
                </div>
                <button type="submit">Confirm Payment</button>
            </section>
        </main>
    </div>
