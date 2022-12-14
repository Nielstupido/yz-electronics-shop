<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <h1>Gcash Donation</h1>
        <p>@pinoyfreecoder</p>
       

        <div class="card">

            <form action="process.php" method="post">
                <label>Enter Amount</label>
                <input type="text" name="amount" id="currency" data-type="currency">
                <button type="submit">Donate</button>
            </form>

        </div>

        
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="index.js"></script>
</body>
</html>