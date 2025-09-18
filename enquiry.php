<?php require 'includes/db_mysql.php'; require 'includes/header.php'; ?>
<section class="container">
  <h1>Make an enquiry</h1>
  <div id="enquirySuccess" class="alert success hidden">Thanks — your enquiry has been sent.</div>
  <form id="enquiryForm" action="submit_enquiry.php" method="post" enctype="multipart/form-data">
    <label>Full name<input type="text" name="full_name" required></label>
    <label>Email<input type="email" name="email" required></label>
    <label>Phone<input type="tel" name="phone"></label>
    <label>Event type
      <select name="event_type">
        <option>Wedding</option>
        <option>Portrait</option>
        <option>Event</option>
        <option>Other</option>
      </select>
    </label>
    <label>Event date<input type="date" name="event_date"></label>
    <label>Location<input type="text" name="location"></label>
    <label>Message<textarea name="message" rows="5"></textarea></label>
    <label>Attach reference (jpg/png) <input type="file" name="attachment" accept="image/*"></label>
    <label><input type="checkbox" name="agree" required> I agree to be contacted regarding this enquiry.</label>
    <button class="btn" type="submit">Send Enquiry</button>

  </form>
</section>
<?php require 'includes/footer.php'; ?>