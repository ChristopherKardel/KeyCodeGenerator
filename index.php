<!DOCTYPE html>
<html>
<head>
</head>
<body>


    <?php
        $dsn = "mysql:host=localhost;dbname=takeitorleaveit";
        $dbusername = "root";
        $dbpassword = "";

        try {
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        
        $key = rand(10000, 99999);
        
        try {
            $query = "INSERT INTO robuxkeys (Robux_Key) VALUES (?);";
            
            $stmt = $pdo->prepare($query);
            $stmt->execute([$key]);

            $pdo = null;
            $stmt = null;

            echo $key;
        
        } catch(PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
        

        
    
    ?>
</body>
</html>