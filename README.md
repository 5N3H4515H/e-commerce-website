# Basic E-Commerce Website using PHP and SQL

This project is a simple yet functional E-Commerce website implemented using PHP and MySQL. It allows users to browse products, add them to the cart, and place orders. The database connection is handled using a PHP class located in `e-commerce-website/database/DBController.php`.

## Prerequisites

To run this project locally, you'll need:

- **XAMPP:** Ensure you have XAMPP installed on your system. You can download it from [here](https://www.apachefriends.org/index.html).

## Getting Started

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/your-username/e-commerce-website.git
   ```

2. **Database Configuration:**

   - Open `e-commerce-website/database/DBController.php`.
   - Modify the database connection properties (`$host`, `$user`, `$password`, `$database`) according to your MySQL setup.

3. **Start XAMPP:**

   - Start the Apache server and MySQL from the XAMPP control panel.

4. **Import Database:**

   - Import the provided SQL file (`database.sql`) into your MySQL database using phpMyAdmin or any other MySQL database management tool.

5. **Run the Application:**

   - Open a web browser and visit `http://localhost/e-commerce-website` (replace `e-commerce-website` with the actual folder name if it's different).
   - You should see the home page of the E-Commerce website.

## Project Structure

- `index.php`: Landing page of the website displaying products.
- `product-details.php`: Page displaying detailed information about a selected product.
- `cart.php`: Shopping cart page showing the added products.
- `checkout.php`: Checkout page for placing orders.
- `e-commerce-website/database/DBController.php`: PHP class for database connection.

## Usage

- Users can browse products on the homepage.
- Clicking on a product shows its detailed information.
- Users can add products to the cart from the product details page.
- Cart page displays the added products with an option to remove items.
- Users can proceed to checkout, fill in their details, and place an order.

## Contribution

Contributions are welcome! If you find any issues or have improvements to suggest, feel free to open an issue or create a pull request.

Thank you for using the Basic E-Commerce Website! If you have any questions or need further assistance, please don't hesitate to ask. Happy e-commerce!
