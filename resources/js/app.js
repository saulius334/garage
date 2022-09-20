import './bootstrap';

const maincontent = document.querySelector('.--content');

if(maincontent) {
    const mainform = maincontent.querySelector('form')
    maincontent.querySelectorAll('select').forEach(a => {
        a.addEventListener('change', () => mainform.submit())
    })
}