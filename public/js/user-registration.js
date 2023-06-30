document.getElementById('userRegistrationForm').addEventListener('submit', function (event) {
    event.preventDefault();

    // Perform AJAX form submission
    var formData = new FormData(this);
    var url = this.getAttribute('action');
    var method = this.getAttribute('method');

    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // AJAX request successful, handle the response
            var response = JSON.parse(xhr.responseText);
            alert(response.message); // Show success message

            // Trigger email sending via AJAX
            var emailUrl = '/send-email'; // Replace with your email sending route
            var emailXhr = new XMLHttpRequest();
            emailXhr.open('POST', emailUrl, true);
            emailXhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            emailXhr.onreadystatechange = function () {
                if (emailXhr.readyState === XMLHttpRequest.DONE && emailXhr.status === 200) {
                    // Email sent successfully, handle the response
                    // Show thank you message or perform any additional actions
                }
            };
            emailXhr.send();
        }
    };
    xhr.send(formData);
});
