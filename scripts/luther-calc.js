window.addEventListener("load", contentLoaded);

async function contentLoaded(){
    document.querySelector("#submit-calc").addEventListener("click", async (event) => {
        let input = document.querySelector("#input").value
        let desired = document.querySelector("#desired").value
        
        let formInfo = {"input": input, "desired": desired};
        
        let response = await fetch("/luther-calc.php", {
            method: "POST",
            body: JSON.stringify(formInfo),
            headers: {"Content-Type": "application/json"}
        });
	let responseArea = document.querySelector("#response");
    	responseArea.innerHTML = await response.text();
    })
}
