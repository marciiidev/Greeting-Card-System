<?php
$bgcolor = "lightgray";
$message = "Your message will appear here...";
$sendersName = "Name";
$sendersAddress = "Address";
$receiversName = "Name";
$receiversAddress = "Email";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bgcolor = $_POST["color"];
    $message = $_POST["user_message"];
    $sendersName = $_POST["sendersName"];
    $sendersAddress = $_POST["sendersAddress"];
    $receiversName = $_POST["receiversName"];
    $receiversAddress = $_POST["receiversAddress"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Greeting Card</title>

    <style>
        body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    padding: 30px;
    color: #fff;
}

/* Title */
h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #ffffff;
    text-shadow: 2px 2px 10px rgba(0,0,0,0.5);
}

/* Layout */
.container {
    display: flex;
    gap: 30px;
    justify-content: center;
    flex-wrap: wrap;
}

/* FORM */
form {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 25px;
    width: 320px;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.3);
    border: 1px solid rgba(255,255,255,0.2);
}

/* Inputs */
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border: none;
    border-radius: 8px;
    outline: none;
    font-size: 14px;
}

/* Color picker fix */
input[type="color"] {
    height: 40px;
    padding: 2px;
    cursor: pointer;
}

/* Buttons */
button {
    width: 100%;
    padding: 12px;
    background: #1e90ff;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: 0.3s;
}

button:hover {
    background: #0d6efd;
    transform: scale(1.03);
}

/* CARD PREVIEW */
.card-preview {
    padding: 30px;
    width: 500px;
    border-radius: 15px;
    border: 2px solid rgba(255,255,255,0.3);
    box-shadow: 0 0 25px rgba(0,0,0,0.4);
    color: #000;
    transition: 0.3s;
}

/* Text inside card */
.card-preview h2 {
    margin: 5px 0;
}

.card-preview p {
    font-size: 16px;
}

/* Send button form */
form[action="send_email.php"] button {
    background: #00b4db;
    background: linear-gradient(to right, #00b4db, #0083b0);
}
    </style>
</head>

<body>

<h1>Greeting Card Generator</h1>

<div class="container">

<form method="POST">
    <input type="color" name="color" required>

    <input type="text" name="sendersName" placeholder="Sender Name">
    <input type="text" name="sendersAddress" placeholder="Sender Address">

    <input type="text" name="receiversName" placeholder="Receiver Name">
    <input type="email" name="receiversAddress" placeholder="Receiver Email" required>

    <input type="text" name="user_message" placeholder="Message">

    <button type="submit">Generate</button>
</form>

<div class="card-preview" style="background: <?php echo $bgcolor; ?>">
    <h2>Dear <?php echo $receiversName; ?></h2>
    <p><?php echo $message; ?></p>

    <h3>From:</h3>
    <h2><?php echo $sendersName; ?></h2>
    <p><?php echo $sendersAddress; ?></p>
</div>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
<form method="POST" action="send_email.php">
    <input type="hidden" name="color" value="<?php echo $bgcolor; ?>">
    <input type="hidden" name="user_message" value="<?php echo $message; ?>">
    <input type="hidden" name="sendersName" value="<?php echo $sendersName; ?>">
    <input type="hidden" name="sendersAddress" value="<?php echo $sendersAddress; ?>">
    <input type="hidden" name="receiversName" value="<?php echo $receiversName; ?>">
    <input type="hidden" name="receiversAddress" value="<?php echo $receiversAddress; ?>">

    <button type="submit">📧 Send Greeting Card</button>
</form>
<?php } ?>

</div>

</body>
</html>