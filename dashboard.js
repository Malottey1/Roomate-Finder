document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.nav-links li a');
    const sections = document.querySelectorAll('main > div');

    navLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            const targetSectionId = e.target.getAttribute('href').substring(1);
            showSection(targetSectionId);
        });
    });

    function showSection(sectionId) {
        sections.forEach(section => {
            if (section.id === sectionId) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        });
    }

    // Toggle active section on page load
    if (sections.length > 0) {
        showSection(sections[0].id);
    }
l
    // Simulate notifications
    const notificationBadge = document.querySelector('.badge');
    const messageIcon = document.querySelector('.fa-envelope');

    notificationBadge.textContent = 2; // Update with actual notification count

    // Toggle message icon for demonstration purposes
    const toggleMessages = () => {
        messageIcon.classList.toggle('active');
    };

    setInterval(toggleMessages, 1000); // Toggle every second (remove this in the actual application)
});
