// Dark Mode Toggle Script
(function() {
    // Check for saved theme preference or default to light mode
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.documentElement.setAttribute('data-theme', currentTheme);

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        // Update toggle button state
        updateToggleIcon();
    });

    // Toggle theme function
    window.toggleDarkMode = function() {
        const currentTheme = document.documentElement.getAttribute('data-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
        
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        updateToggleIcon();
    };

    function updateToggleIcon() {
        const icon = document.querySelector('.toggle-icon');
        if (icon) {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            icon.innerHTML = currentTheme === 'dark' 
                ? '<i class="bi bi-sun-fill"></i>' 
                : '<i class="bi bi-moon-fill"></i>';
        }
    }
})();
