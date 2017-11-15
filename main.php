<?php
/**
 * Created by PhpStorm.
 * User: henry
 * Date: 22/02/15
 * Time: 19:07
 */

function connect(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "herring";

    $conn = mysqli_connect($host, $user, $pass, $db);

    return $conn;
}


function subscribe($email){
    $conn = connect();
    $query = "INSERT INTO hr_newsletter VALUES ('$email')";
    mysqli_query($conn, $query);
    header("Location: index.php?e=4");

}

function register($email, $fname, $sname, $pcode, $pass) {
    $conn = connect();
    $check = "SELECT `email` FROM `hr_customer` WHERE email = '$email'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) === 0) {
        $query = "INSERT INTO hr_customer VALUES ('$email', '$fname', '$sname', '$pcode', '$pass')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        header("location: login.php?e=1");
    } else {
        header("location: register.php?e=1");
    }
}

function login($email, $pass) {
    $conn = connect();
    $query = "SELECT * FROM `hr_customer` WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)) {
        $fname = $row[fname];
    }

    mysqli_close($conn);
    if (mysqli_num_rows($result) === 1) {
        session_start();
        setcookie("fname", $fname, time() + (86400 * 30), "/"); //Set a cookie for a day
        setcookie("email", $email, time() + (86400 * 30), "/");
        header("location: index.php?e=1");
    } else {
        header("Location: login.php?e=2");
    }
}

function display_products() {
    $conn = connect();
    $query = "SELECT * FROM `hr_product`";
    $results = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($results)) {
        echo "<div class='content-section-a'>
            <div class='container''>
                <div class='row'>
                    <div class='col-lg-5 col-sm-6'>
                        <hr class='section-heading-spacer'>
                        <div class='clearfix'></div>
                            <h2 class='section-heading'>$row[name]</h2>
                            <p class = 'lead'>$row[description] £$row[price]</p>
                            <form action = 'addtobasket.php' method = 'post'>
                                <input type = 'submit' value = 'Add $row[name] To Basket' name = '$row[pid]'/>
                            </form>
                        </div>
                        <div class='col-lg-5 col-lg-offset-2 col-sm-6'>
                            <img class='img-responsive' src='$row[imagepath]' alt=''>
                        <?php
                            display_products();
                        ?>
                    </div>
                </div>

            </div>
            <!-- /.container -->
        </div>";
    }
}

function add_to_basket($pid) {
    session_start();
    if (isset($_SESSION['basket'])) {
        if (array_key_exists($pid, $_SESSION['basket'])) {
            $_SESSION['basket'][$pid]++;
        } else {
            $_SESSION['basket'][$pid] = 1;
        }
    } else {
        $_SESSION['basket'] = array($pid => 1);
    }
}

function display_basket_items() {
            $wholetotal = 0;
            if(isset($_SESSION['basket'])) {
                echo " <p>Edit your basket items here, enter 0 to remove the item from your basket!</p>";
                echo "<tr><th>Item</th><th></th><th>Amount</th><th>Price</th></tr>";
                foreach ($_SESSION['basket'] as $pid => $amount) {
                    $conn = connect();
                    $query = "SELECT * FROM `hr_product` WHERE pid = '$pid'";
                    $results = mysqli_query($conn, $query);
                    mysqli_close($conn);
                        while ($row = mysqli_fetch_array($results)) {
                            $total = $row['price']*$amount;
                            echo "<tr><td>" . $row['name'] . "</td><td><img src = ".$row['imagepath']." alt = ''></td><form action = 'updatebasket.php' method = 'post'><td><input type = 'text' hidden = 'true' value = ".$row['pid']." name = 'id'><input type ='text' value = ".$amount." name = 'amount' size = '2' align = 'center'></td><td>£" . $total . "</td><td><input type = 'submit' value = 'Update Basket'></td><form action = 'removebasket.php' method = 'post'></tr></form>";
                            $wholetotal += $total;
                        }
                }

                echo "<tr><td></td><td></td><td></td><td>Total: £" . $wholetotal . "</td></tr>";
                echo "<tr><td></td><td></td><td><form action = 'order.php' method = 'post'><input type = 'submit' value = 'Place Order'></form></td></tr>";
            } else {
                echo "You have nothing in your basket";
            }
}

function order() {
    session_start();
    if (isset($_COOKIE['email'])) {
        $conn = connect();
        $email = $_COOKIE['email'];
        $query = "INSERT INTO hr_order VALUES (NULL, '$email')";
        mysqli_query($conn, $query);
        $oid = mysqli_insert_id($conn);
            foreach($_SESSION['basket'] as $pid => $amount) {
                    $conn = connect();
                    $insert = "INSERT INTO hr_orderitems VALUES ('$oid', '$pid', '$amount')";
                    mysqli_query($conn, $insert);
                    mysqli_close($conn);
            }
        echo "<script type = text/javascript>
                        alert('Thank you for ordering!');
                        window.location = 'orderconfirm.php?oid=$oid';
                </script>";
        unset($_SESSION['basket']);
        mysqli_close($conn);
    } else {
        header("location: login.php?e=3");
    }
}

function display_order($oid) {
        $conn = connect();
        $request = "SELECT * FROM hr_product LEFT JOIN hr_orderitems on hr_product.pid = hr_orderitems.pid WHERE hr_orderitems.oid = '$oid'";
        $second = mysqli_query($conn, $request);
        mysqli_close($conn);
        echo "<p>Thank you for ordering with us today! You should receive an email shortly confirming your order of: </p>";
        while ($rows = mysqli_fetch_array($second)) {
            echo "<p>".$rows['qty'] . " x " . $rows['name'] . "</p>";
        }


}

function change_password($password) {
    session_start();
    if (isset($_COOKIE['email'])) {
        $key_value = "e14D8gF2ff";
        $encrypted = mcrypt_ecb(MCRYPT_DES, $key_value, $password, MCRYPT_ENCRYPT);
        $conn = connect();
        $email = $_COOKIE['email'];
        $query = "UPDATE hr_customer SET pass = '$encrypted' WHERE email = '$email'";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        header("location: account.php?e=1");
    } else {
        header("location: login.php?e=3");
    }
}

function updateBasket($pid, $amounts)
{
    session_start();
    if ($amounts > 0) {
        if (isset($_SESSION['basket'][$pid])) {
            $_SESSION['basket'][$pid] = $amounts;
            header("location: basket.php");
        } else {
            $_SESSION['basket'][$pid]++;
            header("location: basket.php");
        }
    } else {
        unset($_SESSION['basket'][$pid]);
        header("location: basket.php");
    }
}

?>