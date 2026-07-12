<?php
session_start();
include "../connection.php";
$uid = $_SESSION['uid'];
$qry = "SELECT * FROM `user_reg` WHERE `u_id` = '$uid'";
$res = mysqli_query($con,$qry);
$row = mysqli_fetch_array($res);
$rid = $_GET['rid'];
$book_qry = "SELECT * FROM `book_request` WHERE `br_id` = $rid";
$book_res = mysqli_query($con,$book_qry);
$book_row = mysqli_fetch_array($book_res);
$llid = $book_row['l_id'];
$lab_qry = "SELECT * FROM `labour_reg` WHERE `l_id` = $llid";
$lab_res = mysqli_query($con,$lab_qry);
$lab_row = mysqli_fetch_array($lab_res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Format</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #333;
        }
        .invoice-header .company-details {
            text-align: right;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details h2 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }
        .invoice-details .date {
            margin-top: 10px;
            color: #777;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-table th, .invoice-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .invoice-table th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
        }
        .total .amount {
            font-size: 1.5em;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="invoice-header">
            <div class="company-details">
                <h1><?php echo $lab_row['name'] ?></h1>
                <p><?php echo $lab_row['email'] ?></p>
                <p><?php echo $lab_row['phonenumber'] ?></p>
                <p><?php echo $lab_row['place'] ?></p>
            </div>
            <div class="invoice-title">
                <h2>Invoice</h2>
                <p class="date">Date: <?php echo $book_row['date']; ?></p>
            </div>
        </div>
        <div class="invoice-details">
            <h2>Bill To:</h2>
            <p><?php echo $row['name'] ?></p>
            <p><?php echo $row['place'] ?></p>
            <p><?php echo $row['email'] ?></p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>From</th>
                    <th>To</th>
                    <th>Description</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $book_row['from'] ?></td>
                    <td><?php echo $book_row['to'] ?></td>
                    <td><?php echo $book_row['description'] ?></td>
                    <td><?php echo $book_row['amount'] ?></td>
                </tr>
            </tbody>
        </table>
        <div class="total">
            <p class="amount">Total: ₹<?php echo $book_row['amount'] ?>.00</p>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button class="btn btn-dark" onclick="window.print()">Print</button>
            <a href="user_vw_history.php"><button class="btn btn-danger">Back</button></a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
