<?php 
   if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = isset($_GET['id']) ? $_GET['id'] : "home";
    
    switch ($id) {
        case "home":
            include "./assets/pages/main_dashboard.php";
            break;
        case "employee":
            include "./assets/pages/employee.php";
            break;
        case "orders":
            include "./assets/pages/orders.php";
            break;
        default:
            include "./assets/pages/main_dashboard.php";
            break;
    }
} else {  
    include "./assets/pages/main_dashboard.php";
}


?>