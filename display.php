<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Records</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h2>Records</h2>
    <?php
    // Database connection details (replace with your actual credentials)
    $host = "localhost";
    $dbname = "zakevent";
    $username = "root";
    $password = "";

    try {
        // Establish database connection
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Fetch data from the database
        $stmt = $conn->prepare("SELECT * FROM event");
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($records) > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Guests</th><th>Action</th></tr>";
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>{$record['name']}</td>";
                echo "<td>{$record['email']}</td>";
                echo "<td>{$record['phone']}</td>";
                echo "<td>{$record['guests']}</td>";
                echo "<td><a href='delete.php?id={$record['id']}'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found";
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close connection
    $conn = null;
    ?>
</body>
</html>
