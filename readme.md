- Uses Laravel Homestead 

- Migrating and seeding will populate product DB with specified products

- Product API:
GET /products
POST /products - title, price
PUT /products/{product id}
DELETE /products/{product id}

- Cart API:
POST /orders - create a cart: user_id
GET /orders/{order_id} - get all products in cart
POST /order_details - add product to cart: order_id, product_id, quantity
DELETE /order_details/{order_details id} - remove item from cart
