window.addEventListener("load", contentLoaded);

async function contentLoaded(){
    document.querySelector("#submit-login").addEventListener("click", async (event) => {
        let username = document.querySelector("#username").value
        let password = document.querySelector("#password").value
        
        let formInfo = {"username": username, "password": password};
        
        let response = await fetch("/angel", {
            method: "POST",
            body: JSON.stringify(formInfo),
            headers: {"Content-Type": "application/json"}
        });

        if (response.ok) {
            alert("Login successful!\n" + await response.text())
        }
        else {
            alert("Incorrect username or password")
        }
    })
}
