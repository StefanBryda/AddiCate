document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        // Get the ID of the expanded content related to this card
        const storyId = card.dataset.storyId; // will retrieve 'story1', 'story2', 'coming-soon'

        // Handle the "Coming Soon" card specifically
        if (storyId === 'coming-soon') {
            card.style.cursor = 'default'; // Change cursor back for non-clickable card
            return; // Skip adding a click listener for the 'coming-soon' card
        }

        card.addEventListener('click', () => {
            const expandedContent = document.getElementById(`${storyId}-content`);

            if (expandedContent) { 
                // Check if this card is already active
                const isActive = card.classList.contains('active');

                // Close any currently open card first (for single open view)
                document.querySelectorAll('.card.active').forEach(activeCard => {
                    // Make sure not to close the currently clicked card if it's already active
                    // And only close cards that are not the one being clicked
                    if (activeCard !== card) {
                        activeCard.classList.remove('active');
                    }
                });

                // Toggle the 'active' class on the clicked card
                if (isActive) {
                    card.classList.remove('active');
                } else {
                    card.classList.add('active');
                }
            }
        });
    });
});