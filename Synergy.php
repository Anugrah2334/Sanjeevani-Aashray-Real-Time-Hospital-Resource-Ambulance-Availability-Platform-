<?php
// Get data from URL parameters
include ('hospital_service.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare Hospital</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.6;
            text-align: center;
        }

        /* Layout */
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        /* Flex container for Header Section */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #3436a9;
            padding: 10px;
            color: white;
        }

        .contact-info {
            font-size: 14px;
            color: white;
            margin-left: auto;
            text-align: right;
        }

        .contact-info span {
            margin-right: 15px;
        }

        .call-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-left: auto;
            transition: background-color 0.3s ease;
        }

        .call-btn:hover {
            background-color: #218838;
        }

        /* Flex container for Hero Section */
        .hero-container {
            display: flex;
            align-items: center;
            background: #ef3c05;
            color: white;
            padding: 10px 0;
            flex-wrap: wrap;
            justify-content: center;
        }

        /* Hero Image Section */
        .hero-image {
            flex: 1;
            max-width: 400px;
            text-align: center;
        }

        .hero-image img {
            width: 100%;
            max-width: 200px;
            border-radius: 10px;
        }

        /* Hero Text Section */
        .hero-text {
            flex: 2;
            min-width: 300px;
            text-align: left;
            padding-left: 20px;
        }

        .hero-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        .hero-subtext {
            text-align: right;
            margin-top: 10px;
            font-size: 18px;
        }

        /* Contact Details Under Hero Section */
        .hero-contact {
            text-align: right;
            margin-top: 10px;
            font-size: 14px;
            color: white;
        }


        /* About Section */
        .about {
            background: #f4f4f4;
            padding: 50px 0;
        }

        .about-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            width: 80%;
            margin: auto;
        }

        .about-text {
            flex: 1;
            text-align: justify;
            padding: 20px;
        }

        .about-images {
            display: flex;
            gap: 20px;
            flex: 1;
            justify-content: space-between;
        }

        .about-images img {
            width: 48%;
            border-radius: 10px;
        }

        /* Services and Appointment Section Layout */
        .services-appointment {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin: 50px auto;
            width: 80%;
        }

        /* Services Section */
        .services {
            flex: 1;
            text-align: left;
            padding-right: 20px;
        }

        .services h2 {
            text-align: left;
            margin-bottom: 20px;
        }

        .services .service-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .service-item {
            background: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: left;
        }

        /* Appointment Booking Section */
        .appointment {
            flex: 1;
            text-align: left;
        }

        .appointment h2 {
            margin-bottom: 20px;
        }

        .appointment form {
            background: #f4f4f4;
            padding: 20px;
            border-radius: 5px;
        }

        .appointment label {
            display: block;
            margin: 10px 0 5px;
        }

        .appointment input,
        .appointment select,
        .appointment textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .appointment button {
            display: block;
            width: 100%;
            padding: 10px;
            background: #ef3c05;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .appointment button:hover {
            background: #333;
        }

        /* Bed Information Section */
        .bed-information {
            background: linear-gradient(120deg, #f2f2f6 0%, #f8f8fa 100%);
            padding: 30px;
            border-radius: 15px;
            margin: 50px auto;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            text-align: center;
        }

        .header {
            color: #000000;
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .header small {
            display: block;
            font-size: 14px;
            color: #888;
            margin-top: 10px;
        }

        .table {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .box {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 100%;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.3s ease;
        }

        .box:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        .box h2 {
            font-size: 36px;
            color: #007bff;
            margin: 0;
        }

        .box p {
            font-size: 18px;
            color: #333;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        .box .vacant {
            font-size: 24px;
            color: #28a745;
            font-weight: bold;
        }

        /* Footer */
        footer {
            background: #3436a9;
            color: white;
            padding: 10px 0;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .services-appointment {
                flex-direction: column;
            }

            .services,
            .appointment {
                width: 100%;
                padding: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Flex container for Hero Section -->
    <section class="hero-container">
        <div class="hero-image">
            <img src="https://scontent.fdel27-4.fna.fbcdn.net/v/t39.30808-6/279242143_370001905166823_2507660170690484532_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=Oks9ZCZygEgQ7kNvgEKQMh-&_nc_zt=23&_nc_ht=scontent.fdel27-4.fna&_nc_gid=APk0k56jX1hKIiUShh2yT2R&oh=00_AYDofB6CsR81Jv7tiLCoMq3AsRGuE1QRyiK5IspsLi8tgA&oe=6718A16C">
        </div>
        <div class="hero-text">
            <h1>Welcome to Synergy</h1>
            <p>We provide top-notch medical care for all your health needs. Book an appointment with us today!</p>
            <div class="hero-contact">
                <span>Email: <a href="mailto:info@synergyhealthcare.in"> info@synergyhealthcare.in</a></span> |
                <span>Contact No: <a class="call-btn" href="tel:+91 6366530173">+91 6366530173</a></span>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
      <div class="about-content">
          <div class="about-text">
              <h2>About Us</h2>
              <p>Synergy Institute of Medical Sciences in Dehradun is a top-rated hospital known for its excellence, holding full NABH and NABL accreditation. It offers comprehensive super specialty services, including Neuro, Cardiac, Gastric, Renal, Trauma, and Critical care, all supported by advanced diagnostics. The hospital follows both National and International standards, ensuring high-quality infrastructure and care. Its experienced doctors and staff are trained to provide a world-class patient experience. Priority appointments can be arranged through HexaHealth for a smoother experience.</p>
          </div>
          <div class="about-images">
              <img src="data:image/jpeg;base64,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">
              <img src="https://lh5.googleusercontent.com/p/AF1QipMwOKcrs7sBEzlhUgoNy9lGLaPTUqRidOYBMDTf=w141-h101-n-k-no-nu" alt="About Image 2">
          </div>
      </div>
  </section>

 <!-- Services and Appointment Booking Section -->
    <section class="services-appointment">
        <!-- Services Section -->
        <div class="services">
            <h2>Our Services</h2>
            <div class="service-list">
                <div class="service-item">Emergency Care</div>
                <div class="service-item">Cardiology</div>
                <div class="service-item">Orthopedics</div>
                <div class="service-item">Pediatrics</div>
                <div class="service-item">Gynecology</div>
                <div class="service-item">Neurology</div>
                <div class="service-item">Blood Bank</div>
                <div class="service-item">Ventilators</div>
            </div>
        </div>

        <!-- Appointment Booking Section -->
        <div class="appointment">
            <h2>Book an Appointment</h2>
            <form action="booking_appointment.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="service">Select Service:</label>
                <select id="service" name="service" required>
                    <option value="emergency">Emergency Care</option>
                    <option value="cardiology">Cardiology</option>
                    <option value="orthopedics">Orthopedics</option>
                    <option value="pediatrics">Pediatrics</option>
                    <option value="gynecology">Gynecology</option>
                    <option value="neurology">Neurology</option>
                    <option value="Blood Bank">Blood Bank</option>
                    <option value="Ventilators">Ventilators</option>
                </select>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4"></textarea>

                <button type="submit">Book Appointment</button>
            </form>
        </div>
    </section>

<!-- Bed Information Section -->


<section class="bed-information">
    <h2 class="header">Bed Availability</h2>
    <small>Check the availability of our beds</small>
    <div class="table">
        <div class="box">
            <h2>ICU Beds</h2>
            <p>Vacant: <?php echo $icuBeds; ?></p>
        </div>
        <div class="box">
            <h2>Emergency Beds</h2>
            <p>Vacant: <?php echo $emergencyBeds; ?></p>
        </div>
        <div class="box">
            <h2>General Beds</h2>
            <p>Vacant: <?php echo $generalBeds; ?></p>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Max HealthCare. All rights reserved.</p>
    </footer>
</body>

</html>
