function postInsert (evt) {
    evt.preventDefault();
    console.log(evt);
    fetch(evt.target.action)
    .then (
        function(headers) {
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function postUpdate (evt) {
    evt.preventDefault();
    console.log(evt);
    fetch(evt.target.action)
    .then (
        function(headers) {
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function getDelete (evt) {
    evt.preventDefault();
    console.log(evt);
    fetch(evt.target.action)
    .then (
        function(headers) {
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function getSelect (evt) {
    evt.preventDefault();
    console.log(evt);
    fetch(evt.target.action)
    .then (
        function(headers) {
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function getSelectAll (evt) {
    evt.preventDefault();
    console.log(evt);
    fetch(evt.target.action)
    .then (
        function(headers) {
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}