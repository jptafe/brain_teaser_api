function postInsert (evt) {
    evt.preventDefault();
    fetch(evt.target.action, 
        {
            method: 'POST'
        }
    ) // here we need to POST
    .then (
        function(headers) {
            if (headers.status === 201) {
                console.log('success');
            }
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function postUpdate (evt) {
    evt.preventDefault();
    fetch(evt.target.action, 
        {
            method: 'POST'
        }
    ) // here we need to POST
    .then (
        function(headers) {
            if (headers.status === 202) {
                console.log('success');
            }
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function getDelete (evt) {
    evt.preventDefault();
    fetch(evt.target.action)
    .then (
        function(headers) {
            if (headers.status === 202) {
                console.log('success');
            }
            headers.text().then(function(body) {
                document.getElementById('output').innerHTML = body;
            })
        }
    );
}

function getSelect (evt) {
    evt.preventDefault();
    fetch(evt.target.action)
    .then (
        function(headers) {
            if (headers.status === 200) {
                console.log('success');
            }
            headers.json().then(function(body) {
                document.getElementById('output').innerHTML = JSON.stringify(body.msg);
            })
        }
    );
}

function getSelectAll (evt) {
    evt.preventDefault();
    fetch(evt.target.action)
    .then (
        function(headers) {
            if (headers.status === 200) {
                console.log('success');
            }
            headers.json().then(function(body) {
                document.getElementById('output').innerHTML = JSON.stringify(body).msg;
            })
        }
    );
}