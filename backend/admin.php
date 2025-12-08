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
            <div class="adopt-card-container">
                <?php
                    // Re-include config.php or ensure connection is open here if it was closed prematurely
                    // Assuming $conn is available from the initial 'include config.php'

                    $sql = "SELECT * FROM adoption_tbl ORDER BY submission_date DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "
                                <article class='adopt-card'>
                                    <div class='adopter-info'>
                                        <aside class='left-col'>
                                            <span><b>Adoption ID: </b>" . htmlspecialchars($row['adoption_id']) . "</span>
                                            <span><b>Name: </b>" . htmlspecialchars($row['adopter_name']) . "</span>
                                            <span><b>Email: </b>" . htmlspecialchars($row['adopter_email']) . "</span>
                                        </aside>
                                        <aside class='right-col'>
                                            <span><b>Phone: </b>" . htmlspecialchars($row['adopter_phone']) . "</span>
                                            <span><b>Other Pets:</b>" . htmlspecialchars($row['other_pets']) . "</span>
                                            <span><b>Home Type: </b>" . htmlspecialchars($row['home_type']) . "</span>
                                        </aside>
                                    </div>
                                    <p><b>Address: </b>" . htmlspecialchars($row['adopter_address']) . "</p>
                                    <p><b>Story: </b>" . htmlspecialchars($row['adoption_story']) . "</p>
                                    <p><b>Pet Name: </b>" . htmlspecialchars($row['pet_name']) . "</p>
                                    <p><b>Pet Breed: </b>" . htmlspecialchars($row['pet_breed']) . "</p>
                                    <p><b>Pet Age: </b>" . htmlspecialchars($row['pet_age']) . "</p>
                                    <p><b>Submission Date: </b>" . htmlspecialchars($row['submission_date']) . "</p>
                                </article>
                            ";
                        }
                    } else {
                        echo "<p class='no-adopt-record'>No adoption requests found.</p>";
                    }
                    // Removed the premature $conn->close();
                ?>
            </div>
            
        </section>

        <section class="admin-page" id="donation">
            <h2>Donation Dashboard</h2>
            <div class="adopt-card-container">
                <?php
                    // Assuming $conn is still open
                    $sql_donate = "SELECT * FROM donation_tbl ORDER BY donation_date DESC";
                    $result_donate = $conn->query($sql_donate);

                    if ($result_donate->num_rows > 0) {
                        while($row = $result_donate->fetch_assoc()) {
                            echo "
                                <article class='adopt-card donation-card'>
                                    <div class='adopter-info'>
                                        <aside class='left-col'>
                                            <span><b>Donation ID: </b>" . htmlspecialchars($row['donation_id']) . "</span>
                                            <span><b>Donor Name: </b>" . htmlspecialchars($row['donor_name']) . "</span>
                                            <span><b>Email: </b>" . htmlspecialchars($row['donor_email']) . "</span>
                                        </aside>
                                        <aside class='right-col'>
                                            <span><b>Amount: </b>" . htmlspecialchars('₱' . number_format($row['donation_amount'], 2)) . "</span>
                                            <span><b>Contact:</b>" . htmlspecialchars($row['donor_contact']) . "</span>
                                            <span><b>Date: </b>" . htmlspecialchars($row['donation_date']) . "</span>
                                        </aside>
                                    </div>
                                    <p><b>Message: </b>" . htmlspecialchars($row['donor_message']) . "</p>
                                </article>
                            ";
                        }
                    } else {
                        echo "<p class='no-adopt-record'>No donation records found.</p>";
                    }
                    // Connection remains open for the next query
                ?>
            </div>
        </section>

        <section class="admin-page" id="volunteer">
            <h2>Volunteer Dashboard</h2>
            <div class="adopt-card-container">
                <?php
                    // Assuming $conn is still open
                    $sql_volunteer = "SELECT * FROM volunteer_tbl ORDER BY submission_date DESC";
                    $result_volunteer = $conn->query($sql_volunteer);

                    if ($result_volunteer->num_rows > 0) {
                        while($row = $result_volunteer->fetch_assoc()) {
                            echo "
                                <article class='adopt-card volunteer-card'>
                                    <div class='adopter-info'>
                                        <aside class='left-col'>
                                            <span><b>Volunteer ID: </b>" . htmlspecialchars($row['volunteer_id']) . "</span>
                                            <span><b>Name: </b>" . htmlspecialchars($row['volunteer_name']) . "</span>
                                            <span><b>Email: </b>" . htmlspecialchars($row['volunteer_email']) . "</span>
                                            <span><b>Phone: </b>" . htmlspecialchars($row['volunteer_phone']) . "</span>
                                        </aside>
                                        <aside class='right-col'>
                                            <span><b>Availability: </b>" . htmlspecialchars($row['availability']) . "</span>
                                            <span><b>Commitment:</b>" . htmlspecialchars($row['commitment']) . "</span>
                                            <span><b>Area of Interest: </b>" . htmlspecialchars($row['area_of_interest']) . "</span>
                                            <span><b>Submission Date: </b>" . htmlspecialchars($row['submission_date']) . "</span>
                                        </aside>
                                    </div>
                                    <p><b>Address: </b>" . htmlspecialchars($row['volunteer_address']) . "</p>
                                    <p><b>Experience: </b>" . htmlspecialchars($row['experience']) . "</p>
                                </article>
                            ";
                        }
                    } else {
                        echo "<p class='no-adopt-record'>No volunteer applications found.</p>";
                    }

                    // Close the database connection once, at the end of all database operations
                    $conn->close();
                ?>
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