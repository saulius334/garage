import './bootstrap';
import axios from 'axios';
import { Modal } from 'bootstrap';

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
        deleteEvent();
        modalEvent();

    })
}
const deleteEvent = () => {
    document.querySelectorAll('.delete--button')
    .forEach(button => {
        button.addEventListener('click', () => {
            axios.delete(breakdownUrl + '/' + button.dataset.id)
            .then(res => {
                if (res.data.refresh == 'list') {
                    getList();
                }
            })
        })
    })
}


const modal = document.querySelector('#edit-modal');
let fadeModal;
if (modal) {
    fadeModal = new Modal(modal);
}


const modalEvent = () => {
    document.querySelectorAll('.edit--button')
        .forEach(b => {
            b.addEventListener('click', () => {
                fadeModal.show();
                axios.get(breakdownUrl + '/modal/' + b.dataset.id)
                .then(res => {
                    modal.querySelector('.modal-dialog').innerHTML = res.data.html;
                    console.log(modal.querySelector('.modal-dialog'));
                    editEvent(b.dataset.id);
                })
            })
        })
}

const editEvent = id => {
    document.querySelector('[data-edit-submit]')
        .addEventListener('click', () => {
            const data = {};
            document.querySelectorAll('[data-edit]')
                .forEach(i => {
                    data[i.getAttribute('name')] = i.value;
                });
            axios.put(breakdownUrl + '/edit/' + id, data)
                .then(res => {
                    getList();
                    fadeModal.hide();
                })
                .catch(error => {
                    console.log('viskas blogai');
                    fadeModal.hide();
                })

        });
}