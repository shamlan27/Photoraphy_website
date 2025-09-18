<?php require 'includes/db_mysql.php'; require 'includes/header.php'; ?>

<div class="container">
  <h1>Photography Packages & Pricing</h1>
  <p class="intro">Explore Malcolm's photography services tailored for every occasion. Each package includes professional editing, high-resolution images, and personalized attention to detail.</p>

  <div class="pricing-grid">

    <!-- Commercial Photography -->
    <div class="pricing-card" onclick="redirectWithLoader('enquiry.php')">
      <img src="images/img2.jpg" alt="Commercial Photography">
      <h2>Commercial Photography</h2>
      <p>Ideal for businesses, products, and promotional campaigns. Includes location shoot, lighting setup, and post-processing.</p>
      <ul>
        <li>Starting at £250/session</li>
        <li>Up to 20 edited images</li>
        <li>Includes travel within 50 miles</li>
      </ul>
    </div>

    <!-- Wedding Photography -->
    <div class="pricing-card" onclick="redirectWithLoader('enquiry.php')">
      <img src="images/img3.jpg" alt="Wedding Photography">
      <h2>Wedding Photography</h2>
      <p>Capture your special day with timeless elegance. Full-day coverage, candid moments, and romantic portraits.</p>
      <ul>
        <li>Packages from £800</li>
        <li>Full-day or half-day options</li>
        <li>Online gallery + USB delivery</li>
      </ul>
    </div>

    <!-- Portrait Photography -->
   <div class="pricing-card" onclick="redirectWithLoader('enquiry.php')">
      <img src="images/img1.jpg" alt="Portrait Photography">
      <h2>Portrait Photography</h2>
      <p>Perfect for individuals, families, or professional headshots. Studio or outdoor settings available.</p>
      <ul>
        <li>£150 per session</li>
        <li>Up to 10 edited images</li>
        <li>1-hour shoot with outfit changes</li>
      </ul>
    </div>

    <!-- Wildlife Photography -->
    <div class="pricing-card" onclick="redirectWithLoader('enquiry.php')">
      <img src="images/wildlife.jpg" alt="Wildlife Photography">
      <h2>Wildlife & Nature Prints</h2>
      <p>Stunning prints of Scottish wildlife and landscapes. Available in various sizes and finishes.</p>
      <ul>
        <li>Prints from £40</li>
        <li>Canvas, matte, or glossy options</li>
        <li>Custom framing available</li>
      </ul>
    </div>

   


<script>
function redirectWithLoader(url) {
  document.getElementById('loader').style.display = 'flex';
  setTimeout(() => {
    window.location.href = url;
  }, 1000); // 1 second delay for animation
}
</script>

  </div>
</div>

<?php require 'includes/footer.php'; ?>