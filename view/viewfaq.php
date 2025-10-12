<?php
    session_start();
    require_once('../model/FAQModel.php');
    require_once('../model/userModel.php');

    $username=$_SESSION['username'];
    $usertype=getUserType($username);

    if(!isset($_COOKIE['status'])){
        header('location: login.html');  
    }
    $filter = isset($_GET['type']) ? $_GET['type'] : null;

    $faqs = fetchFAQsbyType($filter,$usertype);
?>

<html>
    <head>
    <link rel="stylesheet" href="../asset/css/viewfaq.css">
    </head>
    <body>
        <?php if ($usertype == 'admin') { ?>
            <div class="back-link"><a href="./Admin_menu.php">Back</a></div>
        <?php } elseif ($usertype == 'operator') { ?>
            <div class="back-link"><a href="./Operator_menu.php">Back</a></div>
        <?php } elseif ($usertype == 'traveller') { ?>
            <div class="back-link"><a href="./Traveller_menu.php">Back</a></div>
        <?php } ?>
        <div class="logout-link"><a href="../controller/logout.php">Logout</a></div>

        <div class="container">
            <h1>FAQs</h1>
            <form method="get" action="">
                <label for="type">Type:</label>
                <select name="type" id="type">
                    <option value="">All</option>
                    <option value="transaction">Transaction</option>
                    <option value="update_profile">Update Profile</option>
                    <option value="management">Management</option>
                </select>
                <input type="submit" value="Filter">
            </form>

            <div class="faq-section">
                <table border="1" cellspacing="0" cellpadding="5">
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Type</th>
                    </tr>
                    <?php if (!empty($faqs)) { ?>
                        <?php foreach ($faqs as $faq) { ?>
                            <tr>
                                <td><?= $faq['question'] ?></td>
                                <td><?= $faq['answer'] ?></td>
                                <td><?= $faq['type']?></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3" align="center">No FAQs available</td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </body>
</html>