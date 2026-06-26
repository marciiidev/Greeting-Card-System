<!DOCTYPE html>
<html>
<head>
    <title>BSIS Greeting Card</title>
    <style>
        body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
}

/* Main box */
.box {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    padding: 50px 40px;
    width: 420px;
    text-align: center;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    border: 1px solid rgba(255,255,255,0.2);
    animation: fadeIn 0.8s ease-in-out;
}

/* Title */
.box h1 {
    font-size: 26px;
    margin-bottom: 10px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
}

/* Paragraph */
.box p {
    font-size: 14px;
    opacity: 0.9;
}

/* Button link */
a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    background: linear-gradient(to right, #00b4db, #0083b0);
    color: white;
    padding: 14px 28px;
    border-radius: 30px;
    font-weight: bold;
    transition: 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

/* Hover effect */
a:hover {
    transform: scale(1.05);
    background: linear-gradient(to right, #0083b0, #00b4db);
}

/* Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
    </style>
</head>
<body>

<div class="box">
    <h1>🎉 BSIS Greeting Card System</h1>
    <p>Create and send a personalized greeting card</p>

    <br>
    <a href="gcard.php">Create Greeting Card</a>
</div>

</body>
</html>