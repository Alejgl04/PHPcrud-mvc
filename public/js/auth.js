
const url = '../../controllers/authController.php';

const login = () => {
  document.getElementById('progress').classList.remove('showLoader');
  document.getElementById("message").innerHTML = '';
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  const data = new FormData();
  data.append('action', 'login');
  data.append('username', username);
  data.append('password', password);

  setTimeout(() => {
    fetch(url, {
      method: 'POST', // or 'PUT'
      body: data, // data can be `string` or {object}!
  
    }).then(res => res.json())
    .catch(error => alert('Error:', error))
    .then(response => {

      document.getElementById('progress').classList.add('showLoader');

      if( response.code == 1 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }

      else if( response.code == 2 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel green darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
        setTimeout(() => {
          window.location="../users/";
        },2000);
      }

      else if( response.code == 3 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }

      else {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }  
    });
  },500);
}

function saveUser() {
  document.getElementById('progress').classList.remove('showLoader');
  document.getElementById("message").innerHTML = '';
  let username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  let name     = document.getElementById("name").value;
  let email    = document.getElementById("email").value;
  const data = new FormData();
  data.append('action', 'register');
  data.append('username', username);
  data.append('password', password);
  data.append('name', name);
  data.append('email', email);

  setTimeout(() => {

    fetch(url, {
      method: 'POST', // or 'PUT'
      body: data, // data can be `string` or {object}!
  
    }).then(res => res.json())
    
    .catch(error => alert('Error:', error))

    .then(response => {

      document.getElementById('progress').classList.add('showLoader');

      if( response.code == 0 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }

      else if( response.code == 1 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel green darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
        
      }

      else if( response.code == 2 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }

      else if( response.code == 3 ) {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }

      else {
        document.getElementById("message").innerHTML = `<div class="card-panel red darken-4"><strong style="color:white;"> ${response.message} </strong></div>`;
      }  
    });
  },500);
}