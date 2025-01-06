function textTooShort(name, text, length, displayID) {
    const displayElement = document.getElementById(displayID);
    if (text.length < length) {
        displayElement.innerHTML = name+" trop court";
    } else {
        displayElement.innerHTML = "";
    }
}

function textSame(text1, text2, displayID) {
    const displayElement = document.getElementById(displayID);
    if (text1 !== text2) {
        displayElement.innerHTML = "X";
        displayElement.style.color = "red";
    } else {
        displayElement.innerHTML = "ok";
        displayElement.style.color = "green";
    }
}


export{ textTooShort, textSame }