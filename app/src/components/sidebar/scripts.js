const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');

allDropdown.forEach(item => {
    const a = item.parentElement.querySelector('a:first-child');

    a.addEventListener('click', (e) => {
        e.preventDefault();

        item.classList.toggle('show');
    });
})

const toggleSidebar = document.querySelector('nav .toggle-sidebar');
const sidebar = document.querySelector('#sidebar');
const allSidebarSpan = document.querySelectorAll('.sidebar-span');

if(sidebar.classList.contains('hide')){
    allSidebarSpan.forEach(span => {
        span.textContent = '';
    });
} else{
    allSidebarSpan.forEach(span => {
        span.textContent = span.dataset.text;
    });
}

toggleSidebar.addEventListener('click', () => {
    sidebar.classList.toggle('hide');

    if(sidebar.classList.contains('hide')){
        allSidebarSpan.forEach(span => {
            span.textContent = '';
        });
    } else{
        allSidebarSpan.forEach(span => {
            span.textContent = span.dataset.text;
        });
    }
})

$('#logout').on('click', function() {
    Swal.fire({
        title: 'Tem certeza que deseja sair?',
        icon: 'warning',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Sim',
    }).then((result) => {
        if (result.isConfirmed) {
            Cookies.remove('jwt');
            window.location.href = '/dazim/app';
        }
    });
});

$(document).ready(async function() {
    const data = await getFetch('/dazim/api/users/fetch');

    $('#editar-nome-profile').val(data.name);
    $('#editar-email-profile').val(data.email);
});

$('#editProfileForm').on('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData();

    formData.append('name', $('#editar-nome-profile').val());
    formData.append('email', $('#editar-email-profile').val());

    updateFetch(formData, '/dazim/api/users/update');
});