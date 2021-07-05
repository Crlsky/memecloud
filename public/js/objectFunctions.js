let jsObject = {
    fetchData: function(fetchUrl, fetchMethod, fetchData) {
      fetch(fetchUrl, {
        method: fetchMethod,
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(fetchData),
      })
      .then(response => response.json())
      .then(data => {
        console.log('Success:', data);
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    },
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
    showSearchBar: function(e) {
      let searchBar = e.target.parentNode.querySelector(".searchMemeBar");
      if (searchBar.classList.contains("_visible_none")) {
        searchBar.classList.remove("_visible_none");
      } else {
        searchBar.classList.add("_visible_none");
      }
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
    },
    memesNametags: function(e) {
      let fetchData;
      
      if (e.target.checked === true) {
        fetchData = {remove_nametags: false};
      } else {
        fetchData = {remove_nametags: true};
      }

      this.fetchData('/settings/save', 'POST', fetchData);
    },
}
