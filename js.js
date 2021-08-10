function postInsert (evt) {
    evt.preventDefault();
    var postFormData = new FormData();
    postFormData.append(evt.target[0].name, evt.target[0].value);
    postFormData.append(evt.target[1].name, evt.target[1].value);
    fetch(evt.target.action, 
        {
            method: 'POST',
            body: postFormData
        }
    ) 
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
    var postFormData = new FormData();
    postFormData.append(evt.target[0].name, evt.target[0].value);
    postFormData.append(evt.target[1].name, evt.target[1].value);
    postFormData.append(evt.target[2].name, evt.target[2].value);
    fetch(evt.target.action, 
        {
            method: 'POST',
            body: postFormData
        }
    ) 
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
    var delid = evt.target[0].value;
    var url = evt.target.action + '&id=' + delid;
    fetch(url)
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
    var selid = evt.target[0].value;
    var url = evt.target.action + '&id=' + selid;
    fetch(url)
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