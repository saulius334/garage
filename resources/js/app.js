import './bootstrap';

const maincontent = document.querySelector('.--content');
const mainform = maincontent.querySelector('form')

maincontent.querySelectorAll('select').forEach(a => {
    a.addEventListener('change', () => mainform.submit())
})

