let articles = document.querySelectorAll('[data-type="head"]')

articles.forEach(article => {
    let button = article.querySelector('button[data-type="button"]');

    let retour = article.querySelector('button[data-type="retour"]');

    button.addEventListener('click', () => {
        let content = article.querySelector('[data-type="content"]')

        content.classList.toggle('popup');
    })

    retour.addEventListener('click', () => {
        let content = article.querySelector('[data-type="content"]')

        content.classList.toggle('popup');
    })
})