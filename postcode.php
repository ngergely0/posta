<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AJAX gyakorlat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    <h1>AJAX gyakorlat</h1>
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

        <label for="cityDropdown">Város:</label>
        <select id="cityDropdown" name="cityDropdown">
            <option value="">Válassz várost</option>
        </select>
        <button>Új város</button>
        <br>

        <label for="postalCode">Ir. szám:</label>
        <input type="text" id="postalCode" name="postalCode" readonly>
    </form>
</body>
</html>