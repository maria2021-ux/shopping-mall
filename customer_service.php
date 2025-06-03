<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            color: #1d6042;
            margin-bottom: 20px;
        }

        .contact-form, .faqs {
            margin-bottom: 30px;
        }

        .contact-form h2, .faqs h2 {
            font-size: 1.8em;
            color: #1d6042;
            margin-bottom: 15px;
        }

        .contact-form label, .faqs dt {
            font-weight: bold;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .contact-form button {
            background-color: #1d6042;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1em;
        }

        .contact-form button:hover {
            background-color: #145a32;
        }

        .faqs dl {
            margin: 0;
        }

        .faqs dt {
            font-size: 1.2em;
            margin-top: 10px;
        }

        .faqs dd {
            margin: 0;
            margin-bottom: 15px;
        }

        .contact-info {
            margin-top: 30px;
        }

        .contact-info h3 {
            font-size: 1.5em;
            color: #1d6042;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1>Customer Service</h1>

    <!-- Contact Form -->
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="send_message.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="6" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

    <!-- FAQs Section -->
    <div class="faqs">
        <h2>Frequently Asked Questions</h2>
        <dl>
            <dt>How do I return a product?</dt>
            <dd>To return a product, please visit our returns page or contact our support team for instructions.</dd>

            <dt>What is your refund policy?</dt>
            <dd>We offer a full refund within 30 days of purchase. Please refer to our refund policy for more details.</dd>

            <dt>How can I track my order?</dt>
            <dd>Once your order is shipped, you will receive a tracking number via email. You can use it to track your shipment on our website.</dd>
        </dl>
    </div>

    <!-- Contact Information -->
    <div class="contact-info">
        <h3>Contact Information</h3>
        <p>Email: support@example.com</p>
        <p>Phone: (123) 456-7890</p>
    </div>
</div>

</body>
</html>
