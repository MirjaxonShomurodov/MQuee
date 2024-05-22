<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabs with Nested Tabs</title>
    <style>
        .collapsible {
            background-color: #777;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #555;
        }

        .collapsible:after {
            content: '\002B';
            color: white;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .active:after {
            content: "\2212";
        }

        .content {
            padding: 0 18px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            background-color: #f1f1f1;
        }
    </style>
</head>

<body>
    <div class="tabs">
        <?php
        $jsonData = file_get_contents("datajson.json");
        $decodedData = json_decode($jsonData);

        if ($decodedData !== null) {
            $user = $decodedData->value;
            $tabIndex = 1;

            foreach ($user as $u) {
                $branchesIds = $u->branchIds;
                $branchesData = $u->branches;
                $name = $u->name;
                ?>
                    <button class="collapsible"><?=$name?></button>
                    
                    <div class="content">
                        <ul>
                <?php
                foreach ($branchesData as $data) {
                    if (isset($data->custom)) {
                        $customData = json_decode($data->custom);
                        if ($customData !== null && isset($customData->address->uz->address1) && isset($customData->address->uz->address2)) {
                            $location = $customData->address->uz->address1 . "," . $customData->address->uz->address2;
                            $name = $data->name;
                            ?>
                                <li><input type="checkbox" name="location" id="<?=$customData->id?>"><?=$location?></li>
                            <?php
                            $tabIndex++;
                        } else {
                            echo "<div class='tab'>Custom data is invalid or missing address information.<br></div>";
                        }
                    } else {
                        echo "<div class='tab'>Custom data is missing.<br></div>";
                    }
                }
                ?>  
                        </ul>
                    </div>
                <?php
            }
        } else {
            echo "Error decoding JSON data.<br>";
        }
        ?>
    </div>


    <script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            } 
        });
    }
    </script>
</body>

</html>