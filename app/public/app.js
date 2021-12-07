function addItem() {

    const textarea = document.getElementById('todoText');

    if(textarea.value != ""){
        var newMainDiv = document.createElement("div");
        newMainDiv.className = "col-md-6 col-xxl-4 mb-5";
        newMainDiv.id = "mainDiv";

        var newCard = document.createElement("div");
        newCard.className = "card";

        var newCardBody = document.createElement("div");
        newCardBody.className = "card-body";

        // var deleteBtn = document.createElement("button");
        // deleteBtn.type = "button"
        // deleteBtn.className = "btn btn-danger";
        // deleteBtn.onclick = deleteItem();

        var paragraph = document.createElement("p");
        paragraph.innerHTML = textarea.value;

        textarea.value = '';

        newCardBody.appendChild(paragraph);
        // newCardBody.appendChild(deleteBtn);
        newCard.appendChild(newCardBody);
        newMainDiv.appendChild(newCard);

        document.getElementById("itemList").appendChild(newMainDiv);
    }
}

// function deleteItem(){
//     if(onclick == true){
//         document.getElementById("itemList").removeChild(document.getElementById("mainDiv"));
//     }
// }