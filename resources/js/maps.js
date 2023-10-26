window.initMap = (endereco) => {
    const mapOp = {
        center: { lat: 0, lng: 0 },
        zoom: 16,
        mapTypeId: 'roadmap',
        disableDefaultUI: true,
    };

    const geocoder = new google.maps.Geocoder();
    const map = new google.maps.Map(document.getElementById('map'), mapOp);

    geocoder
        .geocode({ address: endereco, region: 'BR' })
        .then((response) => {
            const position = response.results[0].geometry.location;

            map.setCenter(position);

            new google.maps.Marker({
                map,
                position,
            });

        }).catch((e) =>
            window.alert("Geocode was not successful for the following reason: " + e)
        )
}
