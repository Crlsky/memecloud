$(document).ready(function() {

    $.contextMenu({
        selector: '.memePanelMainDiv', 
        callback: function(key, options) {},
        items: {
            "create": {
                name: "Create directory", 
                icon: "fas fa-folder",
                addDirectory: true,
            },
            "sep1": "---------",
            "meme": {
                name: "Add meme", 
                icon: "fas fa-image",
                addMeme: true,
            },
        }
    });

    $.contextMenu({
        selector: '.pathItemsContext', 
        callback: function(key, options) {
            $('#renameName').val($(this).find('.directoryPathNameDiv').children('span').html());
            $('#renameName').attr('value', $(this).find('.directoryPathNameDiv').children('span').html());

            if (key == 'delete') { // checking if delete btn was clicked.
                let pathId = $(this).attr('data-path-id'); // assign directory id to variable "pathId".
                fetch('/delete/dir', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        deleteDir: true,
                        id_path: pathId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    $(this).fadeOut("slow", function() { // dynamically remove item after delete.
                        $(this).remove();
                    }); 
                    deletePopup("Directory", data)
                });
            }

        },
        items: {
            "rename": {
                name: "Rename", 
                icon: "edit",
                renameDir: true
            },
            "move": {
                name: "Move to",
                icon: "fas fa-suitcase",
            },
            "sep1": "---------",
            "delete": {
                deleteDir: true,
                name: "Delete", 
                icon: "delete"
            },
        }
    });

    $.contextMenu({
        selector: '.pathItemMeme', 
        callback: function(key, options) {
            $('#renameImageName').val($(this).find('.directoryMemeNameDiv').children('span').html());
            $('#renameImageName').attr('value', $(this).find('.singleMemeImg').data('id'));
            $('#renameImg').attr('data-id', $(this).data('meme-id'))

            if (key == 'delete') { // checking if delete btn was clicked.
                let memeId = $(this).attr('data-meme-id'); // assign meme id to variable "pathId".
                fetch('/delete/meme', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        deleteMeme: true,
                        id_meme: memeId,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    $(this).fadeOut("slow", function() { // dynamically remove item after delete.
                        $(this).remove();
                    }); 
                    deletePopup("Meme", data);
                });
            }

        },
        items: {
            "rename": {
                name: "Rename", 
                icon: "edit",
                renameImg: true,
            },
            "move": {
                name: "Move to", 
                icon: "fas fa-suitcase",
            },
            "copy": {
                name: "Copy", 
                icon: "copy"
            },
            "sep1": "---------",
            "delete": {
                deleteMeme: true,
                name: "Delete", 
                icon: "delete"
            },
        }
    });

});

document.addEventListener("click", function() {
    document.querySelectorAll('.context-menu-list').forEach(function(item, index){
        document.querySelectorAll('.context-menu-list')[index].style.display = "none";
    });
});

document.querySelector('.flexItemParentPaths, .flexItemsParent, .memePanelDiv').addEventListener("contextmenu", function(e) {
    e.preventDefault();
    document.querySelectorAll('.context-menu-list').forEach(function(item, index){
        document.querySelectorAll('.context-menu-list')[index].style.display = "none";
    }); 
});

document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
});