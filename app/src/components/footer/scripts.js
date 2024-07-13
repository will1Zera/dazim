function getCSRFToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

function getFormDataAsJSON(formData) {
    let object = {};
    formData.forEach((value, key) => object[key] = value);
    return JSON.stringify(object);
}

async function getFetch(url) {
    let fetchData = {
        method: 'GET',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": getCSRFToken(),
            "Authorization": `Bearer ${Cookies.get('jwt')}`
        }
    }

    try {
        const response = await fetch(url, fetchData);

        if (response.status === 401) {
            window.location.href = '/dazim/app';
            return Promise.reject("Unauthorized");
        }

        if (!response.ok) {
            return Promise.reject(response);
        }

        const data = await response.json();

        if (data.success) {
            return data.data;
        } else {
            showToast("Não foi possível buscar os dados!", "darkred");
            return null;
        }
    } catch (error) {
        showToast("Ocorreu um erro ao buscar os dados!", "darkred");
        console.error(error);
        return null;
    }
}

function postFetch(formData, url, redirect = null) {
    let fetchData = {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": getCSRFToken(),
            "Authorization": `Bearer ${Cookies.get('jwt')}`
        },
        body: getFormDataAsJSON(formData)
    }

    fetch(url, fetchData)
        .then(response => {
            if (response.status === 401) {
                window.location.href = '/dazim/app';
                return Promise.reject("Unauthorized");
            }

            if (!response.ok) {
                return Promise.reject(response);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                if(data.jwt){
                    Cookies.set('jwt', data.jwt, { expires: 7 });
                    showToast("Login realizado com sucesso!", "darkgreen");
                } else {
                    showToast(data.message, "darkgreen");
                }

                setTimeout(() => {
                    if (redirect) {
                        window.location.href = redirect;
                    } else {
                        window.location.reload();
                    }
                }, 500);
            } else {
                showToast("Não foi possivel realizar o cadastro!", "darkred");
            }
        })
        .catch(error => {
            showToast("Ocorreu um erro ao realizar a ação!", "darkred");
            console.error(error);
        });
}

function updateFetch(formData, url) {
    let fetchData = {
        method: 'PUT',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": getCSRFToken(),
            "Authorization": `Bearer ${Cookies.get('jwt')}`
        },
        body: getFormDataAsJSON(formData)
    }

    fetch(url, fetchData)
        .then(response => {
            if (response.status === 401) {
                window.location.href = '/dazim/app';
                return Promise.reject("Unauthorized");
            }

            if (!response.ok) {
                return Promise.reject(response);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showToast(data.message, "darkgreen");

                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                showToast("Não foi possivel atualizar!", "darkred");
            }
        })
        .catch(error => {
            showToast("Ocorreu um erro ao realizar a ação!", "darkred");
            console.error(error);
        });
}

function deleteFetch(url) {
    let fetchData = {
        method: 'DELETE',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": getCSRFToken(),
            "Authorization": `Bearer ${Cookies.get('jwt')}`
        }
    }

    fetch(url, fetchData)
        .then(response => {
            if (response.status === 401) {
                window.location.href = '/dazim/app';
                return Promise.reject("Unauthorized");
            }

            if (!response.ok) {
                return Promise.reject(response);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                showToast(data.message, "darkgreen");

                setTimeout(() => {
                    window.location.reload();
                }, 500);
            } else {
                showToast("Não foi possível deletar o item!", "darkred");
            }
        })
        .catch(error => {
            showToast("Ocorreu um erro ao deletar o item!", "darkred");
            console.error(error);
        });
}

function showToast(message, color) {
    Toastify({
        text: message,
        duration: 1500,
        style: {
          background: color,
        }
    }).showToast();
}