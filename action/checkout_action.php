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
            $user_name = $_POST["username"];
            $ship_address = $_POST["address"].". ".$_POST["city"].". ".$_POST["zipcode"].". ".$_POST["state"].". ".$_POST["country"];
            $total_price = $_POST["grandTotalHidden"];

            // Get from Cart
            $booksOrdered = array();
            foreach ($tempCart as $id => $props) {
                $book = array("isbn"=>$props["isbn"], "quantity"=>$props["amt"], "subtotal"=>$props["price"], "title"=>$props["title"]);
                array_push($booksOrdered, $book);
            }

            // Get today's Date
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $today = date("Y-m-d H:i:s");
            
            // MySQL Queries
            $uid = getUID($conn);
            $orderQuery = "INSERT INTO orders (user_id, email, username, order_date, ship_address, total_price) VALUES (".$uid.", '".$user_email."', '".$user_name."', '".$today."', '".$ship_address."', ".$total_price.");";
            // Run Query 1: Order
            if ($conn->query($orderQuery) === TRUE) {
                $order_id = $conn->insert_id;
            } else {
                echo "Error Setting Order: " . $conn->error;
            }
            $orderDetailsQuery = getOrderDetailsQuery($order_id, $booksOrdered);
            // Run Query 2: Order Details
            if ($conn->query($orderDetailsQuery) === TRUE) {
                // Run Query 3: Reduce Quantity at Db
                $response = reduceDBQty($conn, $booksOrdered);
                if ($response === TRUE){
                    setcookie('cart','',time() - 1, "/");
                    header('Location:../checkout.php?order=success');
                }
                else{
                    echo "Error Reducing Book Quantity: ".$response;
                }
            } else {
                echo "Error Setting Order Details: " . $conn->error;
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
        $query = "INSERT INTO order_details (order_id, book_isbn, book_title, quantity, subtotal) VALUES ";
        foreach ($books as $book){
            if($counter === 0){
                $query = $query . "(" . $order_id . ", '" . $book['isbn']. "', '" . $book['title'] . "', " . $book['quantity'] . ", " . $book["subtotal"] . ")";
            }
            else{
                $query = $query . ", (" .$order_id . ", '" . $book['isbn']. "', '" . $book['title'] . "', " . $book['quantity'] . ", " . $book["subtotal"] . ")";
            }
            $counter++;
        }
        $query.=";";
        return $query;
    }
    
    /**
     * function to write MySQL queries and execute 
     * related queries for reducing book's quantity in db
     */
    function reduceDBQty($conn, $books){
        $reduceQuery = "";
        $qtyQuery = "SELECT isbn, quantity FROM book WHERE ";
        $counter = 0;
        
        // Get all current Quantity of Books frm Cart
        foreach ($books as $book) {
            if($counter === 0){
                $qtyQuery .= "isbn='".$book['isbn']."'";
            }
            else{
                $qtyQuery .= " OR isbn='".$book['isbn']."'";
            }
            $counter++;
        }
        $qtyQuery.=";";
        $result = $conn->query($qtyQuery);
        
        // Append reduce Query
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["quantity"] != null) {
                    foreach ($books as $book){
                        if ($book["isbn"] === $row["isbn"]){
                            $remaining = $row["quantity"] - $book["quantity"];
                            $reduceQuery = "UPDATE book SET quantity=".$remaining." WHERE isbn='".$row["isbn"]."';";
                            // Run Reduce Query
                            if ($conn->query($reduceQuery) !== TRUE) {
                                return $conn->error;
                            }
                        }
                    }
                } else {
                    echo 'No Quantity Field Found in Book!';
                }
            }
            return TRUE;
        }
        else{
            echo 'No Result found!';
        }
       
        // Query cannot run HERE because of mysql's max_allowed_packet where
        // statements that are too long are prohibited.
        
    }
    
    ?>
</html>