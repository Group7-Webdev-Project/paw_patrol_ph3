<?php
    session_start();
    
    // Prevent caching to ensure session checks work properly
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    
    // Check if user is logged in
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: login.php");
        exit();
    }
    
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paw Patrol | Admin Access</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header class="org-name">
        <div class="org-img-container">
            <img src="../frontend/images/logo1.png" alt="">
        </div>
        <h1>Paw Patrol</h1>
    </header>

    <main class="main-content">

        <nav class="collapsed" id="navbar">
            <button id="toggle-nav"><span class="material-symbols-outlined">menu</span></button>
            <li><a href="#adoption">
                <span class="material-symbols-outlined">pets</span>
                <span class="label">Adoption</span>
            </a></li>

            <li><a href="#donation">
                <span class="material-symbols-outlined">volunteer_activism</span>
                <span class="label">Donation</span>
            </a></li>

            <li><a href="#volunteer">
                <span class="material-symbols-outlined">person_raised_hand</span>
                <span class="label">Volunteer</span>
            </a></li>

            <li><a href="logout.php" id="logout-link">
                <span class="material-symbols-outlined">logout</span>
                <span class="label">Logout</span>
            </a></li>
        </nav>

        <section class="admin-page" id="adoption">
            <h2>Adoption Dashboard</h2>
            <div class="table-container">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Pet Name</th>
                            <th>Pet Breed</th>
                            <th>Home Type</th>
                            <th class="adopt-story">Adoption Story</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM adoption_tbl ORDER BY status ASC, submission_date DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "
                                        <tr>
                                            <td>" . htmlspecialchars($row['adoption_id']) . "</td>
                                            <td>" . htmlspecialchars($row['adopter_name']) . "</td>
                                            <td>" . htmlspecialchars($row['adopter_email']) . "</td>
                                            <td>" . htmlspecialchars($row['adopter_phone']) . "</td>
                                            <td>" . htmlspecialchars($row['pet_name']) . "</td>
                                            <td>" . htmlspecialchars($row['pet_breed']) . "</td>
                                            <td>" . htmlspecialchars($row['home_type']) . "</td>
                                            <td>" . htmlspecialchars($row['adoption_story']) . "</td>
                                            <td>" . htmlspecialchars($row['submission_date']) . "</td>
                                            <td>
                                                <select class='adopt-status status-dropdown' data-id='" . $row['adoption_id'] ."'>
                                                    <option value='Pending' " . ($row['status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                                    <option value='Approved' " . ($row['status'] == 'Approved' ? 'selected' : '') . ">Approved</option>
                                                    <option value='Rejected' " . ($row['status'] == 'Rejected' ? 'selected' : '') . ">Rejected</option>
                                                </select>
                                            </td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='no-record'>No adoption requests found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </section>

        <section class="admin-page" id="donation">
            <h2>Donation Dashboard</h2>
            <div class="table-container">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Donor Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Amount</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_donate = "SELECT * FROM donation_tbl ORDER BY donation_id ASC";
                            $result_donate = $conn->query($sql_donate);

                            if ($result_donate->num_rows > 0) {
                                while($row = $result_donate->fetch_assoc()) {
                                    echo "
                                        <tr>
                                            <td>" . htmlspecialchars($row['donation_id']) . "</td>
                                            <td>" . htmlspecialchars($row['donor_name']) . "</td>
                                            <td>" . htmlspecialchars($row['donor_email']) . "</td>
                                            <td>" . htmlspecialchars($row['donor_contact']) . "</td>
                                            <td>" . htmlspecialchars('₱' . number_format($row['donation_amount'], 2)) . "</td>
                                            <td class='message-cell'>" . htmlspecialchars($row['donor_message']) . "</td>
                                            <td>" . htmlspecialchars($row['donation_date']) . "</td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='8' class='no-record'>No donation records found.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="admin-page" id="volunteer">
            <h2>Volunteer Dashboard</h2>
            <div class="table-container">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Availability</th>
                            <th>Commitment</th>
                            <th>Area of Interest</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql_volunteer = "SELECT * FROM volunteer_tbl ORDER BY status ASC, submission_date DESC";
                            $result_volunteer = $conn->query($sql_volunteer);

                            if ($result_volunteer->num_rows > 0) {
                                while($row = $result_volunteer->fetch_assoc()) {
                                    echo "
                                        <tr>
                                            <td>" . htmlspecialchars($row['volunteer_id']) . "</td>
                                            <td>" . htmlspecialchars($row['volunteer_name']) . "</td>
                                            <td>" . htmlspecialchars($row['volunteer_email']) . "</td>
                                            <td>" . htmlspecialchars($row['volunteer_phone']) . "</td>
                                            <td>" . htmlspecialchars($row['availability']) . "</td>
                                            <td>" . htmlspecialchars($row['commitment']) . "</td>
                                            <td>" . htmlspecialchars($row['area_of_interest']) . "</td>
                                            <td>" . htmlspecialchars($row['submission_date']) . "</td>
                                            <td>
                                                <select class='vol-status status-dropdown' data-id='" . $row['volunteer_id'] . "'>
                                                    <option value='Pending' " . ($row['status'] == 'Pending' ? 'selected' : '') . ">Pending</option>
                                                    <option value='Approved' " . ($row['status'] == 'Approved' ? 'selected' : '') . ">Approved</option>
                                                    <option value='Rejected' " . ($row['status'] == 'Rejected' ? 'selected' : '') . ">Rejected</option>
                                                </select>
                                            </td>
                                        </tr>
                                    ";
                                }
                            } else {
                                echo "<tr><td colspan='9' class='no-record'>No volunteer applications found.</td></tr>";
                            }

                            $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        const toggleBtn = document.getElementById('toggle-nav');
        const navbar = document.getElementById('navbar');

        toggleBtn.addEventListener('click', () => {
            navbar.classList.toggle('expanded');
            navbar.classList.toggle('collapsed');
        });

        // page navigation logic
        const navLinks = document.querySelectorAll('#navbar a');
        const pages = document.querySelectorAll('.admin-page');

        function showPage(id) {
             // hide all pages
            pages.forEach(page => page.style.display = 'none');

            // selected page
            const target = document.getElementById(id);
            if (target) target.style.display = 'flex';

            // Highlight active nav
            navLinks.forEach(link => link.classList.remove('active'));
            const activeLink = document.querySelector(`#navbar a[href="#${id}"]`);
            if (activeLink) activeLink.classList.add('active');
        }

        // clicks
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                // Allow logout link to navigate normally
                if (link.id === 'logout-link') {
                    return;
                }
                
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                showPage(targetId);
            });
        });

        // default page
        showPage('adoption');


        // Adoption Status
        function adoptionStatus() {
            document.querySelectorAll(".adopt-status").forEach(dropdown => {
                dropdown.addEventListener("change", function () {
                    const adoptionID = this.dataset.id;
                    const newStatus = this.value;

                    fetch("update_adoption_status.php", {
                        method: "POST",
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            adoption_id: adoptionID,
                            status: newStatus
                        })
                    })
                    .then(res => res.text())
                    .then(data => {
                        console.log("Updated response:", data);
                        alert("Status updated!");
                    })
                    .catch(err => console.error("Error updating:", err));
                });
            });
        }

        // Volunteer Status 
        function volunteerStatus() {
            document.querySelectorAll(".vol-status").forEach(dropdown => {
                dropdown.addEventListener("change", function () {
                    const volunteerID = this.dataset.id;
                    const newStatus = this.value;
                    
                    fetch("update_volunteer_status.php", {
                        method: "POST",
                        headers: {"Content-Type": "application/json"},
                        body: JSON.stringify({
                            volunteer_id: volunteerID,
                            status: newStatus
                        })
                    })
                    .then(res => res.text())
                    .then(data => {
                        console.log("Updated response:", data);
                        alert("Volunteer status updated!");
                    })
                    .catch(err => console.error("Error updating volunteer status:", err));
                });
            });
        }

        // Setup when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            adoptionStatus();
            volunteerStatus();
        });
    </script>
</body>
</html>