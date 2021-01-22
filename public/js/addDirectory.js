let fetchDirUrl = "L2RpcmVjdG9yaWVzL2FkZA==";

document.getElementById('btnAddDirectory').addEventListener("click", (e) => {
    e.preventDefault();
    let directoryName = document.getElementById("directoryName").value;
    let parentDirName = window.location.pathname;

    if (!directoryName.trim()) {
        directoryName = "new_directory";
    }

    if (parentDirName == '/meme') {
        fetch(atob(fetchDirUrl), { // add directory on when user is on root dir
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                add: true,
                parent_directory: null,
                directory_name: directoryName.trim(),
            }),
        })
        .then(response => response.json())
        .then(data => {
            addNewDirectory(data.id, data.name);
            addDirPopup(data.name);
        });
    } else {
        parentDirName = parentDirName.replace(/\/meme\//g, ''); // check the parent dir id by takeing it from the url
        fetch(atob(fetchDirUrl), { // add directory when user is on child dir
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                add: true,
                parent_directory: parentDirName,
                new_directory_name: directoryName.trim(),
            }),
        })
        .then(response => response.json())
        .then(data => {
            addNewDirectory(data.id, data.name);
            addDirPopup(data.name);
        });
    }
});

let addNewDirectory = (id, dirName) => {
    if (document.querySelector('.flexItemParentPaths').innerHTML == "") {  // check if there is any folder existing in current directory.

        // makeing a dir header span
        let dirSpan = document.createElement('span');
        if (document.querySelector(".memeSectionTitleDir") === null) { 
            dirSpan.append("Directories");
        }
        dirSpan.classList.add("memeSectionTitleDir", "mb-3", "ml-2");

        document.querySelector('.flexItemParentPaths').before(dirSpan);
        document.querySelector('.flexItemParentPaths').classList.add('mb-5');

        if (document.getElementById('emptyDirectoryId') !== null) {
            document.getElementById('emptyDirectoryId').remove();
        }

        $('.flexItemParentPaths')
        .append('<div class="pathItemsContext pathItem rounded flex-item ml-2 mr-2 mb-3" data-path-id="'+id+'">'
        +'<a class="directoryRoute" href="/meme/'+id+'">'
            +'<div class="directoryImgDiv h-100">'
                +'<i class="fas fa-folder directoryImg fa-2x"></i>'
            +'</div>'
            +'<div class="directoryPathNameDiv h-100">'
                +'<span data-path-id="'+id+'">'+dirName+'</span>'
            +'</div>'
        +'</a>'
        +'</div>');
    } else {
        $('.flexItemParentPaths')
        .append('<div class="pathItemsContext pathItem rounded flex-item ml-2 mr-2 mb-3" data-path-id="'+id+'">'
        +'<a class="directoryRoute" href="/meme/'+id+'">'
            +'<div class="directoryImgDiv h-100">'
                +'<i class="fas fa-folder directoryImg fa-2x"></i>'
            +'</div>'
            +'<div class="directoryPathNameDiv h-100">'
                +'<span data-path-id="'+id+'">'+dirName+'</span>'
            +'</div>'
        +'</a>'
        +'</div>');
    }
}