<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>





	<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<script>// <![CDATA[
      ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
          center: [55.795641, 37.699292],
          zoom: 14,
          controls: ['smallMapDefaultSet']
        }),
            myPlacemark = new ymaps.Placemark([55.795641, 37.699292], {
              hintContent: ''
            }, {
              iconLayout: 'default#image',
              iconImageHref: '/bitrix/templates/ovk/files/map_marker.png',
              iconImageSize: [250, 120],
              iconImageOffset: [-125, -110]
            });
        
        myMap.geoObjects.add(myPlacemark);
      });
	// ]]></script>

	<div id="map"></div>