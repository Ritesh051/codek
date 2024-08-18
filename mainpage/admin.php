<?php

@include '../main page/database.php';
require_once "../main page/controllerUserData.php";

if(!isset($_SESSION['admin_name'])){
   header('location:../main page/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon_io/favicon-16x16.png">

    <link rel="manifest" href="/site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../main page/CSS/admin.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="logo">
                    <!--<img src="../images/Logo.png" alt="">-->
                    <h2>COD<span class="primary">EK</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-symbols-outlined">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-symbols-outlined">person</span>
                    <h3>Users</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">insights</span>
                    <h3>Analytics</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">mark_email_unread</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">grid_view</span>
                    <h3>Products</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">inventory</span>
                    <h3>Report</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">settings</span>
                    <h3>Settings</h3>
                </a>
                <a href="">
                    <span class="material-symbols-outlined">add</span>
                    <h3>Add Products</h3>
                </a>
                <a href="../main page/logout.php">
                    <span class="material-symbols-outlined">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <h1>Dashboard</h1>
            <div class="date">
                <input type="date">
            </div>
            <div class="insights">
                <div class="sales">
                    <span class="material-symbols-outlined">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Sales</h3>
                            <h1>$67,424</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24hr salse</small>
                </div>
                <!---End of sales-->
                <div class="expenses">
                    <span class="material-symbols-outlined">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Expenses</h3>
                            <h1>$20,424</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>60%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24hr salse</small>
                </div>
                <!---End of expenses-->
                <div class="income">
                    <span class="material-symbols-outlined">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Income</h3>
                            <h1>$89,424</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx='38' cy='38' r="36"></circle>
                            </svg>
                            <div class="number">
                                <p>81%</p>
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">Last 24hr salse</small>
                </div>
                <!---End of income-->
            </div>
            <!----End of insights-->
            <div class="recent-orders">
                <h2>Recent Orders</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Name </th>
                            <th>Product Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>MERN Stack</td>
                            <td>3213</td>
                            <td>Done</td>
                            <td class="success">Paid</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>MERN Stack</td>
                            <td>3213</td>
                            <td>due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>MERN Stack</td>
                            <td>3213</td>
                            <td>due</td>
                            <td class="warning">Pending</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>MERN Stack</td>
                            <td>3213</td>
                            <td>Done</td>
                            <td class="success">Paid</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>MERN Stack</td>
                            <td>3213</td>
                            <td>Done</td>
                            <td class="success">Paid</td>
                            <td class="primary">Details</td>
                        </tr>
                        <tr>
                            <td>MERN Stack</td>
                            <td>3213</td>
                            <td>Done</td>
                            <td class="success">Paid</td>
                            <td class="primary">Details</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#">Show All</a>
            </div>
        </main>
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-symbols-outlined">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-symbols-outlined active">light_mode</span>
                    <span class="material-symbols-outlined">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p> Hey <b> <?php echo $_SESSION['admin_name'] ?> </b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../images/AdminPanal/profile-1.jpg" alt="">
                    </div>
                </div>
            </div>
            <!---End OF TOP-->
            <div class="recent-updates">
                <h2>Recent Updates</h2>
                <div class="updates">
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../images/AdminPanal/profile-2.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Sid kohad :- </b>recevied his product MERN Stack.</p>
                            <small class="text-muted">2 Minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../images/AdminPanal/profile-3.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Tapas Gautam :- </b>recevied his product MERN Stack.</p>
                            <small class="text-muted">2 Minutes ago</small>
                        </div>
                    </div>
                    <div class="update">
                        <div class="profile-photo">
                            <img src="../images/AdminPanal/profile-4.jpg" alt="">
                        </div>
                        <div class="message">
                            <p><b>Mnika Rane :- </b>recevied his product MERN Stack.</p>
                            <small class="text-muted">2 Minutes ago</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------End of Recent Updates----------------->
            <div class="sales-analytics">
                <h2>Sales Analytics</h2>
                <div class="items online">
                    <div class="icon">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>ONLINE ORDERS</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3>3524</h3>
                    </div>
                </div>
                <div class="items customers">
                    <div class="icon">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>NEW CUSTOMERS</h3>
                            <small class="text-muted">Last 24 Hours</small>
                        </div>
                        <h5 class="success">+25%</h5>
                        <h3>1524</h3>
                    </div>
                </div>
                <div class="items add-product">
                    <div>
                        <span class="material-symbols-outlined">add</span>
                        <a href=""><h3>Add Products</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../main page/admin.js"></script>

</body>

</html>