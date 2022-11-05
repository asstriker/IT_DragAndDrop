<div class="box-container">
<table>
<?php
        $rowID = 1;
        for($i=0;$i<$rows;$i++){
            $colID = 1;
            echo ("<tr>");
                for ($j=0;$j<$cols;$j++){
                    echo ("<td row-id='".$rowID."' col-id='".$colID."' class='table-column' >
                            <div class='table-column' >
                               
                            </div>
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
        echo ("<div class='tile' draggable='true' id='".$tile_id."' name='".$tile_name."'>
                <div class='non-editable' draggable='false'>
                <p draggable='false'>".$tile_id." ".$tile_name."</p>
                </div>
                <div class='editable' draggable='false'>
                <span draggable='false'>
              <input type='text' value='".$tile_desc."' draggable='false' id='tile-desc'>
              </span>
                </div>
                <div class='lockable'>
                <i class='fa-solid fa-lock-open'></i>
                </div>
               <!--  <div class='lock'>
                <i class='fa-solid fa-lock'></i>
                </div> -->
            </div>");
    }
    ?>
</div>