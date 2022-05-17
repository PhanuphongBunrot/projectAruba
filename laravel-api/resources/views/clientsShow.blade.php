@extends('header')

<h1 style="color: red;text-align:center">Laravel 8 & Bootstrap</h1>

<form action="/">
    <input type="submit" class="btn btn-success" value="Home" />


</form>
<?php $ex = explode('\n', $resp);
$name = [];
for ($i = 9; $i < count($ex) - 1; $i++) {
    $a = $ex[$i];
    array_push($name, $a);
}
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">IP Address</th>
            <th scope="col">MAC Address</th>
            <th scope="col">OS </th>
            <th scope="col">ESSID </th>
            <th scope="col">Access Point </th>
            <th scope="col">Channel </th>
            <th scope="col">Type </th>
            <th scope="col">Role </th>
            <th scope="col">IPv6 Address </th>
            <th scope="col">Signal </th>
            <th scope="col">Speed </th>

        </tr>
    </thead>
    <tbody>
        <?php for ($x = 0; $x < count($name) - 2; $x++) {
            $keywords = preg_split("/[\s,]+/", $name[$x]);
            //print_r($keywords);
        ?><tr><?php
                    if (count($keywords) == 14) {
                        $json = new StdClass;
                        $json->name = "$keywords[0]";
                        $json->IPAddress = "$keywords[1]";
                        $json->MACAddress = "$keywords[2]";
                        $json->OS  = "$keywords[3]";
                        $json->ESSID = "$keywords[4]" . " " . "$keywords[5]";
                        $json->AccessPoin = "$keywords[6]";
                        $json->Channel = "$keywords[7]";
                        $json->Type = "$keywords[8]";
                        $json->Role = "$keywords[9]" . " " . "$keywords[10]";
                        $json->IPv6Address = "$keywords[11]";
                        $json->Signal = "$keywords[12]";
                        $json->Speed = "$keywords[13]";
                        $myjson = json_encode($json);
                        //echo $myjson;
                    }
                    if (count($keywords) == 15) {
                        $json = new StdClass;
                        $json->name = "$keywords[0]";
                        $json->IPAddress = "$keywords[1]";
                        $json->MACAddress = "$keywords[2]";
                        $json->OS  = "$keywords[3]" . " " . "$keywords[4]";
                        $json->ESSID = "$keywords[5]" . " " . "$keywords[6]";
                        $json->AccessPoin = "$keywords[7]";
                        $json->Channel = "$keywords[8]";
                        $json->Type = "$keywords[9]";
                        $json->Role = "$keywords[10]" . " " . "$keywords[11]";
                        $json->IPv6Address = "$keywords[12]";
                        $json->Signal = "$keywords[13]";
                        $json->Speed = "$keywords[14]";
                        $myjson = json_encode($json);

                        //echo $myjson;
                    }
                    $str = json_decode($myjson, true);
                    ?><td><?php echo ($str["name"]) ?></td>
                <td><?php echo ($str["IPAddress"]) ?></td>
                <td><?php echo ($str["MACAddress"]) ?></td>
                <td><?php echo ($str["OS"]) ?></td>
                <td><?php echo ($str["ESSID"]) ?></td>
                <td><?php echo ($str["AccessPoin"]) ?></td>
                <td><?php echo ($str["Channel"]) ?></td>
                <td><?php echo ($str["Type"]) ?></td>
                <td><?php echo ($str["Role"]) ?></td>
                <td><?php echo ($str["IPv6Address"]) ?></td>
                <td><?php echo ($str["Signal"]) ?></td>
                <td><?php echo ($str["Speed"]) ?></td>




            </tr>
        <?php } ?>
    </tbody>
</table>