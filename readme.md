Used Laravel Homestead - db name "homestead" password "secret"

Migrating/seeding will populate DB with specified products and dummy user to attach orders to

Product API:

GET /products

POST /products - title, price

PUT /products/{product id}

DELETE /products/{product id}


Cart API:

POST /orders - create a cart: user_id

GET /orders/{order_id} - get all products in cart

POST /order_details - add product to cart: order_id, product_id, quantity

DELETE /order_details/{order_details id} - remove item from cart

