function handleRequest() {
    let jsonData = JSON.parse(this.responseText);
    console.log(jsonData);
}

function makeRequest() {
    let request = new XMLHttpRequest();
    request.addEventListener("load", handleRequest);
    request.open("GET", 'data.json', true);
    request.send();
}

let button = document.getElementById('jsonbutton');
button.addEventListener('click', makeRequest);