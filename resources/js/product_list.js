document.addEventListener('DOMContentLoaded', function () {
    const paginationLinks = document.querySelectorAll('.pagination a');
    paginationLinks.forEach(link => link.addEventListener('click', function (e) {
        e.preventDefault();

        // Remove 'active' class from all links
        paginationLinks.forEach(link => link.classList.remove('active'));

        // Add 'active' class to the clicked link
        this.classList.add('active');

        // Manage visibility of 'Previous' and 'Next' buttons
        const prevButton = document.querySelector('.pagination .prev');
        const nextButton = document.querySelector('.pagination .next');
        const activeIndex = Array.from(paginationLinks).indexOf(this);

        // // Hide 'Previous' button if on the first page, show otherwise
        // if (activeIndex <= 1) {
        //     prevButton.style.visibility = 'hidden';
        // } else {
        //     prevButton.style.visibility = 'visible';
        // }

        // // Hide 'Next' button if on the last page, show otherwise
        // if (activeIndex >= paginationLinks.length - 2) {
        //     nextButton.style.visibility = 'hidden';
        // } else {
        //     nextButton.style.visibility = 'visible';
        // }
    }));
});
