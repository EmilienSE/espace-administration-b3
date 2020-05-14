window.addEventListener("load", function () {
    let form = document.getElementById("form-content");
    let formAction = form.getAttribute('data-action');
    console.log(formAction);
    function sendData() {
        let XHR = new XMLHttpRequest();
        let FD = new FormData(form);
        
        XHR.addEventListener("load", function(event) {
            alert(event.target.responseText);
        });
        
        XHR.addEventListener("error", function(event) {
            alert('Oups! Quelque chose s\'est mal passé.');
        });
        
        XHR.open("POST", formAction);
        
        XHR.send(FD);
    }
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        sendData();
    });
});