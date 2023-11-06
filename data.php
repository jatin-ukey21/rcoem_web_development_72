<html>
<head>
    <style>
        body{
            background: violet;
        }
        table{
            background-color: white;
        }
    </style>
</head>
    <body>
    <h2 align="center"><mark>Display Information</mark></h2>
    </body>
</html>
<?php
    function select()
    {
    try {
        $user = 'root';
        $pass = '';
        $pdo = new PDO('mysql:host=localhost;port=8086;dbname=tasks_app',$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            
        $qry = "select * from regis_data";
        $statement = $pdo->prepare($qry);
        $statement->execute();

        $rows = $statement->fetchAll();
    if($rows){
    echo "<center>";
    echo "<table border='1.5px' cellpadding = '10px' cellspacing='3px'>";
    echo "<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>City</th>
          </tr>";
         
      
        foreach($rows as $row)
        {
            echo "<tr>
        <td>".$row['Name']."</td> <td>".$row['Email']."</td> <td>".$row['Gender']."</td> <td>".$row['City']."</td>
        </tr>";
        }
    
    echo "</table>";
    echo "</center>";
    }
    else{
        echo "No records found in the database";
    }
    
    } catch (Exception $th) {
        echo $th->getMessage();
    }

    }

    select();
?>