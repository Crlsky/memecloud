let jsObject = {
    searchMemes: function (e) {
        if (e.srcElement.value.length==0) {
            document.querySelector(".memePanelMainDiv").classList.remove("_visible_none");
            document.querySelector(".searchedMemePanelDiv").classList.add("_visible_none");
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (this.readyState==4 && this.status==200) {
            document.querySelector(".searchedMemePanelDiv").innerHTML = "";
            document.querySelector(".memePanelMainDiv").classList.add("_visible_none");
            document.querySelector(".searchedMemePanelDiv").classList.remove("_visible_none");
            document.querySelector(".searchedMemePanelDiv").insertAdjacentHTML('beforeend', this.response);
          }
        }
        xmlhttp.open("GET","/search/"+e.srcElement.value, true);
        xmlhttp.send();
    },
    showBigImage: function (e) {
        let bigImageBox = document.createElement("div");
        bigImageBox.classList.add("d-flex", "align-items-center", "w-100");
        let bigImage = document.createElement("img");
        bigImage.src = e.target.currentSrc;
        bigImageBox.append(bigImage);
        document.getElementById("showBigImage").append(bigImageBox);
        document.getElementById("showBigImage").classList.add("active");
    },
    hideBigImage: function(e) {
      document.getElementById("showBigImage").innerHTML = "";
      document.getElementById("showBigImage").classList.remove("active");
    },
    goToDirectory: function(e, meme_id) {
      location.href = '/meme/' + meme_id;
    }
}
