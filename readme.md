Used Laravel Homestead - db name "homestead" password "secret"

Migrating/seeding will populate DB with specified products and dummy user to attach orders to

Product API:

GET /products - get list of products, 3 per page

POST /products - add a product to list. body: title, price

PUT /products/{product id} - change product. body: title or price

DELETE /products/{product id} - remove product

Cart API:

POST /orders - create a cart. body: user_id

GET /orders/{order_id} - get all products in cart

POST /order_details - add product to cart. body: order_id, product_id, quantity

DELETE /order_details/{order_details id} - remove item from cart
