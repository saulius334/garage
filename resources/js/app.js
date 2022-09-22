import './bootstrap';
import axios from 'axios';

const maincontent = document.querySelector('.--content');

if(maincontent) {
    const mainform = maincontent.querySelector('form')
    maincontent.querySelectorAll('select').forEach(a => {
        a.addEventListener('change', () => mainform.submit())
    })
}

const breakdown = document.querySelector('#breakdown');
if (breakdown) {
    const trucksList = breakdown.querySelector('#trucksList')
    const mechanicId = breakdown.querySelector('[name=mechanic_id]');
    const submitButton = breakdown.querySelector('[data-submit]');
    mechanicId.addEventListener('change', () => {
        if (mechanicId.value === '0') {
            trucksList.innerHTML = '';
        } else {
            axios.get(breakdownUrl + '/trucksList/' + mechanicId.value)
            .then(res => {
                trucksList.innerHTML = res.data.html;
            })
        }
        
    });
    submitButton.addEventListener('click', () => {
        const data = {}
        breakdown.querySelectorAll('[data-create]')
        .forEach(i => {
            data[i.getAttribute('name')] = i.value;
        })
        axios.post(breakdownUrl + '/create', data)
        .then(res => {
            console.log(res.data);
            getList();
        })
        .catch(error => {
            console.log('Error');
        })
    });
    window.addEventListener('load', () => {
        getList();
    })
}

const getList = () => {
    const breakdownsList = document.querySelector('#breakdowns-list');
    axios.get(breakdownUrl + '/list')
    .then(res => {
        breakdownsList.innerHTML = res.data.html;
    })
}