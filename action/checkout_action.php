<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Processing...</title>
        
        <?php
        require '../modules/link.php';
        ?>
    </head>
    
    <?php
    require '../modules/dbconnect.php';
    ?>
    
    <?php
// =================================================== MAIN ========================================================
    if(isset($_POST["submit"])){
        // Get from COOKIES
        if (isset($_COOKIE['cart'])) { 
            $tempCart = json_decode($_COOKIE['cart'], true);
            echo 'Processing Order...';

            // Get from POST
            $user_email = $_POST["email"];
            $ship_address = $_POST["address"].". ".$_POST["city"].". ".$_POST["zipcode"].". ".$_POST["state"].". ".$_POST["country"];
            $total_price = $_GET["grand"];

            // Get from Cart
            $booksOrdered = array();
            foreach ($tempCart as $id => $props) {
                $book = array("isbn"=>$props["isbn"], "quantity"=>$props["amt"], "subtotal"=>$props["price"]);
                array_push($booksOrdered, $book);
            }

            // MySQL Queries
            $uid = getUID($conn);
            $orderQuery = "INSERT INTO orders (user_id, ship_address, total_price) VALUES (".$uid.", '".$ship_address."', ".$total_price.");";
            // Run Query 1: Order
            if ($conn->query($orderQuery) === TRUE) {
                $order_id = $conn->insert_id;
            } else {
                echo "Error: " . $conn->error;
            }
            $orderDetailsQuery = getOrderDetailsQuery($order_id, $booksOrdered);
            // Run Query 2: Order Details
            if ($conn->query($orderDetailsQuery) === TRUE) {
                setcookie('cart','',time() - 1, "/");
                header('Location:../checkout.php?order=success');
            } else {
                echo "Error: " . $conn->error;
            }
        }
        else{
            echo 'No Cart Found!';
        }
    }
    else{
        echo 'No Order Placed!';
    }
// =================================================== END MAIN ========================================================
    /**
     * 
     * function to retrieve user_id from SESSION using email
     */
    function getUID($conn){
        session_start();
        if(isset($_SESSION['email'])){
            $uidQuery = "SELECT user_id FROM user WHERE email = '".$_SESSION['email']."';";
            $result = mysqli_query($conn, $uidQuery);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    return $row["user_id"];
                }
            }
        }
        else{
            echo 'User Not Found!';
        }
    }
    
    /**
     * 
     * function to append and return query for order_details table
     * with details from Cookies and order_id
     */
    function getOrderDetailsQuery($order_id, $books){
        $counter = 0;
        $query = "INSERT INTO order_details (order_id, book_isbn, quantity, subtotal) VALUES ";
        foreach ($books as $book){
            if($counter === 0){
                $query = $query . "(" . $order_id . ", '" . $book['isbn'] . "', " . $book['quantity'] . ", " . $book["subtotal"] . ")";
            }
            else{
                $query = $query . ", (" .$order_id . ", '" . $book['isbn'] . "', " . $book['quantity'] . ", " . $book["subtotal"] . ")";
            }
            $counter++;
        }
        $query.=";";
        return $query;
    }
    
    ?>
</html>