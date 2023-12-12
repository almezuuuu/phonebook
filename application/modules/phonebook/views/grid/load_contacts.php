<?php
    $ci = & get_instance();
    if(!empty($details)){
        foreach ($details as $key => $value) {
            ?>
                <tr>
                    <td><?=(@$key+1)?></td>
                    <td><?=ucwords(@$value->Fname)." ".ucwords(@$value->Lname)?></td>
                    <td><?=@$value->Cnum?></td>
                    <td><?=date("M d, Y", strtotime(@$value->Date_created))?></td>
                    <td>
                        <button class="btn btn-danger btn-sm delete" data-id="<?=@$value->ID?>"><i class="fa fa-trash"></i></button>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>phonebook/contact_profile/<?=@$value->ID?>"><i class="fa fa-pencil"></i></a>
                        <!-- <button type="submit" class="btn btn-sm btn-primary" id="edit" value="<?=@$value->ID?>" data-toggle="modal"><i class="fa fa-pencil"></i></button> -->
                    </td>
                   
                </tr>
            <?php  
        }        
    }else{
        ?>
            <tr>
                <td colspan="8">
                    <div><center><h6 style="color:red">No Data Found.</h6></center></div>
                </td>
            </tr>
        <?php
        
    }
?>

