<?php
    function getConnectionforBus() {
        $con = mysqli_connect('127.0.0.1', 'root', '', 'tickettracker');
        return $con;
    }

    function getTotalBusbyuser($username) {
        $con = getConnectionforBus();
        $sql = "SELECT * FROM buses WHERE username= '{$username}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        return $count;

    }

    function getTotalACBusbyuser($username) {
        $con = getConnectionforBus();
        $sql = "SELECT * FROM buses WHERE username= '{$username}' AND busType='AC'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        return $count;

    }

    function getTotalnonACBusbyuser($username) {
        $con = getConnectionforBus();
        $sql = "SELECT * FROM buses WHERE username= '{$username}' AND busType='nonAC'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        return $count;

    }
    function getTotalSeaterBusbyuser($username) {
        $con = getConnectionforBus();
        $sql = "SELECT * FROM buses WHERE username= '{$username}' AND busType='Seater'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        return $count;

    }

    function getTotalSleeperBusbyuser($username) {
        $con = getConnectionforBus();
        $sql = "SELECT * FROM buses WHERE username= '{$username}' AND busType='Sleeper'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        return $count;

    }

?>