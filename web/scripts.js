document.addEventListener('DOMContentLoaded', () => {
    const darkToggle = document.getElementById('toggle-dark');
    const darkIcon = document.getElementById('dark-icon');

    darkToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        if (document.body.classList.contains('dark-mode')) {
            darkIcon.classList.remove('fa-sun');
            darkIcon.classList.add('fa-moon');
        } else {
            darkIcon.classList.remove('fa-moon');
            darkIcon.classList.add('fa-sun');
        }
    });
});
