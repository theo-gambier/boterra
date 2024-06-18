let articles = document.querySelectorAll('[data-type="head"]')

articles.forEach(article => {
    let button = article.querySelector('[data-type="button"]');

    let retour = article.querySelector('[data-type="retour"]');

    button.addEventListener('click', () => {
        let content = article.querySelector('[data-type="content"]')

        content.classList.toggle('popupListe');
    })

    retour.addEventListener('click', () => {
        let content = article.querySelector('[data-type="content"]')

        content.classList.toggle('popupListe');
    })
})