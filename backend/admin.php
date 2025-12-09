<?php
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

            <li><a href="logout.php">
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
                            <th>Adoption Story</th>
                            <th>Submission Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM adoption_tbl ORDER BY adoption_id ASC";
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
                                                <select class='status-dropdown'>
                                                    <option value='pending'>Pending</option>
                                                    <option value='approved'>Approved</option>
                                                    <option value='rejected'>Rejected</option>
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
                            $sql_volunteer = "SELECT * FROM volunteer_tbl ORDER BY volunteer_id ASC";
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
                                                <select class='status-dropdown'>
                                                    <option value='pending'>Pending</option>
                                                    <option value='approved'>Approved</option>
                                                    <option value='rejected'>Rejected</option>
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
                e.preventDefault();
                const targetId = link.getAttribute('href').substring(1);
                showPage(targetId);
            });
        });

        // default page
        showPage('adoption');
    </script>
</body>
</html>