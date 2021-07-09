let draggedMeme,
    draggedMemeId,
    droppedDirectoryId,
    draggedData,
    dropLastDragged
    startPosData = {};
    
let fetchUrlMoveMeme = "/move/meme";    

function checkIntersect(posData){
    var left = startPosData.left,
        top = startPosData.top,
        right = startPosData.left+startPosData.width,
        bottom = startPosData.top+startPosData.height,
        cornerLeftPos = posData.left,
        cornerTopPos = posData.top;

        cornerLeftPos += startPosData.width/2;
        cornerTopPos += startPosData.height/2;

    if((cornerLeftPos > left && cornerLeftPos < right) && (cornerTopPos > top && cornerTopPos < bottom)){
        return true;    
    }
    return false;
}

$( ".pathItemMeme" ).draggable({
    start: function(event, ui) {
        draggedMeme = $(this);
        draggedMemeId = $(this)[0].dataset.memeId;

        startPosData.left = ui.offset.left;
        startPosData.width = $(this).width();
        startPosData.top = ui.offset.top;
        startPosData.height = $(this).height();
        draggedData = $(this).html();
        $(this).addClass("dragOpacity");
        dropLastDragged = this;
    },
    stop: function(event, ui) {
        $(this).attr("style", "position: relative;");
        if(dropLastDragged){
            if(checkIntersect(ui.offset)){
                $(dropLastDragged).html(ui.helper.html());
            }
        }
        $(this).removeClass("dragOpacity");
    }
});

$('.pathItem').droppable({
    helper: "clone",
    over: function(event, ui) {
        $(this).addClass("dragHover");
    },
    out: function(event, ui) {
        $(this).removeClass("dragHover");
    },
    drop: function(event, ui){
        droppedDirectoryId = $(this)[0].dataset.pathId;
        $(this).removeClass("dragHover");
        
        fetch(fetchUrlMoveMeme, { // add directory when user is on child dir
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                moveMeme: true,
                id_directory: droppedDirectoryId,
                id_meme: draggedMemeId,
            }),
        })
        .then(response => {
            if (response.status === 200) {
                draggedMeme.remove();
            }
            return response.json();
        })
        .then(data => {
            popup("Succesfully moved <span class='namePopup'>" + data.meme_name + "</span> to <span class='namePopup'>" + data.directory_name + "</span>");
        })
    }
 });