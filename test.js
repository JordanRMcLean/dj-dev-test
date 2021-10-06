function validate_form(e, field) {
    let name = document.getElementById('input-name');
    let email = document.getElementById('input-email');
    let telephone = document.getElementById('input-telephone');
    let message = document.getElementById('input-message');

    let errors = false;

    if(field === 'name' || field === 'all') {
        let error_span = document.getElementById('error-name');
        if(name.value.length < 1 || name.value.length > 30) {
            error_span.innerHTML = 'Name must be between 1 & 30 characters';
        }
        else if(!/^[A-Za-z\s]+$/.test(name.value)) {
            error_span.innerHTML = 'Name must only contain letters and spaces';
        }
        else {
            error_span.innerHTML = '';
        }
    }

    if(field === 'email' || field === 'all') {
        let error_span = document.getElementById('error-email');
        if(!email.value.indexOf('@')) {
            error_span.innerHTML = 'Please enter a valid email address.';
        }
        else {
            error_span.innerHTML = '';
        }
    }

    if(field === 'telephone' || field === 'all') {
        let error_span = document.getElementById('error-telephone');
        if(telephone.value.length < 8) {
            error_span.innerHTML = 'Telephone numbers must be more than 8 characters.';
        }
        else if(!/^\+?[0-9\s]+$/.test(telephone.value)) {
            error_span.innerHTML = 'Telephone numbers must only contain numbers, spaces or +';
        }
        else {
            error_span.innerHTML = '';
        }
    }

    if(field === 'message' || field === 'all') {
        let error_span = document.getElementById('error-message');
        if(message.value.length < 5 || message.value.length > 300) {
            error_span.innerHTML = 'Message length must be between 5 & 300 characters';
        }
        else {
            error_span.innerHTML = '';
        }
    }

    //prevent submission.
    if(errors && e) {
        e.preventDefault();
    }
}
