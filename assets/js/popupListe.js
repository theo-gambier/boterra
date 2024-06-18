let articles = document.querySelectorAll('[data-type="head"]')
console.log(articles)
 
articles.forEach(article => {
    console.log(article)
    let button = article.querySelector('[data-type="button"]');
 
    let retour = article.querySelector('[data-type="retour"]');
    console.log(retour)
    button.addEventListener('click', () => {
        let content = article.querySelector('[data-type="content"]')

        content.classList.toggle('popupListe');
    })

    retour.addEventListener('click', () => {
        let content = article.querySelector('[data-type="content"]')

        content.classList.toggle('popupListe');
    })
})