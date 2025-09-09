<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lead Capture Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .lead-container {
            background: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .lead-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .lead-container label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        .lead-container input[type="text"],
        .lead-container input[type="email"],
        .lead-container input[type="tel"],
        .lead-container textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .lead-container button {
            width: 100%;
            padding: 10px;
            background: #0078d7;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .lead-container button:hover {
            background: #005fa3;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="lead-container">
        <h2>Lead Capture Form</h2>
        <!-- PHP Success/Error Message -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = htmlspecialchars($_POST["firstName"]);
            $lastName = htmlspecialchars($_POST["lastName"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $address = htmlspecialchars($_POST["address"]);

            $to = "patlife120@gmail.com";
            $subject = "New Lead Captured";
            $message = "First Name: $firstName\nLast Name: $lastName\nEmail: $email\nPhone: $phone\nAddress: $address";
            $headers = "From: noreply@yourdomain.com\r\nReply-To: $email";

            if (mail($to, $subject, $message, $headers)) {
                echo '<div class="success-message">Thank you! Your information has been submitted.</div>';
            } else {
                echo '<div class="error-message">Sorry, there was an error sending your information. Please try again.</div>';
            }
        }
        ?>
        <form method="post" action="">
            <label for="firstName">First Name</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>