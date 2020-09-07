let deletePopup = (deletedItem, memeName) => {
    $('#popupSpan').html(deletedItem + ' <span class="namePopup">' + memeName + '</span> succesfully deleted');
    $('.popupInfo').fadeIn("slow", function() {
        $('.popupInfo').show();
        setTimeout(hidePopup, 4000);
    });
}

let addDirPopup = (dirName) => {
    $('#popupSpan').html('Directory <span class="namePopup">' + dirName + '</span> succesfully added');
    $('.popupInfo').fadeIn("slow", function() {
        $('.popupInfo').show();
        setTimeout(hidePopup, 4000);
    });
}

let addMemePopup = (memeName, errorMessage) => {
    if (memeName === null) {
        $('#popupSpan').html(errorMessage);
    } else {
        $('#popupSpan').html('Meme <span class="namePopup">' + memeName + '</span> succesfully added');
    }
    $('.popupInfo').fadeIn("slow", function() {
        $('.popupInfo').show();
        setTimeout(hidePopup, 4000);
    });
}

let popup = (message) => {
    document.getElementById('popupSpan').innerHTML = message;

    $('.popupInfo').fadeIn("slow", function() {
        $('.popupInfo').show();
        setTimeout(hidePopup, 4000);
    });
}

let hidePopup = () => {
    $('.popupInfo').fadeOut("slow", function() {
        $('.popupInfo').hide();
    });
}