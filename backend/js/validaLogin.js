const form = document.forms['form_login'];
        form.addEventListener('submit', event=>{
            event.preventDefault()
            if (form['username'].value=="" || form['password'].value==""){
                document.getElementById("prova").innerHTML="Form non validato"
                return;
            }
    dati=JSON.stringify({
        username: form['username'].value,
        password: form['password'].value,
        remember: form['remember'].checked})
    fetch('/gattile/backend/api/loginApi.php', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
        body: dati
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'OK') {
            
            document.getElementById("prova").innerHTML = 
                `<p>${data.message}</p>
                 <p>Benvenuto, ${data.nome} ${data.cognome}</p>`;
        } else {
            document.getElementById("prova").innerHTML = `<p style="color:red;">${data.message}</p>`;
        }
    })})
