
function removeUser( id ) {
  Swal.fire({
    title: '¿Desea eliminar este usuario?',
    text: "Se borrara la data del usuario con ID " +id,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {
      fetch('../../controllers/userController.php?action=delete&id='+id, {
        method: 'GET', // or 'PUT'  
      }).then(res => res.json())
      .catch(error => console.log('Error:', error))
      .then(response => {
        console.log(response)
        if(response.code == 1){
          Swal.fire(
            'Deleted!',
            `${response.message}`,
            'success'
          )
          getManyUser();
        }
        else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: `${response.message}`,
          })
        }
      });
    }
  });
}


function getManyUser() {
  $("#loader").removeClass('display');
  let table = '';
  const data = new FormData();
  data.append('action', 'getManyUsers');
  table += `
      <table class="responsive-table" id="tableUser" width: 100%;">
        <thead>
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Usuario</th>
          <th class="text-center">Nombre</th>
          <th class="text-center">Correo Electrónico</th>
          <th class="text-center">Estado</th>
          <th class="text-center"></th>
        </tr>
      </thead>
    <tbody>`;
  setTimeout(() => {
    fetch('../../controllers/userController.php?action=getManyUsers', {
      method: 'GET', // or 'PUT'  
    }).then(res => res.json())
    .catch(error => console.log('Error:', error))
    .then(response => {

      const { data, code } = response;
      if( code == 1 ){
      data.forEach(users => {
          table += `<tr id="row_${users.id}">
          <td class="text-center">
            ${users.id}
          </td>
          <td class="text-center">
            ${users.username}
          </td>
          <td class="text-center">
            ${users.name}
          </td>
          <td class="text-center">  
            ${users.email}
          </td>
          <td class="text-center">  
           ${users.status}        
          </td>        
          <td class="text-center">  
            <a href="#">
            <i class="material-icons">edit</i>
            </a>
            <a href="#" onclick="removeUser(${users.id})">
            <i class="material-icons">delete</i>
            </a>
        </td>`;
      });
      }
      else {
        table += ``;
      }
      table += `</tr>
      </tbody>
     </table>`;
      $("#loader").addClass('display');
      $("#loadUsers").html(table);  
      $('#tableUser').DataTable({ 
        "pageLength": 50,
        "language":{
            "lengthMenu":"Mostrar _MENU_ registros por página.",
            "zeroRecords": "Lo sentimos. No se encontraron registros.",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros aún.",
            "infoFiltered": "(filtrados de un total de _MAX_ registros)",
            "search" : "Buscar:",
            "LoadingRecords": "Cargando ...",
            "Processing": "Procesando...",
            "SearchPlaceholder": "Comience a teclear...",
            "paginate": {
                "previous": "Anterior",
                "next": "Siguiente", 
            }
        },
        responsive: true,
      });
    });
  },500);
}