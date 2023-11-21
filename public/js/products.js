document.addEventListener('DOMContentLoaded', function() {
    let links = document.querySelectorAll('.pdr');

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            links.forEach(function(otherLink) {
                otherLink.classList.remove('active');
            });

            link.classList.add('active');
        });
    });
})