document.addEventListener('DOMContentLoaded', function() {
  // Tooltips de Bootstrap
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.forEach(function(tooltipTriggerEl) {
    new bootstrap.Tooltip(tooltipTriggerEl);
  });
  
  // Smooth scroll
  document.querySelectorAll('a.nav-link, .navbar-brand').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      if (this.hash !== "") {
        e.preventDefault();
        let target = document.querySelector(this.hash);
        if (target) {
            target.scrollIntoView({
            behavior: 'smooth'
            });
        }
      }
    });
  });
});
  