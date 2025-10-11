<?php
session_start();
require_once('../model/FAQModel.php');

$faqs = fetchFAQs();

if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<head>
    <title>Admin FAQ Management</title>
    <link rel="stylesheet" href="../asset/CSS/insertfaq.css">
    <script src="../asset/JS/faq.js" defer></script>
</head>
<body>

    <div class="logout-link">
        <a href="../controller/logout.php">Logout</a>
    </div>

    <div class="back-link">
        <a href="./AdminMenu.php">Back To Menu</a>
    </div>

    <div class="container">
        <h1>Manage FAQs</h1>
        <form method="post" action="../controller/addFAQ.php" onsubmit="return validateForm()">
            <table>
                <tr>
                    <th colspan="2">Add a New FAQ</th>
                </tr>
                <tr>
                    <td>Question:</td>
                    <td><textarea id="question" name="question" rows="4" cols="50" ></textarea></td>
                </tr>
                <tr>
                    <td>Answer:</td>
                    <td><textarea id="answer" name="answer" rows="6" cols="50" ></textarea></td>
                </tr>
                <tr>
                    <td>Type of Question:</td>
                    <td>
                        <input type="radio" id="type" name="type" value="transaction" required>Transaction
                        <input type="radio" id="type" name="type" value="update_profile">Profile Update
                        <input type="radio" id="type" name="type" value="management">Management
                    </td>
                </tr>
                <tr>
                    <td>Visible To:</td>
                    <td>
                        <input type="radio" id="user_type" name="user_type" value="traveller" required>Traveller
                        <input type="radio" id="user_type" name="user_type" value="both">Both
                        <input type="radio" id="user_type" name="user_type" value="operator">Operator
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="faq_submit" value="Add FAQ">
                    </td>
                </tr>
            </table>
        </form>

        <h2>Existing FAQs</h2>

        <table>
            <tr>
                <th>Question</th>
                <th>Answer</th>
                <th>Type</th>
                <th>Visible To</th>
            </tr>
            <?php if (!empty($faqs)) { ?>
                <?php foreach ($faqs as $faq) { ?>
                    <tr>
                        <td><?= $faq['question'] ?></td>
                        <td><?= $faq['answer'] ?></td>
                        <td><?= $faq['type'] ?></td>
                        <td><?= $faq['user_type'] ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="4" align="center">No FAQs available</td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>
</html>
