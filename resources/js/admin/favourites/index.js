document.addEventListener('DOMContentLoaded', function() {
    const searchBar = document.getElementById('search-bar');
    const passwordCards = document.querySelectorAll('#favourite-card');

    // Aggiungi un event listener per rilevare i cambiamenti nella barra di ricerca
    searchBar.addEventListener('keyup', function() {

        const searchTerm = searchBar.value.toLowerCase();

        // Loop attraverso gli elementi della lista e nascondi quelli che non corrispondono
        passwordCards.forEach(card => {
            const passwordName = card.querySelector('h5').textContent.toLowerCase();

            // Mostra o nasconde l'elemento basato sulla corrispondenza con il termine di ricerca
            if (passwordName.includes(searchTerm)) {
                card.classList.remove('d-none');
            } else {
                card.classList.add('d-none');
            }
        });
    });
});