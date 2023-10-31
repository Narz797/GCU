<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLASS ADMISSION SLIPS</title>
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="../assets/slip.css">
</head>

<body>
    <!-- Header -->
<header class="header">
    <nav class="nav"> 
        <div class="logo">
            <a href="./index.php" ><img src="../assets/images/bsu.png" alt=""></a>
        </div>
        <div class="nav-mobile">
            <ul class="list">
                <li class="list-item">
                    <a href="../employee-home" class="list-link current">Home</a>
                </li>
                <li class="list-item hov">
                    <a href="../request-forms" class="list-link current1">Back</a>
                </li>
            </ul>
            <button class="icon-btn menu-toggle-btn menu-toggle-close place-items-center">
                <i class="ri-close-line"></i>
            </button>
        </div>
        <div class="align-right">
            <button class="icon-btn menu-toggle-btn menu-toggle-open place-items-center">
                <i class="ri-function-line"></i>
            </button>
            <button class="icon-btn theme-toggle-btn place-items-center">
                <i class="ri-sun-line theme-light-icon"></i>
                <i class="ri-moon-line theme-dark-icon"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="logout()">
                <i class="ri-user-3-line"></i>
            </button>
            <button class="icon-btn place-items-center" onclick="archive()">
            <i class="ri-archive-drawer-line"></i>
            </button>
        </div>
    </nav>
</header>
    <!-- Banner -->
<section>
    <section class="banner">
        <div class="banner-container">
    <br>
            <img src="../assets/images/GCU_logo.png" alt="">
            <div class="banner-text">
                <h5>REPUBLIC OF THE PHILIPPINES</h5>
                <hr class="banner-line">
                <h2><span>BENGUET STATE UNIVERSITY</span></h2>
                <h1>GUIDANCE AND COUNSELING UNIT</h1>
            </div>
        </div>
    </section>
    <div class="block"> 
    </div>
    <div class="title independent-title">
        <h2>Class Admission Slips</h2>
    </div>
    <!-- Start of Table -->
    <div class="container">
        <div class="card">
    <main class="table" id="customers_table">
        <section class="table-header">
            <h1>List of Tardy/Absent Students</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
            </div>
            <div class="export-file">
                <label for="export-file" class="export-file-btn" title="Export File"><img src="../assets/images/export.png" alt=""></label>
                <input type="checkbox" id="export-file">
                <div class="export-file-options">
                    <label>Export as&nbsp; &#10140;</label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="../assets/images/excel.png" alt=""></label>
                </div>
            </div>
        </section>
        <section class="table-body">
            <table>
                <thead>
                    <tr>
                        <th> Student Id <br> <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Last Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> First Name <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Year Level <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Course Taken <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Department / College <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Contact Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Guardian Number <br><span class="icon-arrow">&UpArrow;</span></th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 1234567 </td>
                        <td> <img src="../assets/images/male.jpg" alt="">Rizzler</td> 
                        <td>Chad</td>
                        <td>4th Year</td>
                        <td>Psychology </td>
                        <td>CIS </td>
                        <td>0987-6543-211 </td>
                        <td>0912-3456-789 </td>
                        <td> <a href="../forms/ca.php"><button>View</button></a></td>
                    </tr>
                    <tr>
                        <td> 2234567 </td>
                        <td> <img src="../assets/images/female.jpg" alt="">Akla</td> 
                        <td>Armatyse</td>
                        <td>1st Year</td>
                        <td>Computer Science </td>
                        <td>CIS </td>
                        <td>0987-6543-211 </td>
                        <td>0912-3456-789 </td>
                        <td> <a href="../forms/ca.php"><button>View</button></a></td>
                    </tr>
                    <tr>
                        <td> 3456789 </td>
                        <td> <img src="../assets/images/male.jpg" alt="">Ramelton</td> 
                        <td>Crown Vale</td>
                        <td>2nd Year</td>
                        <td>Architecture </td>
                        <td>CIS </td>
                        <td>0987-6543-211 </td>
                        <td>0912-3456-789 </td>
                        <td> <a href="../forms/ca.php"><button>View</button></a></td>
                    </tr>
                    <tr>
                        <td> 4455001 </td>
                        <td> <img src="../assets/images/female.jpg" alt="">Suzune</td> 
                        <td>Mina</td>
                        <td>3rd Year</td>
                        <td>Computer Science </td>
                        <td>CIS </td>
                        <td>0987-6543-211 </td>
                        <td>0912-3456-789 </td>
                        <td> <a href="../forms/ca.php"><button>View</button></a></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
        </div>
    </div>
</section>
<br>
<br>
<script>
function logout() {
    window.location.href = '../../home?logout=true';
}
function archive() {
    window.location.href = 'archive.php';
        }
</script>
<script src="../assets/main.js"></script>
<!-- <script src="../assets/js/table.js"></script>    -->
</body>
</html>