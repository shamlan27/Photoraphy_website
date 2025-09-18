// js/enquiry.js - submits enquiry via fetch and shows success message
document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('enquiryForm');
  if (!form) return;
  form.addEventListener('submit', async function(e){
    e.preventDefault();
    const data = new FormData(form);
    try {
      const resp = await fetch(form.action, { method: 'POST', body: data, headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      const json = await resp.json();
      if (json.status === 'ok') {
        document.getElementById('enquirySuccess').classList.remove('hidden');
        form.reset();
      } else {
        alert('Error sending enquiry');
      }
    } catch (err) {
      alert('Network error');
    }
  });
});