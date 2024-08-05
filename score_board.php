<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Score Board</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        #scoreboard {
            width: 50%;
            margin: auto;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            border: 1px solid #333;
        }
        th {
            background-color: #333;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        #scoreTableBody .top-scorer {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            highlightTopScorer();
        });

        function highlightTopScorer() {
            var rows = document.getElementById('scoreTableBody').getElementsByTagName('tr');
            if (rows.length > 1) {
                var maxScore = -1;
                var topScorerRow = null;

                for (var i = 1; i < rows.length; i++) {
                    var scoreCell = rows[i].getElementsByTagName('td')[1];
                    var score = parseInt(scoreCell.innerText);

                    if (!isNaN(score) && score > maxScore) {
                        maxScore = score;
                        topScorerRow = rows[i];
                    }
                }

                if (topScorerRow !== null) {
                    topScorerRow.classList.add('top-scorer');
                }
            }
        }
    </script>
</head>
<body>
    <h1>Quiz Score Board</h1>

    <div id="scoreboard">
        <h2></h2>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody id="scoreTableBody">
                <?php
                    $servername = "localhost";
                    $db_username = "root";
                    $password = "sandesh";
                    $dbname = "login";
    
                    // Create connection
                    $conn = new mysqli($servername, $db_username, $password, $dbname);
    
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
    
                    // SQL query to retrieve scores
                    $sql = "SELECT username, score FROM quiz_scores";
                    $result = $conn->query($sql);
    
                    // Check if there are rows in the result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>{$row['username']}</td><td>{$row['score']}</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='2'>No scores available</td></tr>";
                    }
    
                    // Close the database connection
                    $conn->close();
    
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
