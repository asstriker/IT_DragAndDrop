
const tiles = document.getElementsByClassName('tile');
const grids = document.getElementsByClassName('table-column');
const tilesContainer = document.getElementById("tiles-container");


var currEle;

for(tile of tiles){

    tile.addEventListener('dragstart',(e)=>{
        console.log("Dragstart");
        currEle=e.target;
    });
    tile.addEventListener('dragend',(e)=>{
        console.log("Dragend");
    })

    var lockable = tile.querySelector('.lockable');
    lockable.addEventListener('click',(e)=>{
        if(e.target.className === "fa-solid fa-lock-open"){
            e.target.parentElement.parentElement.setAttribute("draggable","false");
            e.target.className = "fa-solid fa-lock";
        }else{
            e.target.parentElement.parentElement.setAttribute("draggable","true");
            e.target.className = "fa-solid fa-lock-open";
        }
    })
}

for(grid of grids){
    grid.addEventListener('dragover',(e)=>{
        const allow = currEle.className;
        if(allow==="tile"){
            e.preventDefault();
        }
        console.log("Dragover");
    });
    grid.addEventListener('dragleave',(e)=>{
        console.log("Dragleave");
    });
    grid.addEventListener('dragenter',(e)=>{
        console.log("Dragenter");
    });
    grid.addEventListener('drop',(e)=>{
        console.log("drop");
        console.log(e.target.className);
        if(e.target.className === "table-column"){
            e.target.append(currEle);
        }

    });
}

tilesContainer.addEventListener('dragover',(e)=>{
    const allow = currEle.className;
    if(allow==="tile"){
        e.preventDefault();
    }
    console.log("Dragover");
});
tilesContainer.addEventListener('dragleave',(e)=>{
    console.log("Dragleave");
});
tilesContainer.addEventListener('dragenter',(e)=>{
    console.log("Dragenter");
});
tilesContainer.addEventListener('drop',(e)=>{
    console.log("drop");
    console.log(e.target);
    if(e.target.id === "tiles-container"){
        e.target.append(currEle);
    }
});


function tableToCSV(){

    // Get each row data
    var rows = document.getElementsByTagName('tr');
    var csv_data1 = [];
    for (var i = 0; i < rows.length; i++) {
        var csv_data = [];
        // Get each column data
        var cols = rows[i].querySelectorAll('td');


        for (var j = 0; j < cols.length; j++) {

            var csvrow1 = [];
            var tilesInsideGrid = cols[j].querySelectorAll('.tile');
            if(tilesInsideGrid.length===0){
                var csvrow = [];
                csvrow.push(cols[j].getAttribute('row-id'));
                csvrow.push(cols[j].getAttribute('col-id'));
                csvrow.push("null");
                csvrow.push("null");
                csvrow.push("null");
                csvrow = csvrow.join(",");
                csvrow1.push(csvrow);
            }else{
                for(tileInsideGrid of tilesInsideGrid){
                    var csvrow = [];
                    csvrow.push(cols[j].getAttribute('row-id'));
                    csvrow.push(cols[j].getAttribute('col-id'));
                    csvrow.push(tileInsideGrid.getAttribute('id'));
                    csvrow.push(tileInsideGrid.getAttribute('name'));
                    csvrow.push(tileInsideGrid.getElementsByTagName('input')[0].value);
                    csvrow = csvrow.join(",");
                    csvrow1.push(csvrow);
                }
            }

            csvrow1 = csvrow1.join("\n");
            csv_data.push(csvrow1);
        }

        csv_data = csv_data.join('\n');
        csv_data1.push(csv_data);


    }
    csv_data1 = csv_data1.join('\n');
    // console.log(csv_data1);
    downloadCSVFile(csv_data1);
}


function downloadCSVFile(csv_data) {

    // Create CSV file object and feed our
    // csv_data into it
    CSVFile = new Blob([csv_data], { type: "text/csv" });

    // Create to temporary link to initiate
    // download process
    var temp_link = document.createElement('a');

    // Download csv file
	var filename = prompt("ENTER FILE NAME : ");
    temp_link.download = filename + ".csv";
    var url = window.URL.createObjectURL(CSVFile);
    temp_link.href = url;

    // This link should not be displayed
    temp_link.style.display = "none";
    document.body.appendChild(temp_link);

    // Automatically click the link to trigger download
    temp_link.click();
    document.body.removeChild(temp_link);
}

