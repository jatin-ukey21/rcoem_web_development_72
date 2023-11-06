<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .form-markup{
            margin: 0 auto;
            max-width: 400px;
            background: white;
            padding: 20px;
        }
        .form-markup h3{
            text-align: center;
            
        }
        body{
            padding-top: 100px;
            background: powderblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form-markup" action="script.php" method="post" autocomplete="off">
            <div class="panel-heading">
            <h3>Registration form</h3>
            </div>
            <div class="form-group">
                <label>Name</label>
                
                        <input type="text" class="form-control" name="Name" placeholder="Enter your full name" required>
                    
            </div>
        
            <div class="form-group">
                <label>Email</label>
                    <input type="email" class="form-control" name="Email" placeholder="Email address" required> 
            </div>

            <div class="form-group">
                <label >Gender </label>
                <div>
                <input type="radio" name="Gender" value="Male" class="radio-inline" value="<?= $gen ?>"> Male
                <input type="radio" name="Gender" value="Female" class="radio-inline"> Female
                <input type="radio" name="Gender" value="Others" class="radio-inline"> Others
                </div>
            </div>
            <div class="form-group">
                <label >City</label>&nbsp &nbsp
                
                <select name="City" required>
                    <option value="Nagpur">Nagpur</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Pune">Pune</option>
                    <option value="Chennai">Chennai</option>
                </select>
                
            </div>
            <br><br>
           <input type="submit" class="btn btn-success btn-block" name="submit" value="submit">
        </form>
    </div>
</body>
</html>