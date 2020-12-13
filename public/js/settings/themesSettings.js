document.querySelectorAll('.backgroundImageDiv').forEach((item) => {
    item.addEventListener('click', (e) => {
        e.preventDefault();
        document.querySelector('.bgImage').style.background = "linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url('"+e.srcElement.currentSrc+"')";
        fetchBackgroundImage(e.srcElement.dataset.bgId);
    });
});

let fetchBackgroundImage = (bgImageId) => {
    fetch('/settings/themes/background_save', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            saveBackgroundImage: true,
            background_image_id: bgImageId,
        }),
    })
    .then(response => response.json())
    .then(data => {
        popup(data);
    })
}