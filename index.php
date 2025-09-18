<?php require 'includes/db_mysql.php'; require 'includes/header.php'; ?>
<section class="hero">
  <div class="container hero-inner">
    <h1>Malcolm Lismore Photography</h1>
    <p class="lead">Coastal Scotland — Landscapes, Wildlife, and Events</p>
    <p><a class="btn" href="gallery.php">View Galleries</a> <a class="btn ghost" href="enquiry.php">Enquire</a></p>
  </div>
</section>
<?php
// index.php (top)
require 'includes/db_mysql.php';   // must create $pdo


// Get featured photos (latest 6)
try {
    $stmt = $pdo->prepare(
      'SELECT id, filename, thumbnail, title 
       FROM photos 
       WHERE is_published = 1 
       ORDER BY uploaded_at DESC 
       LIMIT 6'
       );
    $stmt->execute();
    // $featured will be an array (possibly empty)
    $featured = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // if query fails keep $featured as empty array and log the error
    error_log('Featured query error: ' . $e->getMessage());
    $featured = [];
}
?>

<section class="featured">
  <h2>Featured Galleries</h2>
  <div class="slideshow-container">
    <div class="slides-wrapper">
      <?php foreach ($featured as $p): 
        $thumb = !empty($p['thumbnail']) ? $p['thumbnail'] : $p['filename'];
      ?>
        <div class="card">
          <img src="uploads/thumbs/<?= htmlspecialchars($thumb) ?>" 
               alt="<?= htmlspecialchars($p['title'] ?? '') ?>">
          <div class="card-body">
            <h3><?= htmlspecialchars($p['title'] ?? '') ?></h3>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<script>
let slideIndex = 0;
const wrapper = document.querySelector('.slides-wrapper');
const cards = document.querySelectorAll('.slides-wrapper .card');
const cardWidth = cards[0].offsetWidth + 20; // card width + margin
const visibleCards = Math.floor(document.querySelector('.slideshow-container').offsetWidth / cardWidth);

function slideCards() {
  slideIndex++;
  if (slideIndex > cards.length - visibleCards) {
    slideIndex = 0; // reset to first
  }
  wrapper.style.transform = `translateX(${-slideIndex * cardWidth}px)`;
}

// Auto slide every 3 seconds
setInterval(slideCards, 3000);
</script>


<?php require 'includes/footer.php'; ?>