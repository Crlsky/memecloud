let jsObject = {
    fetchData: function(fetchUrl, fetchMethod, fetchData, fetchResponseFunction) {
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
        if (fetchResponseFunction.hide_directory === true) {
          this.hiddenDirectoryAction(fetchResponseFunction.directory_id, data.show_hidden_directories);
        } else if (fetchResponseFunction.unhide_directory === true) {
          this.unhiddenDirectoryAction(fetchResponseFunction.directory_id)
        }
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
            console.log(this.response);
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
    markImage: function(e) {
      document.querySelectorAll(".pathItemMeme").forEach(element => {
        if (element.classList.contains("_mark_element")) {
          element.classList.remove("_mark_element");
        }
      });
      e.target.parentNode.closest(".pathItemMeme").classList.add("_mark_element");
    },
    markDirectory: function(e) {
      document.querySelectorAll(".pathItem").forEach(element => {
        if (element.classList.contains("_mark_directory")) {
          element.classList.remove("_mark_directory");
        }
      });
      e.target.classList.add("_mark_directory");
    },
    hideMarks: function(e) {
      document.querySelectorAll(".pathItemMeme").forEach(element => {
        if (e.target != element.querySelector(".singleMemeImg")) {
          if (element.classList.contains("_mark_element")) {
            element.classList.remove("_mark_element");
          }
        }
      });
      document.querySelectorAll(".pathItem").forEach(element => {
        if (e.target != element) {
          if (element.classList.contains("_mark_directory")) {
            element.classList.remove("_mark_directory");
          }
        }
      });
    },
    goToDirectory: function(e, meme_id) {
      location.href = '/meme/' + meme_id;
    },
    saveOptions: function(e) {
      let fetchData;
      
      if (e.target.checked === true) {
        fetchData = {
          option: true,
          parameter: e.target.id
        };
      } else {
        fetchData = {
          option: false,
          parameter: e.target.id
        };
      }

      this.fetchData('/settings/save', 'POST', fetchData);
    },
    hideDirectory: function(e) {
      let fetchData;
      let directoryId = e.target.dataset.id;

      fetchData = {
        hideDir: true,
        directory_id: directoryId
      };

      fetchResponseFunction = {
        hide_directory: true,
        directory_id: directoryId
      }

      this.fetchData('/hide/dir', 'POST', fetchData, fetchResponseFunction);
    },
    hiddenDirectoryAction: function(directoryId, showDirectories) {
      if (showDirectories == 1) {
        document.querySelectorAll(".pathItem").forEach(element => {
          if (element.dataset.pathId == directoryId) {
            element.classList.add("pathItemHidden");
            element.classList.remove("pathItemsContext");
          }
        });
      } else {
        document.querySelectorAll(".pathItem").forEach(element => {
          if (element.dataset.pathId == directoryId) {
            element.classList.add("_visible_none");
          }
        });
      }
    },
    unhideDirectory: function(e) {
      let fetchData;
      let directoryId = e.target.dataset.id;

      fetchData = {
        unhideDir: true,
        directory_id: directoryId
      };

      fetchResponseFunction = {
        unhide_directory: true,
        directory_id: directoryId
      }

      this.fetchData('/hide/dir', 'POST', fetchData, fetchResponseFunction);
    },
    unhiddenDirectoryAction: function(directoryId) {
        document.querySelectorAll(".pathItem").forEach(element => {
          if (element.dataset.pathId == directoryId) {
            element.classList.remove("pathItemHidden");
            element.classList.add("pathItemsContext");
          }
        });
    },
}
