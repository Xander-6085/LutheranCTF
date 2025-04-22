var story = "You wake up, covered in a cold sweat.\nYour memories come flooding back in an instant. You have been stuck in a terrible slumber for years, cursed by the dastardly wizard of the open source radio guild. Now free from his grasp, you seek only one goal: revenge.\n\nYou leave your spire, and see a bridge.\nThe wizard built a moat around your prison, no doubt to improve its property value, and left the bridge as your lone hope of escape on this dreary night."

var letters = []

for (i = 0; i < story.length; i++) {
    letter = document.createElement("span");
    letter.innerHTML = story[i];
    letter.style.opacity = 0;
    storyEl = document.getElementById("story");
    storyEl.appendChild(letter);
    letters.push(letter);
}

var progress = 0;
function showLetter() {
    if (progress >= letters.length) {
        return;
    }
    letters[progress].style.opacity = 1;
    letters[progress].classList.add("shift");
    progress += 1;
    setTimeout(showLetter, 50);
}

var started = false;
document.addEventListener("mousedown", function() {
    if (started) {
        return;
    }
    started = true;
    document.body.style.cursor = "auto";
    video = document.getElementById("video");
    video.play();
    video.style.filter = "grayscale(0)";
    video.classList.add("shift2");
    showLetter();
});
