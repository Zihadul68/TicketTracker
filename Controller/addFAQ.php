<?php 
session_start();
require('../model/FAQModel.php');

if (!isset($_COOKIE['status'])) {
    header('location: ../view/login.html');  
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);
    $type = isset($_POST['type']) ? trim($_POST['type']) : '';
    $user_type = isset($_POST['user_type']) ? trim($_POST['user_type']) : '';

    if (!empty($question) && !empty($answer) && !empty($type) && !empty($user_type)) {
        $status = insertfaq($question, $answer, $type, $user_type);

        if ($status) {
            echo "<script>
                    alert('FAQ inserted successfully!');
                    window.location.href = '../view/insertfaq.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to insert FAQ. Please try again.');
                    window.location.href = '../view/insertfaq.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('All fields are required!');
                window.location.href = '../view/insertfaq.php';
              </script>";
    }
} else {
    header('location: ../view/insertfaq.php');
    exit;
}
?>
