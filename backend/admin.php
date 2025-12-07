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
    <!-- ========== Header Section ========== -->
    <header class="org-name">
        <div class="org-img-container">
            <img src="../frontend/images/logo1.png" alt="">
        </div>
        <h1>Paw Patrol</h1>
    </header>

    <!-- ========== Main Content Section ========== -->
    <main class="main-content">

        <!-- ========== Navigation Section ========== -->
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

        <!-- ========== Adoption Tab ========== -->
        <section class="admin-page" id="adoption">
            <h2>Adoption Dashboard</h2>
            <div class="adopt-card-container">
                <?php
                    $sql = "SELECT * FROM adoption_tbl";
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

                    $conn->close();
                ?>
            </div>
            
        </section>

        <!-- ========== Donation Tab ========== -->
        <section class="admin-page" id="donation">

        </section>

        <!-- ========== Volunteer Tab ========== -->
        <section class="admin-page" id="volunteer">

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