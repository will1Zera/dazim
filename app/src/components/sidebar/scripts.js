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