<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Városok </title>
</head>
<body>
<a href="./index.php"><i class="fa fa-home"></i></a>
    <h1>Városok</h1>
    <form>
        <label for="countyDropdown">Megye:</label>
        <select id="countyDropdown" name="countyDropdown">
            <option value="">Válassz megyét</option>
            <?php
            require_once('ItemRepository.php');

            $itemRepository = new ItemRepository();
            $counties = $itemRepository->getAllCounties();

            foreach ($counties as $county) {
                echo '<option value="' . $county['id'] . '">' . $county['name'] . '</option>';
            }
            ?>
        </select>
        <br>
        </form>
        <table>
    <thead>
        <th>#id</th><th>Megnevezés</th><th>Művelet&nbsp;<button><a href="./city.php"><i class="fa fa-plus"></i></a></button></th>
    </thead>
    <?php
        require_once('ItemRepository.php');
        $itemRepository = new ItemRepository();

        if (isset($_POST['btn-cancel'])) {
            //do nothing
        }
        if (isset($_POST['btn-save'])) {
            $cityName = $_POST['city_name'];
            $cityId = $_POST['city_id'];

            $itemRepository->updatecity($cityId,$cityName);
        }

        if (isset($_POST['btn-save-new'])) {
            $cityName = $_POST['city_name'];

            $itemRepository->savecity($cityName);
        }
        if (isset($_POST['btn-del'])) {
            $id = $_POST['id'];
            $itemRepository->deletecity($id);
        }
        if (isset($_POST['btn-search'])) {
            $needle = $_POST['needle'];

            $cities = $itemRepository->searchcity($needle);
        }
        if (!isset($cities)) {
            $cities = $itemRepository->getAllcities();
        }
        

        foreach ($cities as $city) {
            echo ''
            . '<tr>'
                . '<td>' . $city['id'] . '</td>'
                . '<td>' . $city['name'] . '</td>'
                . '<td><div style="display: flex">'
                    . '<form method="post" action="city.php">
                            <button type = "submit">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <input type="hidden" name="id" value="' . $city['id'] . '">
                    </form>'
                .'</div></td>'
            .'</tr>';

        }
        ?>
</body>
</html>