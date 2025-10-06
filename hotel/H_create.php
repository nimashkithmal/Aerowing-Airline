<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="H_hotel.css">
</head>

<body>

    <header class="header">
        <nav class="navbar">
            <a href="#" class="logo">
                <img src="../imges/11.jpg" alt="Aerowing">
            </a>
            <ul class="nav__links">
                <li><a href="../pages/Navigation bar.html">Home</a></li>
                <li><a href="#">Manage</a></li>
                <li><a href="#">Experience</a></li>
                <li><a href="#">Where We Fly</a></li>
                <li><a href="#">Help</a></li>
            </ul>
            <div class="user-login">


                <a href="#" class="cta">
                    <button>Search</button>
                </a>

                <div class="search-icon">
                    <img src="../imges/search1111.jpg" alt="Search">
                </div>

                <a href="#" class="cta">
                    <button>Login</button>
                </a>



                <div class="user-icon">
                    <img src="../imges/user1111.jpg" alt="User">
                </div>


            </div>

        </nav>
    </header>
    <br><br><br>
    <div class="navdiv">
        <a href="../pages/Navigation bar.html">Home</a> &gt;  <a href="#">Hotel Book</a>
    </div>
    <img class="p_app" src="../imges/1111.jpg" alt="">
    <div class="image-text">
        <main>
            <form action="H_insert.php" method="post">
                <label for="check-in">Name:</label>
                <input type="text" id="check-in" name="kkname" required>

                <label for="check-in">Email:</label>
                <input type="email" id="email" name="kEmail" required>

                <label for="check-in">Check-in Date:</label>
                <input type="Date" id="check-in" name="dob" required>

                <label for="check-out">Check-out Date:</label>
                <input type="Date" id="check-out" name="dobb" required>

                <label for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="kNumberofGuests" min="1" required>

                <label for="Hotel">Choose the Hotel:</label>
                <select id="text" name="khotel" min="1" required>

                    <option value="Queen's Hotel">Queen's Hotel</option>
                    <option value="The Golden Ridge Hotel">The Golden Ridge Hotel</option>
                    <option value="Mahaweli Reach Hotel">Mahaweli Reach Hotel</option>
                    <option value="Amaya Lake Hotel Dambulla">Amaya Lake Hotel Dambulla</option>
                </select>
                <button type="submit" name="booknow">Book Now</button>
            </form>
        </main>
    </div>
    <div>
        <div class="container">
            <div class="hotels">
                <div class="hotel">
                    <img src="../imges/33.jpg" alt="Hotel 1">
                    <div class="details">
                        <a href="https://www.queenshotel.lk">
                            <h2>Queen's Hotel</h2>
                        </a>
                        <p>Location: Colombo</p>
                        <p>Price: $80</p>
                    </div>
                </div>
                <div class="hotel">
                    <img src="../imges/44.jpg" alt="Hotel 2">
                    <div class="details">
                        <a href="https://www.thegoldenridge.com">
                            <h2>The Golden Ridge Hotel</h2>
                        </a>
                        <p>Location: Galle</p>
                        <p>Price: $100</p>
                    </div>
                </div>
                <div class="hotel">
                    <img src="../imges/22.jpg" alt="Hotel 3">
                    <div class="details">
                        <a href="https://www.mahaweli.com">
                            <h2>Mahaweli Reach Hotel</h2>
                        </a>
                        <p>Location: Nuwara Eliye</p>
                        <p>Price: $90</p>
                    </div>
                </div>
                <div class="hotel">
                    <img src="../imges/55.jpg" alt="Hotel 4">
                    <div class="details">
                        <a href="https://www.amayaresorts.com/amayalake/">
                            <h2>Amaya Lake Hotel Dambulla</h2>
                        </a>
                        <p>Location: Dambulla</p>
                        <p>Price: $85</p>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="section_container footer_container">
                <div class="footer__col">
                    <h3>Aerowing</h3>
                    <p>
                        Where Excellence Takes Flight. With a strong commitment to customer
                        satisfaction and a passion for air travel, Aerowing Airlines offers
                        exceptional service and seamless journeys.
                    </p>
                    <p>
                        From friendly smiles to state-of-the-art aircraft, we connect the
                        world, ensuring safe, comfortable, and unforgettable experiences.
                    </p>
                </div>
                <div class="footer__col">
                    <h4>INFORMATION</h4>
                    <p>Book</p>
                    <p>Manage</p>
                    <p>Experience</p>
                    <p>Where We fly</p>

                </div>
                <div class="footer__col">
                    <h4>CONTACT US</h4>
                    <p>Help</p>
                    <p>Support</p>

                </div>
            </div>
            <div class="section_container footer_bar">
                <p>Copyright © 2023 Team Aerowing. All rights reserved.</p>
                <div class="socials">
                    <span><i class="ri-facebook-fill"></i></span>
                    <span><i class="ri-twitter-fill"></i></span>
                    <span><i class="ri-instagram-line"></i></span>
                    <span><i class="ri-youtube-fill"></i></span>
                </div>
            </div>
        </footer>
</body>

</html>