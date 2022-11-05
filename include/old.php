
<div class="box-container">
    <table>
        <?php
        $rowID = 1;
        list($row_id,$col_id,$tile_id1,$tile_name1,$tile_desc1) = fgetcsv($fh2,1000);
        $isPlaced = [];
        for($i=0;$i<$rows;$i++){
            $colID = 1;
            echo ("<tr>");
            for ($j=0;$j<$cols;$j++){

                echo ("<td row-id='".$rowID."' col-id='".$colID."' class='table-column' >
                            <div class='table-column' >");
                            while($row_id == $rowID && $col_id == $colID){
                               if($tile_id1!=="null"){
                                   array_push($isPlaced,$tile_id1);
                                   echo ("<div class='tile' draggable='true' id='".$tile_id1."'>
                                        <div class='non-editable' draggable='false'>
                                        <p draggable='false'>".$tile_id1." ".$tile_name1."</p>
                                        </div>
                                        <div class='editable' draggable='false'>
                                        <span draggable='false'>
                                      <input type='text' value='".$tile_desc1."' draggable='false'>
                                      </span>
                                        </div>
                                        <div class='lockable'>
                                        <i class='fa-solid fa-lock-open'></i>
                                        </div>
                                    </div>");
                               }
                                list($row_id,$col_id,$tile_id1,$tile_name1,$tile_desc1) = fgetcsv($fh2,1000);
                            }
                            echo("</div>
                        </td>");
                $colID++;
            }
            echo("</tr>");
            $rowID++;
        }
        ?>
    </table>
</div>

<div id="tiles-container">
    <?php
    while (list($tile_id,$tile_name,$tile_desc) = fgetcsv($fh,1000)){
        if(!in_array($tile_id,$isPlaced)){
            echo ("<div class='tile' draggable='true' id='".$tile_id."'>
                    <div class='non-editable' draggable='false'>
                    <p draggable='false'>".$tile_id." ".$tile_name."</p>
                    </div>
                    <div class='editable' draggable='false'>
                    <span draggable='false'>
                  <input type='text' value='".$tile_desc."' draggable='false'>
                  </span>
                    </div>
                    <div class='lockable'>
                    <i class='fa-solid fa-lock-open'></i>
                    </div>
                </div>");
        }
    }
    ?>
</div>

<div id="export">
    <button onclick="tableToCSV()">Export</button>
</div>

<!--JQuery-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script src="../js/script.js"></script>
</body>
</html>