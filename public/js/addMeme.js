addMemeFetchApi = '/meme/add';
let idDirectory;
let imageData = [];
const formData = new FormData();

document.getElementById('btnAddMeme').addEventListener('click', (e) => {
    e.preventDefault();
    let memeName = e.srcElement.parentNode.closest('.modal-content').childNodes[3].childNodes[1].childNodes[1].value;
    let memeFile = e.srcElement.parentNode.closest('.modal-content').childNodes[3].childNodes[3].childNodes[1].files[0];
    console.log(memeFile);
    if (window.location.pathname == '/meme') {
        idDirectory = null;
    } else {
        idDirectory = window.location.pathname.replace(/\/meme\/([0-9]*)/g, "$1");
    }

    formData.append('id_directory', idDirectory);
    formData.append('file', memeFile, memeName);

    fetch(addMemeFetchApi, {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (document.querySelector('.flexItemParentMemes').innerHTML == "") {
            let memeSpan = document.createElement('span');
            memeSpan.append("Memes");
            memeSpan.classList.add("memeSectionTitle", "mt-5", "mb-3", "ml-2");

            document.querySelector('.flexItemParentMemes').before(memeSpan);

            addMemeDiv(data.id, data.url, data.name);
            addMemePopup(data.name);
        } else {
            addMemeDiv(data.id, data.url, data.name);
            addMemePopup(data.name);
        }
    })
    .catch(error => {
        console.log(erorr);
    });
});

let addMemeDiv = (id, url, name) => {
    $('.flexItemParentMemes')
    .append('<div class="pathItemMeme rounded flex-item ml-2 mr-2 mb-3" data-meme-id="' + id + '">'
    + '<div class="pathItemMemeDiv rounded-top w-100">' 
        + '<a href="../imgs/' + url + '" rel="lytebox">' 
            + '<img class="singleMemeImg rounded-top" rel="lytebox" src="/imgs/' + url + '" />' 
        + '</a>'
    + '</div>'
        + '<div class="directoryMemeNameDiv rounded-bottom">'
            + '<span data-meme-id="' + id + '">' + name + '</span>'
        + '</div>' 
    + '</div>');
}