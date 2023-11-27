<?php
require_once('ItemRepository.php');

if (isset($_POST['selectedCityId'])) {
    $selectedCityId = $_POST['selectedCityId'];

    $itemRepository = new ItemRepository();
    $city = $itemRepository->getCitiesByCityId($selectedCityId);

    if (!empty($city)) {
        echo $city['zip_code'];
    }
    else {
        echo 'Postal code not available';
    }

    $itemRepository->closeConnection();
}