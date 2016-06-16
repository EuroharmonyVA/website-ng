<div>
    Flight routing will generate a series of flights connecting the hubs you select to start and end the route at. If
    desired, you can select a round trip, where you return to your starting hub.<br/><br/>Aircraft from all divisions
    and both current and historical fleets can be used up to your current rank. Once you have selected and submitted the
    parameters, a route will be generated and displayed. Should you wish to accept this route, click the button at the
    bottom. Otherwise, resubmit or change the stored parameters to generate a new route.
</div>

<br/>
<br/>

<center>
    <?php
    $hidden['valid'] = 'true';
    echo form_open('dispatch/route/', '', $hidden);
    ?>

    <table class="boxed" width="95%">
        <tr>
            <th>Start Hub</th>
            <th>Aircraft</th>
            <th>Maximum legs</th>
            <th>End Hub</th>
        </tr>

        <tr>
            <td align="center"><?php echo form_dropdown('start_hub_icao', $hub_array, $start_hub_icao); ?></td>
            <td align="center"><?php echo form_dropdown('aircraft_id', $aircraft_array, $aircraft_id); ?></td>
            <td align="center"><?php echo form_dropdown('hop_num', $hop_num_array, $hop_num); ?></td>
            <td align="center"><?php echo form_dropdown('end_hub_icao', $hub_array, $end_hub_icao); ?></td>
        </tr>

    </table>

    <br/>

    <?php echo form_submit('Submit', 'Select'); ?>

    <?php echo form_close(); ?>

    <br/>

    <?php


    if ($route_gen == 1) {


        echo 'The selected aircraft has a maximum load range of ' . $range_mload . 'nm and a maximum fuel range of ' . $range_mfuel . 'nm<br /><br />';

        $prev_icao = '';
        $i = 0;
        $count = 0;

        echo '<table class="statbox"><tr><th>Leg</th><th>Route</th><th>GCD</th></tr>';

        foreach ($route_array as $row) {
            if ($i > 0 && $prev_icao != $row) {

                $gcd_km = $this->geocalc_fns->GCDistance($prev_lat, $prev_lon, $row['lat'], $row['lon']);
                $gcd_nm = $this->geocalc_fns->ConvKilometersToMiles($gcd_km);

                echo '<tr><td align="center" width="25">' . ($i) . '</td><td align="center" width="75">' . $prev_icao . '-' . $row['icao'] . '</td><td align="center" width="50">' . number_format($gcd_nm, 0) . 'nm</td>';
                $count++;
            }

            $prev_icao = $row['icao'];
            $prev_lat = $row['lat'];
            $prev_lon = $row['lon'];

            $i++;
        }

        echo '</table>';

        $i = 0;
        $uri = '';
        $route_path = '';
        foreach ($route_array as $row) {
            if ($i > 0) {
                $uri .= '-';
            }
            $uri .= $row['icao'];

            $i++;
        }


        echo '<br /><img src="http://www.gcmap.com/map?P=' . $uri . '&MS=bm&MX=720x360&PM=*" alt="Route Map" />';

        if ($count > 0) {
            echo '<br /><br />';

            $hidden['valid'] = 'true';
            $hidden['route_path'] = base64_encode(serialize($route_array));
            $hidden['aircraft_id'] = $aircraft_id;
            echo form_open('dispatch/route/', '', $hidden);
            echo form_submit('Submit', 'Accept Route');
            echo form_close();
        } else {
            echo '<br /><br /><div style="color: red;">Route Failed - Try altering parameters and trying again</div>';
        }
    }

    echo '<div style="color: red;">' . $exception . '</div>';

    ?>


</center>


<div id="gcmattrib">Maps generated by the <a href="http://www.gcmap.com/">Great Circle Mapper</a>&nbsp;- copyright
    &#169; <a href="http://www.kls2.com/~karl/">Karl L. Swartz</a>.
</div>