<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class ="card">
<div class ="card-body">
<form id="cityForm" action="" method = "get">
<select id="citySelect" name = "city">
	<option hidden>Выберите город</option>
    <option value="">Все города</option>
	<option value="Александров">Александров</option>
	<option value="Владимир">Владимир</option>
	<option value="Гороховец">Гороховец</option>
	<option value="Суздаль">Суздаль</option>
</select>
</form>
</div>

<?
if (isset($_GET["city"])) {
$city = htmlspecialchars($_GET["city"]);
$arFilter["PROPERTY_CITY"] = $city;
}
$arSelect = Array("NAME", "PROPERTY_CITY", "PROPERTY_TYPE");
$arFilter = Array("IBLOCK_ID"=> 1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_CITY"=>$city);
$res = CIBlockElement::GetList(
	Array("PROPERTY_TYPE" => "DESC"), 
	$arFilter, 
	false, 
	false, 
	$arSelect
);

while($ob = $res->GetNextElement()){ 
	$arItem = $ob->GetFields();
	$type = $arItem["PROPERTY_TYPE_VALUE"];
	$arTypes[$type][] = $arItem;
}


?>
<? foreach ($arTypes as $type => $arItem): ?>
	<div class = 'card-title spoiler-title m-2 '>
		<? echo $type ?>
	</div>
	<div class = "card-body spoiler-body border">
	<table class = "table">
	<? foreach($arItem as $item): 
		//print_r($item);
		echo "<tr>";
		echo "<td> {$item["NAME"]} </td>";
		echo "<td> {$item["PROPERTY_CITY_VALUE"]} </td>";
		echo "</tr>";
	 endforeach; ?>
	</table>
	</div>
<?	endforeach; ?>
</div>

<script src="script.js"></script>
