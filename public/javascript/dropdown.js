document.addEventListener('DOMContentLoaded', function() {
   const userContent = document.getElementById('userContent');
   const logoutForm = document.getElementById('logout-form');

   userContent.addEventListener('click', function(event) {
       event.stopPropagation(); // Hindari event 'click' menyebar ke elemen di bawahnya

       if (logoutForm.style.display === 'block') {
           logoutForm.style.display = 'none';
       } else {
           logoutForm.style.display = 'block';
       }
   });

   document.addEventListener('click', function(event) {
       const target = event.target;

       // Tutup form logout jika yang diklik bukan bagian dari form logout atau userContent
       if (target !== userContent && !logoutForm.contains(target)) {
           logoutForm.style.display = 'none';
       }
   });
});
