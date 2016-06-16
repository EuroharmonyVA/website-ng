<center>
    <table border="0">
        <tr>
            <td width="25" align="center"><img src="<?php echo $image_url; ?>icons/application/database_edit.png"
                                               alt="Edit"/></td>
            <td align="left">Edit</td>
            <td width="25" align="center"><a href="<?php echo $base_url; ?>acp_news/edit/0"><img
                        src="<?php echo $image_url; ?>icons/application/database_add.png" alt="Add"/></a></td>
            <td align="left"><a href="<?php echo $base_url; ?>acp_news/edit/0">Add New</a></td>
        </tr>
    </table>


    <br/>
    <table border="0" width="100%">
        <tr>
            <td align="left">
                <?php
                $hidden['valid'] = 'true';
                echo form_open('acp_news/manage/' . $system_restrict, '', $hidden);
                echo form_input($search);
                echo form_submit('Submit', 'Search');
                echo form_close();
                ?>
            </td>

            <td align="right">
                <?php
                echo form_open('acp_news/manage/' . $system_restrict, '', $hidden);
                echo form_dropdown('system_restrict', $system_array, $system_restrict);
                echo form_submit('Submit', 'Select');
                echo form_close();
                ?>
            </td>
        </tr>
    </table>


    <table class="boxed" width="100%">
        <tr>
            <td colspan="11"><span style="float: right;"><p><?php echo $this->pagination->create_links(); ?></p></span>
            </td>
        </tr>
        <tr>
            <?php //<th>id</th> ?>
            <th>title</th>
            <th>start date</th>
            <th>end date</th>
            <th>public</th>

            <th>&nbsp;</th>
        </tr>
        <?php
        $i = 0;
        foreach ($result as $row) {

            if (is_numeric($offset)
                && $i >= $offset
                && $i < ($offset + $limit)
            ) {

                if ($i % 2 != 0) {
                    $bgcol = 'bgcolor="#f2f2f2"';
                } else {
                    $bgcol = '';
                }


                echo '<tr ' . $bgcol . '>';
                //echo '<td width="20" align="center">'.$row->id.'</td>';
                echo '<td align="left">' . htmlspecialchars($row->news_title) . '</td>';
                echo '<td align="center" width="70">' . gmdate('d/m/Y', strtotime($row->news_start_date_time)) . '</td>';
                if ($row->news_end_date_time != '0000-00-00 00:00:00') {
                    echo '<td align="center" width="70">' . gmdate('d/m/Y', strtotime($row->news_end_date_time)) . '</td>';
                } else {
                    echo '<td align="center" width="70">No Expiry</td>';
                }
                echo '<td align="center" width="5">' . $row->branch_type . '</td>';

                echo '<td align="center" width="20"><a href="' . $base_url . 'acp_news/edit/' . $row->id . '">
			<img src="' . $image_url . 'icons/application/database_edit.png" alt="Edit" /></a></td>';

                echo '</tr>';
            }
            $i++;
        }

        ?>
        <tr>
            <td colspan="11"><span style="float: right;"><p><?php echo $this->pagination->create_links(); ?></p></span>
            </td>
        </tr>
    </table>
</center>
