const form = document.forms['formRegistrazione']
form.addEventListener('submit', event=>{
    event.preventDefault()
    var regPassword=/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-\.]).{8,16}$/
    var regUsername=/^[A-Za-z]*[A-Za-z][A-Za-z0-9-. _]*$/
    var regNome=/[a-zA-Z].{1,}/
    var nomeForm=document.getElementById('nome').value
    var cognomeForm=document.getElementById('cognome').value
    var usernameForm=document.getElementById('username').value
    var passwordForm=document.getElementById('password').value
    var conferma_password=document.getElementById('conferma_password').value
    if (!(passwordForm==conferma_password &&
        regPassword.test(passwordForm) &&
        regNome.test(nomeForm) &&
        regNome.test(cognomeForm) &&
        regUsername.test(usernameForm) &&
        form['indirizzo'].value!="" &&
        form['citta'].value!=""
    )){
        console.log('non valido')
        return;}
    console.log('qua')
    dati=JSON.stringify({
        nome: nomeForm,
        cognome: cognomeForm,
        username: usernameForm,
        password: passwordForm,
        indirizzo: form['indirizzo'].value+", "+form['citta'].value
    })
    fetch("/gattile/backend/api/registrazioneApi.php", {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: dati
    })
    .then(response=>response.json())
    .then(data=>console.log("NEGRO"))    

})