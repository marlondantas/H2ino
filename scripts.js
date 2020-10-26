function definirValores(valor) {
    if (valor >= 100) {
        finalizar(20000);
        return;
    }
    if (valor >= 75) {
        finalizar(8500);
        return;
    }
    if (valor >= 50) {
        finalizar(6500);
        return;
    }
    if (valor >= 25) {
        finalizar(5000);
        return;
    }
    if (valor >= 15) {
        finalizar(4000);
        return;
    }
    if (valor >= 10) {
        finalizar(3000);
        return;
    }
    if (valor >= 1) {
        finalizar(1500);
        return;
    }
    finalizar(100);
    return;
}

function finalizar(tempoAnim) {
    setTimeout(function() {
        pause();
    }, tempoAnim);
}

function pause() {
    var anim = document.getElementById("tt");
    anim.style.animationPlayState = "paused";
}

