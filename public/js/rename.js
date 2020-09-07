let fetchUrl = 'L2RpcmVjdG9yaWVzL3JlbmFtZQ==';
let imageIdData; // renamed meme id
let newImageName; // new meme name
let previousDirectoryName; // actual name of directory
let newDirectoryName; // new directory name

document.getElementById('btnRename').addEventListener("click", (e) => {
    e.preventDefault();
    directoryId = document.getElementById('deleteDirBtn').getAttribute('data-id');
    newDirectoryName = document.getElementById('renameName').value;

    if (!newDirectoryName.trim()) { // checking if name is not empty
        popup("Directory cannot be created because name is empty");
    }

    fetch(atob(fetchUrl), { // rename directory
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            rename: true,
            directoryId: directoryId,
            newDirectoryName: newDirectoryName.trim(),
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.check === true) {
            popup(data.message); 
        } else {
            document.querySelector("span[data-path-id='" + directoryId +"']").innerHTML = newDirectoryName; // insert new name to directory.
            popup('Directory name has been changed to <span class="namePopup">' + newDirectoryName + '</span>');
        }
    });
})

document.getElementById('btnImgRename').addEventListener("click", (e) => {
    e.preventDefault();
    imageIdData = document.getElementById('renameImg').getAttribute('data-id');
    newImageName = document.getElementById('renameImageName').value;
    
    if (!$.trim(newImageName)) { // checking if name is not empty
        popup("Directory cannot be created because name is empty");
    }

    fetch(atob(fetchUrl), { // rename meme
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            renameImg: true,
            imageId: imageIdData,
            newImageName: newImageName.trim(),
        }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.check === true) {
            popup(data.message); 
        } else {
            document.querySelector("span[data-meme-id='" + imageIdData +"']").innerHTML = newImageName; // insert new name to img.
            popup('Image name has been changed to <span class="namePopup">' + newImageName + '</span>');
        }
    });
});