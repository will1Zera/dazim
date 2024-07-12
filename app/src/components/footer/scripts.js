function getCSRFToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

function getFormDataAsJSON(formData) {
    let object = {};
    formData.forEach((value, key) => object[key] = value);
    return JSON.stringify(object);
}

function PostFetch(formData, url, redirect = null) {
    let fetchData = {
        method: 'POST',
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": getCSRFToken(),
            //"Authorization": `Bearer ${Cookies.get('jwt')}`
        },
        body: getFormDataAsJSON(formData)
    }

    fetch(url, fetchData)
        .then(response => {
            if (!response.ok) {
                return Promise.reject(response);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.success) {
                if(data.jwt){
                    //Cookies.set('jwt', data.jwt, { expires: 7 });
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
                }, 1000);
            } else {
                showToast("Não foi possivel realizar o cadastro!", "darkred");
            }
        })
        .catch(error => {
            showToast("Ocorreu um erro ao realizar a ação!", "darkred");
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