document.addEventListener('DOMContentLoaded', function() {
    const spoilerTitles = document.querySelectorAll('.spoiler-title');
    spoilerTitles.forEach(spoilerTitle => {
        spoilerTitle.addEventListener('click', function() {
            const spoilerContent = this.nextElementSibling; 
            spoilerContent.style.display = spoilerContent.style.display === 'none' ? 'block' : 'none';
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const citySelect = document.getElementById('citySelect');
    const cityForm = document.getElementById('cityForm');

    citySelect.addEventListener('change', function() {
        cityForm.submit();
    });
});