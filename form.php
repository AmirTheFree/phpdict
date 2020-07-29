<form action="<?php if(isset($edit)){echo 'edit.php';}else{echo 'add.php';} ?>" method="POST">
    <div class="form-group">
        <table>
            <tbody>
                <tr>
                    <td><span class="info text-white"><label for="key">Key:&nbsp;&nbsp;</label></span></td>
                    <td><input type="text" name="key" id="key" class="form-control-lg" value="<?php if(isset($item_key)){echo $item_key;} ?>" required></td>
                </tr>
                <tr>
                    <td><span class="info text-white"><label for="value">Value:&nbsp;&nbsp;</label></span></td>
                    <td><input type="text" name="value" id="value" class="form-control-lg" value="<?php if(isset($item_value)){echo $item_value;} ?>" required></td>
                </tr>
            </tbody>
        </table>
        <?php if(isset($edit)){ echo "<input type=\"hidden\" name=\"id\" value=\"".$item_id."\">"; } ?>
        <button type="submit" class="btn-lg btn-success upspace">Save</button>
        <?php 
            if (isset($edit)){echo "<a id=\"del\" href=\"delete.php?id=".$item_id."\"><button type=\"button\" class=\"btn-lg btn-danger upspace\">Delete</button></a>";}
        ?>
    </div>
    <script>
        document.getElementById('del').addEventListener('click',function (e){
            var sure = confirm('Are you sure?');
            if (!sure){
                e.preventDefault();
                return false;
            }
        });
    </script>
</form>