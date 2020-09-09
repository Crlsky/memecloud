    document.querySelectorAll('.backgroundImageDiv').forEach((item) => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.bgImage').style.backgroundImage = "url("+e.path[0].currentSrc+")";
    });
});