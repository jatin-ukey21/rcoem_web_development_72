<?php
    class formdata{
        public string $Name;
        public string $email;
        public string $gender;
        public string $city;
        public $pdo;

        public function __construct(string $Name,string $email,string $gender,string $city)
        {
            global $pdo;
            $user = 'root';
            $pass = '';
                
            $this->Name=$Name;
            $this->email=$email;
            $this->gender=$gender;
            $this->city=$city;

            $pdo = new PDO('mysql:host=localhost;port=8086;dbname=tasks_app',$user,$pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
        }
        public function insert()
        {
            global $pdo;
            try {
                // $user = 'root';
                // $pass = '';
                // // $pdo = new PDO('mysql:host=localhost;port=8086;dbname=tasks_app',$user,$pass);
                // $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                
                $data = ['Name' => $this->Name, 
                        'Email' => $this->email,
                        'Gender' => $this->gender,
                        'City' => $this->city];

                $sql = "insert into regis_data values(:Name,:Email,:Gender,:City)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute($data);
                echo "all data field successfully<br>";
            } catch (Exception $th) {
                echo $th->getMessage();
            }
        }
        
    
    }
    
    $pattern_e = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
    if(isset($_POST['submit']))
    {
        if (empty($_POST['Name'])) {
            echo "Please write your name";
        }
        else if(empty($_POST['Gender']))
        {
            echo 'Please select the gender';
        }
        else if (empty($_POST['Email'])) {
            echo "Please write the email";
        }
        else if(empty($_POST['City'])){
            echo "Please select city ";
        }
        else if(!preg_match($pattern_e,$_POST['Email'])){
            echo "Please enter valid email id";
        }
        else{
               
            $name = $_POST['Name'];
            $gen = $_POST['Gender'];
            $email = $_POST['Email'];
            $city = $_POST['City'];
            
            $data = new formdata($name,$email,$gen,$city);
            $data->insert();
           # $data->select();
            
        }
    } 
?>
<html>
    <body>
        <a href="data.php">Click here to view the records</a>
    </body>
</html>