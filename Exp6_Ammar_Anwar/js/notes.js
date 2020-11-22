// Javascript for "alert button"
document.querySelector('#submitBackend').addEventListener('click', () => {
    let alert = document.querySelector('.alert');
    alert.classList.remove('hide');
    alert.classList.add('show');

    setTimeout(() => {
        alert.classList.remove('show');
        alert.classList.add('hide');
    }, 2000);

    let close = document.querySelector('#alertcloseBtn');
    close.addEventListener('click', () => {
        alert.classList.remove('show');
        alert.classList.add('hide');
    });
});

// Javascript for Modal (used for edit button)
// Making variables for open & close buttons and also for overlay respectively
let openbtn = document.getElementsByClassName('open-modal-btn');
let closebtn = document.querySelector('.close-button');
let overlay = document.querySelector('#overlay');
let deletes = document.getElementsByClassName('delete');

Array.from(openbtn).forEach((element) => {
    element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[1].innerText;
        description = tr.getElementsByTagName("td")[2].innerText;
        editTitle.value = title;
        editDescription.value = description;

        let modal = document.querySelector('.modal');
        let overlay = document.querySelector('#overlay');
        modal.classList.add('active');
        overlay.classList.add('active');

        srnoEdit.value = e.target.id;       
    });
})

// Event Handling for Close button (Modal)
closebtn.addEventListener('click', () => {
    let modal = document.querySelector('.modal');
    let overlay = document.querySelector('#overlay');
    modal.classList.remove('active');
    overlay.classList.remove('active');
});


// Javascript for "Delete button" of a paticular note
Array.from(deletes).forEach((element) => {
    element.addEventListener('click', (e) => {
        let srno = e.target.id.substr(1,);        
        if (confirm("Do you really want to delete ?"))
            window.location = `notes.php?delete=${srno}`;
    });
})

// Submit default button
let submit = document.getElementsByClassName('submit');
Array.from(submit).forEach((element) => {
    element.addEventListener('submit', (e) => {
        e.preventDefault();
    });
})