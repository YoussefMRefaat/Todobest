
// add a new todo
function add(){
    //  variable holds content of the todo
    var todo = document.getElementById('todo');
    // initialize Http Request
    var obj = new XMLHttpRequest();
    obj.open('POST' , 'http://127.0.0.1:8000/todo/create');
    // handle Laravel CSRF protection
    obj.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector('[name="csrf-token"]').content );
    // set the type of request and what request expects as a response
    obj.setRequestHeader("Content-Type" , "application/json");
    obj.setRequestHeader("Accept" , "application/json");
    // send data as json
    obj.send(JSON.stringify({'content' : todo.value }));
    // start handling the response
    obj.onreadystatechange = function(){
        // check if the request is succeeded
        if(obj.readyState === 4 && obj.status === 201){
            location.reload();
            // check for validation errors
        } else if(obj.status === 422){
            // convert the json response into a js object
            var JSObj = JSON.parse(obj.responseText);
            // get errors from the object
            // document.getElementById('error').innerHTML = JSObj.errors.content;
        }
    }
}

// handles done & undone requests
function done(todoId){
    // initialize Http Request
    var obj = new XMLHttpRequest();
    obj.open('PATCH' , 'http://127.0.0.1:8000/todo/done/' + todoId);
    // handle Laravel CSRF protection
    obj.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector('[name="csrf-token"]').content );
    // set the type of request and what request expects as a response
    obj.setRequestHeader("Content-Type" , "application/x-www-form-urlencoded");
    obj.setRequestHeader('Accept' , 'application/json');
    obj.send();
    obj.onreadystatechange = function(){
        // check if the request is succeeded
        if(obj.readyState === 4 && obj.status === 200){
            // assign elements that need to be changed after success
            var div = document.getElementById('todo'.concat(todoId));
            var span = document.getElementById('div'.concat(todoId)).getElementsByTagName('SPAN')[0];
            var i = span.getElementsByTagName('I')[0];
            // call function that is responsible for changing html elements
            changeElements(div , span , i);
        }
    }
}

// change classes of html elements depending on todo's previous status
function changeElements(div , span , i){

    if (span.getAttribute('class') === 'done'){

        span.setAttribute('class' , 'undone');
        i.setAttribute('class' , 'fa fa-times');
        div.setAttribute('class' , 'completed');
    }

    else if (span.getAttribute('class') === 'undone'){
        span.setAttribute('class' , 'done');
        i.setAttribute('class' , 'fa fa-check');
        div.removeAttribute('class');
    }
}

// delete a todo
function del(todoId){
    // initialize Http Request
    var obj = new XMLHttpRequest();
    obj.open('DELETE' , '/todo/delete/' + todoId);
    // handle Laravel CSRF protection
    obj.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector('[name="csrf-token"]').content );
    // set the type of request and what request expects as a response
    obj.setRequestHeader("Content-Type" , "application/x-www-form-urlencoded");
    obj.setRequestHeader('Accept' , 'application/json');
    obj.send();
    obj.onreadystatechange = function (){
        // check if the request is succeeded
        if(obj.readyState === 4 && obj.status === 200){
            // remove the todo from UI
            document.getElementById('todo'.concat(todoId)).remove();
        }
    }
}

