// js/lightbox.js - very small lightbox for images
document.addEventListener('click', function(e){
  const a = e.target.closest('a');
  if (!a) return;
  if (a.classList.contains('lightbox') || a.querySelector('img')) {
    // if it links to an image file
    const href = a.getAttribute('href');
    if (!href) return;
    if (/\.(jpg|jpeg|png|gif|webp)$/i.test(href) || a.querySelector('img')) {
      e.preventDefault();
      const src = a.querySelector('img') ? a.querySelector('img').src.replace('/thumbs/','/') : href;
      const overlay = document.createElement('div');
      overlay.className = 'lb-overlay';
      overlay.innerHTML = '<div class="lb-inner"><img src="'+src+'"><button class="lb-close">✕</button></div>';
      document.body.appendChild(overlay);
      overlay.addEventListener('click', function(ev){ if (ev.target === overlay || ev.target.classList.contains('lb-close')) overlay.remove(); });
    }
  }
});