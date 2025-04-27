window.addEventListener("load", contentLoaded);

async function contentLoaded(){
    document.querySelector("#submit-login").addEventListener("click", async (event) => {
        let username = document.querySelector("#username").value
        let password = document.querySelector("#password").value
        
        let formInfo = {"username": username, "password": password};
        
        let response = await fetch("/login-attempt.php", {
            method: "POST",
            body: JSON.stringify(formInfo),
            headers: {"Content-Type": "application/json"}
        });
	let responseArea = document.querySelector("#response");
    	responseArea.innerHTML = await response.text();
    })
}
