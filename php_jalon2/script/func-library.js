function findAncestor(el, cls) {
    while ((el = el.parentElement) && !el.classList.contains(cls));
    return el;
}

function requireInputs(inputElements) {
    for (let i = 0; inputElements[i]; ++i) {
        inputElements[i].required = true;
    }
}

function unrequireInputs(inputElements) {
    for (let i = 0; inputElements[i]; ++i) {
        inputElements[i].required = false;
    }
}

function uncheckInputs(inputElements) {
    for (let i = 0; inputElements[i]; ++i) {
        inputElements[i].checked = false;
    }
}

function disableScrolling() {
    document.body.style.overflow = "hidden";
}

function enableScrolling() {
    document.body.style.overflow = "auto";
}