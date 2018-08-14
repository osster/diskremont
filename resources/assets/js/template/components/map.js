if (typeof ymaps == 'object') {

    ymaps.ready(init);

    function init() {
        var mapCenter = (mapData && mapData.point != '') ? mapData.point.split(',') : [59.943872, 30.442697];
        window.bottomMap = new ymaps.Map("map", {
            center: mapCenter,
            zoom: 15,
            controls: ['zoomControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),
        myPlacemark01 = new ymaps.Placemark(mapCenter, {
            balloonContentHeader: mapData.address,
            balloonContentBody: '',
            hintContent: mapData.address
        });

        window.bottomMap.behaviors.disable(['scrollZoom']);

        window.bottomMap.geoObjects.add(myPlacemark01);

        //console.log('bottomMap', window.bottomMap);
    }

    //console.log('ymaps', ymaps);

}