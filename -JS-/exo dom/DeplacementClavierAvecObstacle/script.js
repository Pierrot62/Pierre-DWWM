// var carre = document.getElementById("carre");
// var objet = document.getElementById("objet");

// function deplace(dLeft, dTop) {

//     var carreInfo = window.getComputedStyle(carre);
//     var l = parseInt(carreInfo.left);
//     var w = parseInt(carreInfo.width);
//     var t = parseInt(carreInfo.top);
//     var h = parseInt(carreInfo.height);
//     var objetInfo = window.getComputedStyle(objet);
//     var lob = parseInt(objetInfo.left);
//     var wob = parseInt(objetInfo.width);
//     var tob = parseInt(objetInfo.top);
//     var hob = parseInt(objetInfo.height);

//     var styleCarre = window.getComputedStyle(carre);
//     var topActuel = styleCarre.top;
//     var leftActuel = styleCarre.left;

//     if (l < lob + wob && l + w > lob && t < tob + hob && t + h > tob) {
//         carre.style.top = 100 + "px";
//         carre.style.left = 100 + "px";
//     }else{
//         carre.style.top = parseInt(topActuel) + dTop + "px";
//         carre.style.left = parseInt(leftActuel) + dLeft + "px";
//     }
// }


window.addEventListener("keydown", function (event) {

    switch (event.key) {
        case "ArrowDown":
            deplace(0, 5);
            break;
        case "ArrowUp":
            deplace(0, -5);
            break;
        case "ArrowLeft":
            deplace(-5, 0);
            break;
        case "ArrowRight":
            deplace(5, 0);
    }

});

function deplace(dx, dy) {
    var deplacement_ok = true;
    var styleCarre = window.getComputedStyle(document.getElementById('carre'), null);
    var t = parseInt(styleCarre.top);
    var l = parseInt(styleCarre.left);
    var w = parseInt(styleCarre.width);
    var h = parseInt(styleCarre.height);
    var listeObs = document.querySelectorAll('.obstacle');
    listeObs.forEach(function (elt) {
        var styleObst = window.getComputedStyle(elt, null);
        var tob = parseInt(styleObst.top);
        var lob = parseInt(styleObst.left);
        var wob = parseInt(styleObst.width);
        var hob = parseInt(styleObst.height);
        deplacement_ok = deplacement_ok && depl_ok(tob, lob, wob, hob, t + dy, l + dx, w, h);

    });
    if (deplacement_ok) {
        document.getElementById('carre').style.top = t + dy + 'px';
        document.getElementById('carre').style.left = l + dx + 'px';
    }
}

function depl_ok(tob, lob, wob, hob, t, l, w, h) {
    if (l < lob + wob && l + w > lob && t < tob + hob && t + h > tob) {
        return false
    }
    return true;
}