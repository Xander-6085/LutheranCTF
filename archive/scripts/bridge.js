var started = false;
document.addEventListener("mousedown", function() {
  if (started) {
    return;
  }
  started = true;
  document.body.style.cursor = "auto";
  audio = document.getElementById("audio");
  audio.play();
});

var messages = [{
  "role": "assistant",
  "content": "Greetings, foolish traveler. I do hope your slumber within the tower was well? As the troll of this bridge you must answer my riddle if you ever wish to see the flag that shall grant you your freedom, but I doubt you could ever solve a riddle as fantastic as this. Now tell me, are you ready to begin the challenge?"
}];
window.addEventListener('load', (event) => {

  document.querySelector(".sendMessage").addEventListener('click', async (event) => {

    event.currentTarget.classList.add('is-loading');
    event.currentTarget.disabled = true;

    document.querySelector(".result").parentElement.classList.add("is-hidden");
    document.querySelector(".error").parentElement.classList.add("is-hidden");

    let currHour = new Date();

    const userMsgTemplate = `<div class="columns">
                                        <div class="column is-one-third"></div>
                                        <div class="column">
                                            <div class="notification is-success">
                                                <h6 class="subtitle is-6">${currHour.getHours() + ":" + currHour.getMinutes()}</h6>
                                                ${document.querySelector(".message").value}
                                            </div>
                                        </div>
                                    </div>`


    let chatBox = document.querySelector(".messageHistory");

    chatBox.innerHTML += userMsgTemplate;
    chatBox.scrollIntoView(false);

    let new_message = {
      "role": "user",
      "content": document.querySelector(".message").value
    };

    messages.push(new_message);
    console.log(messages);

    const payload = JSON.stringify(messages);
    console.log(payload);

    document.querySelector(".message").value = "";

    let response = await fetch('request_manager.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: payload,
    });
    data = await response.json();
    let respHour = new Date();
    console.log("data:");
    console.log(data);

    let responseMessage = data.responseMessage;
    messages.push(responseMessage);
    
    console.log(responseMessage);
    responseMessage.content = responseMessage.content.replace("\n", "<br>");

    let aiMsgTemplate = `<div class="columns">
                            <div class="column">
                                <div class="notification is-info">
                                    <h6 class="subtitle is-6">${respHour.getHours() + ":" + respHour.getMinutes()}</h6>
                                    ${responseMessage.content}
                                </div>
                            </div>
                            <div class="column is-one-third"></div>
                        </div>`

    chatBox.innerHTML += aiMsgTemplate;
    chatBox.scrollIntoView(false);
      document.querySelector(".sendMessage").classList.remove('is-loading');
      document.querySelector(".sendMessage").disabled = false;

  })
});
