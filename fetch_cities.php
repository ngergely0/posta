<?php
require_once('ItemRepository.php');

if (isset($_POST['selectedCountyId'])) {
    $selectedCountyId = $_POST['selectedCountyId'];

    $itemRepository = new ItemRepository();
    $cities = $itemRepository->getCitiesByCountyId($selectedCountyId);

    if (!empty($cities)) {
        $options = '<option value="">Válassz várost</option>';
        foreach ($cities as $city) {
            $options .= '<option value="' . $city['id'] . '">' . $city['city'] . '</option>';
        }
        echo $options;
    } else {
        echo '<option value="">No cities found for this county</option>';
    }

    $itemRepository->closeConnection();
}