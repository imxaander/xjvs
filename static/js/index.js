let usrSrvrsBody = document.getElementById('user-server-list')

$.get('./requests/server?request=user-server-list&uid=1', function(data){
    let servers = JSON.parse(data)
    usrSrvrsBody.innerHTML = '';
    servers.forEach(element => {
        usrSrvrsBody.innerHTML += `
            <td> ${element.name} </td>
            <td> ${element.address} </td>
            <td> ${element.status} </td>
            <td> <button> start </button><button> stop </button><button> delete </button></td>
        `;
    });
})