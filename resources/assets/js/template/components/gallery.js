$(document).ready(function () {
    const selKind = document.getElementById('selectKind');
    const selColor = document.getElementById('selectColor');
    const selectBodyKind = document.querySelector('.select-body-kind');
    const selectBodyColor = document.querySelector('.select-body-color');
    const canSelectKind = selectBodyKind.querySelector('.can-select');
    const canSelectColor = selectBodyColor.querySelector('.can-select');
    const selectChoice = $('.select');
    let toggleSelect = function () {
        canSelectKind.classList.toggle("hidden");
    };
    let toggleSelectColor = function () {
        canSelectColor.classList.toggle("hidden");
    };
    let choiceKind = function (event) {
        let el = event.target;
        let text = el.innerHTML;
        if (text && el.classList.value) {
            selKind.innerHTML = text;
        }
    };
    let choiceKindColor = function (event) {
        let el = event.target;
        let text = el.innerHTML;
        let attr = el.getAttribute('choise-color');
        if (attr && text) {
            selColor.innerHTML = `<span class="color color-${attr}">${text}</span>`;
        }
    };
    let closeChoise = function (event) {
        let el = event.target;
        if ( !(selectChoice[0].contains(el)) ) {
            canSelectKind.classList.add('hidden');
        }
        if (!(selectChoice[1].contains(el))){
            canSelectColor.classList.add('hidden');
        }
    };
    selKind.addEventListener("click", toggleSelect);
    selColor.addEventListener("click", toggleSelectColor);
    canSelectKind.addEventListener("click", choiceKind);
    canSelectColor.addEventListener("click", choiceKindColor);
    document.body.addEventListener("click", closeChoise);

    $('#btn-kind').on("click", toggleSelect);
    $('#btn-color').on("click", toggleSelectColor);
});